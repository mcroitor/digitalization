<?php


class registers
{

    public static function get_content($data)
    {
        if(! \core\mc\user::is_logged_in()){
            header("Location: /?stage=login");
            exit();
        }
        $content = str_replace("<!-- isced -->", self::isced(), $data);
        $content = str_replace("<!-- language -->", self::language(), $content);
        $content = str_replace("<!-- institution_type -->", self::institution_type(), $content);
        return str_replace("<!-- archive_state -->", self::archive_state(), $content);
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

    public static function handle($request) {
        return [
            "stage" => config::next_stage(),
            "message" => "ok",
        ];
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
}
