<div class="modal fade" id="driver" tabindex="-1" role="dialog" aria-labelledby="driver" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h3 class="modal-title text-white" id="driver">New Driver</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="add_driver.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <label>Full Name</label>
                            <input type="text" name="drname" class="form-control" placeholder="Driver name">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <label>Date of Birth</label>
                            <input type="date" name="driverdob" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <label>Phone Number</label>
                            <input type="number" name="drmobile" class="form-control" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <label>Licence number</label>
                            <input type="text" name="drlicense" class="form-control" placeholder="license">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <label>Licence valid</label>
                            <input type="date" name="drlicensevalid" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <label>Driver Address</label>
                            <input type="text" name="draddress" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <label>Registered Date</label>
                            <input type="date" name="drjoin" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <label>Profile Picture</label>
                            <input type="file" name="myfile" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_driver" class="btn vms-btn">Register</button>
                </div>
            </form>
        </div>
    </div>