<?php

// Useful global constants.
define( 'SD_VERSION', '2021.24' );
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
