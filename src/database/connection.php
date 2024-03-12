<?php

namespace UserColors\database;

use PDO;
use stdClass;

class Connection
{

    private $databaseFile;
    private $connection;

    public function __construct()
    {
        $this->databaseFile = realpath(__DIR__ . "/db.sqlite");
        $this->connect();
    }

    private function connect()
    {
        $this->connection = new PDO("sqlite:{$this->databaseFile}");
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $this->connection;
    }

    public function getConnection()
    {
        return $this->connection ?: $this->connection = $this->connect();
    }

    public function query($query)
    {
        $result = $this->getConnection()->query($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        return $result->fetchAll();
    }
}
