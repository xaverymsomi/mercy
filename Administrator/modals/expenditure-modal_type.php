<div class="modal fade" id="expenditure-modal" tabindex="-1" role="dialog" aria-labelledby="user" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header kvm-bg">
                <h3 class="modal-title text-white" id="user">Expanditure</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="expenditure/new-expenditure-type.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <label>Exipenditure Type</label>
                           <textarea name="expenditure_type_name" class="form-control" placeholder="expenditure name" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="save_exipanditure" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>