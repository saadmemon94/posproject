@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add User',
    'activePage' => 'Add User',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Add User")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('user.store', ['user' => 1,]) }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @method('post')
              @include('alerts.success')
                <div class="row">
                </div>
                <div class="row">
                  <div class="col-xs-12 col-md-6 pr-2">
                    <div class="form-group">
                      <label for=name class="col-sm-2 col-md-12 control-label">&nbsp;&nbsp;{{__(" Full Name")}}</label>
                      <div class="col-sm-10 col-md-12">
                        <input type="text" name="name" placeholder="Full Name" class="form-control" value="{{ old('name', auth()->user()->name) }}">
                        @include('alerts.feedback', ['field' => 'name'])
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-6 pr-2">
                    <div class="form-group">
                        <label for=username class="col-sm-2 col-md-12 control-label">&nbsp;&nbsp;{{__(" User Name")}}</label>
                        <div class="col-sm-10 col-md-12">
                          <input type="text" name="username" placeholder="Login Name" class="form-control" value="{{ old('username', '') }}">
                          @include('alerts.feedback', ['field' => 'username'])
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-md-6 pr-2">
                    <div class="form-group {{ $errors->has('password') ? ' is-invalid' : '' }}">
                      <label for="password" class="col-sm-2 col-md-12 control-label">&nbsp;&nbsp;{{__(" Password")}}</label>
                      <div class="col-sm-10 col-md-12">
                        <input required type="password" id="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" value="{{ old('password', '') }}">
                        @include('alerts.feedback', ['field' => 'password'])
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-6 pr-2">
                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                      <label for="password_confirmation" class="col-sm-2 col-md-12 control-label">&nbsp;&nbsp;{{__(" Confirm New Password")}}</label>
                      <div class="col-sm-10 col-md-12">
                        <input required class="form-control" placeholder="{{ __('Confirm New Password') }}" type="password" name="password_confirmation">
                        @include('alerts.feedback', ['field' => 'password'])
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-md-6 pr-2">
                    <div class="form-group">
                      <label for="role" class="col-sm-2 col-md-12 control-label">&nbsp;&nbsp;{{__(" Role")}}</label>
                      <div class="col-sm-10 col-md-12">
                        <select name="role" class="form-control">
                          <option value="0">Super Admin</option>
                          <option value="1">Admin</option>
                          <option value="2">Cashier</option>
                        </select>
                        @include('alerts.feedback', ['field' => 'role'])
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-6 pr-2">
                    <div class="form-group">
                      <label for="status" class="col-sm-2 col-md-12 control-label">&nbsp;&nbsp;{{__(" Status")}}</label>
                      <div class="col-sm-10 col-md-12">
                        <select name="status_id" class="form-control">
                          <option value="0">Active</option>
                          <option value="1">Inactive</option>
                        </select>
                        @include('alerts.feedback', ['field' => 'status_id'])
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer row">
                  <div class="col-sm-10 col-md-6">
                    <button type="button" class="btn btn-secondary btn-round ">{{__('Back')}}</button>
                  </div>
                  <div class="col-sm-10 col-md-6">
                    <button type="submit" class="btn btn-info btn-round pull-right">{{__('Save')}}</button>
                  </div>
                </div>
              <hr class="half-rule"/>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection