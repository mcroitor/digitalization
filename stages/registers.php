<?php


class registers
{

    public static function get_content($data)
    {
        if (!\core\mc\user::is_logged_in()) {
            header("Location: /?stage=login");
            exit();
        }
        $content = str_replace("<!-- isced -->", self::isced(), $data);
        $content = str_replace("<!-- language -->", self::language(), $content);
        $content = str_replace("<!-- institution_type -->", self::institution_type(), $content);
        return str_replace("<!-- archive_state -->", self::archive_state(), $content);
    }

    public static function handle($request)
    {
        if (!\core\mc\user::is_logged_in()) {
            return ["stage" => "login", "message" => "You must be logged in to register"];
        }
        $result = "ok";
        $stage = config::current_stage();

        if($request->action === "add"){
            $result = self::add($request->register);
            $stage = config::current_stage();
            \config::stdout()->info("Register added: " . json_encode($result));
        } elseif ($request->action === "next") {
            $stage = config::next_stage();

        }
        return [
            "stage" => $stage,
            "message" => $result,
        ];
    }

    private static function isced()
    {
        $isced = new \core\mc\classifier();
        $isced->load("isced");
        $isced_option = "";
        foreach ($isced->all() as $i) {
            $isced_option .= "<option value='{$i}'>{$i}</option>";
        }

        return $isced_option;
    }

    protected static function language()
    {
        $language = new \core\mc\classifier();
        $language->load("language");
        $language_option = "";
        foreach ($language->all() as $l) {
            $language_option .= "<option value='{$l}'>{{{$l}}}</option>";
        }
        return $language_option;
    }

    protected static function institution_type()
    {
        $institution_type = new \core\mc\classifier();
        $institution_type->load("institution_type");
        $institution_type_option = "";
        foreach ($institution_type->all() as $i) {
            $institution_type_option .= "<option value='{$i}'>{{{$i}}}</option>";
        }
        return $institution_type_option;
    }

    protected static function archive_state()
    {
        $archive_state = new \core\mc\classifier();
        $archive_state->load("archive_state");
        $archive_state_option = "";
        foreach ($archive_state->all() as $a) {
            $archive_state_option .= "<option value='{$a}'>{{{$a}}}</option>";
        }
        return $archive_state_option;
    }

    private static function add($data)
    {
        $db = new \core\mc\sql\database(config::DSN);
        \config::stdout()->info("Adding register: " . json_encode($data));
        $data->center_id = $_SESSION["center"];
        $db->insert("archive_state", (array)$data);
        return $db->select("archive_state", ["*"], $data);
    }
    
    private static function delete($id)
    {
        $db = new \core\mc\sql\database(config::DSN);
        $db->delete("archive_state", [
            "id" => $id
        ]);
        return null;
    }
}
