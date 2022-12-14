  <!-- fuel type  modals-->
  <!-- delete fuel type -->
  <div class="modal fade" id="delete_fuel<?php echo $fuel_type_row['id'] ?>" tabindex="-1" role="dialog"
      aria-labelledby="#delete_fuel" aria-hiden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header kvm-bg">
                  <h5 class="modal-title text-white" id="delete_fuel">Delete</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="text-white">&times;</span>
                  </button>
              </div>
              <form action="car_component_actions.php" method="POST">
                  <p class=" pl-4 pt-3">Are you sure you want to delete <?php echo $fuel_type_row['fuel_type'] ?></p>
                  <div class="modal-body">
                      <input hidden type="number" name="fuel_id" value="<?php echo $fuel_type_row['id'] ?>" require>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" name="delete_fuel_type" class="btn vms-btn">Yes Delete</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- edit fuel type modal-->
  <div class="modal fade" id="edit_fuel<?php echo $fuel_type_row['id'] ?>" tabindex="-1" role="dialog"
      aria-labelledby="#edit_fuel" aria-hiden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header kvm-bg">
                  <h5 class="modal-title text-white" id="edit_fuel">Edit Fuel Type</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="text-white">&times;</span>
                  </button>
              </div>
              <form action="car_component_actions.php" method="POST">
                  <div class="modal-body">
                      <div class="modal-body">
                          <input type="text" name="fuel" value="<?php echo $fuel_type_row['fuel_type'] ?>"
                              class="form-control" require>
                          <input hidden type="number" name="fuel_id" value="<?php echo $fuel_type_row['id'] ?>" require>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" name="edit_fuel" class="btn vms-btn">Save Changes</button>
                      </div>
              </form>
          </div>
      </div>
  </div>
  <!-- end of fuel type modals -->