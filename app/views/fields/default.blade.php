  <div class="form-group">
    {{ Form::label($name,$label) }}
    {{ $control }}

    @if ($error)
      <p class="bg-danger">{{ $error }}</p>
    @endif
  </div>
