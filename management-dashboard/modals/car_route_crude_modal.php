<!-- car route modals -->
<!-- delete route modal -->
<div class="modal fade" id="delete_route<?php echo $car_route_row['id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="#delete_capacity" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h5 class="modal-title text-white" id="delete_capacity">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="car_component_actions.php" method="POST">
                <p class=" pl-4 pt-3">Are you sure you want to delete this ROUTE FROM<?php echo $car_route_row['route_name'] ?></p>
                <div class="modal-body">
                    <input type="number" name="id" value="<?php echo $car_route_row['id'] ?>" require>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="delete_route" class="btn vms-btn">Yes Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- edit route modal-->
<div class="modal fade" id="edit_route<?php echo $car_route_row['id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="#edit_capacity" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h5 class="modal-title text-white" id="edit_capacity">Edit Capacity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="car_component_actions.php" method="POST">
                <div class="modal-body">
                    <div class="modal-body">
                        <input type="text" name="route_name" value="<?php echo $car_route_row['route_name'] ?>"
                            class="form-control" require>
                            <input type="text" name="route_fare" value="<?php echo $car_route_row['route_fare'] ?>"
                                class="form-control" require>
                        <input hidden type="number" name="id" value="<?php echo $car_route_row['id'] ?>" require>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="edit_route" class="btn vms-btn">Save Changes</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<!-- end of car route modals -->
