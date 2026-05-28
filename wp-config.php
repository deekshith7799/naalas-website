<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'naalasdb' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '*dR<1=W ;:@L%Z>Gb/ay[LLjN;iaAN@1g/zT/VAfp_kKjYgdtBf~PT:y-[6dN)m9' );
define( 'SECURE_AUTH_KEY',  'mOP,5=#gENd]lxPDkeN)7&m}gPG<7tHbvx`0kH21Nyr5vc4 h9^-sfl/:3dE5P,6' );
define( 'LOGGED_IN_KEY',    'vW% OBnK;S/ass@b;MZ[#t1};^#w#v/q[4!+H^X^b>8!)M(jy!NiUfAP|a4TNZq;' );
define( 'NONCE_KEY',        'fC@E4Wod5Ppz(tdT*;_p(D~IT#a}B?Ao_bPtJ1&ohiv@$ MGVRyT0Us5LLNvwOb<' );
define( 'AUTH_SALT',        '{;{W.f@Drl`;o0w-vJWmz,JNl%bRiv*v7X!u^6$[Hpxr<wPu403ethRNfpl ^1pj' );
define( 'SECURE_AUTH_SALT', 'V!~U/&m}nUtV#h}x49u/50>j+$hEx/s=*,tDr)Q.ciZ|5rG3gTz733SH60K<5ARQ' );
define( 'LOGGED_IN_SALT',   'gfyb4bE5&AT1,9a~NElD=GE(I *PzTCiKDa=:*6~O|2zN;~C!}5</zXZn_4tb-#g' );
define( 'NONCE_SALT',       ',Gkv2C!`bXXF9wt/OE+vAh8?Q/R8do51`S`okh24X;.XM>HULctnbY@{q0#BCCfl' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
