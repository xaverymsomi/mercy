<?php

require_once('../includes/config.php');

if (isset($_POST['add_vehicle'])) {

    $plate_no = $_POST['plate_no'];
    $veh_type = $_POST['veh_type'];
    $chesisno = $_POST['chesisno'];
    $brand = $_POST['brand'];
    $veh_color = $_POST['veh_color'];
    $no_passengers = $_POST['no_passengers'];
    $eng_capacity = $_POST['eng_capacity'];
    $fuel_type = $_POST['fuel_type'];
    $route_name = $_POST['route_name'];
    $veh_description = $_POST['veh_description'];

    //filename for image
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'images/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['jpeg', 'png', 'jpg', 'PNG', 'JPG', 'JPEG'])) {
        $_SESSION['error'] = "You file extension must be .jpeg, .png, .jpg";
        header('location:vehicle.php');
        echo "You file extension must be .zip, .pdf or .docx";
    }

    // file shouldn't be larger than 1Megabyte
    elseif ($_FILES['myfile']['size'] > 1000000) {
        $_SESSION['error'] = "File too large!";
        header('location:vehicle.php');
    }
    //if no error from above logics
    else {

        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {

            $query = "INSERT INTO vehicle(plate_no, veh_type, chesisno, brand, veh_color, veh_regdate,
                veh_description, veh_photo, veh_available, no_passengers, eng_capacity, fuel_type, route_name) 

                VALUES(:plate_no, :veh_type, :chesisno, :brand, :veh_color, :veh_regdate, :veh_description, 
                :veh_photo, :veh_available, :no_passengers, :eng_capacity, :fuel_type, :route_name)";

            $veh_regdate = 'CURRENT_TIMESPAMP';
            $veh_available = 1;

            $query = $dbconnect->prepare($query);
            $query->bindParam(':plate_no', $plate_no, PDO::PARAM_STR);
            $query->bindParam(':veh_type', $veh_type, PDO::PARAM_STR);
            $query->bindParam(':chesisno', $chesisno, PDO::PARAM_STR);
            $query->bindParam(':brand', $brand, PDO::PARAM_STR);
            $query->bindParam(':veh_color', $veh_color, PDO::PARAM_STR);
            $query->bindParam(':veh_regdate', $veh_regdate, PDO::PARAM_STR);
            $query->bindParam(':veh_description', $veh_description, PDO::PARAM_STR);
            $query->bindParam(':veh_photo', $filename, PDO::PARAM_STR);
            $query->bindParam(':veh_available', $veh_available, PDO::PARAM_STR);
            $query->bindParam(':no_passengers', $no_passengers, PDO::PARAM_STR);
            $query->bindParam(':eng_capacity', $eng_capacity, PDO::PARAM_STR);
            $query->bindParam(':fuel_type', $fuel_type, PDO::PARAM_STR);
            $query->bindParam(':route_name', $route_name, PDO::PARAM_STR);

            $query->execute();
            $lastInsertId = $dbconnect->lastInsertId();

            if ($lastInsertId) {
                $_SESSION['success'] = "Vehicle Created Successfully";
                header('location:vehicle.php');
            } else {
                $_SESSION['error'] = "Something went wrong. Please try again";
                header('location:vehicle.php');
            }
        }
    }
} else {
    echo "not post";
}