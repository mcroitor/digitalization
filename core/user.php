<?php

namespace core\mc;

class user
{
    public static function init()
    {
        if (!isset($_SESSION["user"])) {
            self::reset();
        }
    }

    protected static function reset()
    {
        $_SESSION["user"] = [
            "id" => 0,
            "name" => "Guest",
            "email" => "",
            "language" => "ro"
        ];
    }

    public static function get($key)
    {
        if (!isset($_SESSION["user"][$key])) {
            return null;
        }
        return $_SESSION["user"][$key];
    }

    public static function login($username, $password)
    {
        $db = new \core\mc\sql\database(\config::DSN);
        $user = $db->select(
            "user",
            ["*"],
            [
                "username" => $username
            ]
        );
        \config::stdout()->info(print_r($user, true));
        if (count($user) !== 1 || !password_verify($password, $user[0]["password"])) {
            return false;
        }
        $_SESSION["user"] = [
            "id" => $user[0]["id"],
            "name" => $user[0]["username"],
            "email" => $user[0]["email"]
        ];
        return true;
    }

    public static function logout()
    {
        self::reset();
        session_destroy();
    }

    public static function is_logged_in()
    {
        return self::get("id") > 0;
    }

    public static function set($key, $value)
    {
        $_SESSION["user"][$key] = $value;
    }

    public static function register($user)
    {
        $user["password"] = password_hash($user["password"], PASSWORD_DEFAULT);
        $db = new \core\mc\sql\database(\config::DSN);
        $db->insert("user", $user);
    }
}
