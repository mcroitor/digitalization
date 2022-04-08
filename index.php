<?php

include_once __DIR__ . "/config.php";

use core\mc\template;
use \core\mc\i18n;

$logger = \core\mc\logger::stdout();

config::set("theme", "default");

i18n::lang("ro");
i18n::init();

$content = file_get_contents(config::TEMPLATE_DIR . "/" . config::current_stage() . ".tpl.php");

// TODO: rewrite this latter
$logger->info("current stage: " . config::current_stage());
if (file_exists(config::ROOT_DIR . "/stages/" . config::current_stage() . ".php")) {
    $logger->info("stage exists");
    include_once config::ROOT_DIR . "/stages/" . config::current_stage() . ".php";
    $content = config::current_stage()::get_content($content);
} else {
    $logger->info("stage does not exist");
}

$data = [
    "<!-- title -->" => \core\mc\i18n::get("Questionnaire"),
    "<!-- scripts -->" => script(config::SCRIPTS_DIR . "/core.js") . script(config::SCRIPTS_DIR . "/stages.js"),
    "<!-- header -->" => \core\mc\i18n::get("The Evaluation Questionnaire about diplomas registries state"),
    "<!-- menu -->" => "",
    "<!-- content -->" => $content,
    "<!-- footer -->" => "",
];

$page_template = config::ROOT_DIR . "/theme/" . config::get("theme") . "/index.tpl.php";

$tpl = new template(file_get_contents($page_template));

echo \core\mc\i18n::translate($tpl->fill($data)->value());
