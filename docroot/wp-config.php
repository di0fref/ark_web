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
define('DB_NAME', 'wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'password');

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
define('AUTH_KEY',         'Y3bqVlS:~g_.$1u.*n0gnFt7&TcztG#!Qujf(-L}{;@X*A~uN#C*6r oav`I>x8q');
define('SECURE_AUTH_KEY',  '+G8{DG`40d^,JHuWHw{zzRKVJvc!z*wn~n;.4|~*B>?wdXlg81cH~wD0P;YzxL&,');
define('LOGGED_IN_KEY',    'Vnpq 4:,.B)|De|p &P32mk}gvr>k#X,I_d%V<>]b%[Nd$)A{5/L+B3.5[aK{d!~');
define('NONCE_KEY',        'I>e@Zsb23?YhM7|#OP<KQ}XwO;&tm~/4yu0@/on-XV}Ak@_S8d~6dT V*zgYmVY ');
define('AUTH_SALT',        'YCKO^MVItL$(V(bk[c[DQ.gm#A2.:XrL`N!#ZlJWp8)Xcfp(3{RqvDL])geU>Ceg');
define('SECURE_AUTH_SALT', ';+|W69yGzxH?yWy_=si@Vg0066Fnk^nuPahI7?iJzCG=X^]+oA@SV(zEv$260F?l');
define('LOGGED_IN_SALT',   'VaAzg-QtMwhcGZSI9`g~DTUUm%Bh_ty{SX4Eq``j+qhn$#;<=I0kXk[rzQ.kcN|R');
define('NONCE_SALT',       'C NjghH..-U<:*`.;?AI2_^| 8Eq-ps:|a0>.?GF)aBXa:mK,X2Bpm&6 Csi^y)g');

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
