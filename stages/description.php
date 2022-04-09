<?php

class description {
    public static function get_content($data) {
        if(! \core\mc\user::is_logged_in()){
            header("Location: /?stage=login");
            exit();
        }
        return $data;
    }

    public static function handle($request) {
        if(! \core\mc\user::is_logged_in()){
            return [ "stage" => "login", "message" => "You must be logged in to register" ];
        }
        return [
            "stage" => config::next_stage(),
            "message" => "ok",
        ];
    }
}