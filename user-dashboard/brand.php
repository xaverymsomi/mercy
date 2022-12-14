<?php $title = "Vehicle Brand" ?> 
<?php include('includes/sidebar.php'); ?>
<div class="main_container">
    <?php

        $car_brand = mysqli_query($conn, "SELECT car_brand.*, user.first_name, user.last_name
        FROM user, car_brand
        WHERE (((car_brand.added_by) = user.user_id))");

        //count vahicle
        $count_v = mysqli_num_rows($car_brand);
    ?>   
    <div class="container">
        <?php include('includes/messages.php'); ?>
    </div>
    <div class="row animated--grow-in">
        <div class="col-xl-12">
            <div class="card card-body">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-end mb-4">
                    <button class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" data-toggle="modal"
                        data-target="#brand">New car-brand <i class="fa fa-plus fa-sm"></i> </button>
                </div>
                <hr style="margin-top: -1rem" >

                <?php include('includes/messages.php'); ?>
                <div class="table-responsive">
                <table class="table table-sm text-muted table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Brand</th>
                                <th>date</th>
                                <th>Added By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            while ($car_brand_row = mysqli_fetch_array($car_brand)) { ?>
                            <tr>
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo $car_brand_row['brand_name'] ?></td>
                                <td><?php echo date('d-m-Y', strtotime($car_brand_row['date'])) ?></td>
                                <td><?php echo "$car_brand_row[first_name] $car_brand_row[last_name]" ?></td>
                                <td>
                                    <button class="btn text-warning btn-sm btn-circle shadow-sm" data-toggle="modal"
                                        data-target="#edit_brand<?php echo $car_brand_row['id'] ?>">
                                        <b><i class="fas fa-pencil-alt fa-lg"></i></b>
                                    </button>
                                    <a type="button" class="text-danger btn-sm btn-circle shadow-sm" data-toggle="modal"
                                        data-target="#delete_brand<?php echo $car_brand_row['id'] ?>">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </a>
                                </td>
                                <!-- modal for edit and delete brand-->
                                <?php include('modals/car_brand_crude_modal.php'); ?>
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