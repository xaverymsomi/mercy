<?php $title = "Exipanditure Type Report" ?>

<?php include('includes/sidebar.php'); ?>

<div class="main_container">
 <?php 
        if(isset($_GET['search_by_date'])) {
            $from_date = date('Y-m-d', strtotime($_GET['from_date']));
            $to_date =  date('Y-m-d', strtotime($_GET['to_date']));

            if($from_date > $to_date) {
                $_SESSION['error'] = "Invalid to date. to date can't be greater than from date<br>$from_date - $to_date";
                
            }

            else {
                $data = 

                $exipenditure_report = $dbconnect->prepare("SELECT * FROM `exipenditure_report`
                WHERE (expenditure_date BETWEEN :from_date AND :to_date)
                ORDER BY expenditure_date ");

                $exipenditure_report->execute(['from_date'=>$from_date,'to_date'=>$to_date]);
                $exipanditure_report_list = $exipenditure_report->fetchAll(PDO::FETCH_ASSOC);

                $exipanditure_type = $dbconnect->prepare("SELECT * FROM tbl_expenditure_type");
                $exipanditure_type->execute();
                $exipanditure_type_list = $exipanditure_type->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        else if(isset($_GET['search_by_type'])) {
            $expenditure_type_name = $_GET['exipandure_type'];

            $exipenditure_report = $dbconnect->prepare("SELECT * FROM `exipenditure_report` 
                WHERE expenditure_type_name = :expenditure_type_name
                ORDER BY expenditure_date ");

            $exipenditure_report->execute(['expenditure_type_name'=>$expenditure_type_name]);
            $exipanditure_report_list = $exipenditure_report->fetchAll(PDO::FETCH_ASSOC);
            
            $exipanditure_type = $dbconnect->prepare("SELECT * FROM tbl_expenditure_type");
            $exipanditure_type->execute();
            $exipanditure_type_list = $exipanditure_type->fetchAll(PDO::FETCH_ASSOC);
        }
    ?>

    <?php include('includes/messages.php'); ?>
    <div class="card">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-end mb-4">
                <button class="d-none d-sm-inline-block btn btn-outline-danger btn-sm shadow-sm" data-toggle="modal" data-target="#print-report">
                   Print Report <i class="fa fa-file-pdf-o fa-sm text-white"></i> 
                </button>
            </div>
            <div class="table-responsive">
                <?php echo  $expenditure_type_name ?>
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
