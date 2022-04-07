<?php

$isced = new \core\mc\classifier();
$language = new \core\mc\classifier();
$institution_type = new \core\mc\classifier();
$archive_state = new \core\mc\classifier();

$isced->load("isced");
$language->load("language");
$institution_type->load("institution_type");
$archive_state->load("archive_state");

$isced_option = "";
foreach ($isced->all() as $i) {
    $isced_option .= "<option value='{$i}'>{$i}</option>";
}

$language_option = "";
foreach ($language->all() as $l) {
    $language_option .= "<option value='{$l}'>{{{$l}}}</option>";
}

$institution_type_option = "";
foreach ($institution_type->all() as $i) {
    $institution_type_option .= "<option value='{$i}'>{{{$i}}}</option>";
}

$archive_state_option = "";
foreach ($archive_state->all() as $a) {
    $archive_state_option .= "<option value='{$a}'>{{{$a}}}</option>";
}

$content = str_replace("<!-- isced -->", $isced_option, $content);
$content = str_replace("<!-- language -->", $language_option, $content);
$content = str_replace("<!-- institution_type -->", $institution_type_option, $content);
$content = str_replace("<!-- archive_state -->", $archive_state_option, $content);