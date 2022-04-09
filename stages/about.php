<?php


class about {
    public static function get_content($data) {
        if(! \core\mc\user::is_logged_in()){
            header("Location: /?stage=login");
            exit();
        }
        // check, if user has registered center
        // if true, redirect to registers page
        $db = new \core\mc\sql\database(\config::DSN);
        $center = $db->select("center", ["id"], ["user_id" => \core\mc\user::get("id")]);
        if(count($center) > 0){
            \core\mc\user::set("center_id", $center[0]["id"]);
            header("Location: /?stage=registers");
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
        $center_data = (array)($request->center);
        $center_data["user_id"] = \core\mc\user::get("id");
        $center = $db->insert("center", $center_data);
        \core\mc\user::set("center_id", $center["id"]);
        return [
            "stage" => config::next_stage(),
            "message" => "ok",
        ];
    }
}
