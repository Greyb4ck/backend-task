<?php
require_once './partials/User.php';
require_once './partials/Address.php';
require_once './partials/Company.php';
require_once './partials/Geo.php';

class UserRepository {
    private $data;

    public function __construct($path) {
        $jsonString = file_get_contents($path);
        $this->data = json_decode($jsonString, true);
    }

    public function get_data() {
        return $this->data;
    }

    // Method to retrieve the original data from a backup file
    public function getOriginalData() {
        $jsonString = file_get_contents('./dataset/ousers.json');
        // Save the original data to the users.json file
        file_put_contents('./dataset/users.json', $jsonString);
    }

    // Method to add new data to the JSON file
    public function addJsonData($name, $username, $email, $street, $zipcode, $city, $phone, $company) {
        // Get the last ID in the existing data
        $lastID = 0;
        if (!empty($this->data)) {
            $lastID = end($this->data)["id"];
        }

        // Increment the ID for the new entry
        $newID = $lastID + 1;

        // Create a new User object
        $user = new User();
        $user->set_id($newID);
        $user->set_name($name);
        $user->set_username($username);
        $user->set_email($email);

        $address = new Address();
        $address->set_street($street);
        $address->set_suite('');
        $address->set_city($city);
        $address->set_zipcode($zipcode);

        $user->set_address($address);
        $user->set_phone($phone);

        $companyObj = new Company();
        $companyObj->set_name($company);
        $companyObj->set_catchPhrase('');
        $companyObj->set_bs('');

        $user->set_company($companyObj);

        // Add the new user to the existing data array
        $this->data[] = $user->toArray();

        // Convert the updated data array to a JSON string
        $updatedJsonString = json_encode($this->data, JSON_PRETTY_PRINT);

        // Save the updated JSON string back to the file
        file_put_contents('./dataset/users.json', $updatedJsonString);
    }

    // Method to remove data from the JSON file
    public function removeJsonData($id) {
        // Find the user with the specified ID in the data array
        $userIndex = null;
        foreach ($this->data as $key => $item) {
            if ($item['id'] == $id) {
                $userIndex = $key;
                break;
            }
        }

        // If the user is found, remove it from the data array  
        if ($userIndex !== null) {
            unset($this->data[$userIndex]);
            // Reindex the array to ensure consecutive numerical IDs
            $this->data = array_values($this->data);

            // Save the updated data back to the JSON file
            $jsonString = json_encode($this->data, JSON_PRETTY_PRINT);
            file_put_contents('./dataset/users.json', $jsonString);
        }
    }
}
?>
