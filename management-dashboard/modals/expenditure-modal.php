<div class="modal fade" id="expenditure-modal" tabindex="-1" role="dialog" aria-labelledby="user" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h6 class="modal-title text-white" id="user">Expanditure</h6>
                <h3 class="modal-title text-white" id="user">Expanditure</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
    
            <form action="expenditure/new-expenditure.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <?php if($count_expenditure_count > 0): ?>
                    <div class="row mt-3">
                        <div class="col-xl-6">
                            <!-- <label>Exipenditure Amount</label> -->
                            <input type="number" name="exipandure_amount" class="form-control" placeholder="Total Amount" required>
                        </div>
                      
                        <div class="col-xl-6">
                            <!-- <label >Account To debit</label> -->
                            <select name="debit_account" class="form-control" required>
                                <option>---Select Account---</option>
                                <?php foreach($account_debited_list as $account_debited_item): ?>
                                    <option value="<?php echo $account_debited_item['credit_id'] ?>">
                                        <?php echo $account_debited_item['account_name'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-xl-12">
                            <!-- <h6 class="text-danger">Expenditure Type</h6> -->
                            <?php foreach($exipanditure_type_list as $exipanditure_type_item): ?>
                                <label class="checkbox">
                                    <input type="checkbox" name="exipanditure_type[]" 
                                        value="<?php echo $exipanditure_type_item['expenditure_type_id'] ?>">  
                                    <span> <?php echo $exipanditure_type_item['expenditure_type_name'] ?> </span>
                                 </label>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <?php else: ?>
                        <div class="alert alert-danger"> Expenditure Type Not added please add its
                         <a href="expenditure-type.php">
                   click here <i class="fa fa-plus fa-sm"></i> 
                </a>
                        </div>
                    <?php endif ?>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="save_exipanditure" class="btn vms-btn" value="Save Expendature">
                </div>
            </form>
        </div>
    </div>
</div>