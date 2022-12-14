<?php

  include('../includes/config.php');

  if (isset($_POST['add_service'])){

    $vehicle_no = $_POST['vehicle_no'];
    $service_name = $_POST['service_name'];
    $service_price = $_POST['service_price'];
    $service_location = $_POST['service_location'];
    $service_description = $_POST['service_description'];
    $user_service = $_SESSION['UserID'];

    $query = "INSERT INTO tbl_service (service_name, service_price, service_location, service_date, service_description, performed_by, vehicle_no)
     VALUES (:service_name, :service_price, :service_location, current_timestamp(), :service_description, :user_service, :vehicle_no)";

     $query = $dbconnect->prepare($query);
     $query->bindParam(':service_name', $service_name, PDO::PARAM_STR);
     $query->bindParam(':service_price', $service_price, PDO::PARAM_STR);
     $query->bindParam(':service_location', $service_location, PDO::PARAM_STR);
     $query->bindParam(':service_description', $service_description, PDO::PARAM_STR);
     $query->bindParam(':vehicle_no', $vehicle_no, PDO::PARAM_STR);
     $query->bindParam(':user_service', $user_service, PDO::PARAM_STR);

     $query->execute();
    $lastInsertId = $dbconnect->lastInsertId();

    if ($lastInsertId) {
        $_SESSION['success'] = "Service Created Successfully";
        header('location:service.php');
    }

    else {
        $_SESSION['error'] = "Something went wrong. Please try again";
        header('location:service.php');
    }
}

else {
    echo "not post";
}
