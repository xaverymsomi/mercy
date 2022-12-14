<div class="modal fade" id="income-source-modal" tabindex="-1" role="dialog" aria-labelledby="user" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h3 class="modal-title text-white" id="income-source-modal">Income Sorce</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="income/new-income-source.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <label>Income Source</label>
                           <input name="income_source" class="form-control" placeholder="Income Source" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="save_income_source" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>