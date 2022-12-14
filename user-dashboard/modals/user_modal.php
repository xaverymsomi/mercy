<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="user" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h3 class="modal-title text-white" id="user">User</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="add_user.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First name">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last name">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <label>Email</label>
                            <input type="Email" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Usename">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <label>Confirm Password</label>
                            <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_driver" class="btn vms-btn">Register</button>
                </div>
            </form>
        </div>
    </div>