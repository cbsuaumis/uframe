<?php
namespace umis\frame\Database;

class DB {
    protected static $databases;
    private $db;

    private function __construct ($conn) {
        $this->db = new \PDO ("mysql:host={$conn['server']};dbname={$conn['dbname']}", $conn['username'], $conn['password']);
        $this->db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function init ($connection) {
        if (!isset(self::$databases[$connection])) {
            self::$databases[$connection] = new DB ();
        }
        return self::$databases[$connection];
    }

    // DATABASE OPERATIONS
    public function exec () {

    }

    public function fetch_all () {

    }

    public function fetch_row () {
        
    }
}