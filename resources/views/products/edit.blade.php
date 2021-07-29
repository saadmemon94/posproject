@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit Product',
    'activePage' => 'Edit Product',
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
            <h5 class="title">{{__(" Edit Product")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('product.update', ['product' => 1,]) }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @method('put')
              @include('alerts.success')
              <div class="row">
                <div class="card-body col-6 ">
                  <fieldset class="col-md-12 border p-1 ">
                    <legend class="w-auto">Product:</legend>
                      <div class="row">
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-md-6 pr-1">
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-6 control-label">&nbsp;&nbsp;{{__(" Name")}}</label>
                              <div class="col-sm-10 col-md-12">
                                <input type="text" name="name" class="form-control" value="{{ old('name', '') }}">
                                @include('alerts.feedback', ['field' => 'name'])
                              </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 pr-1">
                          <div class="form-group">
                              <label for="type" class="col-sm-2 col-md-6 control-label">&nbsp;&nbsp;{{__(" Type")}}</label>
                              <div class="col-sm-10 col-md-12">
                                <select name="type" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select Brand...">
                                      <option value="simple">Simple</option>
                                      <option value="variable">Variable</option>
                                </select>
                              </div>
                              {{-- <div class="col-sm-10 col-md-12">
                                <input type="text" name="type" class="form-control" value="{{ old('type', '') }}">
                                @include('alerts.feedback', ['field' => 'type'])
                              </div> --}}
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-md-6 pr-1">
                            <div class="form-group">
                              <label for="barcode" class="col-sm-2 col-md-6 control-label">&nbsp;&nbsp;{{__(" Barcode")}}</label>
                                <div class="col-sm-10 col-md-12">
                                  <input type="text" name="barcode" class="form-control" value="{{ old('barcode', '') }}">
                                  @include('alerts.feedback', ['field' => 'barcode'])
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 pr-1">
                          <div class="form-group">
                            <label for="refid" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Reference ID")}}</label>
                              <div class="col-sm-10 col-md-12">
                                <input type="text" name="refid" class="form-control" value="{{ old('refid', '') }}">
                                @include('alerts.feedback', ['field' => 'refid'])
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-md-6 pr-1">
                            <div class="form-group">
                              <label for="category" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Category")}}</label>
                                <div class="col-sm-10 col-md-12">
                                  <input type="text" name="category" class="form-control" value="{{ old('category', '') }}">
                                  @include('alerts.feedback', ['field' => 'category'])
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 pr-1">
                            <div class="form-group">
                              <label for="sub-category" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Sub-category")}}</label>
                                <div class="col-sm-10 col-md-12">
                                  <input type="text" name="sub-category" class="form-control" value="{{ old('sub-category', '') }}">
                                  @include('alerts.feedback', ['field' => 'sub-category'])
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-md-6 pr-1">
                            <div class="form-group">
                              <label for="company" class="col-sm-2 col-md-6 control-label">&nbsp;&nbsp;{{__(" Company")}}</label>
                                <div class="col-sm-10 col-md-12">
                                  <input type="text" name="company" class="form-control" value="{{ old('company', '') }}">
                                  @include('alerts.feedback', ['field' => 'company'])
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 pr-1">
                            <div class="form-group">
                              <label for="brand" class="col-sm-2 col-md-6 control-label">&nbsp;&nbsp;{{__(" Brand")}}</label>
                                <div class="col-sm-10 col-md-12">
                                  <input type="text" name="brand" class="form-control" value="{{ old('brand', '') }}">
                                  @include('alerts.feedback', ['field' => 'brand'])
                                </div>
                            </div>
                        </div>
                      </div>
                        <hr style="width:80%;text-align:right;margin-left:5">
                      <div class="row">
                        <div class="col-xs-12 col-md-6 pr-1">
                            <div class="form-group">
                              <label for="totalqty" class="col-sm-2 col-md-6 control-label">&nbsp;&nbsp;{{__(" Total Qty")}}</label>
                                <div class="col-sm-10 col-md-12">
                                  <input type="number" name="totalqty" class="form-control" value="{{ old('totalqty', '') }}">
                                  @include('alerts.feedback', ['field' => 'totalqty'])
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 pr-1">
                            <div class="form-group">
                              <label for="availableqty" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Available Qty")}}</label>
                                <div class="col-sm-10 col-md-12">
                                  <input type="number" name="availableqty" class="form-control" value="{{ old('availableqty', '') }}">
                                  @include('alerts.feedback', ['field' => 'availableqty'])
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-md-6 pr-1">
                            <div class="form-group">
                              <label for="damageqty" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Damage Qty")}}</label>
                                <div class="col-sm-10 col-md-12">
                                  <input type="number" name="damageqty" class="form-control" value="{{ old('damageqty', '') }}">
                                  @include('alerts.feedback', ['field' => 'damageqty'])
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 pr-1">
                          <div class="form-group">
                            <label for="alertqty" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Alert Qty")}}</label>
                              <div class="col-sm-10 col-md-12">
                                <input type="number" name="alertqty" class="form-control" value="{{ old('alertqty', '') }}">
                                @include('alerts.feedback', ['field' => 'alertqty'])
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-md-6 pr-1">
                            <div class="form-group">
                              <label for="unit" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Unit")}}</label>
                                <div class="col-sm-10 col-md-12">
                                  <input type="text" name="unit" class="form-control" value="{{ old('unit', '') }}">
                                  @include('alerts.feedback', ['field' => 'unit'])
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 pr-1">
                            <div class="form-group">
                              <label for="piecepacket" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Pieces Per Packet")}}</label>
                                <div class="col-sm-10 col-md-12">
                                  <input type="number" name="piecepacket" class="form-control" value="{{ old('piecepacket', '') }}">
                                  @include('alerts.feedback', ['field' => 'piecepacket'])
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-md-6 pr-1">
                          <div class="form-group">
                            <label for="packetcarton" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Packets Per Carton")}}</label>
                              <div class="col-sm-10 col-md-12">
                                <input type="number" name="packetcarton" class="form-control" value="{{ old('packetcarton', '') }}">
                                @include('alerts.feedback', ['field' => 'packetcarton'])
                              </div>
                          </div>
                        </div>
                        <div class="col-xs-12 col-md-6 pr-1">
                          <div class="form-group">
                            <label for="piececarton" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Pieces Per Carton")}}</label>
                              <div class="col-sm-10 col-md-12">
                                <input type="number" name="piececarton" class="form-control" value="{{ old('piececarton', '') }}">
                                @include('alerts.feedback', ['field' => 'piececarton'])
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-md-6 pr-1">
                          <div class="form-group">
                            <label for="warehouse" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Warehouse")}}</label>
                            <div class="col-sm-10 col-md-12">
                              <input type="text" name="warehouse" class="form-control" value="{{ old('warehouse', '') }}">
                              @include('alerts.feedback', ['field' => 'warehouse'])
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-12 col-md-6 pr-1">
                          <div class="form-group">
                            <label for="expirydate" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Expiry Date")}}</label>
                            <div class="col-sm-10 col-md-12">
                              <input type="date" name="expirydate" class="form-control" value="{{ old('expirydate', '') }}">
                              @include('alerts.feedback', ['field' => 'expirydate'])
                            </div>
                          </div>
                        </div>
                      </div>
                  </fieldset>
                </div>
                <div class="card-body col-6 ">
                  <fieldset class="col-md-12 border p-1 ">
                    <legend class="w-auto">T.P/Retail:</legend>
                    <div class="row">
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-1">
                              <div class="form-group">
                                <label for="unittradeprice" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Trade Price(Unit)")}}</label>
                                <div class="col-sm-10 col-md-12 input-group mb-1">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text rs">Rs: </span>
                                    </div>
                                    <input type="text" name="unittradeprice" class="form-control" value="{{ old('unittradeprice', '') }}">
                                    @include('alerts.feedback', ['field' => 'unittradeprice'])
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-1">
                            <div class="form-group">
                              <label for="unitcreditretail" class="col-sm-2 col-md-10 control-label">&nbsp;&nbsp;{{__(" Credit Retail Price(Unit)")}}</label>
                              <div class="col-sm-10 col-md-12 input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text rs">Rs: </span>
                                  </div>
                                  <input type="text" name="unitcreditretail" class="form-control" value="{{ old('unitcreditretail', '') }}">
                                  @include('alerts.feedback', ['field' => 'unitcreditretail'])
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-1">
                            <div class="form-group">
                              <label for="unitcashretail" class="col-sm-2 col-md-10 control-label">&nbsp;&nbsp;{{__(" Cash Retail Price(Unit)")}}</label>
                              <div class="col-sm-10 col-md-12 input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text rs">Rs: </span>
                                  </div>
                                  <input type="text" name="unitcashretail" class="form-control" value="{{ old('unitcashretail', '') }}">
                                  @include('alerts.feedback', ['field' => 'unitcashretail'])
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- <div class="vl"></div> --}}
                      <div class="col-6">
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-1">
                              <div class="form-group">
                                <label for="nonbulkunit" class="col-sm-2 col-md-10 control-label">&nbsp;&nbsp;{{__(" Non Bulk Price(unit)")}}</label>
                                <div class="col-sm-10 col-md-12 input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text rs">Rs: </span>
                                  </div>
                                    <input type="number" name="nonbulkunit" class="form-control" value="{{ old('nonbulkunit', '') }}">
                                    @include('alerts.feedback', ['field' => 'nonbulkunit'])
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-1">
                            <div class="form-group">
                              <label for="nonbulkpacket" class="col-sm-2 col-md-12 control-label">&nbsp;&nbsp;{{__(" Non Bulk Price(packet)")}}</label>
                                <div class="col-sm-10 col-md-12 input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text rs">Rs: </span>
                                  </div>
                                  <input type="number" name="nonbulkpacket" class="form-control" value="{{ old('nonbulkpacket', '') }}">
                                  @include('alerts.feedback', ['field' => 'nonbulkpacket'])
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-1">
                            <div class="form-group">
                              <label for="nonbulkcarton" class="col-sm-2 col-md-10 control-label">&nbsp;&nbsp;{{__(" Non Bulk Price(carton)")}}</label>
                                <div class="col-sm-10 col-md-12 input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text rs">Rs: </span>
                                  </div>
                                  <input type="number" name="nonbulkcarton" class="form-control" value="{{ old('nonbulkcarton', '') }}">
                                  @include('alerts.feedback', ['field' => 'nonbulkcarton'])
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                        <hr style="width:80%;text-align:right;margin-left:5">
                    <div class="row">
                      <div class="col-6">
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-1">
                              <div class="form-group">
                                <label for="packettradeprice" class="col-sm-2 col-md-10 control-label">&nbsp;&nbsp;{{__(" Trade Price(Packet)")}}</label>
                                <div class="col-sm-10 col-md-12 input-group mb-1">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text rs">Rs: </span>
                                    </div>
                                    <input type="text" name="packettradeprice" class="form-control" value="{{ old('packettradeprice', '') }}">
                                    @include('alerts.feedback', ['field' => 'packettradeprice'])
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-1">
                            <div class="form-group">
                              <label for="packetcreditretail" class="col-sm-2 col-md-12 control-label">&nbsp;&nbsp;{{__(" Credit Retail Price(Packet)")}}</label>
                              <div class="col-sm-10 col-md-12 input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text rs">Rs: </span>
                                  </div>
                                  <input type="text" name="packetcreditretail" class="form-control" value="{{ old('packetcreditretail', '') }}">
                                  @include('alerts.feedback', ['field' => 'packetcreditretail'])
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-1">
                            <div class="form-group">
                              <label for="packetcashretail" class="col-sm-2 col-md-12 control-label">&nbsp;&nbsp;{{__(" Cash Retail Price(Packet)")}}</label>
                              <div class="col-sm-10 col-md-12 input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text rs">Rs: </span>
                                  </div>
                                  <input type="text" name="packetcashretail" class="form-control" value="{{ old('packetcashretail', '') }}">
                                  @include('alerts.feedback', ['field' => 'packetcashretail'])
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-1">
                              <div class="form-group">
                                <label for="cartontradeprice" class="col-sm-2 col-md-10 control-label">&nbsp;&nbsp;{{__(" Trade Price(Carton)")}}</label>
                                <div class="col-sm-10 col-md-12 input-group mb-1">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text rs">Rs: </span>
                                    </div>
                                    <input type="text" name="cartontradeprice" class="form-control" value="{{ old('cartontradeprice', '') }}">
                                    @include('alerts.feedback', ['field' => 'cartontradeprice'])
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-1">
                            <div class="form-group">
                              <label for="cartoncreditretail" class="col-sm-2 col-md-12 control-label">&nbsp;&nbsp;{{__(" Credit Retail Price(Carton)")}}</label>
                              <div class="col-sm-10 col-md-12 input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text rs">Rs: </span>
                                  </div>
                                  <input type="text" name="cartoncreditretail" class="form-control" value="{{ old('cartoncreditretail', '') }}">
                                  @include('alerts.feedback', ['field' => 'cartoncreditretail'])
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-1">
                            <div class="form-group">
                              <label for="cartoncashretail" class="col-sm-2 col-md-10 control-label">&nbsp;&nbsp;{{__(" Cash Retail Price(Carton)")}}</label>
                              <div class="col-sm-10 col-md-12 input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text rs">Rs: </span>
                                  </div>
                                  <input type="text" name="cartoncashretail" class="form-control" value="{{ old('cartoncashretail', '') }}">
                                  @include('alerts.feedback', ['field' => 'cartoncashretail'])
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                      <hr style="width:80%;text-align:right;margin-left:5">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-2">
                            <div class="form-group">
                              <label for="state" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" State")}}</label>
                              <div class="col-sm-10 col-md-12">
                                <input type="text" name="state" class="form-control" value="{{ old('state', '') }}">
                                @include('alerts.feedback', ['field' => 'state'])
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-2">
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
                        </div>
                      </div>
                      <div class="col">
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-2">
                              <div class="">
                                <label for="p_image" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Image Upload")}}</label>
                                <div class="col-sm-10 col-md-12">
                                  <input type="file" name="p_image" id="p_image" class="form-control" onchange="loadPreview(this);">
                                  @include('alerts.feedback', ['field' => 'p_image'])
                                  {{-- <button type="button" id='newImage' class="btn btn-info field-validate form-control" data-toggle="modal" data-target="#Modalmanufactured">
                                    Upload
                                  </button> --}}
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-2">
                              <div class="form-group">
                                <div class="col-sm-10 col-md-12">  
                                    <img id="preview_img" src="{{ asset('assets') }}/img/default-avatar.png" class="thumb-image" {{-- class="image-preview" --}} width="130" height="100" {{-- style="max-width: 130px; max-height: 100px; border: none;" --}}/>
                                    {{-- <div id="selectedthumbnail" class="selectedthumbnail col-md-5">
                                    </div> --}}
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </div>
              </div>
              <div class="row">
                <div class="card-body col-12">
                  <fieldset class="col-md-12 border p-1">
                    <legend class="w-auto">Description:</legend>
                      <div class="row">
                        <div class="col-xs-12 col-md-12 pr-2">
                            <div class="form-group">
                                <label for="info" class="col-sm-2 col-md-6 control-label">&nbsp;&nbsp;{{__(" Product Info")}}</label>
                                <div class="col-sm-10 col-md-12">
                                  <textarea type="text" name="info" rows="3" class="form-control" value="{{ old('info', '') }}"></textarea>
                                  {{-- <input type="text" name="info" class="form-control" value="{{ old('info', '') }}"> --}}
                                  @include('alerts.feedback', ['field' => 'info'])
                                </div>
                            </div>
                        </div>
                      </div>
                  </fieldset>
                </div>
              </div>
                {{-- <span class="avatar avatar-sm rounded-circle">
                  <img src="{{asset('assets')}}/img/default-avatar.png" alt="" style="max-width: 80px; border-radiu: 100px">
                </span> --}}
                {{-- @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong>{{ $message }}</strong>
                  </div>
                  <img src="{{ asset('assets') }}img/{{ Session::get('p_image') }}">
                @endif --}}
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