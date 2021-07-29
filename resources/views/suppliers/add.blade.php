@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Supplier',
    'activePage' => 'Add Supplier',
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
            <h5 class="title">{{__(" Add Supplier")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('supplier.store', ['supplier' => 1,]) }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @method('post')
              @include('alerts.success')
                <div class="row">
                  <div class="card-body col-12 ">
                    <fieldset class="col-md-12 border p-1 ">
                      <legend class="w-auto">Supplier:</legend>
                        <div class="row">
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <div class="row">
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="refid" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Reference ID")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <input type="text" name="refid" class="form-control" value="{{ old('refid', '') }}">
                                      @include('alerts.feedback', ['field' => 'refid'])
                                    </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-md-6 pr-1">
                                  <div class="form-group">
                                    <label for="name" class="col-sm-2 col-md-10 control-label">&nbsp;&nbsp;{{__(" Supplier Name")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <input type="text" name="name" class="form-control" value="{{ old('name', '') }}">
                                      @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="type" class="col-sm-2 col-md-10 control-label">&nbsp;&nbsp;{{__(" Supplier Type")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <select name="type" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select Brand...">
                                            <option value="general">General</option>
                                            <option value="distributer">Distributer</option>
                                            <option value="reseller">Reseller</option>
                                      </select>
                                      @include('alerts.feedback', ['field' => 'type'])
                                    </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="shopname" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Shop Name")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <input type="text" name="shopname" class="form-control" value="{{ old('shopname', '') }}">
                                      @include('alerts.feedback', ['field' => 'shopname'])
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-md-12 pr-1">
                                  <div class="form-group">
                                    <label for="shopinfo" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Shop Description")}}</label>
                                      <div class="col-sm-10 col-md-12">
                                        <input type="text" name="shopinfo" rows="2" class="form-control" value="{{ old('shopinfo', '') }}">
                                        @include('alerts.feedback', ['field' => 'shopinfo'])
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="balancepaid" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Balance Paid")}}</label>
                                    <div class="col-sm-10 col-md-12 input-group mb-1">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rs">Rs: </span>
                                      </div>
                                      <input type="number" name="balancepaid" class="form-control" value="{{ old('balancepaid', '') }}">
                                      @include('alerts.feedback', ['field' => 'balancepaid'])
                                    </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-md-6 pr-1">
                                  <div class="form-group">
                                    <label for="balancedues" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Balance Dues")}}</label>
                                      <div class="col-sm-10 col-md-12 input-group mb-1">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text rs">Rs: </span>
                                        </div>
                                        <input type="number" name="balancedues" class="form-control" value="{{ old('balancedues', '') }}">
                                        @include('alerts.feedback', ['field' => 'balancedues'])
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="creditduration" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Credit Duration")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <input type="number" name="creditduration" class="form-control" value="{{ old('creditduration', '') }}">
                                      @include('alerts.feedback', ['field' => 'creditduration'])
                                    </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-md-6 pr-1">
                                  <div class="form-group">
                                    <label for="credittype" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Credit Type")}}</label>
                                      <div class="col-sm-10 col-md-12">
                                        <select name="credittype" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Credit Type">
                                          <option value="days">Days</option>
                                          <option value="months">Months</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'credittype'])
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="creditlimit" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Credit Limit")}}</label>
                                    <div class="col-sm-10 col-md-12 input-group mb-1">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rs">Rs: </span>
                                      </div>
                                      <input type="number" name="creditlimit" class="form-control" value="{{ old('creditlimit', '') }}">
                                      @include('alerts.feedback', ['field' => 'creditlimit'])
                                    </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="cashcreditrate" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Cash Credit Rate")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <select name="cashcreditrate" class="form-control">
                                        <option value="cash">Cash</option>
                                        <option value="credit">Credit</option>
                                        <option value="nonbulk">Non Bulk Buyer</option>
                                      </select>
                                      @include('alerts.feedback', ['field' => 'cashcreditrate'])
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="row">
                              <div class="col-xs-12 col-md-12 pr-1">
                                <div class="form-group">
                                  <label for="email" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Email")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <input type="text" name="email" class="form-control" value="{{ old('email', '') }}">
                                      @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-md-12 pr-1">
                                  <div class="form-group">
                                    <label for="alternateemail" class="col-sm-2 col-md-6 control-label">&nbsp;&nbsp;{{__(" Alternate Email")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <input type="text" name="alternateemail" class="form-control" value="{{ old('alternateemail', '') }}">
                                      @include('alerts.feedback', ['field' => 'alternateemail'])
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="cnicnumber" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Cnic Number")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <input type="text" name="cnicnumber" class="form-control" value="{{ old('cnicnumber', '') }}">
                                      @include('alerts.feedback', ['field' => 'cnicnumber'])
                                    </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="phonenumber" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Phone Number")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <input type="text" name="phonenumber" class="form-control" value="{{ old('phonenumber', '') }}">
                                      @include('alerts.feedback', ['field' => 'phonenumber'])
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-md-6 pr-1">
                                  <div class="form-group">
                                    <label for="officenumber" class="col-sm-2 col-md-10 control-label">&nbsp;&nbsp;{{__(" Office Number")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <input type="text" name="officenumber" class="form-control" value="{{ old('officenumber', '') }}">
                                      @include('alerts.feedback', ['field' => 'officenumber'])
                                    </div>
                                  </div>
                              </div>
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="alternatenumber" class="col-sm-2 col-md-12 control-label">&nbsp;&nbsp;{{__(" Alternate Phone Number")}}</label>
                                  <div class="col-sm-10 col-md-12">
                                    <input type="text" name="alternatenumber" class="form-control" value="{{ old('alternatenumber', '') }}">
                                    @include('alerts.feedback', ['field' => 'alternatenumber'])
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-md-6 pr-2">
                                <div class="form-group">
                                  <label for="status" class="col-sm-2 col-md-12 control-label">&nbsp;&nbsp;{{__(" Status")}}</label>
                                  <div class="col-sm-10 col-md-12">
                                    <select name="status_id" class="form-control">
                                      <option value="0">Active</option>
                                      <option value="1">Inactive</option>
                                    </select>
                                    {{-- <input type="text" name="status_id" class="form-control" value="{{ old('status', '') }}"> --}}
                                    @include('alerts.feedback', ['field' => 'status_id'])
                                  </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="zipcode" class="col-sm-2 col-md-6 control-label">&nbsp;&nbsp;{{__(" Zip Code")}}</label>
                                  <div class="col-sm-10 col-md-12">
                                    <input type="text" name="zipcode" class="form-control" value="{{ old('zipcode', '') }}">
                                    @include('alerts.feedback', ['field' => 'zipcode'])
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="town" class="col-sm-2 col-md-6 control-label">&nbsp;&nbsp;{{__(" Town")}}</label>
                                  <div class="col-sm-10 col-md-12">
                                    <input type="text" name="town" class="form-control" value="{{ old('town', '') }}">
                                    @include('alerts.feedback', ['field' => 'town'])
                                  </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="area" class="col-sm-2 col-md-6 control-label">&nbsp;&nbsp;{{__(" Area")}}</label>
                                  <div class="col-sm-10 col-md-12">
                                    <input type="text" name="area" class="form-control" value="{{ old('area', '') }}">
                                    @include('alerts.feedback', ['field' => 'area'])
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-1">
                            <div class="form-group">
                              <label for="shopaddress" class="col-sm-2 col-md-6 control-label">&nbsp;&nbsp;{{__(" Shop Address")}}</label>
                              <div class="col-sm-10 col-md-12">
                                <input type="text" name="shopaddress" class="form-control" value="{{ old('shopaddress', '') }}">
                                @include('alerts.feedback', ['field' => 'shopaddress'])
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-1">
                            <div class="form-group">
                              <label for="residentaddress" class="col-sm-2 col-md-6 control-label">&nbsp;&nbsp;{{__(" Residential Address")}}</label>
                              <div class="col-sm-10 col-md-12">
                                <input type="text" name="residentaddress" class="form-control" value="{{ old('residentaddress', '') }}">
                                @include('alerts.feedback', ['field' => 'residentaddress'])
                              </div>
                            </div>
                          </div>
                        </div>
                    </fieldset>
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