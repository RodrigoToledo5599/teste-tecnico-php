<?php


define("HOSTNAME", "db");
define("USERNAME", "root");
define("PASSWORD", "password");
define("DATABASE", "teste_tecnico_db");

class Database 
{
    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $db_name = DB_NAME;

    private static ?PDO $connection = null;

    public function getConnection(): PDO
    {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO(
                    "mysql:host={$this->db_host};dbname={$this->db_name};charset=utf8mb4",
                    $this->db_user,
                    $this->db_pass,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_PERSISTENT => false 
                    ]
                );
            } catch (PDOException $e) {
                error_log("Database connection error: " . $e->getMessage());
                http_response_code(500);
                exit("Internal Server Error");
            }
        }

        return self::$connection;
    }
}
