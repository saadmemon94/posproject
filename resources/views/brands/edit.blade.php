@extends('dashboard.base')

@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Edit Brand")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('brand.update', ['brand' => $brand[0]->brand_id,]) }}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              @method('put')
              @include('alerts.success')
              @if($errors->any())
                <div class="form-group">
                  <div class="alert alert-danger">
                    <ul>
                      @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              @endif
              <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>{{__(" Brand Name")}}</label>
                            <input type="text" name="brand_name" class="form-control" placeholder="Brand Name" value="{{ $brand[0]->brand_name }}">
                            @include('alerts.feedback', ['field' => 'brand_name'])
                    </div>
                </div>
                {{-- <div class="col-4">
                  <div class="form-group">
                    <label for="brand_ref_no">{{__(" Brand Ref No.")}}</label>
                    <input type="text" id="brand_ref_no" name="brand_ref_no" class="form-control" placeholder="Brand Ref ID" value="{{ $brand[0]->brand_ref_no }}">
                    @include('alerts.feedback', ['field' => 'brand_ref_no'])
                  </div>
                </div> --}}
                <div class="col-6">
                  <div class="form-group">
                    <label for="parent_company">{{__(" Parent Company")}}</label>
                    {{-- <input type="text" id="parent_company" name="parent_company" class="form-control" placeholder="Parent Company" value="{{ $brand[0]->parent_company }}">
                    @include('alerts.feedback', ['field' => 'parent_company']) --}}
                    <select name="parent_company" class="selectpicker form-control col-12" data-live-search="true" data-live-search-style="begins" title="Select Company...">
                        <option selected value="NULL">Select</option>
                      @foreach($companies as $single_company)
                        <option @if($single_company->company_name == $brand[0]->parent_company) selected @endif value="{{ $single_company->company_name }}">{{ $single_company->company_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="brand_description">{{__(" Brand Description")}}</label>
                    {{-- <textarea type="text" rows="3" id="brand_description" name="brand_description" class="form-control" placeholder="Brand Description" value="{{ $brand[0]->brand_description }}"></textarea> --}}
                    <input type="text" id="brand_description" name="brand_description" class="form-control" placeholder="Brand brand_Description" value="{{ $brand[0]->brand_description }}">
                    @include('alerts.feedback', ['field' => 'brand_description'])
                  </div>
                </div>
              </div>
              <div class="card-footer row">
                <div class=" col-6">
                  <button type="submit" class="btn btn-info btn-round pull-left">{{__('Update')}}</button>
                </div>
            </form>
                <div class=" col-6">
                  <a type="button" href="{{ URL::previous() }}" class="btn btn-secondary btn-round pull-right">{{__('Back')}}</a>
                  <form action="{{ route('brand.destroy', $brand[0]->brand_id) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger btn-round pull-right">Delete</button>
                  </form>
                </div>
              </div>
              <hr class="half-rule"/>
            {{-- </form> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('javascript')
@endsection