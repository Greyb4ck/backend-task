<?php
class Company {
    private $name;
    private $catchPhrase;
    private $bs;

    public function get_name() {
        return $this->name;
    }

    public function set_name($name) {
        $this->name = $name;
    }

    public function get_catchPhrase() {
        return $this->catchPhrase;
    }

    public function set_catchPhrase($catchPhrase) {
        $this->catchPhrase = $catchPhrase;
    }

    public function get_bs() {
        return $this->bs;
    }

    public function set_bs($bs) {
        $this->bs = $bs;
    }
}
?>