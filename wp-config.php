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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mozitaco_digital' );

/** Database username */
define( 'DB_USER', 'mozitaco_digital' );

/** Database password */
define( 'DB_PASSWORD', 'GS58(]P6Xp' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'nmqbaadbeglejoihovjiattmgdb72rxjsgw5vhvpkxzohfedzltcefrvhdoptwhd' );
define( 'SECURE_AUTH_KEY',  'ligdfudcdp9qcdomoxu2m36echc6ka5i7hlspawh9pg4lcwvr026m7zws78m297q' );
define( 'LOGGED_IN_KEY',    'yrc59f1eo4qhzk6jcz3kq0q3lcwtsrqgsgxgbo5ybqyjm05qjbgzwbcltnppiys8' );
define( 'NONCE_KEY',        'pkgeg2dsm6mxhx5qjljqfd7eanizyje75asfd6jpx74u0gsnazo3dlexuqwyty4b' );
define( 'AUTH_SALT',        'r91vjw2nsobl8wbpb3dlvuhmeopvyy8immq1u68zb7m76cvki8lxrr6h5hbtorhd' );
define( 'SECURE_AUTH_SALT', 'vx00nmsfbaec68kwbgloogygj7safcsc5y2byqds3yszjim27sodyup12n4tnogy' );
define( 'LOGGED_IN_SALT',   'salxowevthflj3eglcdibfdrjhizhvqvqlnwsneotwtquzobbigzydbkzuex6c2f' );
define( 'NONCE_SALT',       'b8oqdiwhnrgkd2tiqfmpatvcnmsu3jhwrwta7ipid1e5ajqnkcfoa8bpdivrggck' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
