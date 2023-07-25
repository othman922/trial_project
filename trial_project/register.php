<?php
$email = $_POST['email'];
$password = $_POST['password'];


$file = fopen("users.txt", "a");
fwrite($file, $email . "," . $password . "\n");
fclose($file);

// Display success message
echo "Registration successful. Thank you!";
?>
