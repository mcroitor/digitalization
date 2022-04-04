<?php

include_once __DIR__ . "/config.php";

use core\mc\template;
use \core\mc\i18n;

config::set("theme", "default");

i18n::lang("ro");
i18n::init();

$content = file_get_contents(config::TEMPLATE_DIR . "/" . config::current_stage() . ".tpl.php");

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