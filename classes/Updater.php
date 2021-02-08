<?php

namespace Vervocity\Footer;

class Updater
{
    protected $file;
    protected $user;
    protected $repo;
    protected $plugin;
    protected $basename;
    protected $slug;
    protected $active;
    protected $release;

    public function __construct($file, $user, $repo)
    {
        $this->file = $file;
        $this->user = $user;
        $this->repo = $repo;

        add_action('admin_init', [$this, 'setup']);
        add_filter('pre_set_site_transient_update_plugins', [$this, 'modifyTransient'], 10, 1);
        add_filter('plugins_api', [$this, 'pluginPopup'], 10, 3);
        add_filter('upgrader_post_install', [$this, 'afterInstall'], 10, 3);
    }

    public function setup()
    {
        $this->plugin   = get_plugin_data($this->file);
        $this->basename = plugin_basename($this->file);
        $this->slug     = current(explode('/', $this->basename));
        $this->active   = is_plugin_active($this->basename);
    }

    public function getCurrentRelease()
    {
        if (!$this->release) {
            $uri = sprintf('https://api.github.com/repos/%s/%s/releases/latest', $this->user, $this->repo);
            $request = wp_remote_get($uri);
            $response = json_decode(wp_remote_retrieve_body($request), true);

            if (is_array($response)) {
                $this->release = $response;
            }
        }
        return $this->release;
    }

    public function getZipUrl()
    {
        $release = $this->getCurrentRelease();

        // Do we have it downloaded already?
        $uploadDir = wp_upload_dir(null, true);
        $domain    = $this->plugin['TextDomain'];
        $filename  = "{$domain}-{$release['tag_name']}.zip";
        $path      = "{$uploadDir['path']}/{$filename}";

        if (file_exists($path)) {
            return "{$uploadDir['url']}/{$filename}";
        }

        $zip = $this->downloadCurrentRelease();
        $upload = wp_upload_bits($filename, null, $zip, $time);
        return $upload['url'];
    }

    public function downloadCurrentRelease()
    {
        $release = $this->getCurrentRelease();
        $zipUrl = $release['zipball_url'];
        $request = wp_remote_get($zipUrl);
        return wp_remote_retrieve_body($request);
    }

    public function modifyTransient($transient)
    {
        if (!property_exists($transient, 'checked')) {
            return $transient;
        }

        $release = $this->getCurrentRelease();

        // Check if we need an update
        $hasUpdate = version_compare($release['tag_name'], $transient->checked[$this->basename], 'gt');

        if (!$hasUpdate) {
            return $transient;
        }

        $plugin = [ // setup our plugin info
            'url'         => $this->plugin["PluginURI"],
            'slug'        => $this->slug,
            'package'     => $this->getZipUrl(),
            'new_version' => $release['tag_name']
        ];
        $transient->response[$this->basename] = (object) $plugin; // Return it in response
        return $transient; // Return filtered transient
    }

    public function pluginPopup($result, $action, $args)
    {
        $action; // Not used
        if (empty($args->slug) || $this->slug !== $args->slug) {
            return $result;
        }
        $release = $this->getCurrentRelease();

        // Set it to an array
        $plugin = [
            'name'              => $this->plugin["Name"],
            'slug'              => $this->basename,
            'version'           => $release['tag_name'],
            'author'            => $this->plugin["AuthorName"],
            'author_profile'    => $this->plugin["AuthorURI"],
            'last_updated'      => $release['published_at'],
            'homepage'          => $this->plugin["PluginURI"],
            'short_description' => $this->plugin["Description"],
            'sections'          => [
                'Description' => $this->plugin["Description"],
                'Updates'     => $release['body'],
            ],
            'download_link'     => $this->getZipUrl(),
        ];

        return (object) $plugin; // Return the data
    }

    public function afterInstall($response, $hookExtra, $result)
    {
        global $wp_filesystem;

        $response; // Not used
        $hookExtra; // Not used

        $installPath = plugin_dir_path($this->file);                // Our plugin directory
        $wp_filesystem->move($result['destination'], $installPath); // Move files to the plugin dir
        $result['destination'] = $installPath;                      // Set the destination for the rest of the stack

        if ($this->active) { // If it was active
            activate_plugin($this->basename); // Reactivate
        }
        return $result;
    }
}
