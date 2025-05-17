<?php

class Database 
{
    private $db_host = "db";
    private $db_user = "root";
    private $db_pass = "password";
    private $db_name = "teste_tecnico_db";

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
                exit("<h1>Não foi possível se conectar ao banco de dados</h1>");
            }
        }

        return self::$connection;
    }
}
