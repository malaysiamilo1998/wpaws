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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'reviewhunsn' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'Pagan1n1!!' );

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
define( 'AUTH_KEY',         'L8R*Mun74UbgjZI_D<FSe3,3~0U4E#}@A_dO>JF^cr[S @Z3l20;cA/a1Nc2Vs`&' );
define( 'SECURE_AUTH_KEY',  '!P$tA)hckC$AsC8D4/-kyv1Gj{PqbAYm }{2qy;2& @YegLw%uYX$yAX(Yykb+]N' );
define( 'LOGGED_IN_KEY',    'q`_bq# PgZ*t*rur8kOP3Ah0+42^m|8+r`kunF{DlGL=e>0vYj}3Heh`jfR_|TbP' );
define( 'NONCE_KEY',        'gvMjSGsdG7ctSOg<:rVf_xA/)|64[]U:RM,OoeMI.|uIMK7VA0|s%Q47]-rd?bMi' );
define( 'AUTH_SALT',        'i?!JYMo0G,q{rOM!xI!Cutvh9nlHXv2h* Tvbq)DJKC/Q+nxCy1-7(3X@|5Mansw' );
define( 'SECURE_AUTH_SALT', 'JcQaeBV@]qe962]&Zi-6m&f=Q7(Kq1]X~p GeR;}j+g8j<:mR-68$0#M,9Ic^)s[' );
define( 'LOGGED_IN_SALT',   'Slfb]K{FPP]t@sl)mA{VU7Q|%K~u;/I6u}-4Hs|U[a`jR!!M2eh{tctsnM{|i6cq' );
define( 'NONCE_SALT',       '_!%e$Bx|f,od!.t/&$kFsfb6HiXeB(/ya{3z3h5VjRM^y@`4%4vNY}6JOJf+3YC9' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'review_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
