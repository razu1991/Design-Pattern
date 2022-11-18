<?php
#######################################
# DEPENDENCY INJECTION DESIGN PATTERN #
########################################

interface AdapterInterface
{
    public function connect();

    public function query();

    public function result();
}

class MysqlAdapter implements AdapterInterface
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

class SqliteAdapter implements AdapterInterface
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
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
}

// Interface Injection
$mysqlAdapter = new MysqlAdapter;
$database = new Database($mysqlAdapter);

// Interface Injection
$sqliteAdapter = new SqliteAdapter;
$database = new Database($sqliteAdapter);
