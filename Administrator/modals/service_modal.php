<div class="modal fade" id="service" tabindex="-1" role="dialog" aria-labelledby="service" aria-hiden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h3 class="modal-title text-white" id="service">Vehicle Services</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="add_service.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <select name="vehicle_no" class="form-control">
                                <option>--select Vehicle--</option>
                                <!-- Attempt select query execution -->
                                <?php
                                $vehicle = mysqli_query($conn, "SELECT * FROM vehicle");
                                while ($row_vehicle = mysqli_fetch_array($vehicle)) { ?>
                                <option value="<?php echo $row_vehicle['plate_no'] ?>">
                                    <?php echo $row_vehicle['plate_no'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-xl-6 ">
                            <input type="text" name="service_name" id="" class="form-control" placeholder="service name">
                        </div>

                        <div class="col-xl-6 mt-2">
                            <input type="number" name="service_price" id="" class="form-control" placeholder="price of service">
                        </div>
                        <div class="col-xl-6 mt-2">
                            <input type="text" name="service_location" id="" class="form-control" placeholder="location">
                        </div>
                         
                        <div class="col-xl-12 mt-3">
                            <div class="form-group">
                                <textarea type="text" rows="4" name="service_description" class="form-control"
                                    placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_service" class="btn vms-btn">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
