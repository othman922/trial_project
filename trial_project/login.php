<?php
$email = $_POST['email'];
$password = $_POST['password'];


$file = fopen("users.txt", "r");
$valid = false;

while (($line = fgets($file)) !== false) {
  $line = trim($line);
  $userData = explode(",", $line);

  if ($userData[0] === $email && $userData[1] === $password) {
    $valid = true;
    break;
  }
}

fclose($file);


if ($valid) {
  echo "Login successful. Welcome back!";
} else {
  echo "Invalid email or password. Please try again.";
}
?>
