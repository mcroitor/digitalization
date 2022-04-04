<?php

class config {
    public const ROOT_DIR = __DIR__;
    public const TEMPLATE_DIR = self::ROOT_DIR . '/templates';
    public const LANGUAGE_DIR = self::ROOT_DIR . '/language';
    public const CORE_DIR = self::ROOT_DIR . '/core';

    public const WWW_PATH = "http://localhost:8000";
    public const SCRIPTS_DIR = self::WWW_PATH . '/scripts';

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
}

config::core();