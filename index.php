<?php

include_once __DIR__ . "/config.php";

use core\mc\template;
use \core\mc\i18n;
use \core\mc\user;

config::set("theme", "default");

user::init();

i18n::lang("ro");
i18n::init();

$stages = [
    2 => "about",
    1 => "description",
    4 => "final",
    0 => "login",
    3 => "registers",
];

if(empty($_SESSION["stage"])){
    $_SESSION["stage"] = 0;
}
$current_stage_index = $_SESSION["stage"];

$current_stage = $stages[$current_stage_index];

$content = file_get_contents(config::TEMPLATE_DIR . "/{$current_stage}.tpl.php");

$data = [
    "<!-- title -->" => \core\mc\i18n::get("Questionnaire"),
    "<!-- scripts -->" => script(config::SCRIPTS_DIR . "/core.js") . script(config::SCRIPTS_DIR . "/stages.js"),
    "<!-- header -->" => \core\mc\i18n::get("archive_state"),
    "<!-- menu -->" => "",
    "<!-- content -->" => \core\mc\i18n::translate($content),
    "<!-- footer -->" => "",
];

$page_template = config::ROOT_DIR . "/theme/" . config::get("theme") . "/index.tpl.php";

$tpl = new template(file_get_contents($page_template));

echo $tpl->fill($data)->value();