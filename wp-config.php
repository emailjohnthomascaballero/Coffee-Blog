<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}


define('AUTH_KEY',         'DJYrW4V43RAFBE3jEKQtAtezL2r/MM4Ub+2SsKD99/ICZu5eKtf9ufKsBhPwmw8h06PFg0uvxDWI4A8fVjVpEg==');
define('SECURE_AUTH_KEY',  'U5/eq1iXmsvYlVsXkM+U0KFzN4c0bPeOCSC6iKzz8EME/u1RzBC6CrgtSJXFwQVqDZmzCrswwYlgLMWW4B3pTg==');
define('LOGGED_IN_KEY',    '5h40rfbCbK7GWvZ46Qada6o9Rp4A7WeOMWivI3pSyXjgjuQsmUIdS6I7VB7kMC3cg9G4Uq/TRjKf5rcsiqn2OQ==');
define('NONCE_KEY',        '+rv7haeV0uEmSaouSCRkbe/nDQ5uZrQbilzp6it6m3WVnJivvN0ZXrVu3+KPSyKSoffFSnElzOCMCoQM6tUDSw==');
define('AUTH_SALT',        'IKQ7D3gxhE7eCxQdIajzXitycowSCY3oosyjVlg134Ev095xIG7fxP61RbFXAi+bWUDXcmK7dC2FaRwjH1CSxA==');
define('SECURE_AUTH_SALT', 'aMUT0TL5DuJmFdgtibhSP6RUUPekCuHjJaio4Z70xlMzG/cHZj5xzqoUaphOQVOMm6tQWBHK+461mtTQhTuv0A==');
define('LOGGED_IN_SALT',   'RTpiNxlVEebZPMskHapkdnGLTyyF+sTtYbiR77SbwlEg05M8B87vgPP+tzajam33qfns74M/mtjidUOQoa2Nsw==');
define('NONCE_SALT',       'jLOIp9pQViux4SNpu/XxjtKfoJ4UBtd1nYNVk86rDJ6SGUd3cW91FxCFylAw+aOwxSH6BFWdB+Ik4+eJABjFCQ==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
