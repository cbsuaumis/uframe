<?php
namespace umis\frame;

class Config {
    protected static $cfg = [];
    protected $file;
    public $path;

    public function __construct ($file, $conf = []) {
        $this->path = APP_DIR . 'Config' . DIRECTORY_SEPARATOR;
        $this->file = $file;
        if (file_exists($this->path . $this->file . '.php') !== true) {
            self::$cfg[$file] = [];
        } else {
            self::$cfg[$file] = isset(self::$cfg[$file]) ? self::$cfg[$file] : include $this->path . $this->file . '.php';
        }
    }

    public static function load ($file, $conf = []) {
        return new self ($file, $conf);
    }

    public function get ($key) {
        return (isset(self::$cfg[$this->file][$key])) ? self::$cfg[$this->file][$key] : NULL;
    }
}