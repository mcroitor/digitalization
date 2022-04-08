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
        return [
            "stage" => config::next_stage(),
            "message" => "ok",
        ];
    }
}