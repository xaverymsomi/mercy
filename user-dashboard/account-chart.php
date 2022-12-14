<?php $title = "Account-Chart" ?>
<?php include('includes/sidebar.php'); ?>
<div class="main_container">
    <?php 

    $account_chart_list = mysqli_query($conn, "SELECT * FROM user, tbl_account_chart WHERE tbl_account_chart.created_by = user.user_id");


    ?>
    <style type="text/css">
       
   
    </style>
    <!-- Page Heading -->
    <div class="row animated--grow-in">
        <div class="col-xl-12">
          
            <div class="card card-body">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <div></div>
            
                    <div class="d-flex">

                        <button class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm ml-3" data-toggle="modal" data-target="#account-list-modal">
                            Account List <i class="fa fa-plus-circle fa-sm"></i>
                         </button>
                    </div>
                </div>
                <?php include('includes/messages.php'); ?>
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Account Name</th>
                                <th>Registered Date</th>
                                <th>Creator</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            while ($account_chart_td = mysqli_fetch_array($account_chart_list)) { ?>
                         
                            <tr>
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo $account_chart_td['account_name'] ?></td>
                                <td><?php echo $account_chart_td['created_at'] ?></td>
                                <td><?php echo $account_chart_td['first_name']." ".$account_chart_td['last_name']  ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
<?php include('income/account-modal.php'); ?>