<?php
class Geo {
    private $lat;
    private $lng;

    public function get_lat() {
        return $this->lat;
    }

    public function set_lat($lat) {
        $this->lat = $lat;
    }

    public function get_lng() {
        return $this->lng;
    }

    public function set_lng($lng) {
        $this->lng = $lng;
    }
}
?>