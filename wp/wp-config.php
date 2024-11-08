<?php
/**
 * The base configuration for WordPress
 *
 * @package WordPress
 */

// ** Database settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv('DATABASE') ?: 'database_name' );

/** Database username */
define( 'DB_USER', getenv('USERNAME') ?: 'username' );

/** Database password */
define( 'DB_PASSWORD', getenv('PASSWORD') ?: 'password' );

/** Database hostname */
define( 'DB_HOST', getenv('HOST') . ':' . getenv('PORT') ?: 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 * Generate new keys using the WordPress.org secret-key service.
 */
define( 'AUTH_KEY',         'your-unique-phrase' );
define( 'SECURE_AUTH_KEY',  'your-unique-phrase' );
define( 'LOGGED_IN_KEY',    'your-unique-phrase' );
define( 'NONCE_KEY',        'your-unique-phrase' );
define( 'AUTH_SALT',        'your-unique-phrase' );
define( 'SECURE_AUTH_SALT', 'your-unique-phrase' );
define( 'LOGGED_IN_SALT',   'your-unique-phrase' );
define( 'NONCE_SALT',       'your-unique-phrase' );

/**#@-*/

/** WordPress database table prefix. */
$table_prefix = getenv('TABLE_PREFIX') ?: 'wp_';

/** Enable debugging for development */
define( 'WP_DEBUG', false );

/** Enforce SSL */
define('MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL );
$_SERVER['HTTPS'] = 'on';

// Optional S3 credentials for external file storage, such as AWS S3.
if (getenv('S3_KEY_ID') && getenv('S3_ACCESS_KEY')) {
	define( 'AS3CF_SETTINGS', serialize( array(
        'provider' => 'aws',
        'access-key-id' => getenv('S3_KEY_ID'),
        'secret-access-key' => getenv('S3_ACCESS_KEY'),
    ) ) );
}

/** Disable file modifications on serverless platforms */
define('DISALLOW_FILE_EDIT', true);
define('DISALLOW_FILE_MODS', true);

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
