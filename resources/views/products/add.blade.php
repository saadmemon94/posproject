@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Product',
    'activePage' => 'Add Product',
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
            <h5 class="title">{{__(" Add Product")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('product.store', ['product' => 1,]) }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @method('post')
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
                              <label for="name" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Product Name")}}</label>
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
                              <label for="unit" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Product Unit")}}</label>
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
                                <label for="piecetradeprice" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Trade Price(Piece)")}}</label>
                                <div class="col-sm-10 col-md-12 input-group mb-1">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text rs">Rs: </span>
                                    </div>
                                    <input type="text" name="piecetradeprice" class="form-control" value="{{ old('piecetradeprice', '') }}">
                                    @include('alerts.feedback', ['field' => 'piecetradeprice'])
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-1">
                            <div class="form-group">
                              <label for="piececreditretail" class="col-sm-2 col-md-10 control-label">&nbsp;&nbsp;{{__(" Credit Retail Price(Piece)")}}</label>
                              <div class="col-sm-10 col-md-12 input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text rs">Rs: </span>
                                  </div>
                                  <input type="text" name="piececreditretail" class="form-control" value="{{ old('piececreditretail', '') }}">
                                  @include('alerts.feedback', ['field' => 'piececreditretail'])
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-md-12 pr-1">
                            <div class="form-group">
                              <label for="piececashretail" class="col-sm-2 col-md-10 control-label">&nbsp;&nbsp;{{__(" Cash Retail Price(Piece)")}}</label>
                              <div class="col-sm-10 col-md-12 input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text rs">Rs: </span>
                                  </div>
                                  <input type="text" name="piececashretail" class="form-control" value="{{ old('piececashretail', '') }}">
                                  @include('alerts.feedback', ['field' => 'piececashretail'])
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
                                <label for="nonbulkpiece" class="col-sm-2 col-md-10 control-label">&nbsp;&nbsp;{{__(" Non Bulk Price(Piece)")}}</label>
                                <div class="col-sm-10 col-md-12 input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text rs">Rs: </span>
                                  </div>
                                    <input type="number" name="nonbulkpiece" class="form-control" value="{{ old('nonbulkpiece', '') }}">
                                    @include('alerts.feedback', ['field' => 'nonbulkpiece'])
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
                                <label for="info" class="col-sm-2 col-md-6 control-label">&nbsp;&nbsp;{{__(" Product Description")}}</label>
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
              <br>
              {{-- <div class="row">
                <div class="card-body col-6">
                  <fieldset class="col-md-12 border p-1">
                    <legend class="w-auto">Image:</legend>
                      <div class="row">
                        <div class="col-xs-12 col-md-6 pr-2">
                            <div class="form-group">
                              <label for="p_image" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Image Upload")}}</label>
                              <div class="col-sm-10 col-md-12">
                                <input type="file" name="p_image" id="p_image" class="form-control" onchange="loadPreview(this);">
                                @include('alerts.feedback', ['field' => 'p_image'])
                                <div id="imageselected">
                                  <div class="row">
                                    <div class="col-sm-10 col-md-6">
                                      <button type="button" id='newImage' class="btn btn-info field-validate" data-toggle="modal" data-target="#Modalmanufactured">
                                        Upload
                                      </button>
                                    </div>
                                    <div class="col-sm-10 col-md-6">
                                    <img id="preview_img" src="{{ asset('assets') }}/img/default-avatar.png" class="" width="100" height="75"/>
                                    </div>
                                  </div>
                                  <br>
                                  <div id="selectedthumbnail" class="selectedthumbnail col-md-5">
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                  </fieldset>
                </div>
                <div class="card-body col-6">
                  <fieldset class="col-md-12 border p-1">
                    <legend class="w-auto">Status:</legend>
                    <div class="row">
                      <div class="col-xs-12 col-md-6 pr-2">
                        <div class="form-group">
                          <label for="status" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Status")}}</label>
                          <div class="col-sm-10 col-md-12">
                            <input type="text" name="status" class="form-control" value="{{ old('status', '') }}">
                            @include('alerts.feedback', ['field' => 'status'])
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-md-6 pr-2">
                        <div class="form-group">
                          <label for="status" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Active/Inactive")}}</label>
                          <div class="col-sm-10 col-md-12">
                            <select name="status_id" class="form-control">
                              <option value="0">Active</option>
                              <option value="1">Inactive</option>
                            </select>
                            <input type="text" name="status_id" class="form-control" value="{{ old('status', '') }}">
                            @include('alerts.feedback', ['field' => 'status_id'])
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </div>
              </div> --}}
              <!-- Modal -->
              {{-- <div class="modal fade" id="Modalmanufactured" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-info" id="myModalLabel">Choose Image</h3>
                        <button type="button" class="close" data-dismiss="modal" id="closemodal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body manufacturer-image-embed">
                        @if(isset($allimage))
                        <select class="image-picker show-html " name="image_id" id="select_img">
                            <option value=""></option>
                            @foreach($allimage as $key=>$image)
                            <option data-img-src="{{asset($image->path)}}" class="imagedetail" data-img-alt="{{$key}}" value="{{$image->id}}"> {{$image->id}} </option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                    <div class="modal-footer">

                        <a href="{{url('admin/media/add')}}" target="_blank" class="btn btn-info pull-left">Add Image</a>
                        <button type="button" class="btn btn-default refresh-image"><i class="fa fa-refresh"></i></button>
                        <button type="button" class="btn btn-info" id="selected" data-dismiss="modal">Done</button>
                    </div>
                  </div>
                </div>
              </div> --}}
                {{-- <div class="row">
                  <div class="col-xs-12 col-md-12 pr-2">
                      <div class="form-group">
                        <label for="image" class="col-sm-2 col-md-6 control-label">&nbsp;&nbsp;{{__(" Image")}}</label>
                        <div class="col-sm-10 col-md-12">
                          <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#myModal">AddNew</button>
                          <!-- Main row -->
                          <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add File Here</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Click or Drop Images in the Box for Upload.</p>
                                        <form action="{{ url('admin/media/uploadimage') }}" files="true" enctype="multipart/form-data" class="dropzone" id="my-dropzone">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" disabled="disabled" id="compelete"
                                            data-dismiss="modal">Done</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div> --}}
                
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