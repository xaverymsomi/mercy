
 <!-- delete user modal --> 
 <div class="modal fade" id="delete<?php echo $user['user_id'] ?>" tabindex="-1" role="dialog"
     aria-labelledby="#delete_user" aria-hiden="true">
     <div class="modal-dialog modal-sm" role="document">
         <div class="modal-content">
             <div class="modal-header bg-danger">
                 <h6 class="modal-title text-white" id="delete_user">Warning</h6>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" class="text-white">&times;</span>
                 </button>
             </div>
             <form action="crude_user_logic.php" method="POST">
                <input hidden type="number" name="user_id" value="<?php echo $user['user_id'] ?>">
                 <p class=" pt-4 text-center">Are you sure you want to delete <b><?php echo $user['username'] ?></b></p>
               
                 <div class="modal-footer">
                     <button type="submit" name="delete_user" class="btn btn-danger">Yes Delete</button>
                 </div>
             </form>
         </div>
     </div>
 </div>