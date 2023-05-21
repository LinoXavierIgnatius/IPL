<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $errors = array();
    if (empty($id)) {
        $errors[] = "ID is required";
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $id)) {
        $errors[] = "Invalid ID format. Only letters and digits are allowed.";
    }
    if (empty($name)) {
        $errors[] = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "Invalid name format. Only letters and spaces are allowed.";
    }
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }
    if (empty($country)) {
        $errors[] = "Country is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $country)) {
        $errors[] = "Invalid country format. Only letters and spaces are allowed.";
    }
    if (empty($city)) {
        $errors[] = "City is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $city)) {
        $errors[] = "Invalid city format. Only letters and spaces are allowed.";
    }
    if (empty($contact)) {
        $errors[] = "Contact is required";
    } elseif (!preg_match("/^[0-9]{10}$/", $contact)) {
        $errors[] = "Invalid contact number";
    }
    if (empty($address)) {
        $errors[] = "Address is required";
    } elseif (strlen($address) < 10) {
        $errors[] = "Address should be at least 10 characters long.";
    }

if (empty($errors)) {
    echo "<h2>Thank you for your submission!</h2>";
    echo "<p>ID: $id</p>";
    echo "<p>Name: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Password: $password</p>";
    echo "<p>Country: $country</p>";
    echo "<p>City: $city</p>";
    echo "<p>Contact: $contact</p>";
    echo "<p>Address: $address</p>";
    try {
    $conn = new PDO("mysql:host=localhost;dbname=travel", "root", "");
    $sql = "INSERT INTO customers (customer_id, customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->bindParam(2, $name);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $password);
    $stmt->bindParam(5, $country);
    $stmt->bindParam(6, $city);
    $stmt->bindParam(7, $contact);
    $stmt->bindParam(8, $address);

    $rowsAffected = $stmt->execute();

    if ($rowsAffected > 0) {
      echo "<h1>Record inserted successfully</h1>";
    } else {
      echo "<h1>Error inserting record</h1>";
    }
  } catch (PDOException $e) {
    echo "<h1>Error: " . $e->getMessage() . "</h1>";
  } finally {
    if ($stmt !== null) {
      $stmt->closeCursor();
    }
    $conn = null;
  }
    exit;
} else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>
