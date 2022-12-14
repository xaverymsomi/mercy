<?php $title = "income-source" ?>
<?php include('includes/sidebar.php'); ?>
<div class="main_container">
    <?php

        $tbl_income_list = mysqli_query($conn, "SELECT tbl_income_list.*, user.first_name, user.last_name
        FROM user, tbl_income_list
        WHERE tbl_income_list.posted_by = user.user_id ");

    ?>   
    <div class="container">
        <?php include('includes/messages.php'); ?>
    </div>
    <div class="row animated--grow-in">
        <div class="col-xl-12">
            <div class="card card-body">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-end mb-4">
                    <button class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" data-toggle="modal"
                        data-target="#income-source-modal">Income Source <i class="fa fa-plus-circle fa-sm"></i> </button>
                </div>
                <hr style="margin-top: -1rem" >

                <?php include('includes/messages.php'); ?>
                <div class="table-responsive">
                <table class="table table-sm text-muted table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>income_list_name</th>
                                <th>date</th>
                                <th>Added By</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            while ($item = mysqli_fetch_array($tbl_income_list)) { ?>
                            <tr>
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo $item['income_list_name'] ?></td>
                                <td><?php echo date('d-m-Y', strtotime($item['posted_at'])) ?></td>
                                <td><?php echo "$item[first_name] $item[last_name]" ?></td>
                            
                                <!-- modal for edit and delete brand-->
                                <?php include('modals/car_brand_crude_modal.php'); ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal for adding new car component such as fuel type car-capacity and brand  -->
<?php include('income/income-source-modal.php'); ?>
<?php include('includes/footer.php'); ?>