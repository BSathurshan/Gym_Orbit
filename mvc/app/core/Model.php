<?php
Trait Model
{
    use Database;
    public $errors = [];

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Initializes the database connection.
     */
    public function initialize()
    {
        try {
            $this->getConnection();
        } catch (Exception $e) {
            $this->errors[] = "Database connection failed: " . $e->getMessage();
        }
    }

    /**
     * Closes the connection upon destruction.
     */
    public function __destruct()
    {
        $this->closeConnection();
    }
}
