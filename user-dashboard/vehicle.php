<?php $title = "vehicle" ?>
<?php include('includes/sidebar.php'); ?>
<div class="main_container">
    <?php

    $vahicle = mysqli_query($conn, "SELECT car_brand.brand_name AS brand,
            vehicle.veh_id, 
            vehicle.plate_no,
            veh_type,
            chesisno,
            no_passengers,
            car_brand.id AS brand_id,
            car_capacity.id AS capacity_id,
            fuel_type.id AS fuel_id,
            veh_description,
            car_capacity.car_capacity AS capacity, 
            fuel_type.fuel_type AS fuel, 
            route.route_name AS route, 
            route.route_fare, vehicle.veh_color AS color 
            FROM vehicle, car_brand, car_capacity, fuel_type, route 
            WHERE vehicle.brand = car_brand.id
            AND vehicle.eng_capacity = car_capacity.id
            AND vehicle.route_name = route.id
            AND vehicle.fuel_type = fuel_type.id");

    //count vahicle
    $count_v = mysqli_num_rows($vahicle);
    ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Vehicle</h1>
        <button class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" data-toggle="modal"
            data-target="#vehicle">Add New
            vehicle <i class="fa fa-plus fa-sm"></i> </button>
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
                                <th>Plate Number</th>
                                <th>Brand</th>
                                <th>Color</th>
                                <th>Capacity</th>
                                <th>Fuel Type</th>
                                <th>Route</th>
                                <th>Fare</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            while ($vahicle_row = mysqli_fetch_array($vahicle)) { ?>
                            <tr>
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo $vahicle_row['plate_no'] ?></td>
                                <td><?php echo $vahicle_row['brand'] ?></td>
                                <td><?php echo $vahicle_row['color'] ?></td>
                                <td><?php echo $vahicle_row['capacity'] ?></td>
                                <td><?php echo $vahicle_row['fuel'] ?></td>
                                <td><?php echo $vahicle_row['route'] ?></td>
                                <td><?php echo $vahicle_row['route_fare'] ?></td>
                                <td>
                                    <!-- <button class="btn btn-dark btn-sm btn-circle shadow-sm" data-toggle="modal"
                                        data-target="#view_vehicle<?php echo $vahicle_row['plate_no'] ?>">
                                        <i class="fas fa-eye"></i>
                                    </button> -->
                                    <button class="btn text-warning btn-sm btn-sm btn-circle shadow-sm" data-toggle="modal"
                                        data-target="#edit_vehicle<?php echo $vahicle_row['veh_id'] ?>">
                                        <b><i class="fas fa-pencil-alt fa-lg"></i></b>
                                    </button>
                                    <a class="btn text-danger btn-sm btn-sm btn-circle shadow-sm" data-toggle="modal"
                                        data-target="#delete_vehicle<?php echo $vahicle_row['veh_id'] ?>">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </a>
                                </td>
                                <?php include('modals/crude_vehicle_modal.php'); ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
    <?php include('modals/vehicle_modal.php'); ?>
</div>