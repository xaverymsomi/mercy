 <!-- edit mantainance modal -->
 <div class="modal fade" id="edit<?php echo $mantainance_row['mant_id'] ?>" tabindex="-1" role="dialog"
     aria-labelledby="#edit_mant" aria-hiden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header kvm-bg">
                 <h3 class="modal-title text-white" id="edit_mant">Edit Mantainance</h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" class="text-white">&times;</span>
                 </button>
             </div>
             <form action="crude_mantainance_logic.php" method="POST" enctype="multipart/form-data">
                 <div class="modal-body">
                     <input hidden type="number" name="id" value="<?php echo $mantainance_row['mant_id'] ?>">
                     <div class="row">
                         <div class="col-xl-12">
                             <select name="vehicle" class="form-control">
                                 <option value="<?php echo $mantainance_row['veh_id'] ?>">
                                     <?php echo $mantainance_row['plate_no'] ?></option>
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
                     </div>
                     <div class="row mt-3">
                         <div class="col-xl-12">
                             <input type="text" name="garage" value="<?php echo $mantainance_row['garage'] ?>"
                                 class="form-control" placeholder="Garage">
                         </div>
                     </div>
                     <div class="row mt-3">
                         <div class="col-xl-12">
                             <input type="number" name="amount" value="<?php echo $mantainance_row['amount'] ?>"
                                 class="form-control" placeholder="Amount Used">
                         </div>
                     </div>
                     <div class="row mt-3">
                         <div class="col-xl-12">
                             <div class="form-group">
                                 <textarea type="text" rows="4" name="description" class="form-control"
                                     placeholder="Description"><?php echo $mantainance_row['description'] ?></textarea>
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
 <div class="modal fade" id="delete<?php echo $mantainance_row['mant_id'] ?>" tabindex="-1" role="dialog"
     aria-labelledby="#delete_vehicle" aria-hiden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header bg">
                 <h3 class="modal-title text-white" id="delete_vehicle">Delete Mantainance</h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" class="text-white">&times;</span>
                 </button>
             </div>
             <form action="crude_mantainance_logic.php" method="POST">
                 <p class=" pl-4 h5">Are you sure you want to delete this</p>
                 <div class="modal-body">
                     <input hidden type="number" name="mant_id" value="<?php echo $mantainance_row['mant_id'] ?>">
                 </div>
                 <div class="modal-footer">
                     <button type="submit" name="delete" class="btn vms-btn">Yes Delete</button>
                 </div>
             </form>
         </div>
     </div>
 </div>