<?php
/**
 * Functions
 *
 * @package Stardust
 */

// Useful global constants.
define( 'SD_VERSION', '2021.32' );
define( 'SD_TEMPLATE_URL', get_template_directory_uri() );
define( 'SD_PATH', get_template_directory() . '/' );
define( 'SD_INC', SD_PATH . 'inc/' );

require_once SD_INC . 'core.php';
require_once SD_INC . 'shortcodes.php';
require_once SD_INC . 'overrides.php';
require_once SD_INC . 'utility.php';

// Run the setup functions

Stardust\Core\setup();
Stardust\Overrides\setup();
Stardust\Shortcodes\setup();


// Require Composer autoloader if it exists.
if ( file_exists( get_template_directory() . '/vendor/autoload.php' ) ) {
	require_once get_template_directory() . '/vendor/autoload.php';
}

$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ );
$dotenv->load();

// Data Files
require_once SD_INC . 'data/last-fm.php';
require_once SD_INC . 'data/letterboxd.php';
