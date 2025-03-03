<?php
namespace System\Classes;

use PDOException;
use PDO;

class Database {
    private string $host, $user, $db, $pw, $port, $charset, $db_type;

    public function __construct() {
        $config = require dirname(__DIR__, 2) . '/config/database.php';

        $this->host    = $config['host'];
        $this->user    = $config['user'];
        $this->db      = $config['db'];
        $this->pw      = $config['pw'];
        $this->port    = $config['port'];
        $this->charset = $config['charset'];
        $this->db_type = $config['db_type'];
    }

    public function connect() :PDO {
        try {
            if ($this->db_type === 'mysql') {
                $connection = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->db;charset=$this->charset", $this->user, $this->pw);
            }
            else if ($this->db_type === 'mssql') {
                $connection = new PDO("sqlsrv:Server=$this->host,$this->port;Database=$this->db;", $this->user, $this->pw);
            }
            else {
                die('Unknown database type!');
            }

            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception) {
            die($exception->getMessage());
        }

        return $connection;
    }
}