<?php
/**
 * Functions
 *
 * @package Stardust
 */

// Useful global constants.
define( 'SD_VERSION', '2022.3' );
define( 'SD_TEMPLATE_URL', get_template_directory_uri() );
define( 'SD_PATH', get_template_directory() . '/' );
define( 'SD_INC', SD_PATH . 'includes/' );
define( 'SD_BLOCK_DIR', SD_INC . 'blocks/' );
define( 'SD_DIST_PATH', SD_PATH . 'dist/' );
define( 'SD_DIST_URL', SD_TEMPLATE_URL . '/dist/' );

require_once SD_INC . 'blocks.php';
require_once SD_INC . 'core.php';
require_once SD_INC . 'customizer.php';
require_once SD_INC . 'overrides.php';
require_once SD_INC . 'rewrites.php';
require_once SD_INC . 'shortcodes.php';
require_once SD_INC . 'utility.php';
require_once SD_INC . 'widgets.php';
require_once SD_INC . 'post-types/snippets.php';

// Run the setup functions
Stardust\Blocks\setup();
Stardust\Core\setup();
Stardust\Customizer\setup();
Stardust\Overrides\setup();
Stardust\Rewrites\setup();
Stardust\Shortcodes\setup();
Stardust\Widgets\setup();
Stardust\CPT\Snippets\setup();

// Require Composer autoloader if it exists.
if ( file_exists( get_template_directory() . '/vendor/autoload.php' ) ) {
	require_once get_template_directory() . '/vendor/autoload.php';
}

$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ );
$dotenv->load();

// Data Files
require_once SD_INC . 'data/last-fm.php';
require_once SD_INC . 'data/letterboxd.php';
