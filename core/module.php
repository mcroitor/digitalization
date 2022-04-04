<?php

namespace core\mc;

class module {
    protected $name;
    protected $events = [];
    protected $submodules = [];
    protected $states = [];
    protected $state;

    public function __construct($name, $state) {
        $this->name = $name;
        $this->state = $state;
        $this->register_state($this->state, "");
    }

    public function get_name() {
        return $this->name;
    }

    public function register_event($event, $callback) {
        $this->events[$event] = $callback;
    }

    public function register_events($events) {
        foreach ($events as $event => $callback) {
            $this->register_event($event, $callback);
        }
    }

    public function register_submodule($submodule) {
        $this->submodules[] = $submodule;
    }

    public function register_submodules($submodules) {
        foreach ($submodules as $submodule) {
            $this->register_submodule($submodule);
        }
    }

    public function register_state($state, $layout) {
        $this->states[$state] = $layout;
    }

    public function register_states($states) {
        foreach ($states as $state => $layout) {
            $this->register_state($state, $layout);
        }
    }

    public function get_events() {
        return $this->events;
    }

    public function get_submodules() {
        return $this->submodules;
    }

    public function get_states() {
        return $this->states;
    }

    public function get_current_state() {
        return $this->state;
    }

    public function get_layout($state) {
        return $this->states[$state];
    }

    public function get_current_layout() {
        return $this->get_layout($this->get_current_state());
    }

    public function handle_event($event, $data) {
        if (empty($this->events[$event])) {
            return;
        }
        $this->events[$event]($data);
    }

    public function render() {
        if(!file_exists($this->get_current_layout())) {
            // TODO: layout not found, error
            echo "[error] layout not found" . PHP_EOL;
            return;
        }
        $layout = file_get_contents($this->get_current_layout());

        foreach ($this->get_submodules() as $submodule) {
            $layout = str_replace("{{".$submodule->get_name()."}}", $submodule->render(), $layout);
        }
        return $layout;
    }
}
