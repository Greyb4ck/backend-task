<?php
class Address {
    private $street;
    private $suite;
    private $city;
    private $zipcode;
    private $geo;

    public function get_street() {
        return $this->street;
    }

    public function set_street($street) {
        $this->street = $street;
    }

    public function get_suite() {
        return $this->suite;
    }

    public function set_suite($suite) {
        $this->suite = $suite;
    }

    public function get_city() {
        return $this->city;
    }

    public function set_city($city) {
        $this->city = $city;
    }

    public function get_zipcode() {
        return $this->zipcode;
    }

    public function set_zipcode($zipcode) {
        $this->zipcode = $zipcode;
    }

    public function get_geo() {
        return $this->geo;
    }

    public function set_geo($geo) {
        $this->geo = $geo;
    }
}
?>