<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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

//Using environment variables for DB connection information

$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';

foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_") !== 0) {
        continue;
    }
    
    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', $connectstr_dbname);

/** MySQL database username */
define( 'DB_USER', $connectstr_dbusername);

/** MySQL database password */
define( 'DB_PASSWORD', $connectstr_dbpassword);

/** MySQL hostname */
define( 'DB_HOST', $connectstr_dbhost);

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '6@%X]xnzjdgzzq@8S8`Gb2ggj1=(2_wtX5:]^d*vRW(/7ukX/Y?YHi,%.Y2p!CPZ' );
define( 'SECURE_AUTH_KEY',  'x<QnC=z^OcTD-l.[IR/b {;fQqFL,ZT/h`dq4Mi^j7yj9N+Ufi AKrNltL-9PcxN' );
define( 'LOGGED_IN_KEY',    '^|,L=wm+g%%h%* EBH&X[~!T te8:|~6jXOZ{[F|O~kOuX,^,0Ulj@a9vE=u|zsc' );
define( 'NONCE_KEY',        'd2 jmaz Ac[>ibN$Mou/]rch+)GySg*L{({gss<6DXdfd*k68mhhVRHwRG%ve!!m' );
define( 'AUTH_SALT',        'j3}{SI^SwY8 Np]^6?m5G.wm>?y%!HwAgxl$F{d/d{*u>*sN3s-C&C(cPR9JEq*)' );
define( 'SECURE_AUTH_SALT', 'L4*5IAuus#{IwH+l9h(x[S5i}*l|Oh<[CW3^cx_5yiTGVi~CP>Lv~Osz-kw6 ]})' );
define( 'LOGGED_IN_SALT',   '#QnP|V[,y1$5n SK61aFRdI;usU%~=2``;)(soH^a{,]}.QnkApL3>]YHzpiU RT' );
define( 'NONCE_SALT',       'Id!&6vUKMAqIU-l#HY+ icQcq_vOr:U9W2z9yYG*a#KE Ze8;dbLAk<Y:r$(JP^x' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
// Enable WP_DEBUG mode
define( 'WP_DEBUG', false );

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', false );

// Disable display of errors and warnings
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define( 'SCRIPT_DEBUG', false );

define('WP_MEMORY_LIMIT', '250M');

/* That's all, stop editing! Happy publishing. */

//Relative URLs for swapping across app service deployment slots 
define('WP_HOME', 'https://'. filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_STRING));
define('WP_SITEURL', 'https://'. filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_STRING));
define('WP_CONTENT_URL', '/wp-content');
define('DOMAIN_CURRENT_SITE', filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_STRING));

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
