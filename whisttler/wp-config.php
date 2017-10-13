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
define('DB_NAME', 'whisttler');

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
define('AUTH_KEY',         'JG;&nP7o}r_m+9i?3f,[.k^P<?2B2#c=PkW,@1l&WH#W[<#.BF5&) tpI8,B/i`>');
define('SECURE_AUTH_KEY',  '(n:BK!Q@bD@Fy,dB|LA.nH`8j`Vb6A|UzC0`;Lr[h4ky[Q,FFJB#nzxl0[@7ecs#');
define('LOGGED_IN_KEY',    'm37Cmiy;+Fb[DGjU,GKg!!nU&FG6%$]Y`,O)5UJn*gx6a@;#oo4}i3V?qtmfst+:');
define('NONCE_KEY',        '*!j}d[Pn^g>Ua~)`jQo2rQ,&yy~JV2 3 Yzp2z_8|G}ZB+a oNf7BFWJ+uf|Y_[K');
define('AUTH_SALT',        'w~^Kk.<R-3KN+paUTu/Vd,WYslv`fSOe@k$9nU=KN:$;ow2)mmvA(yz`ifcFCP1`');
define('SECURE_AUTH_SALT', 'd%G(uOpCT*ztN):B#sgeZm7O9cIrpD+CtN_^dZDq!jm-}a/LhJw|T:mm8Q/BM%(S');
define('LOGGED_IN_SALT',   ' R1+d)o!+]$HnmN/|*{i*tSzKLE0b$?aB WCZ2dkSiJgc6=U%Kg?P_kE>HCLDC>G');
define('NONCE_SALT',       '%Xk1Zg!u$VK4qtw5{Fge^[s?!~@5m207g|:L4|zLL(;?nLXgh=a=2NvaF}YFdkk ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
