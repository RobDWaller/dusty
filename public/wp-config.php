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

/**
 * @author Rob Waller <rdwaller1984@gmail.com>
 * Include vendor autoloader
 */
require_once(__DIR__ . '/../vendor/autoload.php');

/**
 * @author Rob Waller <rdwaller1984@googlemail.com>
 * Initiate the DotEnv functionality for WordPress and define required variables.
 */
try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
    $dotenv->required(
        [
            'DB_NAME',
            'DB_USER',
            'DB_PASSWORD',
            'DB_HOST',
            'DB_CHARSET',
            'DB_COLLATE',
            'DB_PREFIX',
            'ENVIRONMENT',
            'WP_DEBUG',
            'WP_DEBUG_LOG',
            'DISABLE_WP_CRON',
            'SSL',
            'AUTH_KEY',
            'SECURE_AUTH_KEY',
            'LOGGED_IN_KEY',
            'NONCE_KEY',
            'AUTH_SALT',
            'SECURE_AUTH_SALT',
            'LOGGED_IN_SALT',
            'NONCE_SALT'
        ]
    );
} catch (Throwable $e) {
    echo $e->getMessage();
    die();
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $_ENV['DB_NAME']);

/** MySQL database username */
define('DB_USER', $_ENV['DB_USER']);

/** MySQL database password */
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);

/** MySQL hostname */
define('DB_HOST', $_ENV['DB_HOST']);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', $_ENV['DB_CHARSET']);

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', $_ENV['DB_COLLATE']);

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', $_ENV['AUTH_KEY']);
define('SECURE_AUTH_KEY', $_ENV['SECURE_AUTH_KEY']);
define('LOGGED_IN_KEY', $_ENV['LOGGED_IN_KEY']);
define('NONCE_KEY', $_ENV['NONCE_KEY']);
define('AUTH_SALT', $_ENV['AUTH_SALT']);
define('SECURE_AUTH_SALT', $_ENV['SECURE_AUTH_SALT']);
define('LOGGED_IN_SALT', $_ENV['LOGGED_IN_SALT']);
define('NONCE_SALT', $_ENV['NONCE_SALT']);

/**
 * Define the wordpress Environment variable
 */

define('WP_ENV', $_ENV['ENVIRONMENT']);

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = $_ENV['DB_PREFIX'];

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
define('WP_DEBUG', $_ENV['WP_DEBUG'] === 'true');
define('WP_DEBUG_LOG', $_ENV['WP_DEBUG_LOG'] === 'true');

/**
 * Custom Settings
 */
define('AUTOMATIC_UPDATER_DISABLED', true);
define('DISABLE_WP_CRON', $_ENV['DISABLE_WP_CRON'] === 'true');
define('DISALLOW_FILE_EDIT', true);

define('WP_HOME', 'http' . ($_ENV['SSL'] === 'true' ? 's' : '') . '://' .  $_SERVER['HTTP_HOST']);
define('WP_SITEURL', 'http' . ($_ENV['SSL'] === 'true' ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . '/wordpress');

define('CONTENT_DIR', '/wp-content');
define('WP_CONTENT_DIR', __DIR__ . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);

/* Set the default theme to the built in project-theme */
define('WP_DEFAULT_THEME', 'twentytwenty');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/wordpress/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
