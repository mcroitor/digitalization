<?php

namespace core\mc;

/**
 * class for translation
 */
class i18n {
    protected static $path = __DIR__ . "/../language/";
    protected static $lang = "en";

    protected static $translation = [];

    /**
     * set path to language files if provided and returns path
     * @param string $path
     * @return string
     */
    public static function path($path = "") {
        if(!empty($path)) {
            self::$path = $path;
        }
        return self::$path;
    }

    /**
     * set language if provided and returns language
     * @param string $lang
     * @return string
     */
    public static function lang($lang = "") {
        if(!empty($lang)) {
            self::$lang = $lang;
        }
        return self::$lang;
    }

    /**
     * load translation file
     * @return bool
     */
    public static function init() {
        $file = self::path() . "/" . self::lang() . ".json";

        self::$translation = json_decode(file_get_contents($file), true);
 
    }

    /**
     * set new translation
     * @param string $key
     * @param string $value
     */
    public static function set($key, $value) {
        self::$translation[$key] = $value;
    }

    /**
     * get translation by key
     * @param string $key
     * @return string
     */
    public static function get($text) {
        if(empty(self::$translation[$text])) {
            return $text;
        }
        return self::$translation[$text];
    }

    /**
     * translate text. translations are marked as labels {{label}}.
     * if translation for label is not found, label is returned
     */
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

    /**
     * get language switcher
     * @param array $languages
     * @return string
     */
    public static function switcher($languages = []) {
        $html = "<select class='offset-by-ten two columns' onchange='switchLanguage(this);'>";
        foreach($languages as $lang => $label) {
            $selected = "";
            if($lang == self::lang()) {
                $selected = " selected";
            }
            $html .= "<option{$selected} value='{$lang}'>{$label}</option>";
        }
        $html .= "</select>";
        return $html;
    }
}
