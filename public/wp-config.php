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
 * Initiate the DotEnv functionality for WordPress and define required variables.s
 */
try {
    $dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
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
define('DB_NAME', getenv("DB_NAME"));

/** MySQL database username */
define('DB_USER', getenv("DB_USER"));

/** MySQL database password */
define('DB_PASSWORD', getenv("DB_PASSWORD"));

/** MySQL hostname */
define('DB_HOST', getenv("DB_HOST"));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', getenv("DB_CHARSET"));

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', getenv("DB_COLLATE"));

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', getenv("AUTH_KEY"));
define('SECURE_AUTH_KEY', getenv("SECURE_AUTH_KEY"));
define('LOGGED_IN_KEY', getenv("LOGGED_IN_KEY"));
define('NONCE_KEY', getenv("NONCE_KEY"));
define('AUTH_SALT', getenv("AUTH_SALT"));
define('SECURE_AUTH_SALT', getenv("SECURE_AUTH_SALT"));
define('LOGGED_IN_SALT', getenv("LOGGED_IN_SALT"));
define('NONCE_SALT', getenv("NONCE_SALT"));

/**
 * Define the wordpress Environment variable
 */

define('WP_ENV', getenv("ENVIRONMENT"));

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = getenv("DB_PREFIX");

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
define('WP_DEBUG', getenv("WP_DEBUG"));
define('WP_DEBUG_LOG', getenv("WP_DEBUG_LOG"));

/**
 * Custom Settings
 */
define('AUTOMATIC_UPDATER_DISABLED', true);
define('DISABLE_WP_CRON', true);
define('DISALLOW_FILE_EDIT', true);

define('WP_HOME', 'http' . (getenv("SSL") === 'true' ? 's' : '') . '://' .  $_SERVER['HTTP_HOST']);
define('WP_SITEURL', 'http' . (getenv("SSL") === 'true' ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . '/wordpress');

define('CONTENT_DIR', '/wp-content');
define('WP_CONTENT_DIR', __DIR__ . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);

/* Set the default theme to the built in project-theme */
define('WP_DEFAULT_THEME', 'project-theme');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/wordpress/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
