<?php

namespace core\mc;

/**
 * Class classifier, used to load and provide access to classifier data
 * Classifier data is stored as a JSON file in the classifier directory
 * @package core\mc
 */
class classifier {
    private $values = [];

    public function __construct($values = []) {
        $this->values = $values;
    }

    /**
     * Loads classifier data from a JSON file
     * @param string $classifier_name
     * @param string $classifier_path
     */
    public function load($classifier_name, $classifier_path = \config::ROOT_DIR . "/classifiers/") {
        $file = "{$classifier_path}$classifier_name";
        if(!strstr($file, "json")) {
            $file .= ".json";
        }

        $this->values = json_decode(file_get_contents($file), true);
    }

    /**
     * returne classifier element by its key
     * @param string $id
     * @return mixed
     */
    public function get($id) {
        if (empty($this->values[$id])) {
            return null;
        }
        return $this->values[$id];
    }

    /**
     * return all classifier elements
     * @return array
     */
    public function all() {
        return $this->values;
    }

    /**
     * count elements in classifier
     * @return int
     */
    public function count() {
        return count($this->values);
    }
}