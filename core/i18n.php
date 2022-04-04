<?php

namespace core\mc;

class i18n {
    protected static $path = __DIR__ . "/../language/";
    protected static $lang = "en";

    protected static $translation = [];

    public static function path($path = "") {
        if(!empty($path)) {
            self::$path = $path;
        }
        return self::$path;
    }

    public static function lang($lang = "") {
        if(!empty($lang)) {
            self::$lang = $lang;
        }
        return self::$lang;
    }

    public static function init() {
        include_once self::path() . "/" . self::lang() . ".php";
    }

    public static function set($key, $value) {
        self::$translation[$key] = $value;
    }

    public static function get($text) {

        if(empty(self::$translation[$text])) {
            return $text;
        }
        return self::$translation[$text];
    }

    public static function translate($text) {
        // extract labels {{label}} from text
        // and replace them with the corresponding translation
        $labels = [];
        preg_match_all("/{{(.*?)}}/", $text, $labels);
        $labels = $labels[1];
        foreach($labels as $label) {
            $text = str_replace("{{{$label}}}", self::get($label), $text);
        }
        return $text;
    }
}