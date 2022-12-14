<?php $title = "driver" ?>
<?php include('includes/sidebar.php'); ?>
<div class="main_container">
    <?php

        $diver = mysqli_query($conn, "SELECT * FROM driver");

        //count vahicle
        $count_v = mysqli_num_rows($diver);
    ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Driver records</h1>
        <button class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" data-toggle="modal"
            data-target="#driver">Add New
            driver <i class="fa fa-plus fa-sm"></i> </button>
    </div>
    <div class="row animated--grow-in">
        <div class="col-xl-12">
            <div class="card card-body">
                <?php include('includes/messages.php'); ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Image</th>
                                <th>Full Name</th>
                                <th>Phone Number</th>
                                <th>Licence</th>
                                <th>Licence Expiredate</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            while ($diver_row = mysqli_fetch_array($diver)) { ?>
                            <tr>
                                <td><?php echo $sn++ ?></td>
                                <td> <img src=" images/driver/<?php echo $diver_row['drphoto'] ?>" width="30"></td>
                                <td><?php echo $diver_row['drname'] ?></td>
                                <td><?php echo $diver_row['drmobile'] ?></td>
                                <td><?php echo $diver_row['drlicense'] ?></td>
                                <td><?php echo $diver_row['drlicensevalid'] ?></td>
                                <!-- <td><?php echo $diver_row['draddress'] ?></td> -->
                                <?php if ($diver_row['dr_available'] == 1) : ?>
                                <td>Yes</td>
                                <?php else : ?>
                                <td>No</td>
                                <?php endif ?>
                                <td>
                                    <button class="btn text-warning btn-sm btn-circle shadow-sm" data-toggle="modal"
                                        data-target="#edit<?php echo $diver_row['driverid'] ?>">
                                        <b><i class="fas fa-pencil-alt fa-lg"></i></b>
                                    </button>
                                    <a type="button" class="btn text-danger btn-sm btn-sm btn-circle shadow-sm"
                                        data-toggle="modal" data-target="#delete<?php echo $diver_row['driverid'] ?>">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </a>
                                </td>
                                <?php include('modals/crude_driver_modal.php'); ?>
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
<?php include('modals/driver_modal.php'); ?>