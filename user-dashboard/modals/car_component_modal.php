<!-- new car brand modal  -->
<div class="modal fade" id="brand" tabindex="-1" role="dialog" aria-labelledby="brand" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h5 class="modal-title text-white" id="brand">New Car Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="car_component_actions.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <input type="text" name="brand" id="" class="form-control" placeholder="Brand name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_brand" class="btn vms-btn">Save New Brand</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- new car route modal  -->
<div class="modal fade" id="route" tabindex="-1" role="dialog" aria-labelledby="route" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h5 class="modal-title text-white" id="brand">New Car Route</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="car_component_actions.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <input type="text" name="route_name" id="" class="form-control" placeholder="Route name">
                        </div>
                        <div class="col-xl-12">
                            <input type="number" name="route_fare" id="" class="form-control" placeholder="Route fare">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_route" class="btn vms-btn">Save New Route</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- new fuel type modal  -->
<div class="modal fade" id="fuelType" tabindex="-1" role="dialog" aria-labelledby="fuelType" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h5 class="modal-title text-white" id="fuelType">New Fuel Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="car_component_actions.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <input type="text" name="fueltype" id="" class="form-control" placeholder="Fuel type name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_fueltype" class="btn vms-btn">Save Fuel Type</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- new engine capacity modal -->
<div class="modal fade" id="capacity" tabindex="-1" role="dialog" aria-labelledby="capacity" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h5 class="modal-title text-white" id="capacity">Engine capacity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="car_component_actions.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <input type="text" name="engine" id="" class="form-control"
                                placeholder="Engine capacity name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_enginecapacity" class="btn vms-btn">Save engine capacity</button>
                </div>
            </form>
        </div>
    </div>
</div>
