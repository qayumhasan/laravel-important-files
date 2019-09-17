<!-- Insert Update Delete massage show -->
<div class="panel-heading">
  @if (session('msg'))
  <div class="alert alert-success d-block">
    <strong>{{ session('msg') }}</strong>
  </div>
  @elseif (session('del_msg'))
  <div class="alert alert-danger d-block">
    <strong>{{ session('del_msg') }}</strong>
  </div>
  @else
  About Page Are Here
  @endif
</div>
<!-- Error Massage show -->

<label for="about_title" class="col-form-label">
  @if ($errors->has('title'))
  <div class="error">{{ $errors->first('title') }}</div>
  @else
  Title:
  @endif
</label>