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
define('DB_NAME', 'armanage');

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
define('AUTH_KEY',         'ie:lUa[V(}7DMlPu)10_cx+$EH{0q:8;`q5(LJsssol_<=ERRT@wvkk*6/C$uMfp');
define('SECURE_AUTH_KEY',  '&<6wEHx89)g)pqw%LNTFa,MM_5o41EEy*VT(EM7ii4P2R/*;:fE){tNq`GqrY}Lg');
define('LOGGED_IN_KEY',    '.ktLtCIOdpXo/Feix{5xx v#8=g*J-W B>Bdj[nP@WmZfB^U[Dd3L+t(u7il1KWo');
define('NONCE_KEY',        '*Wh.X+X,}U^ex,v]!,r(jj!R ~Hps Rh.6-{$zHqEH^,0=4|5sp_C0Dn/OwzlLHB');
define('AUTH_SALT',        'uT.~I;f{1PDPJ1+Re-p8!||eOzy9P+eiB`P{~wKq&7>-i%r3)o:O$7b {nCJn/l!');
define('SECURE_AUTH_SALT', ',dv%q?;[wyHm[e&JW:xJ`Q:k*Edn: IAE:[.:29:`9)}$6c#Iexwf3yRca0)b%+/');
define('LOGGED_IN_SALT',   'J)tq#:)n5cMYg3_JN%RyTenKeY> q{Bf>k3a,3_7*Yg%dNS`yoE(P.^]lBoXy9.(');
define('NONCE_SALT',       'x!X?qCV-Y{r^e@leXsDB+dm+{yz>3PPUU`2L^a+t:dlN,e$dV|SmOXgEL):v8vh@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'armg_';

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
