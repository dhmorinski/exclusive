<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'rkhq2X4NKFZGEkOQf2DOPbKFnmLbhzDAlPip1cV/eVVSq9MCcIcbrhbCCKwQhrf7KpxEvULkMDm1i0HdHywQ7w==');
define('SECURE_AUTH_KEY',  'bLtAn5U1hoTzUQ+JLEqL0PTnWUDMRv6K1MF8z5+2VRd51rGWNpcfdU11GPVE1gWp8cQp4mu7Bh9lwDpxBpLeoA==');
define('LOGGED_IN_KEY',    'r5Hdo+JJPyYilR7vhD7KTLD5TzzO9SCmuSeOD6dQyaKdx0m043mlg8kG4sh5284yLih27Zk8AVxeFi9+a8+Phg==');
define('NONCE_KEY',        'FGMiEx3+XBzvUOCAOXtjErUPEfs3dNEFx78BOnu357Mt0ZWLlZnaRjsnBnRPXMapHW5jCe/7ORn7ri1/6WepZA==');
define('AUTH_SALT',        'Wt+nw06EAfzMNgADzXjy94N/PDQDCUiGcEmJO8Qj/n3NZOyqu42oSnAyNTZ4Zmmm1TRpbj2oQyKLz224Y0Uvzg==');
define('SECURE_AUTH_SALT', '2GOg4Ma2FFWyPpHuvBMtWiKBkP2a6aMz91/BSTOUj6JNXzDD/rHv3cLbN5A87wMaWqvJumsYgYryoerBFDZmbg==');
define('LOGGED_IN_SALT',   'tnem/dqGgn/VZU1EbtPXBNMolFcnZlZIjAnq38nlILw/miaO308Ygq499lSBgZqVkBksBxI8k5GpPMth70vHDg==');
define('NONCE_SALT',       'ITyO77g/A8ixizsS8W19xczSQMd0SsMSz0gWRmF3HhxlGXHaFOAGZrkE4l6YaFNAtkGzVYTOGdf8DoVGvainQw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
