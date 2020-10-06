<?php
namespace umis\frame\Database;

use PDO;
use umis\frame\Config;

class DB {
    protected static $databases = [];
    private $db;

    private function __construct ($db) {
        $this->db = new PDO ("mysql:host={$db['server']};dbname={$db['dbname']}", $db['dbuser'], $db['dbpass']);
        $this->db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function init ($db) {
        if (!isset(self::$databases[$db])) {
            self::$databases[$db] = new DB (Config::load('database')->get($db));
        }
        return self::$databases[$db];
    }

    // DATABASE OPERATIONS
    private function exec ($args) {
        $args[1] = isset ($args[1]) ? is_array ($args[1]) ? $args[1] : [$args[1]] : []; // Convert vars to array IF NOT array
        try {
            if (!($query = $this->db->prepare($args[0]))) return;
            if (!($query->execute($args[1]))) return;
            return $query;
        } catch (PDOException $e) {
            return;
        }
        return null;
    }

    public function fetch_all () {
        return $this->exec (func_get_args())->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetch_row () {
        return $this->exec (func_get_args())->fetch(PDO::FETCH_ASSOC);
    }
}