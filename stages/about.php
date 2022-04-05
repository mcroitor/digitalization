<?php

$districts = new \core\mc\classifier();

$districts->load("districts");

$districts_option = "";

foreach ($districts->all() as $district) {
    $districts_option .= "<option value='{$district}'>{$district}</option>";
}

$logger->info("districts loaded, {$districts->count()} districts found");

$content = str_replace("<!-- district -->", $districts_option, $content);