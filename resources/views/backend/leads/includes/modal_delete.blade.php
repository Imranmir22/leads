<div id="confirmDelete" class="modal fade" style="display: none;">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">warning</i>
                </div>
                <h4 class="modal-title">Are you sure?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete these record? This process cannot be undone.</p>
            </div>
            <div class="modal-footer m-auto">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirm-btn">Delete</button>
            </div>
        </div>
    </div>
</div>
@push('body.end')
    <script type="text/javascript">
        $(function () {
            $('#confirmDelete').on('show.bs.modal', function (e) {
                var message = $(e.relatedTarget).attr('data-message');
                var title = $(e.relatedTarget).attr('data-title');
                var form = $(e.relatedTarget).closest('form');
                $(this).find('.modal-body p').text(message);
                $(this).find('.modal-title').text(title);
                $(this).find('.modal-footer #confirm-btn').data('form', form);
            });

            $('#confirmDelete').find('.modal-footer #confirm-btn').on('click', function () {
                $(this).data('form').submit();
            });
        });
    </script>
@endpush
