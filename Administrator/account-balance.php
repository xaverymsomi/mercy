<?php $title = "Account-Balance" ?>
<?php include('includes/sidebar.php'); ?>
<div class="main_container">
    <?php 

    $account_list = mysqli_query($conn, "SELECT tbl_account_chart.*, tbl_account_credit.*, user.first_name, user.last_name FROM user,tbl_account_chart, tbl_account_credit
                    WHERE tbl_account_chart.acount_id = tbl_account_credit.account_chart
                    AND tbl_account_credit.created_by = user.user_id");


    $account_chart_selection= $dbconnect->prepare("SELECT * FROM tbl_account_chart");
    $account_chart_selection->execute();
    $account_chart_list = $account_chart_selection->fetchAll(PDO::FETCH_ASSOC);


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

                        <button class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm ml-3" data-toggle="modal" data-target="#account-balance-modal">
                            Account <i class="fa fa-plus-circle fa-sm"></i>
                         </button>

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
                                <th>Amount</th>
                                <th>Last Update</th>
                                <th>Creater</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            while ($account_item = mysqli_fetch_array($account_list)) { ?>
                         
                            <tr>
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo $account_item['account_name'] ?></td>
                                <td><?php echo $account_item['balance'] ?></td>
                                <td><?php echo $account_item['last_update'] ?></td>
                                <td><?php echo $account_item['first_name']." ".$account_item['last_name']  ?></td>
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