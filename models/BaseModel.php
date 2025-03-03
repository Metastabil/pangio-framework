<?php
namespace App\Models;

use System\Classes\Database;
use PDO;

class BaseModel {
    protected Database $database_instance;
    protected PDO $db;


    public function __construct() {
        $this->database_instance = new Database();
        $this->db = $this->database_instance->connect();
    }
}