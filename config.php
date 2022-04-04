<?php

class config {
    public const ROOT_DIR = __DIR__;
    public const TEMPLATE_DIR = self::ROOT_DIR . '/templates';
    public const LANGUAGE_DIR = self::ROOT_DIR . '/language';
    public const CORE_DIR = self::ROOT_DIR . '/core';

    public const WWW_PATH = "http://localhost:8000";
    public const SCRIPTS_DIR = self::WWW_PATH . '/scripts';

    protected const STAGES = [
        "login",
        "description",
        "about",
        "registers",
        "final",
    ];

    protected static $var = [];

    protected const CORE = [
        "database",
        "i18n",
        "lib",
        "logger",
        "module",
        "query",
        "template",
        "user",
    ];

    public static function core() {
        session_start();
        $_SESSION["stage"] = self::current_stage();

        foreach (self::CORE as $core) {
            require_once self::CORE_DIR . "/{$core}.php";
        }
    }

    public static function set($key, $value) {
        self::$var[$key] = $value;
    }

    public static function get($key) {
        return self::$var[$key];
    }

    public static function current_stage() {
        return $_GET["stage"] ?? $_SESSION["stage"] ?? "login";
    }

    public static function next_stage() {
        $stages = self::STAGES;
        $key = array_search(self::current_stage(), $stages);
        return $stages[($key + 1) % count($stages)];
    }
}

config::core();