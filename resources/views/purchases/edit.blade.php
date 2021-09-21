@extends('dashboard.base')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __(' Edit Purchase') }}</h5>
                            <div class="col-12">
                                @if (Session::has('message'))
                                    <div class="alert alert-success alert-block alert-dismissible fade show w-100 ml-auto"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">×</button>
                                        <strong>{{ Session::get('message') }}</strong>
                                    </div>
                                @elseif(Session::has('error'))
                                    <div class="alert alert-danger alert-block alert-dismissible fade show w-100 ml-auto"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">×</button>
                                        <strong>{{ Session::get('error') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body-custom">
                            <form id="purchase_update" method="post"
                                action="{{ route('purchase.update', ['purchase' => $purchase->purchase_id]) }}"
                                autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                @include('alerts.success')
                                @if ($errors->any())
                                    <div class="form-group">
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li> {{ $error }} </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="card-body-custom col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    {{-- <div class="form-first-col-3">
                          <div class="form-group">
                            <label for="supplier_code" class="form-col-10 control-label">&nbsp;&nbsp;{{__(" Search Supplier")}}</label>
                            <div class="form-col-12 input-group ">
                              <div class="input-group-prepend">
                                <span class="input-group-text barcode">
                                  <a class="" data-toggle="modal" data-target="#supplier-list" id="product-list-btn"><i class="fa fa-search"></i></a>
                                </span>
                              </div>
                              <-- <div class="input-group pos"> -->
                                <input disabled type="text" name="supplier_code" id="suppliercodesearch" placeholder="Search supplier by code" class="form-control col-12" value="{{ old('supplier_code') }}" />
                                  <?php
                                  $snameArray = [];
                                  $snamecodeArray = [];
                                  ?>
                                  @foreach ($suppliers as $one_supplier) 
                                    <div class="suppliernames_array" style="display: none">{{ $snameArray[] = $one_supplier->supplier_name }}</div>
                                    <div class="suppliernamecode_array" style="display: none">{{ $snamecodeArray[] = $one_supplier->supplier_name.", ".($one_supplier->supplier_ref_no) }}</div>
                                  @endforeach
                                <-- <select required name="supplier_code" id="supplier_code" class="selectpicker form-control col-12" data-live-search="true" data-live-search-style="begins" title="Select supplier..." style="width: 100px">
                                  @foreach ($lims_supplier_list as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                  @endforeach
                                  <option value="0">Asif Ghafoor</option>
                                </select> -->
                              <-- </div> -->
                              @include('alerts.feedback', ['field' => 'supplier_code'])
                            </div>
                          </div>
                        </div> --}}
                                                    <div class="form-first-col-4">
                                                        <div class="form-group">
                                                            <label readonly for="purchase_supplier_name"
                                                                class="form-col-10 control-label">&nbsp;&nbsp;{{ __(' Supplier Name') }}</label>
                                                            <div class="form-col-12 input-group ">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text barcode">
                                                                        <a class="" data-toggle=" modal"
                                                                            data-target="#supplier-list"
                                                                            id="product-list-btn"><i
                                                                                class="fa fa-user"></i></a>
                                                                    </span>
                                                                </div>
                                                                {{-- <div class="input-group pos"> --}}
                                                                <input readonly type="text" name="purchase_supplier_name"
                                                                    id="supplier_name" placeholder="Supplier Name"
                                                                    class="form-control col-12"
                                                                    value="{{ $supplier->supplier_name }}" />
                                                                <input readonly type="hidden" name="purchase_supplier_id"
                                                                    id="supplier_id" class="form-control col-12"
                                                                    value="{{ $supplier->supplier_id }}" />
                                                                <input disabled type="hidden" name="supplier_code"
                                                                    id="suppliercodesearch"
                                                                    placeholder="Search supplier by code"
                                                                    class="form-control col-12"
                                                                    value="{{ old('supplier_code') }}" />
                                                                <?php
                                                                $snameArray = [];
                                                                $snamecodeArray = [];
                                                                ?>
                                                                @foreach ($suppliers as $one_supplier)
                                                                    <div class="suppliernames_array" style="display: none">
                                                                        {{ $snameArray[] = $one_supplier->supplier_name }}
                                                                    </div>
                                                                    <div class="suppliernamecode_array"
                                                                        style="display: none">
                                                                        {{ $snamecodeArray[] = $one_supplier->supplier_name . ', ' . $one_supplier->supplier_ref_no }}
                                                                    </div>
                                                                @endforeach
                                                                {{-- <select readonly required name="purchase_supplier_name" id="supplier_name" class="selectpicker form-control col-12" data-live-search="true" data-live-search-style="begins" title="Select Supplier..." style="width: 150px">
                                                                  @foreach ($suppliers as $single_supplier)
                                                                    <option @if ($purchase->purchase_supplier_id == $single_supplier->supplier_id) selected @endif status_id="{{$single_supplier->status_id}}" value="{{$single_supplier->supplier_id}}">{{$single_supplier->supplier_name}}</option>
                                                                    ?php if($purchase->purchase_supplier_id == $single_supplier->supplier_id) $supplierstatus = $single_supplier->status_id; ?>
                                                                  @endforeach
                                                                </select> --}}
                                                                {{-- </div> --}}
                                                                @include('alerts.feedback', ['field' =>
                                                                'purchase_supplier_name'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-col-1">
                                                        <div class="form-group">
                                                            <label for="supplier_status"
                                                                class="form-col-12 control-label">&nbsp;&nbsp;{{ __(' Supplier Status') }}</label>
                                                            <div class="form-col-12">
                                                                <input readonly type="text" name="supplier_status"
                                                                    id="supplier_status" class="form-control col-12"
                                                                    value="@if ($supplier->status_id == 1) Active @else Inactive @endif">
                                                                @include('alerts.feedback', ['field' => 'supplier_status'])
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <div class="form-col-2">
                                                        <div class="form-group">
                                                            <label for="purchase_amount_paid"
                                                                class="form-col-12 control-label">&nbsp;&nbsp;{{ __(' Purchase Paid') }}</label>
                                                            <div class="form-col-12 input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text rs">Rs: </span>
                                                                </div>
                                                                <input readonly type="number" name="purchase_amount_paid"
                                                                    id="purchase_balance_paid" class="form-control"
                                                                    value="{{ $purchase->purchase_amount_paid }}">
                                                                @include('alerts.feedback', ['field' =>
                                                                'purchase_amount_paid'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-col-2">
                                                        <div class="form-group">
                                                            <label for="purchase_amount_dues"
                                                                class="form-col-12 control-label">&nbsp;&nbsp;{{ __(' Purchase Dues') }}</label>
                                                            <div class="form-col-12 input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text rs">Rs: </span>
                                                                </div>
                                                                <input readonly type="number" name="purchase_amount_dues"
                                                                    id="purchase_balance_dues" class="form-control"
                                                                    value="{{ $purchase->purchase_amount_dues }}">
                                                                @include('alerts.feedback', ['field' =>
                                                                'purchase_amount_dues'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-col-2">
                                                        <div class="form-group">
                                                            <label for="supplier_balance_paid"
                                                                class="form-col-12 control-label">&nbsp;&nbsp;{{ __(' Supplier Paid') }}</label>
                                                            <div class="form-col-12 input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text rs">Rs: </span>
                                                                </div>
                                                                <input readonly type="number" name="supplier_balance_paid"
                                                                    id="supplier_balance_paid" class="form-control"
                                                                    value="{{ $supplier->supplier_balance_paid }}">
                                                                @include('alerts.feedback', ['field' =>
                                                                'supplier_balance_paid'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-last-col-2">
                                                        <div class="form-group">
                                                            <label for="supplier_balance_dues"
                                                                class="form-col-12 control-label">&nbsp;&nbsp;{{ __(' Supplier Dues') }}</label>
                                                            <div class="form-col-12 input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text rs">Rs: </span>
                                                                </div>
                                                                <input readonly type="number" name="supplier_balance_dues"
                                                                    id="supplier_balance_dues" class="form-control"
                                                                    value="{{ $supplier->supplier_balance_dues }}">
                                                                @include('alerts.feedback', ['field' =>
                                                                'supplier_balance_dues'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-last-col-2">
                                                        <div class="form-group">
                                                            <label for="purchase_status"
                                                                class="form-col-12 control-label">&nbsp;&nbsp;{{ __(' Purchase Status') }}</label>
                                                            <select name="purchase_status"
                                                                class="selectpicker form-control col-12"
                                                                data-live-search="true" data-live-search-style="begins"
                                                                title="Purchase Status">
                                                                <option @if ($purchase->purchase_status == 'pending') selected @endif value="pending">
                                                                    Pending</option>
                                                                <option @if ($purchase->purchase_status == 'ordered') selected @endif value="ordered">
                                                                    Ordered</option>
                                                                <option @if ($purchase->purchase_status == 'partial') selected @endif value="partial">
                                                                    Partial</option>
                                                                <option @if ($purchase->purchase_status == 'received') selected @endif value="received">
                                                                    Received</option>
                                                            </select>
                                                            @include('alerts.feedback', ['field' => 'purchase_amount_dues'])
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <div class="row">
                                                    <div class="form-first-col-2">
                                                        <div class="form-group">
                                                            <label for="purchase_payment_method"
                                                                class="form-col-12 control-label">&nbsp;&nbsp;{{ __(' Payment Method') }}</label>
                                                            <div class="form-col-12">
                                                                {{-- <input readonly type="text" name="purchase_payment_method" class="form-control col-12" value="{{ old('purchase_payment_method', 'Cash') }}"> --}}
                                                                <select readonly required id="purchase_payment_method"
                                                                    name="purchase_payment_method"
                                                                    class="selectpicker form-control col-12"
                                                                    data-live-search="true" data-live-search-style="begins"
                                                                    title="Select Payment Method...">
                                                                    <option @if ($purchase->purchase_payment_method == 'cash') selected @endif value="cash">
                                                                        Cash</option>
                                                                    <option @if ($purchase->purchase_payment_method == 'credit') selected @endif value="credit">Credit
                                                                    </option>
                                                                </select>
                                                                @include('alerts.feedback', ['field' =>
                                                                'purchase_payment_method'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-col-3">
                                                        <div class="form-group">
                                                            <label for="purchase_invoice_id"
                                                                class="form-col-12 control-label">&nbsp;&nbsp;{{ __(' Purchase Invoice ID') }}</label>
                                                            <div class="form-col-12">
                                                                {{-- <div class="myrow"> --}}
                                                                {{-- <div class="col-1"></div> --}}
                                                                <input readonly type="text" name="purchase_invoice_id"
                                                                    class="form-control"
                                                                    value="{{ $purchase->purchase_invoice_id }}">
                                                                {{-- <button type="button"
                                                                        href="{{ route('purchase.edit', ['purchase' => 1]) }}"
                                                                        class="btn btn-sm btn-warning btn-icon form-col-2"
                                                                        title="Re-Open">
                                                                        <i class="fa fa-file-text-o"></i>
                                                                    </button> --}}
                                                                {{-- </div> --}}
                                                                @include('alerts.feedback', ['field' =>
                                                                'purchase_invoice_id'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-col-3">
                                                        <div class="form-group">
                                                            <label for="purchase_invoice_date"
                                                                class="form-col-12 control-label">&nbsp;&nbsp;{{ __(' Purchase Date') }}</label>
                                                            <div class="form-col-12 input-group ">
                                                                {{-- <div class="input-group-prepend">
                                <span class="input-group-text barcode"><i class="fa fa-file-text-o"></i></span>
                              </div> --}}
                                                                <input readonly type="date" name="purchase_invoice_date"
                                                                    class="form-control"
                                                                    value="{{ $purchase->purchase_invoice_date }}">
                                                                @include('alerts.feedback', ['field' =>
                                                                'purchase_invoice_date'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-last-col-4">
                                                        <div class="form-group">
                                                            <label for="purchse_document"
                                                                class="form-col-10 control-label">&nbsp;&nbsp;{{ __(' Upload Document') }}</label>
                                                            <div class="form-col-12 input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text barcode">
                                                                        <i class="fa fa-file-text-o"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="file" name="purchase_document"
                                                                    id="purchase_document" class="form-control col-12"
                                                                    value="{{ $purchase->purchase_document }}">
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $mytotal_items = 0;
                                        $mytotal_quantity = 0;
                                        ?>
                                        <div class="row">
                                            <div class=" col-12 ">
                                                <div class="form-group">
                                                    <div class=" col-12">
                                                        <div class="table-responsive" style="overflow-x:hidden">
                                                            <table id="myTable"
                                                                class="table table-hover table-striped table-fixed order-list">
                                                                <thead class="thead-dark"
                                                                    style="position: sticky; top: 0; z-index: 1">
                                                                    <tr class="row">
                                                                        <th class="col-2 firstcol" scope="col">Barcode</th>
                                                                        <th class="col-3 mycol" scope="col">Product</th>
                                                                        <th class="col-1 mycol" scope="col">Pcs</th>
                                                                        <th class="col-1 mycol" scope="col">Pkts</th>
                                                                        <th class="col-1 mycol" scope="col">Crtns</th>
                                                                        <th class="col-1 mycol" scope="col">Price</th>
                                                                        <th class="col-1 mycol" scope="col">Discount
                                                                        </th>
                                                                        <th class="col-1 mycol" scope="col">Total</th>
                                                                        <th class="col-1 lastcol" scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="purchase-product">
                                                                    <?php
                                                                    $i = 1;
                                                                    $j = 1;
                                                                    $mytotal_quantity = 0;
                                                                    $mytotal_discount = 0;
                                                                    $mysubtotal_amount = 0;
                                                                    $mygrandtotal_amount = 0;
                                                                    ?>
                                                                    @foreach ($purchaseproducts as $singlepurchaseproduct)
                                                                        <?php
                                                                        $myproduct_quantity = $singlepurchaseproduct->purchase_quantity_total;
                                                                        $myproduct_discount = $singlepurchaseproduct->purchase_trade_discount;
                                                                        $myproduct_unit_price = $singlepurchaseproduct->purchase_trade_price_piece;
                                                                        
                                                                        $mytotal_items = $j;
                                                                        $mytotal_quantity = $mytotal_quantity + $myproduct_quantity;
                                                                        $mytotal_discount = $mytotal_discount + $myproduct_discount;
                                                                        
                                                                        $myproduct_sub_total = $singlepurchaseproduct->purchase_product_sub_total;
                                                                        $mysubtotal_amount = $mysubtotal_amount + $myproduct_sub_total;
                                                                        $mygrandtotal_amount = $mysubtotal_amount + $purchase->purchase_free_amount + $purchase->purchase_add_amount;
                                                                        $j++;
                                                                        ?>
                                                                    @endforeach
                                                                    @foreach ($purchaseproducts as $oneselectedproduct)
                                                                        <tr class="row prtr">
                                                                            <td class="col-2 firstcol" scope="col">
                                                                                <input readonly type="text"
                                                                                    name="purchase_products_barcode[]"
                                                                                    id="purchase_products_barcode{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    placeholder="Scan/Search barcode"
                                                                                    value="{{ $oneselectedproduct->purchase_product_barcode }}">
                                                                            </td>
                                                                            <td class="col-3 mycol" scope="col">
                                                                                <input readonly type="text"
                                                                                    name="product_name[]"
                                                                                    id="product_name{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    placeholder="Search product by name/code"
                                                                                    value="{{ $oneselectedproduct->purchase_product_name }}">
                                                                                <input readonly type="hidden"
                                                                                    name="product_code[]"
                                                                                    id="product_code{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchase_product_ref_no }}">
                                                                                <input readonly type="hidden"
                                                                                    name="product_id[]"
                                                                                    id="product_id{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->product_id }}">
                                                                            </td>
                                                                            <td class="col-1 mycol" scope="col">
                                                                                <input readonly type="number"
                                                                                    name="purchase_products_pieces[]"
                                                                                    id="purchase_products_pieces{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchase_pieces_number }}">
                                                                                <input readonly type="hidden"
                                                                                    name="purchase_pieces_per_packet[]"
                                                                                    id="purchase_pieces_per_packet{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchase_piece_per_packet }}">
                                                                            </td>
                                                                            <td class="col-1 mycol" scope="col">
                                                                                <input readonly type="number"
                                                                                    name="purchase_products_packets[]"
                                                                                    id="purchase_products_packets{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchase_packets_number }}">
                                                                                <input readonly type="hidden"
                                                                                    name="purchase_packets_per_carton[]"
                                                                                    id="purchase_packets_per_carton{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchase_packet_per_carton }}">
                                                                            </td>
                                                                            <td class="col-1 mycol" scope="col">
                                                                                <input readonly type="number"
                                                                                    name="purchase_products_cartons[]"
                                                                                    id="purchase_products_cartons{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchase_cartons_number }}">
                                                                                <input readonly type="hidden"
                                                                                    name="purchase_pieces_per_carton[]"
                                                                                    id="purchase_pieces_per_carton{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchase_piece_per_carton }}">
                                                                            </td>
                                                                            <td class="col-1 mycol" scope="col">
                                                                                <input readonly type="number"
                                                                                    name="purchase_products_unit_price[]"
                                                                                    id="purchase_products_unit_price{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchase_trade_price_piece }}">
                                                                            </td>
                                                                            <td class="col-1 mycol" scope="col">
                                                                                <input readonly type="number"
                                                                                    name="purchase_products_discount[]"
                                                                                    id="purchase_products_discount{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchase_trade_discount }}">
                                                                            </td>
                                                                            <td class="col-1 mycol" scope="col">
                                                                                <input readonly type="number"
                                                                                    name="purchase_products_sub_total[]"
                                                                                    id="purchase_products_sub_total{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchase_product_sub_total }}">
                                                                            </td>
                                                                            <td class="col-1 lastcol" align="center">
                                                                                <button type="button" rel="tooltip"
                                                                                    class="btn btn-danger btn-icon btn-sm delete-productfield"
                                                                                    id="delete-productfield{{ $i }}"
                                                                                    row-id="{{ $i }}"
                                                                                    data-original-title="X" title="X"><i
                                                                                        class="fa fa-times"></i></button>
                                                                            </td>
                                                                        </tr>
                                                                        <?php $i++; ?>
                                                                    @endforeach
                                                                    <tr class="row table-info">
                                                                        <td class="col-2 firstcol" scope="col">
                                                                            <input type="text"
                                                                                name="purchase_products_barcode_i"
                                                                                id="purchase_products_barcode_i"
                                                                                class=" form-control
                                                                                form-col-12 "
                                                                                placeholder="Barcode Search/Scan"
                                                                                value="{{ old('purchase_products_barcode_i', '') }}">
                                                                        </td>
                                                                        <td class="col-3 mycol" scope="col">
                                                                            <div class="col-12 mytblcol input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text barcode">
                                                                                        <a class="" data-toggle=" modal"
                                                                                            data-target="#product-list"
                                                                                            id="product-list-btn"><i
                                                                                                class="fa fa-barcode"></i></a>
                                                                                    </span>
                                                                                </div>
                                                                                <input type="text" name="product_name_i"
                                                                                    id="product_name_i"
                                                                                    class="form-control form-col-12"
                                                                                    placeholder="Product search by name/code"
                                                                                    value="{{ old('product_name_i', '') }}">
                                                                                <input type="hidden" name="product_code_i"
                                                                                    id="product_code_i"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ old('product_code_i', '') }}">
                                                                                <input type="hidden" name="product_id_i"
                                                                                    id="product_id_i"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ old('product_id_i', '') }}">
                                                                                {{-- <select placeholder="Scan/Search product by name/code" name="product_code_name" id="product_code_name" class="form-control select2-single col-10">
                                        select2-single
                                        c-multi-select
                                        js-example-basic-single my-class
                                        <option class="" value="">Scan/Search product by name/code</option>
                                        @foreach ($products as $one_product)
                                          <option class="" value="{{ $one_product->product_id }}">{{ $one_product->product_name }}</option>
                                        @endforeach
                                      </select> --}}
                                                                            </div>
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input type="number"
                                                                                name="purchase_products_pieces_i" min="0"
                                                                                id="purchase_products_pieces_i"
                                                                                class="form-control form-col-12" min="0"
                                                                                value="{{ old('purchase_products_pieces_i', '0') }}">
                                                                            <input type="hidden"
                                                                                name="purchase_pieces_per_packet_i" min="0"
                                                                                id="purchase_pieces_per_packet_i"
                                                                                class="form-control form-col-12" min="0"
                                                                                value="{{ old('purchase_pieces_per_packet_i', '5') }}">
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input type="number"
                                                                                name="purchase_products_packets_i" min="0"
                                                                                id="purchase_products_packets_i"
                                                                                class="form-control form-col-12" min="0"
                                                                                value="{{ old('purchase_products_packets_i', '0') }}">
                                                                            <input type="hidden"
                                                                                name="purchase_packets_per_carton_i" min="0"
                                                                                id="purchase_packets_per_carton_i"
                                                                                class="form-control form-col-12" min="0"
                                                                                value="{{ old('purchase_packets_per_carton_i', '4') }}">
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input type="number"
                                                                                name="purchase_products_cartons_i" min="0"
                                                                                id="purchase_products_cartons_i"
                                                                                class="form-control form-col-12" min="0"
                                                                                value="{{ old('purchase_products_cartons_i', '0') }}">
                                                                            <input type="hidden"
                                                                                name="purchase_pieces_per_carton_i" min="0"
                                                                                id="purchase_pieces_per_carton_i"
                                                                                class="form-control form-col-12" min="0"
                                                                                value="{{ old('purchase_pieces_per_carton_i', '20') }}">
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="purchase_products_unit_price_i"
                                                                                min="0" id="purchase_products_unit_price_i"
                                                                                class="form-control form-col-12"
                                                                                value="{{ old('purchase_products_unit_price_i', '0') }}">
                                                                            <input type="hidden"
                                                                                name="purchase_products_packet_price_i"
                                                                                id="purchase_products_packet_price_i"
                                                                                class="form-control col-12" min="0"
                                                                                value="{{ old('purchase_products_packet_price_i', '0') }}">
                                                                            <input type="hidden"
                                                                                name="purchase_products_carton_price_i"
                                                                                id="purchase_products_carton_price_i"
                                                                                class="form-control col-12" min="0"
                                                                                value="{{ old('purchase_products_carton_price_i', '0') }}">
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input type="number"
                                                                                name="purchase_products_discount_i" min="0"
                                                                                id="purchase_products_discount_i"
                                                                                class="form-control form-col-12"
                                                                                value="{{ old('purchase_products_discount_i', '0') }}">
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="purchase_products_sub_total_i" min="0"
                                                                                id="purchase_products_sub_total_i"
                                                                                class="form-control form-col-12"
                                                                                value="{{ old('purchase_products_sub_total_i', '0') }}">
                                                                        </td>
                                                                        <td class="col-1 lastcol" scope="col">
                                                                            {{-- <button id="add_button" type="button" class="btn btn-info btn-round pull-right">{{__('Add')}}</button> --}}
                                                                            <button id="add_button" type="button"
                                                                                rel="tooltip"
                                                                                class="btn btn-info btn-round pull-right "
                                                                                data-original-title="+" title="+"><i
                                                                                    class="fa fa-plus"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class=" col-12 ">
                                                <div class="form-group">
                                                    <div class=" col-12">
                                                        <div class="table-responsive-custom">
                                                            <table id="myTable2"
                                                                class="table table-hover table-fixed table-bordered">
                                                                <thead class="thead-dark">
                                                                    <tr class="row thead-dark-custom">
                                                                        <th colspan="1" class="col-1 firstcol" scope="col">
                                                                            Items</th>
                                                                        <th colspan="1" class="col-1 mycol" scope="col">
                                                                            Total Qty</th>
                                                                        <th colspan="2" class="col-2 mycol" scope="col">
                                                                            Free
                                                                            Pcs / Free Amount</th>
                                                                        {{-- <th class="col-1 mycol" scope="col">Free Amount</th> --}}
                                                                        <th colspan="1" class="col-2 mycol" scope="col">
                                                                            Total</th>
                                                                        <th colspan="1" class="col-1 mycol" scope="col">
                                                                            Add
                                                                        </th>
                                                                        <th colspan="1" class="col-1 mycol" scope="col">
                                                                            Discount</th>
                                                                        <th colspan="1" class="col-2 mycol" scope="col">
                                                                            Grand Total</th>
                                                                        <th colspan="1" class="col-2 lastcol" scope="col">
                                                                            Received Amount</th>
                                                                    </tr>
                                                                    <tr class="row table-info">
                                                                        <td class="col-1 firstcol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="purchase_total_items"
                                                                                id="purchase_total_items"
                                                                                class="form-control form-col-12"
                                                                                value="{{ $mytotal_items }}">
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="purchase_total_qty"
                                                                                id="purchase_total_qty"
                                                                                class="form-control form-col-12"
                                                                                value="{{ $mytotal_quantity }}">
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input type="number" name="purchase_free_piece"
                                                                                id="purchase_free_piece"
                                                                                class="form-control form-col-12"
                                                                                value="{{ $purchase->purchase_free_piece }}">
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input type="number" name="purchase_free_amount"
                                                                                id="purchase_free_amount_i"
                                                                                class="form-control form-col-12"
                                                                                value="{{ $purchase->purchase_free_amount }}">
                                                                        </td>
                                                                        <td class="col-2 mycol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="purchase_total_price"
                                                                                id="purchase_total_price"
                                                                                class="form-control form-col-12"
                                                                                value="{{ $mysubtotal_amount }}">
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input type="number" name="purchase_add_amount"
                                                                                id="purchase_add_amount_i"
                                                                                class="form-control form-col-12"
                                                                                value="{{ $purchase->purchase_add_amount }}">
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="purchase_discount"
                                                                                id="purchase_discount"
                                                                                class="form-control form-col-12"
                                                                                value="{{ $mytotal_discount }}">
                                                                        </td>
                                                                        <td class="col-2 mycol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="purchase_grandtotal_price"
                                                                                id="purchase_grandtotal_price"
                                                                                id="purchase_grandtotal_price"
                                                                                class="form-control form-col-12"
                                                                                value="{{ $mygrandtotal_amount }}">
                                                                        </td>
                                                                        <td class="col-2 lastcol" scope="col">
                                                                            <input type="number"
                                                                                name="purchase_amount_received"
                                                                                id="purchase_amount_received"
                                                                                class="form-control form-col-12"
                                                                                value="{{ old('purchase_amount_received', '0') }}">
                                                                        </td>
                                                                    </tr>
                                                        </div>
                                                        </thead>
                                                        <tbody
                                                            class="">
                                                        </tbody>
                                                        <tfoot class="
                                                            thead-dark">
                                                            <tr class="row tfoot-dark-custom">
                                                                {{-- <th class="col-1 mycol" scope="col">Invoice Id</th> --}}
                                                                {{-- <th class="col-3 mycol" scope="col" style="text-align: center">Invoice Date</th> --}}
                                                                {{-- <th class="col-2 mycol" scope="col">Document</th> --}}
                                                                <th class="col-10 firstcol" scope="col">Remarks</th>
                                                                {{-- <th class="col-2 mycol" scope="col">Payment Status</th> --}}
                                                                <th class="col-2 lastcol" scope="col">Invoice ID</th>
                                                            </tr>
                                                            <tr class="row table-info">
                                                                {{-- <td class="col-1 mycol" scope="col">
                                    <input type="text" name="purchase_invoice_id" class="form-control col-12" value="{{ old('purchase_invoice_id', '') }}">
                                  </td>
                                  <td class="col-3 midcol" scope="col">
                                    <div class="row">
                                      <input type="text" name="purchase_invoice_date" class="form-control col-9" value="{{ old('purchase_invoice_date', '') }}">
                                      <button type="button" href="{{ route('purchase.edit', ['purchase' => 1,]) }}" class="btn btn-sm btn-warning btn-icon col-2" title="Re-Open">
                                        <i class="fa fa-file-text-o"></i>
                                      </button>
                                    </div>
                                  </td> --}}
                                                                {{-- <td class="col-2 mycol" scope="col">
                                    <input type="file" name="purchase_document" id="purchase_document" class="form-control col-12" value="{{ old('purchase_document', '') }}">
                                  </td> --}}
                                                                <td class="col-10 firstcol" scope="col">
                                                                    <input type="text" name="purchase_note"
                                                                        id="purchase_note" class="form-control col-12"
                                                                        value="{{ $purchase->purchase_note }}">
                                                                </td>
                                                                {{-- <td class="col-2 mycol" scope="col">
                                                                    <select readonly name="purchase_payment_status"
                                                                        id="purchase_payment_status"
                                                                        class="selectpicker form-control col-12"
                                                                        data-live-search="true"
                                                                        data-live-search-style="begins"
                                                                        title="Payment Status">
                                                                        <option value="due">Due</option>
                                                                        <option value="paid">Paid</option>
                                                                        <option value="partial">Partial</option>
                                                                        <option value="overdue">Overdue</option>
                                                                    </select>
                                                                </td> --}}
                                                                <td class="col-2 lastcol" scope="col">
                                                                    <input readonly type="text" name="purchase_invoice_id"
                                                                        class="form-control form-col-12"
                                                                        value="{{ $purchase->purchase_invoice_id }}">
                                                                    {{-- <button type="button" href="{{ route('purchase.edit', ['purchase' => 1,]) }}" class="btn btn-sm btn-warning btn-icon form-col-2" title="Re-Open">
                                      <i class="fa fa-file-text-o"></i>
                                    </button> --}}
                                                                </td>
                                                            </tr>
                                                            </tfoot>
                                                            </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="display: none;">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <?php
                                                    $productArray = [];
                                                    $nameArray = [];
                                                    $codeArray = [];
                                                    $barcodeArray = [];
                                                    ?>
                                                    @foreach ($products as $one_product)
                                                        <div class="product_array" style="display: none">
                                                            {{ $productArray[] = $one_product }}</div>
                                                        <div class="productnames_array" style="display: none">
                                                            {{ $nameArray[] = $one_product->product_name }}</div>
                                                        <div class="productnamecode_array" style="display: none">
                                                            {{ $namecodeArray[] = $one_product->product_name . ', ' . $one_product->product_ref_no }}
                                                        </div>
                                                    @endforeach
                                                    @foreach ($attachedbarcodes as $singlebarcode)
                                                        <div class="productbarcodes_array" style="display: none">
                                                            {{ $barcodeArray[] = "$singlebarcode->product_barcodes" }}
                                                        </div>
                                                    @endforeach
                                                    {{-- <input type="hidden" name="purchase_products_barcode_2" id="product_barcode2" value="{{ $one_product->product_barcode }}"/> --}}
                                                    <input type="hidden" name="pieces_per_packet" id="pieces_per_packet"
                                                        value="{{ $one_product->product_piece_per_packet }}" />
                                                    <input type="hidden" name="pieces_per_carton" id="pieces_per_carton"
                                                        value="{{ $one_product->product_piece_per_carton }}" />
                                                    {{-- <input type="hidden" name="items" id="items"/>
                          <input type="hidden" name="total_qty" id="total_qty"/>
                          <input type="hidden" name="total_price" />
                          <input type="hidden" name="grand_total" />
                          <input type="hidden" name="total_discount" value="0.00"/>
                          <input type="hidden" name="purchase_status" value="1" />
                          <input type="hidden" name="pos" value="1" />
                          <input type="hidden" name="draft" value="0" /> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- payment modal -->
                                {{-- <div id="add-payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                  <div role="document" class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 id="exampleModalLabel" class="modal-title">Finalize purchase</h5>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                          </div>
                          <div class="modal-body">
                              <div class="row">
                                  <div class="col-10">
                                      <div class="row">
                                          <div class="col-6 mt-1">
                                              <label>Received Amount *</label>
                                              <input type="text" name="paying_amount" class="form-control numkey" required step="any">
                                          </div>
                                          <div class="col-6 mt-1">
                                              <label>Paying Amount *</label>
                                              <input type="text" name="paid_amount" class="form-control numkey"  step="any">
                                          </div>
                                          <div class="col-6 mt-1">
                                              <label>Change : </label>
                                              <p id="change" class="ml-2">0.00</p>
                                          </div>
                                          <div class="col-6 mt-1">
                                              <input type="hidden" name="paid_by_id">
                                              <label>Paid By</label>
                                              <select name="paid_by_id_select" class="form-control selectpicker">
                                                  <option value="1">Credit Card</option>
                                                  <option value="2">Cash</option>
                                                  <option value="3">Cheque</option>
                                                  <option value="4">Deposit</option>
                                              </select>
                                          </div>
                                          <div class="form-group col-12 mt-3">
                                              <div class="card-element form-control">
                                              </div>
                                              <div class="card-errors" role="alert"></div>
                                          </div>
                                          <div class="form-group col-12 cheque">
                                              <label>Cheque Number *</label>
                                              <input type="text" name="cheque_no" class="form-control">
                                          </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-6 form-group">
                                              <label>purchase Note</label>
                                              <textarea rows="3" class="form-control" name="purchase_note"></textarea>
                                          </div>
                                          <div class="col-6 form-group">
                                              <label>Payment Note</label>
                                              <textarea rows="3" class="form-control" name="payment_note"></textarea>
                                          </div>
                                      </div>
                                      <div class="mt-3">
                                          <button id="submit-btn" type="button" class="btn btn-primary">submit</button>
                                      </div>
                                  </div>
                                  <div class="col-2 qc" data-initial="1">
                                      <h4><strong>Quick Cash</strong></h4>
                                      <button class="btn btn-block btn-primary qc-btn sound-btn" data-amount="10" type="button">10</button>
                                      <button class="btn btn-block btn-primary qc-btn sound-btn" data-amount="20" type="button">20</button>
                                      <button class="btn btn-block btn-primary qc-btn sound-btn" data-amount="50" type="button">50</button>
                                      <button class="btn btn-block btn-primary qc-btn sound-btn" data-amount="100" type="button">100</button>
                                      <button class="btn btn-block btn-primary qc-btn sound-btn" data-amount="500" type="button">500</button>
                                      <button class="btn btn-block btn-primary qc-btn sound-btn" data-amount="1000" type="button">1000</button>
                                      <button class="btn btn-block btn-danger qc-btn sound-btn" data-amount="0" type="button">Clear</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div> --}}
                                <!-- product list modal -->
                                <div id="product-list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true" class="modal fade text-left">
                                    <div role="document" class="modal-dialog">
                                        <div class="modal-content-pos">
                                            <div class="modal-header">
                                                <h5 id="exampleModalLabel" class="modal-title">Products List</h5>
                                                <button type="button" data-dismiss="modal" aria-label="Close"
                                                    class="close"><span aria-hidden="true"><i
                                                            class="fa fa-times"></i></span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        {{-- <div class="row">
                              <div class=" col-12 ">
                                <div class="search-box form-group">
                                  <label for="product_code_name" class=" col-10 control-label">&nbsp;&nbsp;{{__(" Search Product")}}</label>
                                    <div class=" col-12 input-group ">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text barcode">
                                          <a class="" data-toggle="modal" data-target="#product-list" id="product-list-btn"><i class="fa fa-barcode"></i></a>
                                        </span>
                                      </div>
                                      <input type="text" name="product_code_name" id="lims_productcodeSearch" placeholder="Scan/Search product by name/code" class="form-control"  />
                                    </div>
                                    @include('alerts.feedback', ['field' => 'product_code_name'])
                                </div>
                              </div>
                            </div> --}}
                                                        <div class="row">
                                                            <div class=" col-12 ">
                                                                <div class="form-group">
                                                                    <div class=" col-12">
                                                                        <div class="table-responsive-sm"
                                                                            style="height:500px; overflow-x:auto">
                                                                            <table id="productTable"
                                                                                class="table table-sm table-hover table-striped table-fixed table-bordered display compact order-column">
                                                                                <thead class="thead pos">
                                                                                    {{-- style="position: sticky; top: 0; z-index: 1" --}}
                                                                                    {{-- <tr>
                                                <th>RefID</th>
                                                <th>Barcode</th>
                                                <th>Product</th>
                                                <th>T.P</th>
                                                <th>Cash(Pc)</th>
                                                <th>Cash(Pk)</th>
                                                <th>Credit</th>
                                                <th>Non Bulk</th>
                                                <th>Available</th>
                                                <th>Action</th>
                                                $table->integer('product_total_quantity');
                                            </tr> --}}
                                                                                    <tr>
                                                                                        {{-- <th>Ref.Id</th> --}}
                                                                                        <th></th>
                                                                                        <th colspan="2">Product Info</th>
                                                                                        {{-- <th>Barcode</th> --}}
                                                                                        {{-- <th colspan="2">Company/Brand</th> --}}
                                                                                        {{-- <th>Brand</th> --}}
                                                                                        {{-- <th colspan="3">Total Quantity</th> --}}
                                                                                        {{-- <th>Totl.Pkt</th>
                                              <th>Totl.Crt</th> --}}
                                                                                        <th colspan="3">Aval Quantity</th>
                                                                                        {{-- <th>Aval.Pkt</th>
                                              <th>Aval.Crt</th> --}}
                                                                                        {{-- <th>Damage Qty</th> --}}
                                                                                        {{-- <th>Piece Carton</th> --}}
                                                                                        <th colspan="3">Trade Price</th>
                                                                                        {{-- <th>T.P.Pkt</th>
                                              <th>T.P.Crt</th> --}}
                                                                                        <th colspan="3">Cash Price</th>
                                                                                        {{-- <th>Cash.P.Pkt</th>
                                              <th>Cash.P.Crt</th> --}}
                                                                                        <th colspan="3">Credit Price</th>
                                                                                        {{-- <th>Credit.P.Pkt</th>
                                              <th>Credit.P.Crt</th> --}}
                                                                                        {{-- <th>Expiry</th> --}}
                                                                                        {{-- <th>Status</th> --}}
                                                                                        <th
                                                                                            class="disabled-sorting text-left">
                                                                                            Edit</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        {{-- <th>Ref.Id</th> --}}
                                                                                        <th></th>
                                                                                        <th>Name</th>
                                                                                        <th>Barcode</th>
                                                                                        {{-- <th>Company</th>
                                              <th>Brand</th> --}}
                                                                                        {{-- <th>Pc</th>
                                              <th>Pkt</th>
                                              <th>Crt</th> --}}
                                                                                        <th>Pc</th>
                                                                                        <th>Pkt</th>
                                                                                        <th>Crt</th>
                                                                                        {{-- <th>Damage Qty</th> --}}
                                                                                        {{-- <th>Piece Carton</th> --}}
                                                                                        <th>Pc</th>
                                                                                        <th>Pkt</th>
                                                                                        <th>Crt</th>
                                                                                        <th>Pc</th>
                                                                                        <th>Pkt</th>
                                                                                        <th>Crt</th>
                                                                                        <th>Pc</th>
                                                                                        <th>Pkt</th>
                                                                                        <th>Crt</th>
                                                                                        {{-- <th>Expiry</th> --}}
                                                                                        {{-- <th>Status</th> --}}
                                                                                        <th
                                                                                            class="disabled-sorting text-left">
                                                                                            Edit</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    {{-- @foreach ($products as $key => $value)
                                            <tr>
                                              <td>{{ $value->product_name }}</td>
                                              <!-- <td>{ $value->product_ref_no }}</td> -->
                                              <td>{{ $value->product_barcode }}</td>
                                              <td>{{ $value->product_pieces_available }}</td>
                                              <td>{{ $value->product_packets_available }}</td>
                                              <td>{{ $value->product_cartons_available }}</td>
                                              <td>{{ $value->product_trade_price_piece }}</td>
                                              <td>{{ $value->product_trade_price_packet }}</td>
                                              <td>{{ $value->product_trade_price_carton }}</td>
                                              <td>{{ $value->product_cash_price_piece }}</td>
                                              <td>{{ $value->product_cash_price_packet }}</td>
                                              <td>{{ $value->product_cash_price_carton }}</td>
                                              <td>{{ $value->product_credit_price_piece }}</td>
                                              <td>{{ $value->product_credit_price_packet }}</td>
                                              <td>{{ $value->product_credit_price_carton }}</td>
                                              <!-- <td>{ $value->product_nonbulk_price_piece }}</td> -->
                                              <td class="text-right">
                                                <a type="button" href="{{ route('product.edit', ['product' => $value->product_id,]) }}" rel="tooltip" class="btn btn-info btn-icon btn-sm " data-original-title="+" title="+">
                                                  <i class="fa fa-plus-square"></i>
                                                </a>
                                              </td>
                                            </tr>
                                            @endforeach --}}
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="row">
                                <div class="col-6 mt-1">
                                    <label>Received Amount *</label>
                                    <input type="text" name="paying_amount" class="form-control numkey" required step="any">
                                </div>
                                <div class="col-6 mt-1">
                                    <label>Paying Amount *</label>
                                    <input type="text" name="paid_amount" class="form-control numkey"  step="any">
                                </div>
                                <div class="col-6 mt-1">
                                    <label>Change : </label>
                                    <p id="change" class="ml-2">0.00</p>
                                </div>
                                <div class="col-6 mt-1">
                                    <input type="hidden" name="paid_by_id">
                                    <label>Paid By</label>
                                    <select name="paid_by_id_select" class="form-control selectpicker">
                                        <option value="1">Credit Card</option>
                                        <option value="2">Cash</option>
                                        <option value="3">Cheque</option>
                                        <option value="4">Deposit</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 mt-3">
                                    <div class="card-errors" role="alert"></div>
                                </div>
                                <div class="form-group col-12 cheque">
                                    <label>Cheque Number *</label>
                                    <input type="text" name="cheque_no" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-6 form-group">
                                    <label>purchase Note</label>
                                    <textarea rows="3" class="form-control" name="purchase_note"></textarea>
                                </div>
                                <div class="col-6 form-group">
                                    <label>Payment Note</label>
                                    <textarea rows="3" class="form-control" name="payment_note"></textarea>
                                </div>
                            </div> --}}
                                                        <div class="mt-3">
                                                            <button id="submit-btn" type="button"
                                                                class="btn btn-primary">submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- supplier list modal -->
                                <div id="supplier-list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true" class="modal fade text-left">
                                    <div role="document" class="modal-dialog">
                                        <div class="modal-content-pos">
                                            <div class="modal-header">
                                                <h5 id="exampleModalLabel" class="modal-title">Suppplers List</h5>
                                                <button type="button" data-dismiss="modal" aria-label="Close"
                                                    class="close"><span aria-hidden="true"><i
                                                            class="fa fa-times"></i></span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class=" col-6 ">
                                                                <div class="form-group">
                                                                    <label for="supplier_name"
                                                                        class=" col-10 control-label">&nbsp;&nbsp;{{ __('supplier Name') }}</label>
                                                                    <div class=" col-12 input-group ">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text barcode">
                                                                                <a class="" data-toggle=" modal"
                                                                                    data-target="#product-list"
                                                                                    id="product-list-btn"><i
                                                                                        class="fa fa-user"></i></a>
                                                                            </span>
                                                                        </div>
                                                                        {{-- <div class="input-group pos"> --}}
                                                                        <input type="text" name="supplier_name"
                                                                            id="suppliercodesearch"
                                                                            placeholder="Supplier Name"
                                                                            class="form-control suppliercodesearch" />
                                                                        {{-- <select required name="supplier_name" id="supplier_name" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select supplier..." style="width: 100px">
                                        @foreach ($suppliers as $supplier)
                                          <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                      </select> --}}
                                                                        {{-- </div> --}}
                                                                        @include('alerts.feedback', ['field' =>
                                                                        'supplier_name'])
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class=" col-6 ">
                                                                <div class="form-group">
                                                                    <label for="supplier_code"
                                                                        class=" col-10 control-label">&nbsp;&nbsp;{{ __(' Supplier Code') }}</label>
                                                                    <div class=" col-12 input-group ">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text barcode">
                                                                                <a class="" id="
                                                                                    product-list-btn"><i
                                                                                        class="fa fa-barcode"></i></a>
                                                                            </span>
                                                                        </div>
                                                                        <input type="hidden" name="supplier_code_hidden"
                                                                            value="supplier_code">
                                                                        {{-- <div class="input-group pos"> --}}
                                                                        <input type="text" name="supplier_code"
                                                                            id="suppliercodeSearch"
                                                                            placeholder="Supplier Code"
                                                                            class="form-control" />
                                                                        {{-- <select required name="supplier_code" id="supplier_code" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select supplier..." style="width: 100px">
                                        @foreach ($suppliers as $supplier)
                                          <option value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option>
                                        @endforeach
                                      </select> --}}
                                                                        {{-- </div> --}}
                                                                        @include('alerts.feedback', ['field' =>
                                                                        'supplier_code'])
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class=" col-12 ">
                                                                <div class="form-group">
                                                                    <div class=" col-12">
                                                                        <div class="table-responsive-sm"
                                                                            style="height:300px; overflow-x:hidden">
                                                                            <table id="myTable"
                                                                                class="table table-sm table-hover table-striped table-fixed table-bordered display compact order-column">
                                                                                <thead class="thead pos">
                                                                                    {{-- style="position: sticky; top: 0; z-index: 1" --}}
                                                                                    <tr>
                                                                                        <th>RefID</th>
                                                                                        <th>Name</th>
                                                                                        <th>Status</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($suppliers as $key => $value)
                                                                                        <tr>
                                                                                            <td>{{ $value->supplier_ref_no }}
                                                                                            </td>
                                                                                            <td>{{ $value->supplier_name }}
                                                                                            </td>
                                                                                            <td>{{ $value->status_id }}
                                                                                            </td>
                                                                                            <td class="text-right">
                                                                                                <a type="button"
                                                                                                    href="{{ route('supplier.edit', ['supplier' => $value->supplier_id]) }}"
                                                                                                    rel="tooltip"
                                                                                                    class="btn btn-info btn-icon btn-sm "
                                                                                                    data-original-title="+"
                                                                                                    title="+">
                                                                                                    <i
                                                                                                        class="fa fa-plus-square"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3">
                                                            <button id="submit-btn" type="button"
                                                                class="btn btn-primary">submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer-custom row">
                            <div class="col-6">
                                <button type="submit" id="update-btn"
                                    class="btn btn-info btn-round pull-left">{{ __('Update') }}</button>
                            </div>
                            </form>
                            <div class="col-6">
                                <a type="button" href="{{ URL::previous() }}"
                                    class="btn btn-secondary btn-round pull-right">{{ __('Back') }}</a>
                                <form action="{{ route('purchase.destroy', $purchase->purchase_id) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit"
                                        class="btn btn-danger btn-round pull-right">{{ __('Delete') }}</button>
                                </form>
                            </div>
                        </div>
                        <hr class="half-rule" />
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('javascript')

    <script type="text/javascript">
        $(document).ready(function() {

            $("#purchase_update").validate({
                rules: {
                    supplier_code: 'required',
                    purchase_payment_method: 'required',
                    // product_name: 'required',
                    // product_code: 'required',
                    // purchase_grandtotal_price: 'required',
                    purchase_amount_received: 'required',
                },
                messages: {
                    supplier_code: 'Please Enter Supplier Name',
                    purchase_payment_method: 'Please Enter Purchase Payment Method',
                    // product_name:  'Please Enter Product Name',
                    // product_code:  'Please Enter Product Code',
                    // purchase_grandtotal_price:  'Please Enter Product',
                    purchase_amount_received: 'Please Enter Amount Paid',
                },
                errorElement: 'em',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    if (element.prop('type') === 'checkbox') {
                        error.insertAfter(element.parent('label'));
                    }
                    // if( element.prop( 'readonly' )){

                    // }
                    else {
                        error.insertAfter(element);
                    }
                },

                errorClass: "error fail-alert",
                errorClass: "invalid",

                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid').removeClass('is-valid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    // $( element ).addClass( 'is-valid' ).removeClass( 'is-invalid' );
                    $(element).removeClass('is-invalid');
                },

            });
            $.validator.setDefaults({
                // debug: true,
                // success: "valid",
                // submitHandler: function () {
                //   alert( 'submitted!' );
                // },
                submitHandler: function(form) {
                    form.submit();
                }
            });

        });
    </script>

    <script type="text/javascript">
        var total_items;
        var total_quantity;
        var total_discount
        var subtotal_amount;
        var grandtotal_amount;
        var purchase_free_amount;
        var purchase_add_amount;
        var product_quantity;
        var product_sub_total;
        var my_total_qty;
        var i = 1;
        var rownum = <?php echo $i; ?>;
        $(document).ready(function(e) {
            $('#purchase_products_barcode_i').focus();
        });
        $(document).on('click', '#add_button', function(e) {
            var product_barcode = $('#purchase_products_barcode_i').val();
            // var product_barcode2 = $('#product_barcode2').val();
            var product_name = $('#product_name_i').val();
            var product_ref = $('#product_code_i').val();
            var product_id = $('#product_id_i').val();
            // var product_namecode = product_name+product_ref;
            product_ref = product_name.split(',')[1];
            product_name = product_name.split(',')[0];
            var product_pieces = $('#purchase_products_pieces_i').val();
            var product_packets = $('#purchase_products_packets_i').val();
            var product_cartons = $('#purchase_products_cartons_i').val();
            var product_unit_price = $('#purchase_products_unit_price_i').val();
            var product_packet_price = $('#purchase_products_packet_price_i').val();
            var product_carton_price = $('#purchase_products_carton_price_i').val();
            var product_discount = $('#purchase_products_discount_i').val();
            var pieces_per_packet = $('#purchase_pieces_per_packet_i').val();
            var packets_per_carton = $('#purchase_packets_per_carton_i').val();
            var pieces_per_carton = $('#purchase_pieces_per_carton_i').val();
            // var pieces_per_carton = $('#pieces_per_carton').val();
            // var pieces_per_packet = $('#pieces_per_packet').val();
            total_items = $('#purchase_total_items').val();
            total_quantity = $('#purchase_total_qty').val();
            purchase_free_amount = $('#purchase_free_amount_i').val();
            purchase_add_amount = $('#purchase_add_amount_i').val();
            subtotal_amount = $('#purchase_total_price').val();
            total_discount = $('#purchase_discount').val();
            grandtotal_amount = $('#purchase_grandtotal_price').val();
            // purchase_amount_received = $('#purchase_amount_received').val();

            product_quantity = Number(product_pieces) + Number(product_packets * pieces_per_packet) + Number(
                product_cartons *
                pieces_per_carton);

            product_sub_total = ((Number(product_pieces) * product_unit_price) + (Number(product_packets) *
                product_packet_price) + (Number(product_cartons) * product_carton_price)) - Number(
                product_discount);

            // var data = $(".purchase-product").row( $(this).parents('row prtr') ).data();
            // var data = $(".purchase-product").find('.prtr').html();
            var allRows = [];
            var repeated;
            $(".prtr").each(function() {
                // rowindex = $(this).closest('tr').index();
                allRows.push($(this).find('[name="product_name[]"]').val());
            });

            // rowindex = $(".prtr").closest('tr').index();

            allRows.forEach(element => {
                if (product_name == element) {
                    repeated = 1;
                }
            });

            $('#purchase_products_barcode_i').val('');
            $('#product_name_i').val('');
            $('#product_code_i').val('');
            $('#product_id_i').val('');
            $('#purchase_products_pieces_i').val(0);
            $('#purchase_products_packets_i').val(0);
            $('#purchase_products_cartons_i').val(0);
            $('#purchase_pieces_per_packet_i').val(0);
            $('#purchase_packets_per_carton_i').val(0);
            $('#purchase_pieces_per_carton_i').val(0);
            $('#purchase_products_unit_price_i').val(0);
            $('#purchase_products_packet_price_i').val(0);
            $('#purchase_products_carton_price_i').val(0);
            $('#purchase_products_discount_i').val(0);
            $('#purchase_products_sub_total_i').val(0);

            if (product_name !== "" && product_quantity !== 0 && (product_unit_price !== 0 ||
                    product_packet_price !== 0 || product_carton_price !== 0) && repeated !== 1) {

                product_quantity = Number(product_pieces) + Number(product_packets * pieces_per_packet) + Number(
                    product_cartons * pieces_per_carton);

                if (product_quantity == 0 || product_unit_price == 0) {
                    product_discount = 0;
                    product_unit_price = 0;
                    product_packet_price = 0;
                    product_carton_price = 0;
                }

                total_items = Number(total_items) + 1;
                total_quantity = Number(total_quantity) + (Number(product_quantity));
                total_discount = Number(total_discount) + Number(product_discount);

                product_sub_total = ((Number(product_pieces) * product_unit_price) + (Number(product_packets) *
                    product_packet_price) + (Number(product_cartons) * product_carton_price)) - Number(
                    product_discount);

                if (product_quantity == 0) {
                    product_sub_total = 0;
                }
                subtotal_amount = Number(subtotal_amount) + Number(product_sub_total);
                grandtotal_amount = Number(subtotal_amount) + Number(purchase_free_amount) + Number(
                    purchase_add_amount);

                $(".purchase-product").prepend(
                    '<tr class="row prtr"><td class="col-2 firstcol" scope="col"><input readonly type="text" name="purchase_products_barcode[]" id="purchase_products_barcode' +
                    rownum + '" class="form-control form-col-12" placeholder="Scan/Search barcode" value=' +
                    product_barcode +
                    '></td><td class="col-3 mycol" scope="col"><input readonly type="text" name="product_name[]" id="product_name' +
                    rownum +
                    '" class="form-control form-col-12" placeholder="Search product by name/code" value="' +
                    product_name + '"><input readonly type="hidden" name="product_code[]" id="product_code' +
                    rownum + '" class="form-control form-col-12" value=' + product_ref +
                    '><input readonly type="hidden" name="product_id[]" id="product_id' + rownum +
                    '" class="form-control form-col-12" value=' + product_id +
                    '></td><td class="col-1 mycol" scope="col"><input readonly type="number" name="purchase_products_pieces[]" id="purchase_products_pieces' +
                    rownum + '" class="form-control form-col-12" value=' + product_pieces +
                    '><input readonly type="hidden" name="purchase_pieces_per_packet[]" id="purchase_pieces_per_packet' +
                    rownum + '" class="form-control form-col-12" value=' + pieces_per_packet +
                    '></td><td class="col-1 mycol" scope="col"><input readonly type="number" name="purchase_products_packets[]" id="purchase_products_packets' +
                    rownum + '" class="form-control form-col-12" value=' + product_packets +
                    '><input readonly type="hidden" name="purchase_packets_per_carton[]" id="purchase_packets_per_carton' +
                    rownum + '" class="form-control form-col-12" value=' + pieces_per_carton +
                    '></td><td class="col-1 mycol" scope="col"><input readonly type="number" name="purchase_products_cartons[]" id="purchase_products_cartons' +
                    rownum + '" class="form-control form-col-12" value=' + product_cartons +
                    '><input readonly type="hidden" name="purchase_pieces_per_carton[]" id="purchase_pieces_per_carton' +
                    rownum + '" class="form-control form-col-12" value=' + pieces_per_carton +
                    '></td><td class="col-1 mycol" scope="col"><input readonly type="number" name="purchase_products_unit_price[]" id="purchase_products_unit_price' +
                    rownum + '" class="form-control form-col-12"  value=' + product_unit_price +
                    '><input readonly type="hidden" name="purchase_products_packet_price[]" id="purchase_products_packet_price' +
                    rownum + '" class="form-control col-12"  value=' + product_packet_price +
                    '><input readonly type="hidden" name="purchase_products_carton_price[]" id="purchase_products_carton_price' +
                    rownum + '" class="form-control col-12"  value=' + product_carton_price +
                    '></td><td class="col-1 mycol" scope="col"><input readonly type="number" name="purchase_products_discount[]" id="purchase_products_discount' +
                    rownum + '" class="form-control form-col-12"  value=' + product_discount +
                    '><input readonly type="hidden" name="purchase_products_qty[]" id="purchase_products_qty' +
                    rownum + '" class="form-control col-12 p-row-' + rownum + '"  value=' + product_quantity +
                    '></td><td class="col-1 mycol" scope="col"><input readonly type="number" name="purchase_products_sub_total[]" id="purchase_products_sub_total' +
                    rownum + '" class="form-control form-col-12"  value=' + product_sub_total +
                    '></td><td class="col-1 lastcol" align="center"><input type="checkbox" rel="tooltip" class=" col-6 edit-productfield" id="edit-productfield' +
                    rownum + '" row-id="' + rownum +
                    '" data-original-title="edit" title="edit"></input><button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm delete-productfield" id="delete-productfield' +
                    rownum + '" row-id="' + rownum +
                    '" data-original-title="X" title="X"><i class="fa fa-times"></i></button></td></tr>');
                // alert(rownum);
                rownum++;
                // alert(rownum);
                $('#purchase_total_qty').val('');
                $('#purchase_total_qty').val(total_quantity);
                $('#purchase_total_items').val('');
                $('#purchase_total_items').val(total_items);
                // $('#purchase_free_price').val('');
                // $('#purchase_free_price').val();
                $('#purchase_total_price').val('');
                $('#purchase_total_price').val(subtotal_amount);
                $('#purchase_discount').val('');
                $('#purchase_discount').val(total_discount);
                $('#purchase_grandtotal_price').val('');
                $('#purchase_grandtotal_price').val(grandtotal_amount);
                // if(purchase_amount_received >= grandtotal_amount){
                //   purchase_return_change = Number(purchase_amount_received) -  Number(grandtotal_amount);
                //   $('#purchase_return_change').val(purchase_return_change);
                // }
                // else{
                //   $('#purchase_return_change').val(0);
                // }
            }

            $('#product_name_i').focus();

        });
        $(document).on('change', '#purchase_add_amount_i', function(e) {
            grandtotal_amount = Number(grandtotal_amount) - Number(purchase_add_amount);
            purchase_add_amount = $('#purchase_add_amount_i').val();
            grandtotal_amount = Number(grandtotal_amount) + Number(purchase_add_amount);
            $('#purchase_grandtotal_price').val('');
            $('#purchase_grandtotal_price').val(grandtotal_amount);
        });
        $(document).on('change', '#purchase_free_amount_i', function(e) {
            grandtotal_amount = Number(grandtotal_amount) + Number(purchase_free_amount);
            purchase_free_amount = $('#purchase_free_amount_i').val();
            grandtotal_amount = Number(grandtotal_amount) - Number(purchase_free_amount);
            $('#purchase_grandtotal_price').val('');
            $('#purchase_grandtotal_price').val(grandtotal_amount);
        });
        $(document).on('change', "#purchase_amount_received", function(e) {
            // grandtotal_amount = $('#purchase_grandtotal_price').val();
            // purchase_amount_received = $('#purchase_amount_received').val();
            // if(Number(purchase_amount_received) >= Number(grandtotal_amount)){
            //   purchase_return_change = Number(purchase_amount_received) -  Number(grandtotal_amount);
            //   $('#purchase_return_change').val(purchase_return_change);
            // }
            // if(Number(purchase_amount_received) < Number(grandtotal_amount)){
            //   alert('Amount received should be greater than the Grand Total Amount');
            //   $('#purchase_amount_received').val(0);
            // }
        });
        $(document).on('click', '.edit-productfield', function() {
            var thisrow = $(this).attr('row-id');

            var edit_sub_total = $('#purchase_products_sub_total' + thisrow).val();
            var edit_discount = $('#purchase_products_discount' + thisrow).val();
            var edit_product_qty = $('#purchase_products_qty' + thisrow).val();
            var edit_final_subtotal = $('#purchase_total_price').val();
            var edit_final_grandtotal = $('#purchase_grandtotal_price').val();
            var edit_total_qty = $('#purchase_total_qty').val();
            var edit_pieces = $('#purchase_products_pieces' + thisrow).val();
            var edit_packets = $('#purchase_products_packets' + thisrow).val();
            var edit_cartons = $('#purchase_products_cartons' + thisrow).val();
            var edit_pieces_per_packet = $('#purchase_pieces_per_packet' + thisrow).val();
            // var edit_packets_per_carton = $('#purchase_packets_per_carton' + thisrow).val();
            var edit_pieces_per_carton = $('#purchase_pieces_per_carton' + thisrow).val();
            var edit_unit_price = $('#purchase_products_unit_price' + thisrow).val();
            var edit_packet_price = $('#purchase_products_packet_price' + thisrow).val();
            var edit_carton_price = $('#purchase_products_carton_price' + thisrow).val();

            $('#purchase_products_pieces' + thisrow).focus()
            // $(this).attr('checked')
            if ($(this).prop("checked") == true) {
                $('#purchase_products_pieces' + thisrow).removeAttr("readonly");
                $('#purchase_products_packets' + thisrow).removeAttr("readonly");
                $('#purchase_products_cartons' + thisrow).removeAttr("readonly");
                // $('#purchase_products_sub_total' + thisrow).removeAttr("readonly");
            } else if ($(this).prop("checked") == false) {
                $('#purchase_products_pieces' + thisrow).attr("readonly", "readonly");
                $('#purchase_products_packets' + thisrow).attr("readonly", "readonly")
                $('#purchase_products_cartons' + thisrow).attr("readonly", "readonly")
                // $('#purchase_products_sub_total' + thisrow).attr("readonly", "readonly")
            }
            var edited_sub_total = Number(edit_pieces * edit_unit_price) + Number(edit_packets *
                edit_packet_price) + Number(edit_cartons * edit_carton_price) - Number(edit_discount);
            var edited_total_quantity = Number(edit_pieces) + Number(edit_packets * edit_pieces_per_packet) +
                Number(edit_cartons * edit_pieces_per_carton);
            $('#purchase_products_sub_total' + thisrow).val(edited_sub_total);
            $('#purchase_products_qty' + thisrow).val(edited_total_quantity);
            var edit_diff_sub_total = Number(edited_sub_total) - Number(edit_sub_total);
            var edit_diff_total_qty = Number(edited_total_quantity) - Number(edit_product_qty);
            var myedit_total_price = Number(edit_final_subtotal) + Number(edit_diff_sub_total);
            var myedit_grandtotal_price = Number(edit_final_grandtotal) + Number(edit_diff_sub_total);
            var myedit_total_qty = Number(edit_total_qty) + Number(edit_diff_total_qty);
            $('#purchase_total_price').val(myedit_total_price);
            $('#purchase_grandtotal_price').val(myedit_grandtotal_price);
            $('#purchase_total_qty').val(myedit_total_qty);
        });
        $(document).on("click", ".delete-productfield", function(event) {

            if (confirm('Do you really want to delete this?')) {
                rowid = $(this).attr('row-id');
                thisproduct_discount = $('#purchase_products_discount' + rowid).val();
                thisproduct_sub_total = $('#purchase_products_sub_total' + rowid).val();
                thisproduct_pieces = $('#purchase_products_pieces' + rowid).val();
                thisproduct_packets = $('#purchase_products_packets' + rowid).val();
                thisproduct_cartons = $('#purchase_products_cartons' + rowid).val();
                thispieces_per_packet = $('#purchase_pieces_per_packet' + rowid).val();
                thispieces_per_carton = $('#purchase_pieces_per_carton' + rowid).val();

                product_quantity = (Number(thisproduct_pieces) + Number(thisproduct_packets *
                    thispieces_per_packet) + Number(thisproduct_cartons * thispieces_per_carton));
                purchase_amount_received = $('#purchase_amount_received').val();
                total_quantity = $('#purchase_total_qty').val();
                total_items = $('#purchase_total_items').val();
                subtotal_amount = $('#purchase_total_price').val();
                grandtotal_amount = $('#purchase_grandtotal_price').val();
                // rowindex = $(this).closest('tr').index();
                total_quantity = Number(total_quantity) - Number(product_quantity);
                total_items = Number(total_items) - 1;
                total_discount = Number(total_discount) - Number(thisproduct_discount);

                // var product_sub_total = $('#purchase_products_sub_total').val();
                subtotal_amount = Number(subtotal_amount) - Number(thisproduct_sub_total);
                grandtotal_amount = Number(grandtotal_amount) - Number(thisproduct_sub_total);

                $('#purchase_total_qty').val(Number(0));
                $('#purchase_total_qty').val(total_quantity);
                $('#purchase_total_items').val(Number(0));
                $('#purchase_total_items').val(total_items);
                $('#purchase_discount').val(Number(0));
                $('#purchase_discount').val(total_discount);
                $('#purchase_total_price').val(Number(0));
                $('#purchase_total_price').val(subtotal_amount);
                $('#purchase_grandtotal_price').val(Number(0));
                $('#purchase_grandtotal_price').val(grandtotal_amount);
                // if(purchase_amount_received >= grandtotal_amount){
                //   purchase_return_change = Number(purchase_amount_received) -  Number(grandtotal_amount);
                //   $('#purchase_return_change').val(purchase_return_change);
                // }
                // else{
                //     $('#purchase_return_change').val(Number(0));
                // }

                $(this).closest('.prtr').remove();

            }

        });

        var productsbarcodes_array = <?php echo json_encode($barcodeArray); ?>;
        var productsnames_array = <?php echo json_encode($nameArray); ?>;
        var productsnamescodes_array = <?php echo json_encode($namecodeArray); ?>;
        $("#product_name_i").on('focus', function() {
            // $( "product_name" ).autocomplete({
            $(this).autocomplete({
                source: productsnamescodes_array,
                autoFocus: true,
                minLength: 0,
                // select: $('#purchase_product_barcode').val();
                // source: function(request, response) {
                //   var matcher = new RegExp(".?" + $.ui.autocomplete.escapeRegex(request.term), "i");
                //     response($.grep(productsnamescodes_array, function(item) {
                //     return matcher.test(item);
                //   }));
                // },
                // response: function(event, ui) {
                //   if (ui.content.length == 1) {
                //         var data = ui.content[0].value;
                //         $(this).autocomplete( "close" );
                //         // productSearch(data);
                //   };
                // },
                select: function(event, ui) {
                    var data = ui.item.value;
                    data = data.split(',')[0];
                    // console.log(data);
                    productSearch(data);
                },
                // change: function(event, ui) {
                //   var data = ui.item;
                //   console.log(data);
                //   if (ui.item == null) {
                //       this.setCustomValidity("You must select a product");
                //   }
                // }
            }).on('click', function(event) {
                // $(this).trigger('keydown.autocomplete');
                $(this).autocomplete("search", $(this).val());
                // .focus(function(){
            });
            // $(this).autocomplete("search", "");

        });

        function productSearch(data) {
            $.ajax({
                type: 'GET',
                url: "{{ route('searchproduct') }}",
                data: {
                    data: data,
                    // '_token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    // var catchbarcode = data[0]['product_barcode'];
                    var catchproduct_name = data[0]['product_name'];
                    var catchproduct_code = data[0]['product_ref_no'];
                    catchproduct_name = catchproduct_name + ", " + catchproduct_code;
                    var catchproduct_id = data[0]['product_id'];
                    var pieces_per_carton = data[0]['product_piece_per_carton'];
                    var pieces_per_packet = data[0]['product_piece_per_packet'];
                    var packets_per_carton = data[0]['product_packet_per_carton'];
                    var product_trade_price_piece = data[0]['product_trade_price_piece'];
                    var product_trade_price_packet = data[0]['product_trade_price_packet'];
                    var product_trade_price_carton = data[0]['product_trade_price_carton'];
                    // console.log(total_items);
                    $('#product_name_i').val('');
                    $('#product_name_i').val(catchproduct_name);
                    $('#product_code_i').val('');
                    $('#product_code_i').val(catchproduct_code);
                    $('#product_id_i').val('');
                    $('#product_id_i').val(catchproduct_id);
                    // $('#purchase_products_barcode_i').val('');
                    // $('#purchase_products_barcode_i').val(catchbarcode);
                    $('#pieces_per_carton').val('');
                    $('#pieces_per_carton').val(pieces_per_carton);
                    $('#purchase_pieces_per_carton_i').val('');
                    $('#purchase_pieces_per_carton_i').val(pieces_per_carton);
                    $('#pieces_per_packet').val('');
                    $('#pieces_per_packet').val(pieces_per_packet);
                    $('#purchase_pieces_per_packet_i').val('');
                    $('#purchase_pieces_per_packet_i').val(pieces_per_packet);
                    $('#packets_per_carton').val('');
                    $('#packets_per_carton').val(packets_per_carton);
                    $('#purchase_packets_per_carton_i').val('');
                    $('#purchase_packets_per_carton_i').val(packets_per_carton);

                    $('#purchase_products_unit_price_i').val('');
                    $('#purchase_products_unit_price_i').val(product_trade_price_piece);
                    $('#purchase_products_packet_price_i').val('');
                    $('#purchase_products_packet_price_i').val(product_trade_price_packet)
                    $('#purchase_products_carton_price_i').val('');
                    $('#purchase_products_carton_price_i').val(product_trade_price_carton)

                    // $('#product_barcode2').val(data[0]['product_barcode']);
                    barcodeSearch2(catchproduct_id);

                }
            });
        }

        $("#purchase_products_barcode_i").on('focus', function() {
            // $( "product_name" ).autocomplete({
            $(this).autocomplete({
                source: productsbarcodes_array,
                autoFocus: true,
                minLength: 0,
                // select: $('#purchase_product_barcode').val();
                // source: function(request, response) {
                //   var matcher = new RegExp(".?" + $.ui.autocomplete.escapeRegex(request.term), "i");
                //     response($.grep(productsnamescodes_array, function(item) {
                //     return matcher.test(item);
                //   }));
                // },
                // response: function(event, ui) {
                //   if (ui.content.length == 1) {
                //         var data = ui.content[0].value;
                //         $(this).autocomplete( "close" );
                //         // productSearch(data);
                //   };
                // },
                select: function(event, ui) {
                    var data = ui.item.value;
                    // console.log(data);
                    barcodeSearch(data);
                },
                // change: function(event, ui) {
                //   var data = ui.item;
                //   console.log(data);
                //   if (ui.item == null) {
                //       this.setCustomValidity("You must select a product");
                //   }
                // }
            }).on('click', function(event) {
                // $(this).trigger('keydown.autocomplete');
                $(this).autocomplete("search", $(this).val());
                // .focus(function(){
            });
            // $(this).autocomplete("search", "");

        });

        function barcodeSearch(data) {
            $.ajax({
                type: 'GET',
                url: "{{ route('searchbarcode2') }}",
                data: {
                    data: data,
                    // '_token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    productSearch(data[0]['product_id']);
                    // var catchname = data[0]['product_name'];
                    // var catchproduct_code = data[0]['product_ref_no'];
                    // catchname = catchname+", "+catchproduct_code;
                    // var catchproduct_id = data[0]['product_id'];
                    // var catchproduct_pieces = data[0]['product_pieces_available'];
                    // var catchproduct_packets = data[0]['product_packets_available'];
                    // var catchproduct_cartons = data[0]['product_cartons_available'];
                    // var pieces_per_carton = data[0]['product_piece_per_carton'];
                    // var pieces_per_packet = data[0]['product_piece_per_packet'];
                    // var packets_per_carton = data[0]['product_packet_per_carton'];
                    // var product_cash_price_piece = data[0]['product_cash_price_piece'];
                    // var product_credit_price_piece = data[0]['product_credit_price_piece'];
                    // $('#product_name_i').val('');
                    // $('#product_name_i').val(catchname);
                    // $('#product_code_i').val('');
                    // $('#product_code_i').val(catchproduct_code);
                    // $('#product_id_i').val('');
                    // $('#product_id_i').val(catchproduct_id);
                    // $('#purchase_products_pieces_i').attr('max', catchproduct_pieces);
                    // $('#purchase_products_packets_i').attr('max', catchproduct_packets);
                    // $('#purchase_products_cartons_i').attr('max', catchproduct_cartons);
                    // $('#pieces_per_carton').val('');
                    // $('#pieces_per_carton').val(pieces_per_carton);
                    // $('#pieces_per_packet').val('');
                    // $('#pieces_per_packet').val(pieces_per_packet);
                    // $('#packets_per_carton').val('');
                    // $('#packets_per_carton').val(packets_per_carton);
                    // $('#purchase_products_unit_price_i').val('');
                    // $('#purchase_products_unit_price_i').val(product_cash_price_piece)
                    // $('#purchase_products_unit_price_i').val('');
                    // $('#purchase_products_unit_price_i').val(product_credit_price_piece)
                }
            });
        }

        function barcodeSearch2(data) {
            $.ajax({
                type: 'GET',
                url: "{{ route('searchbarcode3') }}",
                data: {
                    data: data,
                    // '_token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log(data);
                    var catchattachedbarcode = data[0]['product_barcodes'];
                    // var catchname = data[0]['product_name'];
                    // var catchproduct_code = data[0]['product_ref_no'];
                    // catchname = catchname+", "+catchproduct_code;
                    // var catchproduct_id = data[0]['product_id'];
                    // var catchproduct_pieces = data[0]['product_pieces_available'];
                    // var catchproduct_packets = data[0]['product_packets_available'];
                    // var catchproduct_cartons = data[0]['product_cartons_available'];
                    // var pieces_per_carton = data[0]['product_piece_per_carton'];
                    // var pieces_per_packet = data[0]['product_piece_per_packet'];
                    // var packets_per_carton = data[0]['product_packet_per_carton'];
                    // var product_cash_price_piece = data[0]['product_cash_price_piece'];
                    // var product_credit_price_piece = data[0]['product_credit_price_piece'];
                    $('#purchase_products_barcode_i').val('');
                    $('#purchase_products_barcode_i').val(catchattachedbarcode);
                    // $('#product_name_i').val('');
                    // $('#product_name_i').val(catchname);
                    // $('#product_code_i').val('');
                    // $('#product_code_i').val(catchproduct_code);
                    // $('#product_id_i').val('');
                    // $('#product_id_i').val(catchproduct_id);
                    // $('#purchase_products_pieces_i').attr('max', catchproduct_pieces);
                    // $('#purchase_products_packets_i').attr('max', catchproduct_packets);
                    // $('#purchase_products_cartons_i').attr('max', catchproduct_cartons);
                    // $('#pieces_per_carton').val('');
                    // $('#pieces_per_carton').val(pieces_per_carton);
                    // $('#pieces_per_packet').val('');
                    // $('#pieces_per_packet').val(pieces_per_packet);
                    // $('#packets_per_carton').val('');
                    // $('#packets_per_carton').val(packets_per_carton);
                    // $('#purchase_products_unit_price_i').val('');
                    // $('#purchase_products_unit_price_i').val(product_cash_price_piece)
                    // $('#purchase_products_unit_price_i').val('');
                    // $('#purchase_products_unit_price_i').val(product_credit_price_piece)
                }
            });
        }

        var suppliersnames_array = <?php echo json_encode($snameArray); ?>;
        var suppliersnamescodes_array = <?php echo json_encode($snamecodeArray); ?>;
        $("#suppliercodesearch").on('focus', function() {
            // $("#suppliercodesearch" ).autocomplete({
            $(this).autocomplete({
                source: suppliersnamescodes_array,
                autoFocus: true,
                minLength: 0,
                // select: $('#purchase_product_barcode').val();
                // source: function(request, response) {
                //     var matcher = new RegExp(".?" + $.ui.autocomplete.escapeRegex(request.term), "i");
                //     response($.grep(productsnames_array, function(item) {
                //         return matcher.test(item);
                //     }));
                // },
                // response: function(event, ui) {
                //     if (ui.content.length == 1) {
                //         var data = ui.content[0].value;
                //         $(this).autocomplete( "close" );
                //         // productSearch(data);
                //     };
                // },
                select: function(event, ui) {
                    var data = ui.item.value;
                    data = data.split(',')[0];
                    console.log(data);
                    supplierSearch(data);
                }
            }).on('click', function(event) {
                // $(this).trigger('keydown.autocomplete');
                $(this).autocomplete("search", $(this).val());
                // .focus(function(){
            });
        });

        function supplierSearch(data) {
            $.ajax({
                url: 'searchsupplier',
                type: "GET",
                data: {
                    data: data,
                },
                success: function(data) {
                    // alert(data[0]["supplier_id"]);
                    var supplier_id = data[0]["supplier_id"];
                    var supplier_name = data[0]["supplier_name"];
                    var status_id = data[0]["status_id"];
                    var supplier_balance_paid = data[0]["supplier_balance_paid"];
                    var supplier_balance_dues = data[0]["supplier_balance_dues"];
                    // var supplier_total_balance = data[0]["supplier_total_balance"];
                    // $('#supplier_name option').removeAttr('selected');
                    // // $('#supplier_name option[value='+supplier_id+']').removeAttr('selected');
                    // $('#supplier_name option[value='+supplier_id+']').attr('selected', 'selected');
                    // $('#supplier_name option[value='+supplier_id+']').attr('status_id', status_id);
                    $('#supplier_name').val(supplier_name);
                    $('#supplier_id').val(supplier_id);
                    if (status_id == 1) {
                        $('#supplier_status').val('Active');
                    }
                    // else{
                    //   $('#supplier_status').val('Inactive');
                    // }
                    // $('#supplier_balance_paid').val(supplier_balance_paid);
                    // $('#supplier_balance_dues').val(supplier_balance_dues);
                    // $('#supplier_total_balance').val(supplier_total_balance);
                }
            });
        }
        $(document).on('change', '#supplier_name', function(e) {
            var status = $('option:selected', this).attr('status_id');
            e.preventDefault();
            // $('#supplier_status').val(status);
            if (status == 1) {
                $('#supplier_status').val('Active');
            }
            // else{
            //   $('#supplier_status').val('Inactive');
            // }
        });

        shortcut.add("esc", function(e) {
                e.preventDefault();
                // $('#product_name_i').focus();
                $('#cancel-btn').trigger('click');
                // if(e.keyCode == 88) {
                //   e.preventDefault()
                //   console.log('x was pressed');
                // }
            },
            // {
            // 	'type':'keydown',
            // 	'propagate':true,
            // 	'target':document
            // }
        );
        shortcut.add("alt+n", function(e) {
            e.preventDefault();
            $('#product_name_i').focus();
        });
        shortcut.add("alt+b", function(e) {
            e.preventDefault();
            $('#purchase_products_barcode_i').focus();
        });
        shortcut.add("alt+a", function(e) {
            e.preventDefault();
            $('#add_button').trigger('click');
        });
        shortcut.add("enter", function(e) {
            e.preventDefault();
            var activeid2 = String(document.activeElement.id);
            if (activeid2 == "suppliercodesearch") {
                $('#' + activeid2).trigger('click');
                $('#purchase_products_barcode_i').focus();
            } else if (activeid2 == "purchase_products_barcode_i") {
                $('#' + activeid2).trigger('click');
                $('#product_name_i').focus();
            } else if (activeid2 == "product_name_i") {
                $('#' + activeid2).trigger('click');
                $('#purchase_products_pieces_i').focus();
            } else if (activeid2 == "purchase_products_pieces_i") {
                $('#' + activeid2).trigger('click');
                $('#purchase_products_packets_i').focus();
                // $('#purchase_pieces_per_packet_i').focus();
            } else if (activeid2 == "purchase_products_packets_i") {
                $('#' + activeid2).trigger('click');
                $('#purchase_products_cartons_i').focus();
                // $('#purchase_packets_per_carton_i').focus();
            } else if (activeid2 == 'purchase_products_cartons_i') {
                $('#' + activeid2).trigger('click');
                $('#purchase_products_unit_price_i').focus();
                // $('#purchase_pieces_per_carton_i').focus();
            } else if (activeid2 == 'purchase_products_unit_price_i') {
                $('#' + activeid2).trigger('click');
                $('#purchase_products_discount_i').focus();
            } else if (activeid2 == "purchase_products_discount_i") {
                $('#' + activeid2).trigger('click');
                $('#add_button').focus();
            } else if (activeid2 == "add_button") {
                console.log(activeid2);
                $('#add_button').trigger('click');
                // $('#purchase_products_barcode_i').focus();
                // $(this).next('input').focus();
            } else if (activeid2 == "purchase_free_piece") {
                $('#' + activeid2).trigger('click');
                $('#purchase_free_amount_i').focus();
            } else if (activeid2 == "purchase_free_amount_i") {
                $('#' + activeid2).trigger('click');
                $('#purchase_add_amount_i').focus();
            } else if (activeid2 == "purchase_add_amount_i") {
                $('#' + activeid2).trigger('click');
                $('#purchase_amount_received').focus();
            } else if (activeid2 == "purchase_amount_received") {
                $('#' + activeid2).trigger('click');
                $('#purchase_note').focus();
            } else if (activeid2 == "purchase_note") {
                $('#' + activeid2).trigger('click');
                $('#update-btn').focus();
            } else if (activeid2 == "update-btn") {
                if (confirm('Do you really want to create/print this purchase?')) {
                    $('#' + activeid2).trigger('click');
                }
            }
        }, {
            'type': 'keypress',
            'keycode': 13
        });
        shortcut.add("ctrl+l", function(e) {
            e.preventDefault();
            $('#purchase_free_piece').focus();
        });
        shortcut.add("alt+s", function(e) {
            e.preventDefault();
            if (confirm('Do you really want to create/print this purchase?')) {
                $('#update-btn').trigger('click');
            }
        });
        $(document).on('focus', '#purchase_products_pieces_i', function(e) {
            var val = this.value; //store the value of the element
            this.value = ''; //clear the value of the element
            this.value = val; //set that value back.
        });
        $(document).on('focus', '#purchase_products_packets_i', function(e) {
            var val = this.value; //store the value of the element
            this.value = ''; //clear the value of the element
            this.value = val; //set that value back.
        });
        $(document).on('focus', '#purchase_products_cartons_i', function(e) {
            var val = this.value; //store the value of the element
            this.value = ''; //clear the value of the element
            this.value = val; //set that value back.
        });
        $(document).on('focus', '#purchase_products_unit_price_i', function(e) {
            var val = this.value; //store the value of the element
            this.value = ''; //clear the value of the element
            this.value = val; //set that value back.
        });
        $(document).on('focus', '#purchase_products_discount_i', function(e) {
            var val = this.value; //store the value of the element
            this.value = ''; //clear the value of the element
            this.value = val; //set that value back.
        });
        $(document).on('focus', '#purchase_free_piece', function(e) {
            var val = this.value; //store the value of the element
            this.value = ''; //clear the value of the element
            this.value = val; //set that value back.
        });
        $(document).on('focus', '#purchase_free_amount_i', function(e) {
            var val = this.value; //store the value of the element
            this.value = ''; //clear the value of the element
            this.value = val; //set that value back.
        });
        $(document).on('focus', '#purchase_add_amount_i', function(e) {
            var val = this.value; //store the value of the element
            this.value = ''; //clear the value of the element
            this.value = val; //set that value back.
        });
        $(document).on('focus', '#purchase_amount_received', function(e) {
            var val = this.value; //store the value of the element
            this.value = ''; //clear the value of the element
            this.value = val; //set that value back.
        });

        var dt = $('#productTable').DataTable({
            keys: true,
            serverSide: true,
            ajax: "{{ route('api.product_row_details2') }}",
            columns: [
                //     {
                //         "className":      'details-control',
                //         "orderable":      false,
                //         "searchable":     false,
                //         "data":           null,
                //         "defaultContent": ''
                //     },
                //  { width:'25%', className: 'dt-body-center', data: 'customer_name', name: 'customer_name' },
                {
                    className: 'dt-body-center',
                    searchable: false,
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_name',
                    name: 'product_name'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_name',
                    name: 'product_name'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_pieces_available',
                    name: 'product_pieces_available'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_packets_available',
                    name: 'product_packets_available'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_cartons_available',
                    name: 'product_cartons_available'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_trade_price_piece',
                    name: 'product_trade_price_piece'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_trade_price_packet',
                    name: 'product_trade_price_packet'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_trade_price_carton',
                    name: 'product_trade_price_carton'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_cash_price_piece',
                    name: 'product_cash_price_piece'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_cash_price_packet',
                    name: 'product_cash_price_packet'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_cash_price_carton',
                    name: 'product_cash_price_carton'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_credit_price_piece',
                    name: 'product_credit_price_piece'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_credit_price_packet',
                    name: 'product_credit_price_packet'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_credit_price_carton',
                    name: 'product_credit_price_carton'
                },
                // { className: 'dt-body-center', data: 'product_nonbulk_price_piece', name: 'product_nonbulk_price_piece' },
                //     // {
                //     //       "targets": [ 12 ],
                //     //       "visible": false
                //     // },
                {
                    className: 'dt-body-center',
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            // order: [[1, 'asc']],
            order: [],
            // columnDefs: [
            //     {
            //         "orderable": false,
            //         'targets': 0
            //     },
            //     {
            //         'render': function(data, type, row, meta){
            //             if(type === 'display'){
            //                 data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
            //             }

            //         return data;
            //         },
            //         'checkboxes': {
            //         'selectRow': true,
            //         'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
            //         },
            //         'targets': [0]
            //     }
            // ],
            // select: { style: 'multi',  selector: 'td:first-child'},
            // lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            // dom: '<"offset-1"lfB>rt<"offset-1"ip>',
            // // dom: '<"top"i>rt<"bottom"flp><"clear">',
            // drawCallback: function () {
            //     var api = this.api();
            // }
        });

        $(document).on('click', '.addProduct', function() {
            // var rowindex = $(this).closest('tr').index();
            var rowindex = $(this).attr('productid');
            var data = productsnames_array;
            productSearch(data[rowindex - 1]);
            $('#productclose').trigger('click');
            $('#productclose').trigger('click');
            $('.modal-backdrop').hide();
            $('.modal-backdrop').hide();
            $('#product_name_i').focus();

        });
    </script>

@endsection
