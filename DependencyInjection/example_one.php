<?php
#######################################
# DEPENDENCY INJECTION DESIGN PATTERN #
########################################
class MysqlAdapter
{
    /**
     * Connect your database via credentials
     * @return void
     */
    public function connect()
    {
        // Connect your database
    }

    /**
     * This will execute mysql query
     * @return void
     */
    public function query()
    {
        // Perform query
    }

    /**
     * This will fetch result & return this
     * @return void
     */
    public function result()
    {
        // Fetch & return query result
    }
}

class Database
{
    protected $adapter;

    /**
     * Assign Dependency object to adapter property
     * @param MysqlAdapter $adapter
     */
    public function __construct(MySqlAdapter $adapter)
    {
        $this->adapter = $adapter;
    }
}

// Contructor Injection
$mysqlAdapter = new MysqlAdapter;
$database = new Database($mysqlAdapter);


