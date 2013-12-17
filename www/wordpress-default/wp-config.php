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
define('DB_NAME', 'wordpress_default');

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
define('AUTH_KEY',         'K_Uv)jiQ_^7oao=1E4`.I+,P^#ee<{t7%28#U=I%+y%`-D? n9D*&$W+wDxxZ>YE');
define('SECURE_AUTH_KEY',  'k_X)[Lgrh;+02=k8gv-j4~K|0$Oyu[1aSK!3%|YYiJ}]d7J9aW7gGU; FBqczI2F');
define('LOGGED_IN_KEY',    '27/FB[J_c{S!A;TNv;.~F6Dr-gj)[K[4>0bM![/ADmi7Z/Et]pk[,QQ^,ksI-poP');
define('NONCE_KEY',        'u&y/8|$PK+Y=y)]CF[NVl!:UUe7KR6Yt{0>R?Jv *d!6Xlm-L<&#W`Agrd$WoI4$');
define('AUTH_SALT',        ']IxkOB*mA:J1>j!]Zk,&?:ivddMKbGl@b]rWk9-uzMW.D+DsA$%GAbxA<<H9Xt0:');
define('SECURE_AUTH_SALT', ' T)T3N}/K|V8:U9&w :w|K?+$?<(Y1R:>(yVwN^XeC6N#HL<qsG!C`%Hl:a`#-BQ');
define('LOGGED_IN_SALT',   'W!v+D)N0(SH<uM8x;`8u=`@EIQ!2B7%k]cr4m]yb=87_ZZ)afH|D<c9|lx~F[tAc');
define('NONCE_SALT',       'qg *B4c*[*fU R<m]4hYk~A_[|[TqvYSVQ.xyX(y-T=up8}@uPoslO -M]??dTF|');

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
