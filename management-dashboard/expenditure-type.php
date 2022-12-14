<?php $title = "Exipenditure Type" ?>

<?php include('includes/sidebar.php'); ?>

<div class="main_container">
 <?php 
        $exipanditure_type = $dbconnect->prepare("SELECT * FROM `tbl_expenditure_type` ORDER BY `tbl_expenditure_type`.`expenditure_type_name` ");
        $exipanditure_type->execute();
        $exipanditure_type_list = $exipanditure_type->fetchAll(PDO::FETCH_ASSOC);
        
    ?>
<div class="row animated--grow-in">
    <div class="col-xl-12">
        <div class="card card-body">
        	<div class="d-sm-flex align-items-center justify-content-end mb-4">
                <button class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" data-toggle="modal" data-target="#expenditure-modal">
                   Add New Expenditure Type <i class="fa fa-plus fa-sm"></i> 
                </button>
            </div>
            <?php include('includes/messages.php'); ?>
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Expenditure ID</th>
                            <th>Exipendiure Type</th>
                            <th>Date</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $expenditure_type_id = 1; foreach ($exipanditure_type_list as $exipanditure_item): ?>
                        <tr class="text-dark">
                            <td><?php echo $expenditure_type_id++ ?></td>
                            <td><?php echo $exipanditure_item['expenditure_type_name'] ?></td>
                            <td><?php echo date('d-m-Y',strtotime($exipanditure_item['date'])) ?></td>
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
<?php include('modals/expenditure-modal_type.php'); ?>