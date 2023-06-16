<?php
require_once './partials/UserRepository.php';
require_once './partials/Controller.php'; 

$userRep = new UserRepository('./dataset/users.json');
$controller = new Controller($userRep);
$controller->handleRequest();

echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '<link rel="stylesheet" href="./assets/css/style.css">';
echo '<title>User Management</title>';
echo '</head>';
echo '<body>';

$controller->displayForm();
$controller->displayTable();

echo '</body>';
echo '</html>';
?>
