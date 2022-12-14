<?php
include('../includes/config.php');

if (isset($_POST['add_driver'])) {

    $drname = $_POST['drname'];
    $driverdob = $_POST['driverdob'];
    $drmobile = $_POST['drmobile'];
    $drlicense = $_POST['drlicense'];
    $drlicensevalid = $_POST['drlicensevalid'];
    $draddress = $_POST['draddress'];
    $drjoin = $_POST['drjoin'];
    $dr_available = 1;

    $driverdob = date($driverdob);
    $drlicensevalid = date($drlicensevalid);

    //filename for image
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'images/driver/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['jpeg', 'png', 'jpg'])) {
        $_SESSION['error'] = "You file extension must be .jpeg, .png, .jpg";
        header('location:driver.php');
    }

    // file shouldn't be larger than 1Megabyte
    elseif ($_FILES['myfile']['size'] > 1000000) {
        $_SESSION['error'] = "File too large!";
        header('location:driver.php');
    }
    //if no error from above logics
    else {

        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {

            $query = "INSERT INTO driver(drname, driverdob, drjoin, drmobile, drlicense, drlicensevalid,
                draddress, drphoto, dr_available) 
                VALUES(:drname, :driverdob, :drjoin, :drmobile, :drlicense, :drlicensevalid, :draddress, 
                :drphoto, :dr_available)";

            $query = $dbconnect->prepare($query);
            $query->bindParam(':drname', $drname, PDO::PARAM_STR);
            $query->bindParam(':driverdob', $driverdob, PDO::PARAM_STR);
            $query->bindParam(':drjoin', $drjoin, PDO::PARAM_STR);
            $query->bindParam(':drmobile', $drmobile, PDO::PARAM_STR);
            $query->bindParam(':drlicense', $drlicense, PDO::PARAM_STR);
            $query->bindParam(':drlicensevalid', $drlicensevalid, PDO::PARAM_STR);
            $query->bindParam(':draddress', $draddress, PDO::PARAM_STR);
            $query->bindParam(':drphoto', $filename, PDO::PARAM_STR);
            $query->bindParam(':dr_available', $dr_available, PDO::PARAM_STR);

            $query->execute();
            $lastInsertId = $dbconnect->lastInsertId();

            if ($lastInsertId) {
                $_SESSION['success'] = "Dirver Created Successfully";
                header('location:driver.php');
            } else {
                $_SESSION['error'] = "Something went wrong. Please try again";
                header('location:driver.php');
            }
        }
    }
} else {
    echo "not post";
}