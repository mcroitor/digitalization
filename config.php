<?php

class config {
    // directories
    public const ROOT_DIR = __DIR__;
    public const TEMPLATE_DIR = self::ROOT_DIR . '/templates';
    public const LANGUAGE_DIR = self::ROOT_DIR . '/language';
    public const CORE_DIR = self::ROOT_DIR . '/core';

    // url paths
    public const WWW_PATH = "http://localhost:8000";
    public const SCRIPTS_DIR = self::WWW_PATH . '/scripts';

    // database
    public const DSN = "sqlite:". self::ROOT_DIR . "/database.sqlite";

    // stages
    protected const STAGES = [
        "login",
        "description",
        "about",
        "registers",
        "thankyou",
    ];

    // config from database
    protected static $var = [];

    // core files
    protected const CORE = [
        "classifier",
        "database",
        "i18n",
        "lib",
        "logger",
        "module",
        "query",
        "template",
        "user",
    ];

    // include core files
    public static function core() {
        session_start();
        $_SESSION["stage"] = self::current_stage();

        foreach (self::CORE as $core) {
            require_once self::CORE_DIR . "/{$core}.php";
        }
    }

    // set config variable
    public static function set($key, $value) {
        self::$var[$key] = $value;
    }

    // get config variable
    public static function get($key) {
        if (!isset(self::$var[$key])) {
            return null;
        }
        return self::$var[$key];
    }

    // get current stage
    public static function current_stage() {
        return $_GET["stage"] ?? $_SESSION["stage"] ?? "login";
    }

    // get next stage
    public static function next_stage() {
        $stages = self::STAGES;
        $key = array_search(self::current_stage(), $stages);
        return $stages[($key + 1) % count($stages)];
    }

    // load config from database
    public static function load(){
        $db = new \core\mc\sql\database(self::DSN);
        $configs = $db->select("config");
        foreach ($configs as $config) {
            self::set($config["key"], $config["value"]);
        }
    }

    public static function stdout() {
        return \core\mc\logger::stdout();
    }
}

config::core();