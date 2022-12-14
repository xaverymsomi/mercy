<div class="modal fade" id="vehicle" tabindex="-1" role="dialog" aria-labelledby="post" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h3 class="modal-title text-white" id="post">New Vehicle</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="add_vehicle.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <h4 class="text-center pb-3 pt-2">Register New Vehicle</h4>
                    <div class="row">
                        <div class="col-xl-6">
                            <input type="text" name="plate_no" id="" placeholder="Plate number" class="form-control">
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <input type="text" name="veh_type" id="" placeholder="Vehicle Type"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <input type="text" name="chesisno" id="" placeholder="Ches number" class="form-control">
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <select type="text" name="brand" class="form-control">
                                    <option value="">--Brand--</option>
                                    <!-- Attempt select query execution -->
                                    <?php
                                    $brand = mysqli_query($conn, "SELECT * FROM car_brand");
                                    while ($row_brand = mysqli_fetch_array($brand)) { ?>
                                    <option value="<?php echo $row_brand['id'] ?>">
                                        <?php echo $row_brand['brand_name'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <input type="text" name="veh_color" id="" placeholder="Color" class="form-control">
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <input type="text" name="no_passengers" id="" placeholder="Number of passenger"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <select name="eng_capacity" class="form-control">
                                <option>--select Capacity--</option>
                                <!-- Attempt select query execution -->
                                <?php
                                $capacity = mysqli_query($conn, "SELECT * FROM car_capacity");
                                while ($row_capacity = mysqli_fetch_array($capacity)) { ?>
                                <option value="<?php echo $row_capacity['id'] ?>">
                                    <?php echo $row_capacity['car_capacity'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xl-6">
                            <select name="fuel_type" class="form-control">
                                <option>--Select fuel type--</option>
                                <!-- Attempt select query execution -->
                                <?php
                                $fuel = mysqli_query($conn, "SELECT * FROM fuel_type");
                                while ($row_fuel = mysqli_fetch_array($fuel)) { ?>
                                <option value="<?php echo $row_fuel['id'] ?>">
                                    <?php echo $row_fuel['fuel_type'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-6">
                            <select name="route_name" class="form-control">
                                <option>--Select route name--</option>
                                <!-- Attempt select query execution -->
                                <?php
                                $route = mysqli_query($conn, "SELECT * FROM route");
                                while ($row_route = mysqli_fetch_array($route)) { ?>
                                <option value="<?php echo $row_route['id'] ?>">
                                    <?php echo $row_route['route_name'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xl-6">
                            <input type="file" name="myfile" class="form-control"
                                style="padding-bottom: 36px; padding-left:10px; color:yellowgreen">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <textarea type="text" rows="4" name="veh_description" class="form-control"
                                    placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_vehicle" class="btn vms-btn">Register</button>
                </div>
            </form>
        </div>
    </div>