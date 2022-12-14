<?php $title = "Exipanditure" ?>

<?php include('includes/sidebar.php'); ?>

<div class="main_container">

    <?php 
        $exipanditure = $dbconnect->prepare("SELECT * FROM tbl_expenditure, user, tbl_account_credit, tbl_account_chart
            WHERE tbl_expenditure.user_expenditure = user.user_id
            AND tbl_expenditure.account_debited = tbl_account_credit.credit_id
            AND tbl_account_credit.account_chart = tbl_account_chart.acount_id");
        $exipanditure->execute();
        $exipanditure_list = $exipanditure->fetchAll(PDO::FETCH_ASSOC);

        $exipanditure_type = $dbconnect->prepare("SELECT * FROM tbl_expenditure_type");
        $exipanditure_type->execute();
        $exipanditure_type_list = $exipanditure_type->fetchAll(PDO::FETCH_ASSOC);

        $account_debited = $dbconnect->prepare("SELECT tbl_account_credit.credit_id, tbl_account_chart.account_name FROM tbl_account_credit,tbl_account_chart WHERE tbl_account_chart.acount_id = tbl_account_credit.account_chart");
        $account_debited->execute();
        $account_debited_list = $account_debited->fetchAll(PDO::FETCH_ASSOC);

        $count_expenditure_query = $dbconnect->prepare(" SELECT * FROM tbl_expenditure_type");
        $count_expenditure_query->execute();
        $count_expenditure_count = $count_expenditure_query->rowCount();
        
    ?>
    <!-- Page Heading -->
    <div class="row animated--grow-in">
        <div class="col-xl-12">
            <div class="card card-body">
                <div class="d-sm-flex align-items-center justify-content-end mb-4">
                    <button class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" data-toggle="modal" data-target="#expenditure-modal">
                        New Expenditure <i class="fa fa-plus fa-sm"></i> 
                    </button>
                </div>
                <?php include('includes/messages.php'); ?>
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Amount</th>
                                <th>Account</th>
                                <th width="12%">Items</th>
                                <th>Status</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sn = 1; foreach ($exipanditure_list as $exipanditure_item): ?>
                            <?php 
                                $exipanditure = $exipanditure_item['exp_id'];
                                
                                $expenditure_type_log = $dbconnect->prepare("SELECT tbl_expenditure_type.* FROM tbl_expenditure_logs, tbl_expenditure,tbl_expenditure_type 
                                    WHERE expenditure = :expenditure 
                                    AND tbl_expenditure_logs.expenditure = tbl_expenditure.exp_id
                                    AND tbl_expenditure_logs.expenditure_type = tbl_expenditure_type.expenditure_type_id");
                                
                                $expenditure_type_log->execute(["expenditure"=>$exipanditure]);

                                $expenditure_type_log_list = $expenditure_type_log->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <tr class="text-dark">
                                <td><?php echo $sn++ ?></td>
                                <td> 
                                   <?php echo number_format($exipanditure_item['expenditure_amount'], 2) ?>
                    
                                </td>
                                <td> 
                                   <?php echo $exipanditure_item['account_name'] ?>
                    
                                </td>
                                <td>
                                    <?php foreach($expenditure_type_log_list as $e_t_value): ?>
                                        <span class="badge bg-success text-white"><?php echo $e_t_value['expenditure_type_name'] ?></span>
                                    <?php endforeach ?>    
                                </td>
                                <td>
                                    <?php if($exipanditure_item['commited'] == '1'): ?>
                                        <span class="badge kvm-bg text-white">
                                            commited 
                                        </span>
                                    <?php elseif($exipanditure_item['commited'] == '0'): ?>
                                        <span class="badge bg-danger text-white">
                                            Not commited 
                                        </span>
                                   <?php endif ?>        
                                </td>
                                <td><?php echo $exipanditure_item['first_name'] ?></td>
                                <td>
                                    <?php echo date('d-m-Y',strtotime($exipanditure_item['expenditure_date'])) ?>
                                        
                                </td>
                                <td>
                                    <?php if($exipanditure_item['commited'] == '1'): ?>
                                        <button class="btn btn-success btn-sm">view Detail</button>
                                    <?php elseif($exipanditure_item['commited'] == '0'): ?>
                                        <form action="expenditure/commit-expenditure.php" method="POST">
                                            <input hidden readonly type="number" name="expenditure" 
                                                value="<?php echo $exipanditure_item['exp_id'] ?>">

                                            <input hidden readonly type="number" name="account_debited_id" 
                                                value="<?php echo $exipanditure_item['account_debited'] ?>">

                                            <input hidden readonly type="text" name="account_debited_name" 
                                                value="<?php echo $exipanditure_item['account_name'] ?>">

                                            <input hidden readonly type="number" name="commited" 
                                                value="<?php echo $exipanditure_item['commited'] ?>">

                                            <input hidden readonly type="number" name="amount" 
                                                value="<?php echo $exipanditure_item['expenditure_amount'] ?>">

                                            <button type="submit" name="commit_exptkvm" class="btn btn-danger btn-sm">commit</button>
                                        </form>
                                   <?php endif ?>        
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
<?php include('modals/expenditure-modal.php'); ?>