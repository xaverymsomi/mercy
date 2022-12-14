<?php $title = "Mantainance" ?>
<?php include('includes/sidebar.php'); ?>
<div class="main_container">
    <?php

    $mantainance = mysqli_query($conn, "SELECT mantainance.*, vehicle.veh_id, vehicle.plate_no
    FROM mantainance, vehicle
    WHERE mantainance.vehicle = vehicle.veh_id");

    $services_1= $dbconnect->prepare("SELECT * FROM tbl_service");
    $services_1->execute();
    $services_list_save = $services_1->fetchAll(PDO::FETCH_ASSOC);

    //count vahicle
    $count_v = mysqli_num_rows($mantainance);
    ?>
    <style type="text/css">


    </style>
    <!-- Page Heading -->
    <div class="row animated--grow-in">
        <div class="col-xl-12">

            <div class="card card-body">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <div></div>

                    <div class="d-flex">
                        <!-- <button class="d-none d-sm-inline-block  btn vms-btn btn-sm shadow-sm" data-toggle="modal" data-target="#service-modal">
                            Service <i class="fa fa-plus-circle fa-sm"></i>
                        </button> -->

                        <button class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm ml-3" data-toggle="modal" data-target="#mantainance">
                            Mantainance <i class="fa fa-plus-circle fa-sm"></i>
                         </button>
                    </div>
                </div>
                <?php include('includes/messages.php'); ?>
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>vehicle</th>
                                <th>garage</th>
                                <th>amount</th>
                                <th>date</th>
                                <th>Description</th>
                                <!-- <th>Services</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            while ($mantainance_row = mysqli_fetch_array($mantainance)) { ?>
                            <?php
                                $mant_id = $mantainance_row['mant_id'];
                                $sql = "SELECT * FROM all_service WHERE mantainance = :mant_id";
                                $stmt_service = $dbconnect->prepare($sql);

                                $stmt_service->bindParam(':mant_id', $mant_id, PDO::PARAM_STR);
                                $stmt_service->execute();
                                $services_list = $stmt_service->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <tr>
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo $mantainance_row['plate_no'] ?></td>
                                <td><?php echo $mantainance_row['garage'] ?></td>
                                <td><?php echo $mantainance_row['amount'] ?></td>
                                <td><?php echo $mantainance_row['date_mant'] ?></td>
                                <td><?php echo $mantainance_row['description'] ?></td>
                                <!-- <td>
                                    php foreach($services_list as $services_list_item): ?>
                                        <span class="badge bg-danger text-white"><php echo $services_list_item['service_name'] ?></span>
                                    php endforeach ?>
                                </td> -->
                                <td>
                                    <!-- <button class="btn btn-dark btn-sm btn-circle shadow-sm" data-toggle="modal"
                                        data-target="#view_vehicle php echo $mantainance_row['plate_no'] ?>">
                                        <i class="fas fa-eye"></i>
                                    </button> -->
                                    <button class="btn text-warning btn-sm btn-circle shadow-sm" data-toggle="modal"
                                        data-target="#edit<?php echo $mantainance_row['mant_id'] ?>">
                                        <b><i class="fas fa-pencil-alt fa-lg"></i></b>
                                    </button>
                                    <a type="button" class="btn text-danger btn-sm btn-circle shadow-sm" data-toggle="modal"
                                        data-target="#delete<?php echo $mantainance_row['mant_id'] ?>">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </a>
                                </td>
                                <?php include('modals/crude_mantainance_modal.php'); ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
<?php include('modals/mantainance_modal.php'); ?>
<!-- <php include('modals/service-modal.php'); ?> -->
