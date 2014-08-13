@extends("layouts/guest-layout")
@section("content")

@if (Session::get("error") || Session::get("status"))
  <div class="alert alert-danger" role="alert">
    [[ Session::get("error") ]]
    [[ Session::get("status") ]]
  </div>
@endif

[[ Form::open(array('class' => 'form-signin', 'role' => 'form')) ]]
<!-- TODO: i18n -->
<h2 class="form-signin-heading">[[Lang::get('users.title_request')]]</h2>
<div class="form-group [[ $errors->first('username') ? 'has-error' : '' ]]">
	[[ Form::text("username", Input::old("username"), array('class' => 'form-control', 'placeholder' => Lang::get('keywords.email_address'), 'required', 'autofocus')) ]]
</div>
<div class="checkbox">
</div>
<div class="form-group">
	[[ Form::submit(Lang::get('keywords.reset_password'), array('class' => 'btn btn-lg btn-primary btn-block')) ]]
</div>

[[ Form::close() ]]
@stop
