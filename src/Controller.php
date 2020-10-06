<?php
namespace umis\frame;

use umis\frame\Database\DB;
use umis\frame\Config;

class Controller {
    protected $name;
    protected $db;

    public function __construct () {
        $this->db = DB::init('default');
    }
}