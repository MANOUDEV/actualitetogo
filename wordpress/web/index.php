<?php
/**
 * WordPress View Bootstrapper
 */
use Timber\Timber; 
define('WP_USE_THEMES', true);
$timber  = new Timber();
require __DIR__ . '/wp/wp-blog-header.php';
