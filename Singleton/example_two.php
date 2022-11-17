<?php
####################################
##### SINGLETON DESIGN PATTERN #####
####################################
class  Database
{
    private static $instance;

    /**
     * Check instance created or create only one instance
     */
    public function __construct()
    {
        if (!self::$instance) {
            self::$instance = $this;
            echo "Created new instance.<br/>";
            return self::$instance;
        } else {
            echo "Old one instance.<br/>";
            return self::$instance;
        }
    }
}

// Only first time instance will be created
new Database();
new Database();
new Database();
new Database();