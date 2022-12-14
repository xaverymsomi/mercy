<?php include('../includes/config.php');

if (isset($_POST['delete_driver'])) {
    $id = $_POST['driverid'];

    $delete_driver = mysqli_query($conn, "DELETE FROM driver WHERE driverid='$id' ");

    //if driver deleted successfully
    if ($delete_driver) {
        $_SESSION['success'] = "Driver Deleted Successfully";
        header('location:driver.php');
    } else {
        $_SESSION['Error'] = "Fail please try agan";
        header('location:driver.php');
    }
}

// edit driver
elseif (isset($_POST['edit_driver'])) {

    $id = $_POST['driverid'];
    $drname = $_POST['drname'];
    $driverdob = $_POST['driverdob'];
    $drmobile = $_POST['drmobile'];
    $drlicense = $_POST['drlicense'];
    $drlicensevalid = $_POST['drlicensevalid'];
    $draddress = $_POST['draddress'];
    $drjoin = $_POST['drjoin'];

    $update_driver = mysqli_query($conn, "UPDATE driver SET 
        drname='$drname', driverdob='$driverdob', drmobile='$drmobile', drlicense='$drlicense', 
        drlicensevalid='$drlicensevalid', draddress='$draddress', drjoin='$drjoin'
        WHERE driverid = '$id'");

    if ($update_driver) {
        $_SESSION['success'] = "Driver Updated Successfully";
        header('location:driver.php');
    } else {
        $_SESSION['error'] = "Fail please try again";
        header('location:driver.php');
    }
}