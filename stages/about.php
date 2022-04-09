<?php


class about {
    public static function get_content($data) {
        if(! \core\mc\user::is_logged_in()){
            header("Location: /?stage=login");
            exit();
        }
        $districts = new \core\mc\classifier();

        $districts->load("districts");
        
        $districts_option = "";
        
        foreach ($districts->all() as $district) {
            $districts_option .= "<option value='{$district}'>{$district}</option>";
        }
                
        return str_replace("<!-- district -->", $districts_option, $data);
    }

    public static function handle($request) {
        if(! \core\mc\user::is_logged_in()){
            return [ "stage" => "login", "message" => "You must be logged in to register" ];
        }
        $db = new \core\mc\sql\database(\config::DSN);
        $center = $db->insert("center", (array)($request->center));
        $_SESSION["center"] = $center["id"];
        return [
            "stage" => config::next_stage(),
            "message" => "ok",
        ];
    }
}
