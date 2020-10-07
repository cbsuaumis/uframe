<?php
namespace umis\frame;

use umis\frame\Database\DB;
use umis\frame\Config;
use umis\frame\Session;

class Controller {
    protected $data;
    protected $user;

    public function __construct () {
        $this->user = Session::get();
        $this->data = array_merge ($_POST, $_GET);
    }
}