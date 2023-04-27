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
define( 'DB_NAME', 'webbook' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('WP_MEMORY_LIMIT', '3000');

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
define( 'AUTH_KEY',         '{2(FCVj{b{jMnQ`v#CS&n(+.!;dh&NbLvev/ox/Lvh/WIkvL>9Cz{:]U<H}h(d^c' );
define( 'SECURE_AUTH_KEY',  'f2ut<oNYh+}Yt;TRKC;Puo*W8/PJu]!}>g#u<:.k+q: <j_Cy#WSz[7V~;9~`1CR' );
define( 'LOGGED_IN_KEY',    ']x1[QRSCAZ)E1,H],tkUQ8rFl*R@$5lrW(XT~r+6N4*5*ZQcki/s4M[6+4/G<oST' );
define( 'NONCE_KEY',        '!tV8s>KaiKYAo/^C(!<7qf18.z?)v`)!iEx?^Ha>K=U`G%%nL{QvKQSt_bz|D1bT' );
define( 'AUTH_SALT',        '5?Jp*dOGq$GD,*;o:s_@By|<kj3nAfvd[F2`3rT g4JML^ZUTm@eT< -h66r4CJt' );
define( 'SECURE_AUTH_SALT', '.H;$3DgUK`$,O$HcG_!*0s$MX $UHz)Y <Jpi/ Ae&<y@J`NI5%#EjT?w)cVilFT' );
define( 'LOGGED_IN_SALT',   '|dAQg9q3(EADm@:Z,j9#y8Hg0BWP$p79uL;L8BLTmwba^z,:-Hx5v|x0/F_NL&|y' );
define( 'NONCE_SALT',       '&Nt>&|:H/.D^Wh6OOzgP{bf/|+[X%a-o4hrH=YL-h.<6(WctB/}zUg?<WyVisc]B' );

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
