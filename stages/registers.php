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
        $content = str_replace("<!-- archive_state -->", self::archive_state(), $content);

        $registers = self::get(\core\mc\user::get("center_id"));
        \core\mc\logger::stdout()->info("registers: " . print_r($registers, true));
        $registers_rows = "";
        foreach ($registers as $register) {
            $registers_rows .= "<tr id='register_{$register["id"]}'>
                <td>{$register["serial"]}</td>
                <td>{$register["isced"]}</td>
                <td>{$register["start_date"]}</td>
                <td>{$register["end_date"]}</td>
                <td>{$register["nr_registries"]}</td>
                <td>{$register["nr_registrations"]}</td>
                <td>{$register["language"]}</td>
                <td><a href='#' onclick='stages.remove({$register["id"]});'>
                    <img src='theme/default/icons/delete.svg' class='height-20'>
                </a></td>
            </tr>";
        }
        $content = str_replace("<!-- registers -->", $registers_rows, $content);
        return $content;
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
        elseif ($request->action === "remove") {
            $result = self::remove($request->id);
            $stage = config::current_stage();
            \config::stdout()->info("Register removed: " . json_encode($result));
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
        $data = (array)$data;
        $data["center_id"] = \core\mc\user::get("center_id");
        $data["on_hold"] = $data["on_hold"] === "on" ? 1 : 0;
        $result = $db->insert("archive_state", $data);
        return $result;
    }

    private static function get($center_id) {
        $db = new \core\mc\sql\database(config::DSN);
        $result = $db->select("archive_state", ["*"], ["center_id" => $center_id]);
        return $result;
    }
    
    private static function remove($id)
    {
        $db = new \core\mc\sql\database(config::DSN);
        $db->delete("archive_state", [
            "id" => $id
        ]);
        return null;
    }
}
