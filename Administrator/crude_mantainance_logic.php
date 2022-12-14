<?php include('../includes/config.php');

if (isset($_POST['delete'])) {
    $id = $_POST['mant_id'];

    $delete_mantainace = mysqli_query($conn, "DELETE FROM mantainance WHERE mant_id='$id' ");

    if ($delete_mantainace) {
        $_SESSION['success'] = "Mantainance Deleted Successfully";
        header('location:maintainance.php');
    } else {
        $_SESSION['Error'] = "Fail to Deleted try again";
        header('location:maintainance.php');
    }
}

// edit vehacle
elseif (isset($_POST['edit_vehicle'])) {

    $id = $_POST['id'];
    $vehicle = $_POST['vehicle'];
    $garage = $_POST['garage'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    $update_mantainance = mysqli_query($conn, "UPDATE mantainance SET 
            vehicle='$vehicle', garage='$garage', amount='$amount',
            description='$description' WHERE mant_id = '$id'");

    if ($update_mantainance) {
        $_SESSION['success'] = "Mantainance Updated Successfully";
        header('location:maintainance.php');
    } else {
        $_SESSION['error'] = "Fail please try again";
        header('location:maintainance.php');
    }
}