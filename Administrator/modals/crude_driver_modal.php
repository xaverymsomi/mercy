 <!-- edit driver modal -->
 <div class="modal fade" id="edit<?php echo $diver_row['driverid'] ?>" tabindex="-1" role="dialog"
     aria-labelledby="#edit_vehacle" aria-hiden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header kvm-bg">
                 <h3 class="modal-title text-white" id="edit_vehacle">Edit Driver</h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" class="text-white">&times;</span>
                 </button>
             </div>
             <form action="crude_driver_logic.php" method="POST" enctype="multipart/form-data">
                 <div class="modal-body">
                     <p class="text-center">
                         <img src=" images/driver/<?php echo $diver_row['drphoto'] ?>" width="100">
                     </p>
                     <h5 class="text-center"><?php echo $diver_row['drname'] ?></h5>
                     <input type="number" hidden name="driverid" class="form-control"
                         value="<?php echo $diver_row['driverid'] ?>">
                     <div class="row mt-3">
                         <div class="col-xl-6">
                             <label>Full Name</label>
                             <input type="text" name="drname" class="form-control"
                                 value="<?php echo $diver_row['drname'] ?>">
                         </div>
                         <div class="col-xl-6">
                             <label>Date of Birth</label>
                             <input type="date" name="driverdob" class="form-control"
                                 value="<?php echo $diver_row['driverdob'] ?>">
                         </div>
                     </div>
                     <div class="row mt-3">
                         <div class="col-xl-6">
                             <label>Phone Number</label>
                             <input type="number" name="drmobile" class="form-control"
                                 value="<?php echo $diver_row['drmobile'] ?>">
                         </div>
                         <div class="col-xl-6">
                             <label>Licence number</label>
                             <input type="text" name="drlicense" class="form-control"
                                 value="<?php echo $diver_row['drlicense'] ?>">
                         </div>
                     </div>
                     <div class="row mt-3">
                         <div class="col-xl-6">
                             <label>Licence valid</label>
                             <input type="date" name="drlicensevalid" class="form-control"
                                 value="<?php echo $diver_row['drlicensevalid'] ?>">
                         </div>
                         <div class="col-xl-6">
                             <label>Driver Address</label>
                             <input type="text" name="draddress" class="form-control"
                                 value="<?php echo $diver_row['draddress'] ?>">
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" name="edit_driver" class="btn vms-btn">Change</button>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <!-- delete driver modal -->
 <div class="modal fade" id="delete<?php echo $diver_row['driverid'] ?>" tabindex="-1" role="dialog"
     aria-labelledby="#delete_driver" aria-hiden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header kvm-bg">
                 <h3 class="modal-title text-white" id="delete_driver">Delete Driver</h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" class="text-white">&times;</span>
                 </button>
             </div>
             <form action="crude_driver_logic.php" method="POST">
                 <p class=" pl-4 h5">Are you sure you want to delete this</p>
                 <div class="modal-body">
                     <input hidden type="number" name="driverid" value="<?php echo $diver_row['driverid'] ?>">
                 </div>
                 <div class="modal-footer">
                     <button type="submit" name="delete_driver" class="btn vms-btn">Yes Delete</button>
                 </div>
             </form>
         </div>
     </div>
 </div>