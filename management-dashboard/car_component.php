<?php include('includes/sidebar.php'); ?>
<div class="main_container">
    <?php

    $car_brand = mysqli_query($conn, "SELECT car_brand.*, user.first_name, user.last_name
    FROM user, car_brand
    WHERE (((car_brand.added_by) = user.user_id))");

    $car_route = mysqli_query($conn, "SELECT route.*, user.first_name, user.last_name
    FROM user, route
    WHERE (((route.id) = user.user_id))");

    $fuel_type =  mysqli_query($conn, "SELECT fuel_type.*, user.first_name, user.last_name
    FROM user, fuel_type
    WHERE (((fuel_type.added_by) = user.user_id))");

    $car_capacity =  mysqli_query($conn, "SELECT car_capacity.*, user.first_name, user.last_name
    FROM user, car_capacity
    WHERE (((car_capacity.added_by) = user.user_id))");

    //count vahicle
    $count_v = mysqli_num_rows($car_brand);
    ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mantainance</h1>
    </div>
    <?php include('includes/messages.php'); ?>
    <div class="row animated--grow-in">
        <div class="col-xl-6 col-md-12 col-xs-12">
            <div class="card card-body">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h5 mb-0 text-gray-800">Registered Car brand</h1>
                    <button class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" data-toggle="modal"
                        data-target="#brand">New
                        car-brand <i class="fa fa-plus fa-sm"></i> </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Added By</th>
                                <th>Brand</th>
                                <th>date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            while ($car_brand_row = mysqli_fetch_array($car_brand)) { ?>
                            <tr>
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo "$car_brand_row[first_name] $car_brand_row[last_name]" ?></td>
                                <td><?php echo $car_brand_row['brand_name'] ?></td>
                                <td><?php echo date('d-m-Y', strtotime($car_brand_row['date'])) ?></td>
                                <td>
                                    <button class="btn text-warning btn-sm btn-circle shadow-sm" data-toggle="modal"
                                        data-target="#edit_brand<?php echo $car_brand_row['id'] ?>">
                                        <b><i class="fas fa-pencil-alt fa-lg"></i></b>
                                    </button>
                                    <a type="button" class="btn text-danger btn-sm btn-circle shadow-sm" data-toggle="modal"
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

<!-- car route -->
        <div class="col-xl-6 col-md-12 col-xs-12">
            <div class="card card-body">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h5 mb-0 text-gray-800">Registered Car Route</h1>
                    <button class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" data-toggle="modal"
                        data-target="#route">New
                        car-route <i class="fa fa-plus fa-sm"></i> </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Added By</th>
                                <th>Route Name</th>
                                <th>Route Fare</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            while ($car_route_row = mysqli_fetch_array($car_route)) { ?>
                            <tr>
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo "$car_route_row[first_name] $car_route_row[last_name]" ?></td>
                                <td><?php echo $car_route_row['route_name'] ?></td>
                                <td><?php echo car_route_row['route_fare'] ?></td>
                                <td>
                                    <button class="btn text-warning btn-sm btn-circle shadow-sm" data-toggle="modal"
                                        data-target="#edit_route<?php echo $car_route_row['id'] ?>">
                                        <b><i class="fas fa-pencil-alt fa-lg"></i></b>
                                    </button>
                                    <a type="button" class="btn text-danger btn-sm btn-circle shadow-sm" data-toggle="modal"
                                        data-target="#delete_route<?php echo $car_route_row['id'] ?>">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </a>
                                </td>
                                <!-- modal for edit and delete route-->
                                <?php include('modals/car_route_crude_modal.php'); ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- engine capacity -->
        <div class="col-xl-6 col-md-12 col-xs-12">
            <div class="card card-body">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h5 mb-0 text-gray-800">Registered Engine Capacity</h1>
                    <button class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" data-toggle="modal"
                        data-target="#capacity">New
                        Engine Capacity <i class="fa fa-plus fa-sm"></i> </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover dt-responsive display nowrap" id="dataTable1" width="100%" cellspacing="0">
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
        <!-- Fuel type -->
        <div class="col-xl-12 mt-3 mb-3">
            <div class="card card-body">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h5 mb-0 text-gray-800">Registered Fuel Type</h1>
                    <button class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" data-toggle="modal"
                        data-target="#fuelType">New
                        Fuel Type <i class="fa fa-plus fa-sm"></i> </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover dt-responsive display nowrap" id="dataTable2" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Added By</th>
                                <th>Type</th>
                                <th>date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            while ($fuel_type_row = mysqli_fetch_array($fuel_type)) { ?>
                            <tr>
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo "$fuel_type_row[first_name] $fuel_type_row[last_name]" ?></td>
                                <td><?php echo $fuel_type_row['fuel_type'] ?></td>
                                <td><?php echo date('d-m-Y', strtotime($fuel_type_row['date'])) ?></td>
                                <td>
                                    <button class="btn text-warning btn-sm btn-circle shadow-sm" data-toggle="modal"
                                        data-target="#edit_fuel<?php echo $fuel_type_row['id'] ?>">
                                        <b><i class="fas fa-pencil-alt fa-lg"></i></b>
                                    </button>
                                    <a type="button" class="btn text-danger btn-sm btn-circle shadow-sm" data-toggle="modal"
                                        data-target="#delete_fuel<?php echo $fuel_type_row['id'] ?>">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </a>
                                </td>
                                <div>
                                    <!-- modal for edit and delete fuel type-->
                                    <?php include('modals/car_fuel_crude_modal.php'); ?>
                                </div>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
    <!-- modal for adding new car component such as fuel type car-capacity and brand  -->
    <?php include('modals/car_component_modal.php'); ?>
</div>
