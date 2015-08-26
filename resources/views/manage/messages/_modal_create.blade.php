<div class="modal fade" id="createMessageModal" tabindex="-1" role="dialog" aria-labelledby="Soạn tin nhắn">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">SOẠN TIN NHẮN</h4>
      </div>
      <div class="modal-body">
        <form accept-charset="UTF-8" action="{{ route('message.store') }}" method="POST" role="form" id="createMessageForm">
          <p class="text-danger">{{-- Placehouse error message --}}</p>

          <div class="form-group">
            <label class="sr-only">To</label>
            <input type="email" name="to" class="form-control" placeholder="ĐỊA CHỈ EMAIL NGƯỜI NHẬN">
          </div>
          <div class="form-group">
            <label class="sr-only">Subject</label>
            <input type="text" name="subject" class="form-control" placeholder="CHỦ ĐỀ TIN NHẮN">
          </div>

          <div class="form-group">
            <label class="sr-only">Message</label>
            <textarea rows="8" name="message" class="form-control" placeholder="NỘI DUNG TIN NHẮN"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-primary" id="createMessageBtnSubmit">Gửi tin</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@section('javascript')
  @parent
  <script>
    $(function() {
      $('#createMessageBtnSubmit').click(function() {
        var $form = $('#createMessageForm');
        var $modal = $('#createMessageModal');
        var $btnSubmit = $(this).button('loading');
        var $errorMessage = $form.find('.text-danger');
        var $successMessage = $('.text-success');

        $.ajax({
          url: $form.attr('action'),
          type: $form.attr('method'),
          dataType: 'json',
          data: $form.serialize()
        }).done(function(data) {
          $modal.modal('hide');
          $successMessage.html(data.message);
          $btnSubmit.button('reset');
        }).fail(function(data) { // catch HttpResponseException
          var $response = data.responseJSON;

          $.each($response, function(i, value) {
            $errorMessage.html(value);
          });
          $btnSubmit.button('reset');
        });
      });
    });
  </script>
@endsection