<?php

include('../includes/config.php');

/*LOGICS FOR NEW CAR BRAND START FROM HERE INCLUDE CREATE DELETE AND UPDATE*/
if (isset($_POST['add_brand'])) {

    $brand_name = mysqli_real_escape_string($conn, $_POST['brand']);
    $registrer = $_SESSION['UserID'];

    $query = "INSERT INTO car_brand(brand_name, added_by) VALUES(:brand_name, :registrer)";

    $query = $dbconnect->prepare($query);
    $query->bindParam(':brand_name', $brand_name, PDO::PARAM_STR);
    $query->bindParam(':registrer', $registrer, PDO::PARAM_STR);

    $query->execute();
    $lastInsertId = $dbconnect->lastInsertId();

    if ($lastInsertId) {
        $_SESSION['success'] = "Brand Created Successfully";
        header('location:brand.php');
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again";
        header('location:brand.php');
    }
}

//delete brand
else if (isset($_POST['delete_brand'])) {
    $id = $_POST['brand_id'];
    if (mysqli_query($conn, "DELETE FROM car_brand WHERE (((car_brand.id)='$id')) ")) {
        $_SESSION['success'] = "fuel type Deleted Successfully";
        header('location:brand.php');
    }
    //if not deleted
    else {
        $_SESSION['error'] = "Error try again";
        header('location:brand.php');
    }
}

// edit brand
elseif (isset($_POST['edit_brand'])) {

    $id = $_POST['brand_id'];
    $brand = $_POST['brand'];

    $update_brand = mysqli_query($conn, "UPDATE car_brand SET brand_name='$brand' WHERE (((car_brand.id) = '$id'))");
    // /if updated successfuly
    if ($update_brand) {
        $_SESSION['success'] = "$brand Updated Successfully";
        header('location:brand.php');
    }
    // if not updated
    else {
        $_SESSION['error'] = "Fail please try again";
        header('location:brand.php');
    }
}
/*LOGICS FOR CAR BRAND END HERE */

/*LOGICS FOR NEW CAR ROUTE START FROM HERE INCLUDE CREATE DELETE AND UPDATE*/
if (isset($_POST['add_route'])) {

    $route_name = mysqli_real_escape_string($conn, $_POST['route_name']);
    $route_fare = mysqli_real_escape_string($conn, $_POST['route_fare']);
    $registrer = $_SESSION['UserID'];

    $query = "INSERT INTO route(route_name, route_fare, added_by) VALUES(:route_name, :route_fare, :registrer)";

    $query = $dbconnect->prepare($query);
    $query->bindParam(':route_name', $route_name, PDO::PARAM_STR);
    $query->bindParam(':route_fare', $route_fare, PDO::PARAM_STR);
    $query->bindParam(':registrer', $registrer, PDO::PARAM_STR);

    $query->execute();
    $lastInsertId = $dbconnect->lastInsertId();

    if ($lastInsertId) {
        $_SESSION['success'] = "Route Created Successfully";
        header('location:route.php');
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again";
        header('location:route.php');
    }
}

//delete route
else if (isset($_POST['delete_route'])) {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM route WHERE route.id='$id'")) {
        $_SESSION['success'] = "Route Deleted Successfully";
        header('location:route.php');
    }
    //if not deleted
    else {
        $_SESSION['error'] = "Error try again";
        header('location:route.php');
    }
}

// edit route
elseif (isset($_POST['edit_route'])) {

    $id = $_POST['id'];
    $route = $_POST['route_name'];
    $route_fare = $_POST['route_fare'];

    $update_route = mysqli_query($conn, "UPDATE route SET route_name='$route', route_fare='$route_fare' WHERE (((route.id) = '$id'))");
    // /if updated successfuly
    if ($update_route) {
        $_SESSION['success'] = "$route Updated Successfully";
        header('location:route.php');
    }
    // if not updated
    else {
        $_SESSION['error'] = "Fail please try again";
        header('location:route.php');
    }
}
/*LOGICS FOR CAR ROUTE END HERE */

