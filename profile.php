<?php
require_once("includes/header.php");
require_once("includes/classes/ProfileGenerator.php");
require_once("includes/classes/User.php");

if(isset($_GET["username"])) {
    $profileUsername = $_GET["username"];
}
else {
    echo "Channel not found";
    exit();
}

//PROVERA
$username = new User($con, $_GET["username"], $userLoggedInObj);
if ($username->getUsername() != $userLoggedInObj->getUsername()) {
	echo "Not your username";
	exit();
}


$profileGenerator = new ProfileGenerator($con, $userLoggedInObj, $profileUsername);
echo $profileGenerator->create();
?>