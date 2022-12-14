<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="user" aria-hiden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h3 class="modal-title text-white" id="user">User</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form method="POST" id="user_form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="alert alert-danger" id="save-user-error">
                        Try Again
                    </div>
                    <div class="alert alert-success" id="save-user-success">
                     Success
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-6">
                            <label><b>First Name</b></label>
                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name">
                        </div>
                        <div class="col-xl-6">
                            <label><b>Last Name</b></label>
                            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name">
                        </div>
                       
                        <div class="col-xl-6 mt-4">
                            <label><b>Email</b></label>
                            <input type="Email" id="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-xl-6 mt-4">
                            <label><b>Username</b></label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Usename">
                        </div>
                        
                        <div class="col-xl-6 mt-4">
                            <label><b>Password</b></label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="col-xl-6 mt-4">
                            <label><b>Confirm Password</b></label>
                            <input type="password" id="password2" name="password2" class="form-control" placeholder="Confirm Password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" name="save_user" class="btn btn-success">Register</button>
                </div>
            </form>
        </div>
    </div>
    <!-- action="views/users.view.php" save_user -->