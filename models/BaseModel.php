<?php
namespace App\Models;

use System\Classes\Database;
use PDO;

/**
 * @author Julius Derigs
 * @version 1.0.0
 */

class BaseModel {
    /**
     * @var Database
     */
    protected Database $database_instance;

    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * Constructor
     */
    public function __construct() {
        $this->database_instance = new Database();
        $this->db = $this->database_instance->connect();
    }
}