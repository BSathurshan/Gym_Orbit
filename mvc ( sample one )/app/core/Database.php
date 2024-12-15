<?php

Trait Database
{
    private $connection;

    /**
     * Establishes and returns a MySQLi connection.
     */
    private function connect()
    {
        if (!$this->connection) {
            $this->connection = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

            if ($this->connection->connect_error) {
                die("Database connection failed: " . $this->connection->connect_error);
            }
        }

        return $this->connection;
    }

    /**
     * Returns the active database connection.
     */
    public function getConnection()
    {
        return $this->connect();
    }

    /**
     * Closes the database connection.
     */
    public function closeConnection()
    {
        if ($this->connection) {
            $this->connection->close();
            $this->connection = null;
        }
    }
}
