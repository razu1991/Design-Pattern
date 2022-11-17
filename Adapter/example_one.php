<?php
####################################
##### ADAPTER DESIGN PATTERN #####
####################################
interface AdapterInterface
{
    /**
     * Query method used by implemented class
     * @param $sql
     * @return mixed
     */
    public function query($sql);

    /**
     * Result method used by implemented class
     * @return mixed
     */
    public function result();
}

class MySQLAdapter implements AdapterInterface
{
    protected $connection;

    protected $result;

    /**
     * Assign database connection
     * @param $host
     * @param $username
     * @param $password
     * @param $dbname
     */
    public function __construct($host, $username, $password, $dbname)
    {
        $this->connection = new Mysqli($host, $username, $password, $dbname);
    }

    /**
     * Execute sql query via mysql
     * @param $sql
     * @return $this|mixed
     */
    public function query($sql)
    {
        $this->result = $this->connection->query($sql);
        return $this;
    }

    /**
     * Fetch result
     * @return array|mixed
     */
    public function result()
    {
        if (gettype($this->result) === 'boolean') {
            return $this->result;
        } else if ($this->result->num_rows > 0) {
            $result = [];

            while ($row = $this->result->fetch_assoc()) {
                $result[] = $row;
            }

            return $result;
        } else {
            return [];
        }
    }
}

class PDOAdapter implements AdapterInterface
{
    protected $connection;
    protected $result;

    /**
     * Assign connection
     * @param $host
     * @param $username
     * @param $password
     * @param $dbname
     */
    public function __construct($host, $username, $password, $dbname)
    {
        $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    }

    /**
     * Execute PDO query
     * @param $sql
     * @return $this|mixed
     */
    public function query($sql)
    {
        $query = $this->connection->prepare($sql);
        $exec = $query->execute();

        if ($query->columnCount() == 0) {
            $this->result = $exec;
        } else {
            $this->result = $query;
        }

        return $this;
    }

    /**
     * Fetch result
     * @return array|mixed
     */
    public function result()
    {
        if (gettype($this->result) === 'boolean') {
            return $this->result;
        } else {
            $data = [];

            while ($row = $this->result->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }

            return $data;
        }
    }
}

class Database
{
    protected $adapter;

    /**
     * Assign adapter class via interface implemented class
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * Call the class query func and execute
     * @param $sql
     * @return mixed
     */
    public function query($sql)
    {
        return $this->adapter->query($sql);
    }

    /**
     * Call the class result func and fetch result
     * @return mixed
     */
    public function result()
    {
        return $this->adapter->result();
    }
}

// Instantiate and assign connection via class constructor
$mysql = new MySQLAdapter('localhost', 'root', '', 'blog');

// Instance create and passed Adapter class
$db = new Database($mysql);

// Perform query and fetch result
$query = $db->query("SELECT * FROM users");
$result = $query->result();
var_dump($result);