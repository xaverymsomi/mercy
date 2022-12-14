<?php $title = "Engine" ?>
<?php include('includes/sidebar.php'); ?>
<div class="main_container">
    <?php

        $car_capacity =  mysqli_query($conn, "SELECT car_capacity.*, user.first_name, user.last_name
        FROM user, car_capacity
        WHERE (((car_capacity.added_by) = user.user_id))");

    ?>   
    <div class="container">
        <?php include('includes/messages.php'); ?>
    </div>
    <div class="row animated--grow-in">
        <div class="col-xl-12">
            <div class="card card-body">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-end justify-content-end mb-4">
                
                    <button class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" data-toggle="modal"
                        data-target="#capacity">New Engine Capacity <i class="fa fa-plus fa-sm"></i> </button>
                </div>
                <hr style="margin-top: -1rem" >
                <?php include('includes/messages.php'); ?>
                <div class="table-responsive">
                    <table class="table table-sm text-muted table-striped table-hover dt-responsive display nowrap" id="dataTable1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Added By</th>
                                <th>Capacity</th>
                                <th>date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            while ($capacity_row = mysqli_fetch_array($car_capacity)) { ?>
                            <tr>
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo "$capacity_row[first_name] $capacity_row[last_name]" ?></td>
                                <td><?php echo $capacity_row['car_capacity'] ?></td>
                                <td><?php echo date('d-m-Y', strtotime($capacity_row['date'])) ?></td>
                                <td>
                                    <button class="btn text-warning btn-sm btn-circle shadow-sm" data-toggle="modal"
                                        data-target="#edit_capacity<?php echo $capacity_row['id'] ?>">
                                        <b><i class="fas fa-pencil-alt fa-lg"></i></b>
                                    </button>
                                    <a type="button" class="btn text-danger btn-sm btn-circle shadow-sm" data-toggle="modal"
                                        data-target="#delete_capacity<?php echo $capacity_row['id'] ?>">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </a>
                                </td>
                                <!-- modal for edit and delete engine-->
                                <?php include('modals/car_capacity_crude_modal.php'); ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal for adding new car component such as fuel type car-capacity and brand  -->
<?php include('modals/car_component_modal.php'); ?>
<?php include('includes/footer.php'); ?>