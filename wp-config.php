<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'mable' );

/** Database password */
define( 'DB_PASSWORD', 'mable' );

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
define( 'AUTH_KEY',         '^8q y,b<CdZddE[MPa/3>L#TX$bFxRH!*6iouH(i3,RKMc-;<)A]{AJMYFsoY@}F' );
define( 'SECURE_AUTH_KEY',  '=;VqwkHj8GLTQg />?)%YC)E[|W5%.v8f.||tJ5_(DI 0)PpTRHHJaenG7Y4.9~a' );
define( 'LOGGED_IN_KEY',    '3Sn5QL(RZ--IM5i{^52r&Ilbhb<U4E8&T1hLRK_-)wX>#idQi! L%VnFJ~~HtKRw' );
define( 'NONCE_KEY',        'Jbt%0vpNnt1J9xoM}_MuLelYl7$Pqv0-@GyGnG96e3|Wgv}ywJ-H]F_0!hRMg!s@' );
define( 'AUTH_SALT',        'uGKmG[6<m,%V|GzOs(lRCDUZARqdX$b4Cpd`R$%,e&cpzr[?Zc67TEwO@v? @+{*' );
define( 'SECURE_AUTH_SALT', '~v{!YDO=@([L2Fw3UGrrR6Y9vyfN:]NQ9I.|M 5ES*|1Xt_I`X6fcnt)o%T/U~k#' );
define( 'LOGGED_IN_SALT',   'Jf$uoZ/NWP;X[QGh{?*cF^YiO}typ;sR^eFbBAlL>i/HRL9M@`Eb!,5meN_-sgan' );
define( 'NONCE_SALT',       'cPug[|RXo5V?*U{~}7/j} dd;AF]{md,6Iz#4]b?1RcC<W5d%=bUY^3xSaMRo9ce' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'Marble_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
