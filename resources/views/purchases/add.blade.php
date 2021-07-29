@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Purchase',
    'activePage' => 'Add Purchase',
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
            <h5 class="title">{{__(" Add Purchase")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('purchase.store', ['purchase' => 1,]) }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @method('post')
              @include('alerts.success')
                <div class="row">
                </div>
                <div class="row">
                  <div class="card-body col-12 ">
                    <fieldset class="col-md-12 border p-1 ">
                      <legend class="w-auto">Purchase:</legend>
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
                                    <label for="barcode" class="col-sm-2 col-md-10 control-label">&nbsp;&nbsp;{{__(" Barcode")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <input type="text" name="barcode" class="form-control" value="{{ old('barcode', '') }}">
                                      @include('alerts.feedback', ['field' => 'barcode'])
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="type" class="col-sm-2 col-md-10 control-label">&nbsp;&nbsp;{{__(" Product Name")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <select name="type" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select Product...">
                                            <option value="soap101">Soap 101</option>
                                            <option value="lifebuoy">Lifebuoy</option>
                                      </select>
                                      @include('alerts.feedback', ['field' => 'type'])
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
                                    <label for="status" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Purchase Status")}}</label>
                                      <div class="col-sm-10 col-md-12">
                                        <select name="status" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Status">
                                          <option value="pending">Pending</option>
                                          <option value="completed">Completed</option>
                                          <!-- received,partial,pending,ordered -->
                                        </select>
                                        @include('alerts.feedback', ['field' => 'status'])
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="free_piece" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Free Piece")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <input type="text" name="free_piece" class="form-control" value="{{ old('free_piece', '') }}">
                                      @include('alerts.feedback', ['field' => 'free_piece'])
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="total_price" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Total Price")}}</label>
                                    <div class="col-sm-10 col-md-12 input-group mb-1">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rs">Rs: </span>
                                      </div>
                                      <input type="number" name="total_price" class="form-control" value="{{ old('total_price', '') }}">
                                      @include('alerts.feedback', ['field' => 'total_price'])
                                    </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-md-6 pr-1">
                                  <div class="form-group">
                                    <label for="discount" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Discount")}}</label>
                                      <div class="col-sm-10 col-md-12 input-group mb-1">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text rs"></span>
                                        </div>
                                        <input type="number" name="discount" class="form-control" value="{{ old('discount', '') }}">
                                        @include('alerts.feedback', ['field' => 'discount'])
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="add_amount" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Add Amount")}}</label>
                                    <div class="col-sm-10 col-md-12 input-group mb-1">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rs">Rs: </span>
                                      </div>
                                      <input type="number" name="add_amount" class="form-control" value="{{ old('add_amount', '') }}">
                                      @include('alerts.feedback', ['field' => 'add_amount'])
                                    </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-md-6 pr-1">
                                  <div class="form-group">
                                    <label for="grandtotal_price" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Grandtotal Price")}}</label>
                                      <div class="col-sm-10 col-md-12 input-group mb-1">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text rs">Rs: </span>
                                        </div>
                                        <input type="number" name="grandtotal_price" class="form-control" value="{{ old('grandtotal_price', '') }}">
                                        @include('alerts.feedback', ['field' => 'grandtotal_price'])
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="amountpaid" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Amount Paid")}}</label>
                                    <div class="col-sm-10 col-md-12 input-group mb-1">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rs">Rs: </span>
                                      </div>
                                      <input type="number" name="amountpaid" class="form-control" value="{{ old('amountpaid', '') }}">
                                      @include('alerts.feedback', ['field' => 'amountpaid'])
                                    </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-md-6 pr-1">
                                  <div class="form-group">
                                    <label for="amountdues" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Amount Dues")}}</label>
                                      <div class="col-sm-10 col-md-12 input-group mb-1">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text rs">Rs: </span>
                                        </div>
                                        <input type="number" name="amountdues" class="form-control" value="{{ old('amountdues', '') }}">
                                        @include('alerts.feedback', ['field' => 'amountdues'])
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="paytermduration" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Payterm Duration")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <input type="number" name="paytermduration" class="form-control" value="{{ old('paytermduration', '') }}">
                                      @include('alerts.feedback', ['field' => 'paytermduration'])
                                    </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-md-6 pr-1">
                                  <div class="form-group">
                                    <label for="paytermtype" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Payterm Type")}}</label>
                                      <div class="col-sm-10 col-md-12">
                                        <select name="paytermtype" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Payterm Type">
                                          <option value="days">Days</option>
                                          <option value="months">Months</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'paytermtype'])
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="date" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Date")}}</label>
                                    <div class="col-sm-10 col-md-12 input-group mb-1">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text rs"></span>
                                      </div>
                                      <input type="date" name="date" class="form-control" value="{{ old('date', '') }}">
                                      @include('alerts.feedback', ['field' => 'date'])
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="row">
                              <div class="col-xs-12 col-md-12 pr-1">
                                <div class="form-group">
                                  <label for="payment_method" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Payment Method")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <input type="text" name="payment_method" class="form-control" value="{{ old('payment_method', '') }}">
                                      @include('alerts.feedback', ['field' => 'payment_method'])
                                    </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-md-12 pr-1">
                                  <div class="form-group">
                                    <label for="payment_status" class="col-sm-2 col-md-6 control-label">&nbsp;&nbsp;{{__(" Payment Status")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <input type="text" name="payment_status" class="form-control" value="{{ old('payment_status', '') }}">
                                      <!-- paid,due,partial,overdue -->
                                      @include('alerts.feedback', ['field' => 'payment_status'])
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="invoice_id" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Invoice Id")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <input type="text" name="invoice_id" class="form-control" value="{{ old('invoice_id', '') }}">
                                      @include('alerts.feedback', ['field' => 'invoice_id'])
                                    </div>
                                </div>
                              </div>
                              <div class="col-xs-12 col-md-6 pr-1">
                                <div class="form-group">
                                  <label for="invoice_date" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Invoice Date")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <input type="date" name="invoice_date" class="form-control" value="{{ old('invoice_date', '') }}">
                                      @include('alerts.feedback', ['field' => 'invoice_date'])
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-md-12 pr-2">
                                  <div class="">
                                    <label for="document" class="col-sm-2 col-md-8 control-label">&nbsp;&nbsp;{{__(" Document")}}</label>
                                    <div class="col-sm-10 col-md-12">
                                      <input type="file" name="document" id="document" class="form-control" value="{{ old('document', '') }}">
                                      @include('alerts.feedback', ['field' => 'document'])
                                    </div>
                                  </div>
                                  <div class="form-group">
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-12 pr-2">
                                    <div class="form-group">
                                        <label for="date" class="col-sm-2 col-md-6 control-label">&nbsp;&nbsp;{{__(" Purchase Note")}}</label>
                                        <div class="col-sm-10 col-md-12">
                                            <textarea type="text" name="note" rows="3" class="form-control" value="{{ old('note', '') }}"></textarea>
                                            {{-- <input type="text" name="note" class="form-control" value="{{ old('note', '') }}"> --}}
                                            @include('alerts.feedback', ['field' => 'date'])
                                        </div>
                                    </div>
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
