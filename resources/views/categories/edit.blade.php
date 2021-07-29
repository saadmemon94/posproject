@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit Category',
    'activePage' => 'Edit Category',
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
            <h5 class="title">{{__(" Edit Category")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('category.update', ['category' => 1,]) }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @method('put')
              @include('alerts.success')
              <div class="row">
              </div>
              <div class="row">
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                        <label>{{__(" Name")}}</label>
                            <input type="text" name="name" class="form-control" placeholder="Category Name" value="{{ old('name', '') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                    </div>
                </div>
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label for="ref_id">{{__(" Ref ID")}}</label>
                    <input type="text" id="ref_id" name="ref_id" class="form-control" placeholder="Ref ID" value="{{ old('ref_id', '')}}">
                    @include('alerts.feedback', ['field' => 'ref_id'])
                  </div>
                </div>
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label for="parent_id">{{__(" Parent Category")}}</label>
                    <input type="text" id="parent_id" name="parent_id" class="form-control" placeholder="Parent ID" value="{{ old('parent_id', '')}}">
                    @include('alerts.feedback', ['field' => 'parent_id'])
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 pr-1">
                  <div class="form-group">
                    <label for="description">{{__(" Description")}}</label>
                    <textarea type="text" rows="3" id="description" name="description" class="form-control" placeholder="Category Description" value="{{ old('description', '') }}"></textarea>
                    {{-- <input type="text" id="description" name="description" class="form-control" placeholder="Category Description" value="{{ old('description', '')}}"> --}}
                    @include('alerts.feedback', ['field' => 'description'])
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