<?php
####################################
##### SINGLETON DESIGN PATTERN #####
####################################

final class Singleton
{
    private static $instance;

    /**
     * Check instance created or create only one instance
     * @return Singleton
     */
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Constructor should always be private to prevent new instance creation
     */
    private function __construct()
    {
    }

    /**
     * Instance should not be cloneable
     * @return void
     */
    private function __clone()
    {
        // Protect from create multiple instance
    }

    /**
     * Instance should not be restorable from strings.
     * @return mixed
     * @throws Exception
     */
    private function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    /**
     * Here we define business logic, which can be executed on its instance
     * @return void
     */
    public function info()
    {
        echo "Hello! Its singleton pattern";
    }
}

// Single instance created
$singleton = Singleton::getInstance();
$singleton->info();
