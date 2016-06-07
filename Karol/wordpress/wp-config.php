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
define('DB_NAME', 'karol_make');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ':yR;YAv;qh~bv^PCh-.ST7%,)!0jIi#:v6]CAHI![F3BSD>;[sb%3ik+?8k10v13');
define('SECURE_AUTH_KEY',  't$=.iBF+I2@%1OzuiD5nDpkM8bTh<fM&Th4Pk52I@Q$E&ZpgVn+9kUieqxxz.Jv ');
define('LOGGED_IN_KEY',    '1jGN$RasM5gy12%_%Om>Cs.}dqAOCghuK#Y5dEm_q)0Qbsg426!jrO7CyePEP8[N');
define('NONCE_KEY',        '=$,Yv${h?&^/224!j;}H3!Zlf~U_;N,_t=Ar>[z,r58dxEJQ20w~V[G7r,SsOD%&');
define('AUTH_SALT',        '?>5>dx]govXu)IM_JbcIvudY0%9s#v&2P`7h<^=zS1dg]5<]!!0ju,$]c_5ztU.v');
define('SECURE_AUTH_SALT', '-YfKw4Eh9J&?qG|Ok@/^$ns<-[|H5qeqb B4aL-;<OxxVq4}7|`L8sg[w8+>27@C');
define('LOGGED_IN_SALT',   'zmD0G8_)3c>,zxI|#Rh;1yy<9).L4$!~u4TD)F3Nmd/)p%}_qq?~;22Pb#i ~ZAy');
define('NONCE_SALT',       '~16Oz=%d/@s~-T`7JER7e5>,GOfJ42.5FIw&3oGksJ%XAja58B!tLqU0MjP_8lon');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_make';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
