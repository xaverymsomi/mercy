<?php include('../includes/config.php');

if (isset($_POST['delete_service'])) {
    $id = $_POST['service_id'];

    $delete_service = mysqli_query($conn, "DELETE FROM tbl_service WHERE service_id='$id' ");

    if ($delete_service) {
        $_SESSION['success'] = "Service Deleted Successfully";
        header('location:service.php');
    } else {
        $_SESSION['Error'] = "Fail to Deleted try again";
        header('location:service.php');
    }
}

// edit vehacle
elseif (isset($_POST['edit_vehicle'])) {

    $id = $_POST['id'];
    $vehicle_no = $_POST['vehicle_no'];
    $service_name = $_POST['service_name'];
    $service_price = $_POST['service_price'];
    $service_location = $_POST['service_location'];
    $service_description = $_POST['service_description'];

    $update_service = mysqli_query($conn, "UPDATE tbl_service SET
            service_name='$service_name', service_price='$service_price', service_location='$service_location',
            service_description='$service_description' WHERE service_id = '$id'");

    if ($update_service) {
        $_SESSION['success'] = "service Updated Successfully";
        header('location:service.php');
    } else {
        // $_SESSION['error'] = "Fail please try again";
        // header('location:service.php');
        echo $service_name, $service_price, $service_location;
    }
}
