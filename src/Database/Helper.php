<?php
namespace umis\frame\Database;

use umis\frame\Database\DB;

class Helper {
    public function find () {
        return DB::fetch_row();
    }
}