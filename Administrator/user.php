<?php $title = "Mercy" ?>
<?php include('includes/sidebar.php'); ?>
<div class="main_container">

<?php $user = mysqli_query($conn, "SELECT * FROM user");?>

<?php $count_v = mysqli_num_rows($user);?>

    <!-- Page Heading -->
    <div class="row animated--grow-in">
        <div class="col-xl-12">
            <div class="card card-body">
                <div class="d-sm-flex align-items-center justify-content-end mb-4">
       
                    <button class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" data-toggle="modal" data-target="#user">Add New user <i class="fa fa-plus fa-sm"></i> 
                    </button>
                </div>
                <?php include('includes/messages.php'); ?>
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Fisrt Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Is_admin</th>
                                <th>Is_active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            while ($user_row = mysqli_fetch_array($user)) { ?>
                            <tr class="text-dark">
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo $user_row['first_name'] ?></td>
                                <td><?php echo $user_row['last_name'] ?></td>
                                <td><?php echo $user_row['email'] ?></td>
                                <td><?php echo $user_row['username'] ?></td>
                                <?php if ($user_row['is_admin']) : ?>
                                <td class="text-success">
                                    <a class="text-success"
                                        href="crude_user_logic.php?not_admin=<?php echo $user_row['user_id'] ?>">
                                        <i class="fa fa-fw fa-toggle-on"></i>
                                    </a>
                                </td>
                                <?php else : ?>
                                <td>
                                    <a class="text-danger"
                                        href="crude_user_logic.php?admin=<?php echo $user_row['user_id'] ?>">
                                        <i class="fa fa-fw fa-toggle-off"></i>
                                    </a>
                                </td>
                                <?php endif ?>
                                <?php if ($user_row['is_active']) : ?>
                                <td>
                                    <a class="text-success"
                                        href="crude_user_logic.php?deactivate=<?php echo $user_row['user_id'] ?>">
                                        <i class="fa fa-fw fa-toggle-on"></i>
                                    </a>
                                </td>
                                <?php else : ?>
                                <td>
                                    <a class="text-danger"
                                        href="crude_user_logic.php?activate=<?php echo $user_row['user_id'] ?>">
                                        <i class="fa fa-fw fa-toggle-off"></i>
                                    </a>
                                </td>
                                <?php endif ?>
                                <td>
                                    <button class="btn text-warning" data-toggle="modal"
                                        data-target="#edit<?php echo $user_row['user_id'] ?>">
                                        <b><i class="fas fa-pencil-alt fa-sm"></i></b>
                                    </button>
                                    <a type="button" class=" shadow-sm" data-toggle="modal"
                                        data-target="#delete<?php echo $user_row['user_id'] ?>">
                                        <i class="fas fa-trash fa-sm text-danger"></i>
                                    </a>
                                </td>
                                <?php include('modals/crude_user_modal.php'); ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
    <?php include('modals/user_modal.php'); ?>
</div>