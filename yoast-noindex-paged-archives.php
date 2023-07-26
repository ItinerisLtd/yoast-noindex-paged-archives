<?php
/**
 * Plugin Name:     Yoast No Index Paged Archives
 * Plugin URI:      https://www.itineris.co.uk/
 * Description:     Set `noindex` and remove Yoast next/prev rel links.
 * Version:         0.1.0
 * Author:          Itineris Limited
 * Author URI:      https://www.itineris.co.uk/
 * Text Domain:     yoast-noindex-paged-archives
 */

declare(strict_types=1);

namespace Itineris\YoastNoIndexPagedArchives;

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

add_filter('wpseo_robots', function (string $robots): string {
    if ((is_page() || is_archive()) && is_paged()) {
        return 'noindex,follow';
    }

    return $robots;
});

add_filter('wpseo_next_rel_link', '__return_empty_string');
add_filter('wpseo_prev_rel_link', '__return_empty_string');
