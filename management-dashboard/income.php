<?php $title = "Income" ?>
<?php include('includes/sidebar.php'); ?>
<div class="main_container">
    <?php 

    $income_list = mysqli_query($conn, "SELECT user.first_name, user.last_name, tbl_income.*, tbl_income.date AS income_date, tbl_income_list.income_list_name, tbl_account_chart.* FROM tbl_income_list, tbl_income, user, tbl_account_chart WHERE tbl_income_list.posted_by = user.user_id AND tbl_income.posted_by = user.user_id AND tbl_income.source = tbl_income_list.income_list_id AND tbl_account_chart.acount_id = tbl_income.account_credited");


    $source= $dbconnect->prepare("SELECT * FROM tbl_income_list");
    $source->execute();
    $source_list = $source->fetchAll(PDO::FETCH_ASSOC);

    $account_chart= $dbconnect->prepare("SELECT * FROM tbl_account_credit, tbl_account_chart 
    WHERE tbl_account_chart.acount_id = tbl_account_credit.account_chart");
    $account_chart->execute();
    $account_chart_list = $account_chart->fetchAll(PDO::FETCH_ASSOC);

    

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

                        <button class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm ml-3" data-toggle="modal" data-target="#income-modal">
                            Income <i class="fa fa-plus-circle fa-sm"></i>
                         </button>
                    </div>
                </div>
                <?php include('includes/messages.php'); ?>
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Source</th>
                                <th>Amount</th>
                                <th>Account Credited</th>
                                <th>date</th>
                                <th>Posted By</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            while ($income_item = mysqli_fetch_array($income_list)) { ?>
                         
                            <tr>
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo $income_item['income_list_name'] ?></td>
                                <td><?php echo $income_item['amount'] ?></td>
                                <td><?php echo $income_item['account_name'] ?></td>
                                <td><?php echo $income_item['income_date'] ?></td>
                                <td><?php echo $income_item['first_name']." ".$income_item['last_name']  ?></td>
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
<?php include('income/income-modal.php'); ?>