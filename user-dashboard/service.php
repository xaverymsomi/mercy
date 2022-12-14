<?php $title = "Services" ?>
<?php include('includes/sidebar.php'); ?>
<div class="main_container">
    <?php

    $service = mysqli_query($conn, "SELECT tbl_service.*, vehicle.veh_id, user.user_id
    FROM tbl_service, vehicle, user
    WHERE tbl_service.vehicle_no = vehicle.plate_no AND tbl_service.performed_by = user.user_id");

    // $services_1= $dbconnect->prepare("SELECT * FROM tbl_service");
    // $services_1->execute();
    // $services_list_save = $services_1->fetchAll(PDO::FETCH_ASSOC);

    //count vahicle
    $count_v = mysqli_num_rows($service);?>

    <!-- Page Heading -->
    <div class="row animated--grow-in">
        <div class="col-xl-12">

            <div class="card card-body">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <div></div>

                    <div class="d-flex">
                        <button class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm ml-3" data-toggle="modal" data-target="#service">
                            Services <i class="fa fa-plus-circle fa-sm"></i>
                        </button>
                    </div>
                </div>
                <?php include('includes/messages.php'); ?>
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Service Name</th>
                                <th>Price</th>
                                <th>Location</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>user</th>
                                <th>vehicle</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            while ($service_row = mysqli_fetch_array($service)) { ?>
                            <!-- <php
                                $service_id = $mantainance_row['service_id'];
                                $sql = "SELECT * FROM all_service WHERE service_id = :service_id";
                                $stmt_service = $dbconnect->prepare($sql);

                                $stmt_service->bindParam(':service_id', $service_id, PDO::PARAM_STR);
                                $stmt_service->execute();
                                $services_list = $stmt_service->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                             --><tr>
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo $service_row['service_name'] ?></td>
                                <td><?php echo $service_row['service_price'] ?></td>
                                <td><?php echo $service_row['service_location'] ?></td>
                                <td><?php echo $service_row['service_date'] ?></td>
                                <td><?php echo $service_row['service_description'] ?></td>
                                <td><?php echo $service_row['performed_by'] ?></td>
                                <td><?php echo $service_row['vehicle_no'] ?></td>
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
                                        data-target="#edit_service<?php echo $service_row['service_id'] ?>">
                                        <b><i class="fas fa-pencil-alt fa-lg"></i></b>
                                    </button>
                                    <a type="button" class="btn text-danger btn-sm btn-circle shadow-sm" data-toggle="modal"
                                        data-target="#delete_service<?php echo $service_row['service_id'] ?>">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </a>
                                </td>
                                <?php include('modals/crude_service_modal.php'); ?>
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
<?php include('modals/service_modal.php'); ?>
<!-- <php include('modals/service-modal.php'); ?> -->
