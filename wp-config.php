<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'passivei');

/** MySQL database username */
define('DB_USER', 'passivei');

/** MySQL database password */
define('DB_PASSWORD', 'drag0nball');

/** MySQL hostname */
define('DB_HOST', 'db');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'rSe4,ChC&+4P{+^/}P)rJOg.MyLEEGSRzS/&Yp0K]`Pbp8;#~Q;@s)0s6+`5,%/I');
define('SECURE_AUTH_KEY',  '^D1QO#sgO+|S>oHrmJ/WnKJ@;--EF.^^Py@?U3T,TXUE4&Yc!TkCg{jm+Mkf%>6W');
define('LOGGED_IN_KEY',    '{>1,DRMUJ+1roNGVkvwp0>8mQwN}JO1AuQR1T|pN_k>8uPkLO8]/Y4J 1R!JPW}6');
define('NONCE_KEY',        '@2x |w6z /f[.AL&&]%7eS!Nkzb3Z.E5-ut4pFXs-%s{P|st[C]/mbpuS:>%rLkv');
define('AUTH_SALT',        '~r:S}Aql9MYDN6hNIt^W6CIUK%>g2=|Ce5+a,Sp8gIFUU|^#^p9I^c#A+>WPrE i');
define('SECURE_AUTH_SALT', 'ydg1GwXiiYHKo,[>O{mLIOO3I^o`MHTs8OJFv|m7_m}_p,X`hIx01KO#e<T~H*PG');
define('LOGGED_IN_SALT',   ')5tlL2jXP3CfV+a2;XB#R4>:(hz1+X aL6%X IOd@:n,5[VR>h) Q(LrNLI5K0Wd');
define('NONCE_SALT',       '(_oTlmH_=vD-|fSXiePVR#K:{nyc*Si)XK0[4LLngUU;<* r-i2L&Z1O0wI]r/u+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'f3D5_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
