<?php

// We declare a Core namespace that contains all our related classes. Wherever we need a Database instance for example, we use Core\Database
namespace Core;

use PDO;

class Database
{
    public $connection;
    public $statement;

    // Our __construct function runs only once when the Database instance is created and it is for establishing a connection with the database
    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
           PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    // The query function takes a query and executes it and optionally an array of parameters
    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    // Our get function fetches all the instances of our statement
    public function get()
    {
        return $this->statement->fetchAll();
    }

    // Our find function fetches the first instance of our statement
    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (! $result) {
            abort();
        }

        return $result;
    }
}
