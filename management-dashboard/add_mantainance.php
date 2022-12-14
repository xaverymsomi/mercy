<?php

include('../includes/config.php');

if (isset($_POST['add_mantainance'])) {

    $vehicle = $_POST['vehicle'];
    $garage = $_POST['garage'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $date_mant = $_POST['date_mant'];
    $services = $_POST['service'];
    $array= implode(",", $services);

    /* triggure mantainance */
    $query = "INSERT INTO mantainance(vehicle, garage, amount, description, date_mant)
              VALUES(:vehicle, :garage, :amount, :description, :date_mant)";

    $query = $dbconnect->prepare($query);
    $query->bindParam(':vehicle', $vehicle, PDO::PARAM_STR);
    $query->bindParam(':garage', $garage, PDO::PARAM_STR);
    $query->bindParam(':amount', $amount, PDO::PARAM_STR);
    $query->bindParam(':description', $description, PDO::PARAM_STR);
    $query->bindParam(':date_mant', $date_mant, PDO::PARAM_STR);

    $query->execute();
    $lastInsertId = $dbconnect->lastInsertId();

    foreach($services as $value) {
        $service_sql = "INSERT INTO
            tbl_mantainance_service(mantainance, service)
            VALUES(:mantainance, :service)";

        $query_service = $dbconnect->prepare($service_sql);
        $query_service->bindParam(':mantainance', $lastInsertId, PDO::PARAM_STR);
        $query_service->bindParam(':service', $value, PDO::PARAM_STR);
        $query_service->execute();
    }

    /* triggure expenditure */
    $expenditure_type = 1;
    $user_expenditure = $_SESSION['UserID'];
    $data = [
        'expenditure_type'=>$expenditure_type,
        'expenditure_descrption'=>$description,
        'expenditure_amount'=>$amount,
        'user_expenditure'=>$user_expenditure
    ];

    $sql = "INSERT INTO tbl_expenditure(expenditure_type, expenditure_descrption, expenditure_amount, user_expenditure)
            VALUES(:expenditure_type, :expenditure_descrption, :expenditure_amount, :user_expenditure)";
    $stmt = $dbconnect->prepare($sql);
    $stmt->execute($data);

    if ($lastInsertId && $stmt) {
        $_SESSION['success'] = "Mantainance Created Successfully";
        header('location:maintainance.php');
    }

    else {
        $_SESSION['error'] = "Something went wrong. Please try again";
        header('location:maintainance.php');
    }
}

else {
    echo "not post";
}
