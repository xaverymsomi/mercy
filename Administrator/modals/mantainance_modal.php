<div class="modal fade" id="mantainance" tabindex="-1" role="dialog" aria-labelledby="mantainance" aria-hiden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h3 class="modal-title text-white" id="mantainance">Vehicle Mantainance</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="add_mantainance.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <select name="vehicle" class="form-control">
                                <option>--select Vehicle--</option>
                                <!-- Attempt select query execution -->
                                <?php
                                $vehicle = mysqli_query($conn, "SELECT * FROM vehicle");
                                while ($row_vehicle = mysqli_fetch_array($vehicle)) { ?>
                                <option value="<?php echo $row_vehicle['veh_id'] ?>">
                                    <?php echo $row_vehicle['plate_no'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-xl-6 ">
                            <input type="text" name="garage" id="" class="form-control" placeholder="Garage">
                        </div>

                        <div class="col-xl-6 mt-2">
                            <input type="number" name="amount" id="" class="form-control" placeholder="Amount Used">
                        </div>

                        <div class="col-xl-6 mt-2">
                            <input type="date" name="date_mant" id="" class="form-control">
                        </div>
                        <div class="col-xl-12 mt-2">
                          <?php foreach($services_list_save as $services_item): ?>
                              <label class="checkbox">
                                  <input type="checkbox" name="service[]"
                                      value="<?php echo $services_item['service_id'] ?>">
                                  <span> <?php echo $services_item['service_name'] ?> </span>
                               </label>
                          <?php endforeach ?>
                        </div>
                        <div class="col-xl-12 mt-3">
                            <div class="form-group">
                                <textarea type="text" rows="4" name="description" class="form-control"
                                    placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" name="add_mantainance" class="btn vms-btn">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
