
<!-- Modal Alert -->
<div class="modal fade" tabindex="-1"  role="dialog" id="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="post" id="deleteform">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-alert bg-warning"></em>
                        <h4 class="nk-modal-title">Delete Grade!</h4>
                        <div class="nk-modal-text">
                            <div class="caption-text">Are you sure, you want to <strong>delete</strong> this grade ?</div>
                            <span class="sub-text-sm">This action can not be revert.</span>
                        </div>
                        <div class="nk-modal-action">
                            <button type="button" class="btn-lg btn-mw btn-primary" data-dismiss="modal">No, Go back</button>
                            <button type="submit" class="btn-lg btn-mw btn-danger">Yes, Delete</button>
                        </div>
                    </div>
                </div><!-- .modal-body -->
            </div>
        </form>
    </div>
</div>