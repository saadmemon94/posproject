@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit Role',
    'activePage' => 'Edit Role',
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
            <h5 class="title">{{__(" Edit Role")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('role.update', ['role' => 1,]) }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @method('put')
              @include('alerts.success')
              <div class="row">
              </div>
              <div class="row">
                <div class="col-xs-12 col-md-6 pr-2">
                  <div class="form-group">
                    <label for=name class="col-sm-2 col-md-12 control-label">&nbsp;&nbsp;{{__(" Role Name")}}</label>
                    <div class="col-sm-10 col-md-12">
                      <input type="text" name="name" placeholder="Role Name" class="form-control" value="{{ old('name', '') }}">
                      @include('alerts.feedback', ['field' => 'name'])
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
                  <button type="button" class="btn btn-danger btn-round ">{{__('Delete')}}</button>
                </div>
                <div class="col-sm-10 col-md-6">
                  <button type="submit" class="btn btn-info btn-round pull-right">{{__('Update')}}</button>
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