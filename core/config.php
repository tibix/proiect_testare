<?php

/**
 * DB Connection details for PROD and other envs
 */
if($_SERVER['HTTP_HOST'] == "testare.itdev.ro")
{
    DEFINE('DB_HOST', 'localhost');
    DEFINE('DB_USER', 'bookmarks');
    DEFINE('DB_PASS', 'Bookmarks2023!');
    DEFINE('DB_NAME', 'bookmarks');
} else {
    /**
     * This part can be adjusted to your local DB settings
     * and you will need to stash before making a pull (git stash)
     * and stash pop after a pull (git stash pop)
     */
    DEFINE('DB_HOST', 'localhost');
    DEFINE('DB_USER', 'root');
    DEFINE('DB_PASS', '');
    DEFINE('DB_NAME', 'bookmarks');
}