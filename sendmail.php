<?php

require_once('includes/connect.php');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$msg = $_POST['message'];

$errors = [];

$fname = trim($fname);
$lname = trim($lname);
$email = trim($email);
$msg = trim($msg);

if(empty($fname)) {
    $errors['fname'] = 'First Name cannot be empty';
}
if(empty($lname)) {
    $errors['lname'] = 'Last Name cannot be empty';
}
if(empty($msg)) {
    $errors['message'] = 'Message field cannot be empty';
}
if(empty($email)) {
    $errors['email'] = 'You must provide an email';
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['legit_email'] = 'You must provide a REAL email';
}

if (empty($errors)) {
    try {
        $query = "INSERT INTO contact (fname, lname, email, message) VALUES (?,?,?,?)";
        $stmt = $connect->prepare($query);
        $stmt->bindParam(1, $fname, PDO::PARAM_STR);
        $stmt->bindParam(2, $lname, PDO::PARAM_STR);
        $stmt->bindParam(3, $email, PDO::PARAM_STR);
        $stmt->bindParam(4, $msg, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            $to = 'm_gabbassova@fanshaweonline.ca';
            $subject = 'Message from your Portfolio Website!';
            $message = "You have received a new contact form submission:\n\n";
            $message .= "Name: " . $fname . " " . $lname . "\n";
            $message .= "Email: " . $email . "\n\n";
            $message = $msg;
            
            mail($to, $subject, $message);
            header('Location: thank_you.php');
            exit();
        } else {
            echo "Database insertion failed!";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
}
?>