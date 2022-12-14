 <!-- edit vehicle modal -->
 <div class="modal fade" id="edit_vehicle<?php echo $vahicle_row['veh_id'] ?>" tabindex="-1" role="dialog"
     aria-labelledby="#edit_vehacle" aria-hiden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header kvm-bg">
                 <h3 class="modal-title text-white" id="edit_vehacle">Edit Vehicle</h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" class="text-white">&times;</span>
                 </button>
             </div>
             <form action="crude_vehicle_logic.php" method="POST" enctype="multipart/form-data">
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-xl-6">
                             <input type="text" name="plate_no" id="" placeholder="Plate number" class="form-control"
                                 value="<?php echo $vahicle_row['plate_no'] ?>">
                         </div>
                         <div class="col-xl-6">
                             <div class="form-group">
                                 <input type="text" name="veh_type" id="" placeholder="Vehicle Type"
                                     class="form-control" value="<?php echo $vahicle_row['veh_type'] ?>">
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-xl-6">
                             <input type="text" name="chesisno" id="" placeholder="Ches number" class="form-control"
                                 value="<?php echo $vahicle_row['chesisno'] ?>">
                         </div>
                         <div class="col-xl-6">
                             <div class="form-group">
                                 <select type="text" name="brand" class="form-control">
                                     <option value="<?php echo $vahicle_row['brand_id'] ?>">
                                         <?php echo $vahicle_row['brand'] ?></option>
                                     <!-- Attempt select query execution -->
                                     <?php
                                        $brand = mysqli_query($conn, "SELECT * FROM car_brand");
                                        while ($row_brand = mysqli_fetch_array($brand)) { ?>
                                     <option value="<?php echo $row_brand['id'] ?>">
                                         <?php echo $row_brand['car_type'] ?>
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
                                     class="form-control" value="<?php echo $vahicle_row['no_passengers'] ?>">
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-xl-6">
                             <select name="eng_capacity" class="form-control">
                                 <option value="<?php echo $vahicle_row['capacity_id'] ?>">
                                     <?php echo $vahicle_row['capacity'] ?></option>
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
                                 <option value="<?php echo $vahicle_row['fuel_id'] ?>">
                                     <?php echo $vahicle_row['fuel'] ?></option>
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
                                 <option value="<?php echo $vahicle_row['fuel_id'] ?>">
                                     <?php echo $vahicle_row['route'] ?></option>
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
                         <input hidden type="number" name="id" value="<?php echo $vahicle_row['veh_id'] ?>">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" name="edit_vehicle" class="btn vms-btn">Change</button>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <!-- delete vehicle modal -->
 <div class="modal fade" id="delete_vehicle<?php echo $vahicle_row['veh_id'] ?>" tabindex="-1" role="dialog"
     aria-labelledby="#delete_vehicle" aria-hiden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header bg">
                 <h3 class="modal-title text-white" id="delete_vehicle">Delete Vehicle</h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" class="text-white">&times;</span>
                 </button>
             </div>
             <form action="crude_vehicle_logic.php" method="POST">
                 <p class=" pl-4 h5">Are you sure you want to delete this</p>
                 <div class="modal-body">
                     <input hidden type="number" name="veh_id" value="<?php echo $vahicle_row['veh_id'] ?>">
                 </div>
                 <div class="modal-footer">
                    <button type="submit" name="delete_vehicle" class="btn vms-btn">Yes Delete</button>
                 </div>
             </form>
         </div>
     </div>
 </div>