<div class="modal fade" id="account-balance-modal" tabindex="-1" role="dialog" aria-labelledby="user" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h6 class="modal-title text-white" id="income-source-modal">New Account</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="income/new-account.php"name= "account_chart_item" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <select required name="account_chart" class="form-control">
                                <option>---Select Account---</option>
                                <?php foreach($account_chart_list as $account_chart_item): ?>
                                <option value="<?php echo $account_chart_item['acount_id'] ?>">
                                    <span><?php echo $account_chart_item['account_name'] ?> </span>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="save_account" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="account-list-modal" tabindex="-1" role="dialog" aria-labelledby="user" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h6 class="modal-title text-white" id="income-source-modal">Account List</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="income/new-account-list.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <input type="text" name="account_name" class="form-control" placeholder="Account Name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="save_account_list" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>