<!--
@if(Session::has('mssage1'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message1') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@elseif(Session::has('message2'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message2') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@else(Session::has('message3'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message3') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
-->
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div>
