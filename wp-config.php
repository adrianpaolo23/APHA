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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'worldpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'u/%2td>:bnF+TP@%SR0|xw+{9a3+k~RG%z,ldzvDnO~7:?sU5W)J| 4>8MSfI$v2' );
define( 'SECURE_AUTH_KEY',  'J2FVg8Y#Gz]:R+rWLTQ`ah5}a&L;siITERT@m%I$bmD_D7P(AhvL8!0mwT^kPEtp' );
define( 'LOGGED_IN_KEY',    '@Rl8{J^F$<U`X94$T(O4}zI6eA|.F*{]3FvXl]%LbBdpw0Oru,Rvbs.+pfMG.b`S' );
define( 'NONCE_KEY',        '(2dHWWIWCi4URZ$@`I4A9Cy<.#TI@c081KvLOPK +Mxiz9uiqV<Q%^~VD4.msQ5>' );
define( 'AUTH_SALT',        '$:ItJ0mL-W$927G[0<9R&PT*PRxFGUmByT0v%hfWk|AZIHZ8;Yi?RT_]$#f3}NW*' );
define( 'SECURE_AUTH_SALT', 'MD`yyGbAn|#xR/BUz+22-;;MH1%Ig~ahi_DN5Xzr||=]HYwzN0%iH,zBrI46PI_v' );
define( 'LOGGED_IN_SALT',   ' HPtZ+kK,Y4U/|;7 XPU+IU*lA.rgUMB/f9I:E5W=r7KDD.dmjS/EVHQBe:Xi5Rv' );
define( 'NONCE_SALT',       '=hpw7o svC2H:h(.,S20;;B8>o5JPP_dQZo@#3ne_`<NX$#=P:;2TUEOW$`PY:8x' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'Ambo_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
