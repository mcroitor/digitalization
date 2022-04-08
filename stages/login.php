<?php

class login {

    public static function get_content($data) {
        if(\core\mc\user::is_logged_in()){
            header("Location: /?stage=thankyou");
            exit();
        }
        return $data;
    }

    public static function handle($request) {
        $username = $request->username;
        $password = $request->password;

        if(\core\mc\user::login($username, $password)){
            return [
                "stage" => config::next_stage(),
                "message" => "ok",
            ];
        } else {
            return [
                "stage" => config::current_stage(),
                "message" => \core\mc\i18n::get("Invalid username or password"),
            ];
        }
    }
}