<div class="modal fade" id="income-modal" tabindex="-1" role="dialog" aria-labelledby="user" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h3 class="modal-title text-white" id="income-source-modal">Income</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="income/new-income.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-xl-12">
                           <input name="income_amount" class="form-control" placeholder="Income Amount" required>
                        </div>

                        <div class="col-xl-12">
                            <select required name="income_source" class="form-control">
                                <option>---Select Source---</option>
                                <?php foreach($source_list as $source_item): ?>
                                <option value="<?php echo $source_item['income_list_id'] ?>">
                                    <span><?php echo $source_item['income_list_name'] ?> </span>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="col-xl-12">
                            <select required name="account" class="form-control">
                                <option>---Select Account to Credit---</option>
                                <?php foreach($account_chart_list as $account_chart_item): ?>
                                <option value="<?php echo $account_chart_item['acount_id'] ?>">
                                    <span><?php echo $account_chart_item['account_name'] ?> </span>
                                </option>
                                <?php endforeach ?>
                                <!-- <php foreach($account_chart_list as $account_chart_item): ?>
                                <option value="<php echo $account_chart_item['credit_id'] ?>">
                                    <span><php echo $account_chart_item['account_name'] ?> </span>
                                </option>
                                <php endforeach ?> -->
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="save_income" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
