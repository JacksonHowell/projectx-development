<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress_trunk');

/** MySQL database username */
define('DB_USER', 'wp');

/** MySQL database password */
define('DB_PASSWORD', 'wp');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
 */
define('AUTH_KEY',         '-qX+&cV;Lr&[e>8pE<2,z-_E:7nn8|9n|)m0(fJHxo8mi9)k-A/gMznDJ/mgY6v*');
define('SECURE_AUTH_KEY',  '-#o+;Q>>$T&*F9JVY[%;gQqzZ]$W+{|V$]+d.iAm~,95($4-p]hwMJ4Jk|{5cDzh');
define('LOGGED_IN_KEY',    'V9.Cr$8N1p1/+wlp&byJ=K;^{2&l@waCqkJR$1-(E{;G^776obkh{5!QSpe+d+e[');
define('NONCE_KEY',        'X]rFJ0O>X dP+{v;phIk.TPiV{>.U-I~]J92:2sH3B4`#>l^=Kb!&v+)P+dRGJ-=');
define('AUTH_SALT',        '+|-]?;jJN*e=mT|qqSbH/LtXt]pJzq!ccf5h |#A=8k|LHdn%Z1CxP!nU))GL~1p');
define('SECURE_AUTH_SALT', '|R$n72Sj5-1}j-ran3AC!Q~bD|-?2nWhf.DyEni@I{84%}cF|qLwZ}Jb3C=i~-7M');
define('LOGGED_IN_SALT',   'hL}Z%X&GpRokq Z>Eo3Phe1tavfRE gHts2hz{rPAEm67gX_|$=EPXI+Ds}|slCB');
define('NONCE_SALT',       '.0%x86>&1(KTG^6~V_~54W34%RHP.ewy&rA0[a*=4J5)]$MZ^hP?DH+bKlM`#qH-');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

define( 'WP_DEBUG', true );


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
