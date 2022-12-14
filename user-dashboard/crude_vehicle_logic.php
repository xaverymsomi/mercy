<?php include('../includes/config.php');
session_start();

if (isset($_POST['delete_vehicle'])) {
    $id = $_POST['veh_id'];

    $update_vehicle = mysqli_query($conn, "DELETE FROM vehicle WHERE veh_id='$id' ");

    if ($update_vehicle) {
        $_SESSION['success'] = "Vehicle Deleted Successfully";
        header('location:vehicle.php');
    } else {
        echo "error";
    }
}

// edit vehacle
elseif (isset($_POST['edit_vehicle'])) {

    $plate_no = $_POST['plate_no'];
    $veh_type = $_POST['veh_type'];
    $chesisno = $_POST['chesisno'];
    $brand = $_POST['brand'];
    $veh_color = $_POST['veh_color'];
    $no_passengers = $_POST['no_passengers'];
    $eng_capacity = $_POST['eng_capacity'];
    $fuel_type = $_POST['fuel_type'];
    $route_name = $_POST['route_name'];
    $id = $_POST['id'];

    $update_vahacle = mysqli_query($conn, "UPDATE vehicle SET 
            plate_no='$plate_no', veh_type='$veh_type', chesisno='$chesisno', brand='$brand', 
            veh_color='$veh_color', no_passengers='$no_passengers',
            eng_capacity='$eng_capacity', fuel_type='$fuel_type', route_name='$route_name'
            WHERE veh_id = '$id'");

    if ($update_vahacle) {
        $_SESSION['success'] = "Vehacle Updated Successfully";
        header('location:vehicle.php');
    } else {
        $_SESSION['error'] = "Fail please try again";
        header('location:vehicle.php');
    }
}