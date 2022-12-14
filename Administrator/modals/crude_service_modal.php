 <!-- edit service modal -->
 <div class="modal fade" id="edit_service<?php echo $service_row['service_id']?>" tabindex="-1" role="dialog"
     aria-labelledby="#service_id" aria-hiden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header kvm-bg">
                 <h3 class="modal-title text-white" id="service_id">Edit Service</h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" class="text-white">&times;</span>
                 </button>
             </div>
             <form action="crude_service_logic.php" method="POST" enctype="multipart/form-data">
                 <div class="modal-body">
                     <input hidden type="number" name="id" value="<?php echo $service_row['service_id'] ?>">
                     <div class="row mt-3">
                         <div class="col-xl-12">
                           <?php
                              $vehicle = mysqli_query($conn, "SELECT * FROM vehicle");
                              while ($row_vehicle = mysqli_fetch_array($vehicle)) { ?>
                           <input type="text" name="vehicle_no" value="<?php echo $row_vehicle['plate_no'] ?>"
                               class="form-control" placeholder="Name">
                             <?php } ?>
                         </div>
                     </div>
                     <div class="row mt-3">
                         <div class="col-xl-12">
                             <input type="text" name="service_name" value="<?php echo $service_row['service_name'] ?>"
                                 class="form-control" placeholder="Name">
                         </div>
                     </div>
                     <div class="row mt-3">
                         <div class="col-xl-12">
                             <input type="number" name="service_price" value="<?php echo $service_row['service_price'] ?>"
                                 class="form-control" placeholder="service_price">
                         </div>
                     </div>
                     <div class="row mt-3">
                         <div class="col-xl-12">
                             <input type="text" name="service_location" value="<?php echo $service_row['service_location'] ?>"
                                 class="form-control" placeholder="service_location">
                         </div>
                     </div>
                     <div class="row mt-3">
                         <div class="col-xl-12">
                             <div class="form-group">
                                 <textarea type="text" rows="4" name="service_description" class="form-control"
                                     placeholder="Description"><?php echo $service_row['service_description'] ?></textarea>
                             </div>
                         </div>
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
 <div class="modal fade" id="delete_service<?php echo $service_row['service_id'] ?>" tabindex="-1" role="dialog"
     aria-labelledby="#delete_service" aria-hiden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header bg">
                 <h3 class="modal-title text-white" id="delete_service">Delete Service</h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" class="text-white">&times;</span>
                 </button>
             </div>
             <form action="crude_service_logic.php" method="POST">
                 <p class=" pl-4 h5">Are you sure you want to delete this</p>
                 <div class="modal-body">
                     <input type="number" name="service_id" value="<?php echo $service_row['service_id'] ?>">
                 </div>
                 <div class="modal-footer">
                     <button type="submit" name="delete_service" class="btn vms-btn">Yes Delete</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
