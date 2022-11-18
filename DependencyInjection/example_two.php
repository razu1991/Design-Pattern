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
     * This method will set dependency object to adapter property
     * @param MysqlAdapter $adapter
     * @return void
     */
    public function setterMethod(MySqlAdapter $adapter)
    {
        $this->adapter = $adapter;
    }
}

// Setter Method Injection
$mysqlAdapter = new MysqlAdapter;
$database = new Database();
$database->setterMethod($mysqlAdapter);