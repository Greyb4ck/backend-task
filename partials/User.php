<?php
class User {
    private $id;
    private $name;
    private $username;
    private $email;
    private $phone;
    private $address;
    private $company;

    public function toArray() {
        $userArray = array(
            'id' => $this->get_id(),
            'name' => $this->get_name(),
            'username' => $this->get_username(),
            'email' => $this->get_email(),
            'phone' => $this->get_phone(),
            'address' => array(
                'street' => $this->get_address()->get_street(),
                'suite' => $this->get_address()->get_suite(),
                'city' => $this->get_address()->get_city(),
                'zipcode' => $this->get_address()->get_zipcode()
            ),
            'company' => array(
                'name' => $this->get_company()->get_name(),
                'catchPhrase' => $this->get_company()->get_catchPhrase(),
                'bs' => $this->get_company()->get_bs()
            )
        );

        return $userArray;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_name() {
        return $this->name;
    }

    public function set_name($name) {
        $this->name = $name;
    }

    public function get_username() {
        return $this->username;
    }

    public function set_username($username) {
        $this->username = $username;
    }

    public function get_email() {
        return $this->email;
    }

    public function set_email($email) {
        $this->email = $email;
    }

    public function get_phone() {
        return $this->phone;
    }

    public function set_phone($phone) {
        $this->phone = $phone;
    }

    public function get_address() {
        return $this->address;
    }

    public function set_address($address) {
        $this->address = $address;
    }

    public function get_company() {
        return $this->company;
    }

    public function set_company($company) {
        $this->company = $company;
    }
}
?>
