<?php
namespace umis\frame;

use umis\frame\Database\DB;

class Model {
    protected static $instance = null;
    protected $db;

    protected function __construct ($db = 'default') {
        $this->db = DB::init($db);
    }

    private function find ($id) {
        return $this->db->fetch_row ("SELECT * FROM {$this->table} WHERE id = ?", $id);
    }

    private function all () {
        return $this->db->fetch_all ("SELECT * FROM {$this->table}");
    }

    public static function __callStatic($method, $parameters) {
        return (new static)->$method($parameters);
    }
}