/*LOGICS FOR FUEL TYPE START FROM HERE INCLUDE CREATE DELETE AND UPDATE*/
if (isset($_POST['add_fueltype'])) {

    $fuel_type = mysqli_real_escape_string($conn, $_POST['fueltype']);
    $registrer = $_SESSION['UserID'];

    $query = "INSERT INTO fuel_type(fuel_type, added_by) VALUES(:fuel_type, :registrer)";

    $query = $dbconnect->prepare($query);
    $query->bindParam(':fuel_type', $fuel_type, PDO::PARAM_STR);
    $query->bindParam(':registrer', $registrer, PDO::PARAM_STR);

    $query->execute();
    $lastInsertId = $dbconnect->lastInsertId();

    if ($lastInsertId) {
        $_SESSION['success'] = "Fuel Type Created Successfully";
        header('location:fuel_type.php');
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again";
        header('location:fuel_type.php');
        // echo  $registrer;
    }
}

//delete fuel type
else if (isset($_POST['delete_fuel_type'])) {
    $id = $_POST['fuel_id'];
    if (mysqli_query($conn, "DELETE FROM fuel_type WHERE (((fuel_type.id)='$id')) ")) {
        $_SESSION['success'] = "fuel type Deleted Successfully";
        header('location:fuel_type.php');
    }
    //if not deleted
    else {
        $_SESSION['error'] = "Error try again";
        header('location:fuel_type.php');
    }
}

// edit fuel type
elseif (isset($_POST['edit_fuel'])) {

    $id = $_POST['fuel_id'];
    $fuel = $_POST['fuel'];

    $update_fuel_type = mysqli_query($conn, "UPDATE fuel_type SET fuel_type='$fuel' WHERE (((fuel_type.id) = '$id'))");
    // /if updated successfuly
    if ($update_fuel_type) {
        $_SESSION['success'] = "$fuel  Updated Successfully";
        header('location:fuel_type.php');
    }
    // if not updated
    else {
        $_SESSION['error'] = "Fail please try again";
        header('location:fuel_type.php');
    }
}

/*LOGICS FOR FUEL TYPE END HERE */


/*LOGICS FOR CAR CAPACITY START FROM HERE INCLUDE CREATE DELETE AND UPDATE*/
if (isset($_POST['add_enginecapacity'])) {

    $car_capacity = mysqli_real_escape_string($conn, $_POST['engine']);
    $registrer = $_SESSION['UserID'];

    $query = "INSERT INTO car_capacity(car_capacity, added_by) VALUES(:car_capacity, :registrer)";

    $query = $dbconnect->prepare($query);
    $query->bindParam(':car_capacity', $car_capacity, PDO::PARAM_STR);
    $query->bindParam(':registrer', $registrer, PDO::PARAM_STR);

    $query->execute();
    $lastInsertId = $dbconnect->lastInsertId();

    if ($lastInsertId) {
        $_SESSION['success'] = "Car Capacity Created Successfully";
        header('location:engine_type.php');
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again";
        header('location:engine_type.php');
        // echo  $registrer;
    }
}

//delete car_capacity
else if (isset($_POST['delete_capacity'])) {
    $id = $_POST['capacity_id'];
    if (mysqli_query($conn, "DELETE FROM car_capacity WHERE (((car_capacity.id)='$id')) ")) {
        $_SESSION['success'] = "Car capacity Deleted Successfully";
        header('location:engine_type.php');
    }
    //if not deleted
    else {
        $_SESSION['error'] = "Error try again";
        header('location:engine_type.php');
    }
}

// edit capacity
elseif (isset($_POST['edit_capacity'])) {

    $id = $_POST['capacity_id'];
    $capacity = $_POST['capacity'];

    $update_capacity = mysqli_query($conn, "UPDATE car_capacity SET car_capacity='$capacity'  WHERE (((car_capacity.id) = '$id'))");
    // /if updated successfuly
    if ($update_capacity) {
        $_SESSION['success'] = "$capacity  Updated Successfully";
        header('location:engine_type.php');
    }
    // if not updated
    else {
        $_SESSION['error'] = "Fail please try again";
        header('location:engine_type.php');
    }
}

/*LOGICS FOR CAR CAPACITY END HERE */
