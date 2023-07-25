<?php
class UserAuthentication {
  private $usersFile = "users.txt";

  public function registerUser($email, $password) {
    // Validate input and store user data
    // ...

    // Store user data in a text file
    $file = fopen($this->usersFile, "a");
    fwrite($file, $email . "," . $password . "\n");
    fclose($file);

    return "Registration successful. Thank you!";
  }

  public function loginUser($email, $password) {
    // Retrieve user data from the text file
    $file = fopen($this->usersFile, "r");
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

    // Display corresponding message
    if ($valid) {
      return "Login successful. Welcome back!";
    } else {
      return "Invalid email or password. Please try again.";
    }
  }
}
?>
