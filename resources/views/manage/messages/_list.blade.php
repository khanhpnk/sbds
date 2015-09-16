<div class="table-responsive">
  <form accept-charset="UTF-8" action="{{ route('message.mutildestroy') }}" method="DELETE" role="form" id="listMessageForm">
  <table class="table table-hover" id="messageList">
    <tbody>
      @foreach ($messages as $message)
        <tr @if (MessageHelper::isInbox() && 0 == $message->read) class="unread" @endif data-url="{{ route('message.show', ['id' => $message->id]) }}">
          <td><input type="checkbox" name="checkbox[]" value="{{ $message->id }}"></td>
          <td>@if (MessageHelper::isInbox()) {{ $message->userFrom->email }} @else {{ $message->userTo->email }} @endif</td>
          <td>{{ str_limit($message->subject, 40, '') }}</td>
          <td class="text-right">{{ MessageHelper::dateFormat($message->created_at) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </form>
</div>

@section('javascript')
  @parent
  <script>
    $(function() {
      // Show message
      $("#messageList tr").click(function(e) {
        if (e.target.type == "checkbox") {
          e.stopPropagation();
        } else {
          // similar behavior as clicking on a link
          window.location.href = $(this).data('url');
        }
      });

      // Destroy mutil message
      $('#deleteMessageBtn').on("click", function(){
        var $form = $('#listMessageForm');
        var $btnSubmit = $(this).button('loading');
        var $successMessage = $('.text-success');

        $.ajax({
          url: $form.attr('action'),
          type: $form.attr('method'),
          dataType: 'json',
          data: $form.serialize()
        }).done(function(data) {
          $successMessage.html(data.message);

          $('input:checkbox:checked').parents("tr").remove();
          $btnSubmit.button('reset');
        });
      });
    });
  </script>
@endsection



