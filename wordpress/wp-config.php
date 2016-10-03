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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'john');

/** MySQL database password */
define('DB_PASSWORD', '1234');

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
define('AUTH_KEY',         '%|I%;$(isKmsu?|39h`Fz;^k5pvuY=wqv{ j^N&&#IH>9^Hd~0XSNJ?^+qYXbgit');
define('SECURE_AUTH_KEY',  '19;5Wh1dp=X(s?|d8=Jap{eHq(C1<9>r)}xM)*n0Nb}i7ka<<Rhn5HL?jVs<J:#>');
define('LOGGED_IN_KEY',    'U5!lU{FTt]2F[sn&)UwT5.gcSzBLg}[XD=gwN=pEyjeZFhjqlGw+ .9szPQ3%(]A');
define('NONCE_KEY',        'O|uR#pQf|ViL_<!3T^[Mv#Qa?},$1lcF[P}G}lr+{H6KzZ^+6=f=|eWBZX8g>K#&');
define('AUTH_SALT',        'ROTC_HPBd;sW>` W8Zv5r|#q}VZlGp;rILI7*P!f&fOXaw*egA^D-N,+^@;#MhB.');
define('SECURE_AUTH_SALT', '0R$sN&|.]zd(C@>q]Nm%Xea>gWvh9%fina-~OP<XL[jsbfLY?_]GZDnX>2MC=%YS');
define('LOGGED_IN_SALT',   'XUe57e8IDvdUa|lxz<1I;/5js9V3n+A[*5u%G??n(Fi`%sL=fJnUFaLTU|y7i>rm');
define('NONCE_SALT',       'ZDCu0F kYbE#bSaI@6O5#<D]}.(%iZw6:S{<$p7/_jy/:UggcOO_y,E){>2`O=@F');

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
