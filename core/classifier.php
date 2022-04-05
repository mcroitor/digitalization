<?php

namespace core\mc;

class classifier {
    private $values;

    public function __construct($values = []) {
        $this->values = $values;
    }

    public function load($classifier_name, $classifier_path = \config::ROOT_DIR . "/classifiers/") {
        $file = "{$classifier_path}$classifier_name";
        if(!strstr($file, "json")) {
            $file .= ".json";
        }

        $this->values = json_decode(file_get_contents($file), true);
    }

    public function get($id) {
        if (empty($this->values[$id])) {
            return null;
        }
        return $this->values[$id];
    }

    public function all() {
        return $this->values;
    }

    public function count() {
        return count($this->values);
    }
}