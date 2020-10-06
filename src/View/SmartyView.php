<?php
namespace umis\frame\View;

class SmartyView {
    private static $smarty;

    public static function __callStatic ($method, $vars) {
        if (!isset (self::$smarty)) self::init ();
        call_user_func_array ([self, $method], $vars);
    }

    private static function init () {
        self::$smarty = new \Smarty ();
        self::$smarty->setTemplateDir ('templates');
        self::$smarty->setCompileDir ('templates_c');
    }

    private static function display ($tpl, $vars = []) {
        if ($vars) self::assign ($vars);
        return self::$smarty->fetch ("{$tpl}.tpl");
    }

    private static function assign ($vars) {
        foreach ($vars as $key => $val) self::$smarty->assign ($key, $value);
    }
}