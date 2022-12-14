<div class="modal fade" id="print-report" tabindex="-1" role="dialog" aria-labelledby="print-report" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h6 class="modal-title text-white" id="print-report">Print Report</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>

            </div>

            <div class="modal-body">
                <span id="search_date">Search By Date</span> | 
                <span id="search_exipendture_type"> Search By Exipendture Type</span>
                <form action="exipanditure-report-pdf.php" class="mt-2" method="GET" id="search_by_date_form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-12">
                            <label class="">From Date</label>
                            <input type="date" name="from_date" id="" class="form-control">
                        </div>
                        <div class="col-xl-12 mt-3">
                            <label class="">To Date</label>
                            <input type="date" name="to_date" id="" class="form-control">
                        </div>
                        <div class="col-xl-12 mt-3">
                            <button type="submit" name="search_by_date" class="btn btn-block btn-success">Print <i class="fa fa-print"></i> </button>
                        </div>
                    </div>
                </form>
               
                
                <form action="exipanditure-report-pdf.php" method="GET" id="search_exipandure_type_form" enctype="multipart/form-data">
                    <h6 class="mt-3">Search Expenditure Type</h6>
                    <div class="row">
                        <div class="col-xl-9 d-flex">
                             <select name="exipandure_type" class="form-control" required>
                                <option>---Select Expenditure Type---</option>
                                <?php foreach($exipanditure_type_list as $ex_type): ?>
                                    <option value="<?php echo $ex_type['expenditure_type_name'] ?>">
                                        <?php echo $ex_type['expenditure_type_name'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
        
                        <div class="col-xl-3">
                            <button type="submit" name="search_by_type" class="btn btn-block btn-success">Print <i class="fa fa-print"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
