 <!-- edit driver modal -->
 <div class="modal fade" id="edit<?php echo $user_row['user_id'] ?>" tabindex="-1" role="dialog"
     aria-labelledby="#edit_user" aria-hiden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header kvm-bg">
                 <h3 class="modal-title text-white" id="edit_user">Edit User</h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" class="text-white">&times;</span>
                 </button>
             </div>
             <form action="crude_user_logic.php" method="POST" enctype="multipart/form-data">
                 <div class="modal-body">
                     <input type="text" hidden name="user_id" value="<?php echo $user_row['user_id'] ?>">
                     <div class="row mt-3">
                         <div class="col-xl-12">
                             <label>First Name</label>
                             <input type="text" name="first_name" class="form-control"
                                 value="<?php echo $user_row['first_name'] ?>">
                         </div>
                     </div>
                     <div class="row mt-3">
                         <div class="col-xl-12">
                             <label>Last Name</label>
                             <input type="text" name="last_name" class="form-control"
                                 value="<?php echo $user_row['last_name'] ?>">
                         </div>
                     </div>
                     <div class="row mt-3">
                         <div class="col-xl-12">
                             <label>Email</label>
                             <input type="Email" name="email" class="form-control"
                                 value="<?php echo $user_row['email'] ?>">
                         </div>
                     </div>
                     <div class="row mt-3">
                         <div class="col-xl-12">
                             <label>Username</label>
                             <input type="text" name="username" class="form-control"
                                 value="<?php echo $user_row['username'] ?>">
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" name="edit_user" class="btn vms-btn">Change</button>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <!-- delete user modal -->
 <div class="modal fade" id="delete<?php echo $user_row['user_id'] ?>" tabindex="-1" role="dialog"
     aria-labelledby="#delete_user" aria-hiden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header kvm-bg">
                 <h3 class="modal-title text-white" id="delete_user">Delete Driver</h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" class="text-white">&times;</span>
                 </button>
             </div>
             <form action="crude_user_logic.php" method="POST">
                 <p class=" pl-4 h5">Are you sure you want to delete <?php echo $user_row['username'] ?></p>
                 <div class="modal-body">
                     <input hidden type="number" name="user_id" value="<?php echo $user_row['user_id'] ?>">
                 </div>
                 <div class="modal-footer">
                     <button type="submit" name="delete_user" class="btn vms-btn">Yes Delete</button>
                 </div>
             </form>
         </div>
     </div>
 </div>