<?php $title = "Exipanditure Type" ?>

<?php include('includes/sidebar.php'); ?>
<div class="main_container">
 <?php 
        $exipenditure_report = $dbconnect->prepare("SELECT * FROM `exipenditure_report` ORDER BY expenditure_date ");
        $exipenditure_report->execute();
        $exipanditure_report_list = $exipenditure_report->fetchAll(PDO::FETCH_ASSOC);

		$exipanditure_type = $dbconnect->prepare("SELECT * FROM tbl_expenditure_type");
		$exipanditure_type->execute();
		$exipanditure_type_list = $exipanditure_type->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php include('includes/messages.php'); ?>
    <div class="card">
    	<div class="card-body">
    		<div class="d-sm-flex align-items-center justify-content-end mb-4">
                <button class="d-none d-sm-inline-block btn btn-danger btn-sm shadow-sm" data-toggle="modal" data-target="#print-report">
                   Print Report <i class="fa fa-file-pdf-o fa-sm text-light"></i> 
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Expenditure Type</th>
                            <th>Amount</th>
                            <th>Descrption</th>
                            <th>Date</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($exipanditure_report_list as $exipanditure_report_item): ?>
                        <tr class="text-dark">
                            <td><?php echo $exipanditure_report_item['first_name'] ?></td>
                            <td><?php echo $exipanditure_report_item['last_name'] ?></td>
                            <td><?php echo $exipanditure_report_item['email'] ?></td>
                            <td><?php echo $exipanditure_report_item['expenditure_type_name'] ?></td>
                            <td><?php echo $exipanditure_report_item['expenditure_amount'] ?></td>
                            <td><?php echo $exipanditure_report_item['expenditure_descrption'] ?></td>
                            <td><?php echo date('d-m-Y',strtotime($exipanditure_report_item['expenditure_date'])) ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
<?php include('modals/print-report.php'); ?>
<script type="text/javascript">
	$(document).ready(function() {
		$("#search_exipandure_type_form").hide();
		$("#search_by_date_form").hide();

		$("#search_date").click(function() {
			$("#search_by_date_form").show("slow");
			$("#search_exipandure_type_form").hide();
			$("#search_exipendture_type").css({'color':'black'});
            $("#search_date").css({'color':'#04AA6D'});
		})

		$("#search_exipendture_type").click(function() {
			$("#search_exipandure_type_form").show("slow");
			$("#search_date").css({'color':'black'});
			$("#search_exipendture_type").css({'color':'#04AA6D'});
			$("#search_by_date_form").hide("slow");
            
		})
	});
</script>