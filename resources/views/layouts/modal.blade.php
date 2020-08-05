<div class="modal fade" id="expenses" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="expensesTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-14" id="expensesTitle">Request Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="expense-form">
          @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="budget">Budget <span class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-sm" required name="budget" id="budget" placeholder="2000000">
            </div>
            <div class="form-group">
                <label for="desc">Reason/Description <span class="text-danger">*</span></label>
                <textarea id="desc" name="desc" class="form-control form-control-sm" required maxlength="250" placeholder="Reason why your requesting" id="desc" rows="3"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger btn-sm modal-close" data-dismiss="modal"><i class="mdi mdi-close-circle"></i> Close</button>
            <button type="submit" btn-id="" btn-action="save" id="request-btn" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-check"></i> Request</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- pdf --}}
<div class="modal fade" id="pdf" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="pdfTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-14" id="pdfTitle">Download</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('pdf')}}" method="POST">
          @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="Year">Select Year <span class="text-danger">*</span></label>
                <input required name="year"  class="form-control form-contol-sm" type="text" placeholder="Select Year"  id="pdf-year">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary btn-sm modal-close" data-dismiss="modal"><i class="mdi mdi-close-circle"></i> Close</button>
            <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa fa-download" aria-hidden="true"></i> Download</button>
        </div>
      </form>
    </div>
  </div>
</div>