<?php

include('../includes/config.php');

if (isset($_POST['add_driver'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $is_admin = 0;
    $is_active = 1;

    //check if password does not metch
    if ($password != $password2) {
        $_SESSION['error'] = "Password do not metch please correct it";
        header('location:user.php');
    }

    //then if password metch
    else {
        $password = hash_password($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user(first_name, last_name, email, username, password, is_admin, is_active) 
            VALUES(:first_name, :last_name, :email, :username, :password, :is_admin, :is_active)";

        $query = $dbconnect->prepare($query);
        $query->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $query->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':is_admin', $is_admin, PDO::PARAM_STR);
        $query->bindParam(':is_active', $is_active, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);

        $query->execute();
        $lastInsertId = $dbconnect->lastInsertId();

        // if data insert successfull
        if ($lastInsertId) {
            $_SESSION['success'] = "User Created Successfully";
            header('location:user.php');
        } else {
            $_SESSION['error'] = "Something went wrong. Please try again";
            header('location:user.php');
        }
    }
} else {
    echo "not post";
}