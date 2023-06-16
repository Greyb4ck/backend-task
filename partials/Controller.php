<?php
require_once './partials/UserRepository.php';
class Controller {
    private $userRep;

    public function __construct($userRep) {
        $this->userRep = $userRep;
    }

    // Method to handle the form submissions and button clicks
    public function handleRequest() {
        if (isset($_POST['removeData'])) {
            // If the "Remove" button is clicked, remove the data
            $id = $_POST['removeData'];
            $this->userRep->removeJsonData($id);
            // Refresh the page after removing the data
            echo '<script>window.location.href = window.location.href;</script>';
            exit();
        }
        
        if (isset($_POST['addData'])) {
            // If the "Submit" button is clicked, add the data
            $name = $_POST["name"];
            $username = $_POST["username"];
            $email = $_POST["email"];
            $street = $_POST["street"];
            $zipcode = $_POST["zipcode"];
            $city = $_POST["city"];
            $phone = $_POST["phone"];
            $company = $_POST["company"];

            $this->userRep->addJsonData($name, $username, $email, $street, $zipcode, $city, $phone, $company);
            // Refresh the page after adding the data
            echo '<script>window.location.href = window.location.href;</script>';
            exit();
        }

        if (isset($_POST['getOriginalData'])) {
            // If the "Reset" button is clicked, get the original data
            $this->userRep->getOriginalData();
            // Refresh the page after resetting the data
            echo '<script>window.location.href = window.location.href;</script>';
            exit();
        }
    }

    // Method to display the user input form
    public function displayForm() {
        $form = '
            <div class="my-form">
            <form method="post" id="add-user-form">
            <h2>Add User</h2>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>
        
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
        
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
        
                <label for="street">Street:</label>
                <input type="text" id="street" name="street" required><br><br>
        
        
                <label for="zipcode">Zip Code:</label>
                <input type="text" id="zipcode" name="zipcode" required><br><br>
        
                <label for="city">City:</label>
                <input type="text" id="city" name="city" required><br><br>
        
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required><br><br>
        
                <label for="company">Company:</label>
                <input type="text" id="company" name="company" required><br><br>
        
                <input type="submit" name="addData" value="Submit">
            </form></div>';
            
        echo $form;
    }

    // Method to display the table of user data
    public function displayTable() {
        $table = '<div class="my-table"> <form method="post">';
        $table .= '<table id="my-table">';
        $table .= '<tr><th>Name</th><th>Username</th><th>Email</th><th>Address</th><th>Phone</th><th>Company</th></tr>';
        $data = $this->userRep->get_data();
        foreach ($data as $item) {
            $table .= '<tr id="' . $item['id'] . '">';
            $table .= '<td>' . $item['name'] . '</td>';
            $table .= '<td>' . $item['username'] . '</td>';
            $table .= '<td>' . $item['email'] . '</td>';
            $table .= '<td>' . $item['address']['street'] .','. $item['address']['zipcode'] .','. $item['address']['city'] . '</td>';
            $table .= '<td>' . $item['phone'] . '</td>';
            $table .= '<td>' . $item['company']['name'] . '</td>';
            $table .= '<td><button type="submit" name="removeData" value="' . $item['id'] . '">Remove</button></td>';
            $table .= '</tr>';
        }
        $table .= '</div><div class="get-original-data-button">';
        $table .= '<button type="submit" name="getOriginalData" value="Reset">Reset</button>';
        $table .= '</div>';
        $table .= '</form>';
        echo $table;
    }
}
?>
