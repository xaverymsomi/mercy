 <!-- edit driver modal -->
 <div class="modal fade" id="edit<?php echo $user['user_id'] ?>" tabindex="-1" role="dialog"
     aria-labelledby="#edit_user" aria-hiden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header bg-success">
                 <h3 class="modal-title text-white" id="edit_user"><?php echo $user['first_name'] ?> <?php echo $user['last_name'] ?></h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" class="text-white">&times;</span>
                 </button>
             </div>
             <form action="crude_user_logic.php" method="POST" enctype="multipart/form-data">
                 <div class="modal-body">
                     <input type="text" hidden name="user_id" value="<?php echo $user['user_id'] ?>">
                     <div class="row mt-3">
                         <div class="col-xl-6">
                             <label>First Name</label>
                             <input type="text" name="first_name" class="form-control"
                                 value="<?php echo $user['first_name'] ?>">
                         </div>
                     
                         <div class="col-xl-6">
                             <label>Last Name</label>
                             <input type="text" name="last_name" class="form-control"
                                 value="<?php echo $user['last_name'] ?>">
                         </div>
                    
                         <div class="col-xl-6">
                             <label>Email</label>
                             <input type="Email" name="email" class="form-control"
                                 value="<?php echo $user['email'] ?>">
                         </div>
                         <div class="col-xl-6">
                             <label>Username</label>
                             <input type="text" name="username" class="form-control"
                                 value="<?php echo $user['username'] ?>">
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" name="edit_user" class="btn btn-sm btn-success">Save Change</button>
                 </div>
             </form>
         </div>
     </div>
 </div>