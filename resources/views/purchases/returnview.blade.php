@extends('dashboard.base')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __(' View Purchase Return') }}</h5>
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
                                action="{{ route('purchase.update', ['purchase' => $purchase_return->purchase_return_id]) }}"
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
                                                                    <option @if ($purchase_return->purchase_return_supplier_id == $single_supplier->supplier_id) selected @endif status_id="{{$single_supplier->status_id}}" value="{{$single_supplier->supplier_id}}">{{$single_supplier->supplier_name}}</option>
                                                                    ?php if($purchase_return->purchase_return_supplier_id == $single_supplier->supplier_id) $supplierstatus = $single_supplier->status_id; ?>
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
                                                                    value="{{ $purchase_return->purchase_return_amount_paid }}">
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
                                                                    value="{{ $purchase_return->purchase_return_amount_dues }}">
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
                                                                <option @if ($purchase_return->purchase_return_status == 'pending') selected @endif value="pending">
                                                                    Pending</option>
                                                                <option @if ($purchase_return->purchase_return_status == 'ordered') selected @endif value="ordered">
                                                                    Ordered</option>
                                                                <option @if ($purchase_return->purchase_return_status == 'partial') selected @endif value="partial">
                                                                    Partial</option>
                                                                <option @if ($purchase_return->purchase_return_status == 'received') selected @endif value="received">
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
                                                                    <option @if ($purchase_return->purchase_return_payment_method == 'cash') selected @endif value="cash">
                                                                        Cash</option>
                                                                    <option @if ($purchase_return->purchase_return_payment_method == 'credit') selected @endif value="credit">Credit
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
                                                                    value="{{ $purchase_return->purchase_return_invoice_id }}">
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
                                                                    value="{{ $purchase_return->purchase_return_invoice_date }}">
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
                                                                    value="{{ $purchase_return->purchase_return_document }}">
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
                                                                        <th class="col-2 lastcol" scope="col">Total</th>
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
                                                                    @foreach ($purchasereturnproducts as $singlepurchaseproduct)
                                                                        <?php
                                                                        $myproduct_quantity = $singlepurchaseproduct->purchasereturn_quantity_total;
                                                                        $myproduct_discount = $singlepurchaseproduct->purchasereturn_trade_discount;
                                                                        $myproduct_unit_price = $singlepurchaseproduct->purchasereturn_trade_price_piece;
                                                                        
                                                                        $mytotal_items = $j;
                                                                        $mytotal_quantity = $mytotal_quantity + $myproduct_quantity;
                                                                        $mytotal_discount = $mytotal_discount + $myproduct_discount;
                                                                        
                                                                        $myproduct_sub_total = $singlepurchaseproduct->purchasereturn_product_sub_total;
                                                                        $mysubtotal_amount = $mysubtotal_amount + $myproduct_sub_total;
                                                                        $mygrandtotal_amount = $mysubtotal_amount + $purchase_return->purchase_return_free_amount + $purchase_return->purchase_return_add_amount;
                                                                        $j++;
                                                                        ?>
                                                                    @endforeach
                                                                    @foreach ($purchasereturnproducts as $oneselectedproduct)
                                                                        <tr class="row prtr">
                                                                            <td class="col-2 firstcol" scope="col">
                                                                                <input readonly type="text"
                                                                                    name="purchase_products_barcode[]"
                                                                                    id="purchase_products_barcode{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    placeholder="Scan/Search barcode"
                                                                                    value="{{ $oneselectedproduct->purchasereturn_product_barcode }}">
                                                                            </td>
                                                                            <td class="col-3 mycol" scope="col">
                                                                                <input readonly type="text"
                                                                                    name="product_name[]"
                                                                                    id="product_name{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    placeholder="Search product by name/code"
                                                                                    value="{{ $oneselectedproduct->purchasereturn_product_name }}">
                                                                                <input readonly type="hidden"
                                                                                    name="product_code[]"
                                                                                    id="product_code{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchasereturn_product_ref_no }}">
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
                                                                                    value="{{ $oneselectedproduct->purchasereturn_pieces_total }}">
                                                                                <input readonly type="hidden"
                                                                                    name="purchase_pieces_per_packet[]"
                                                                                    id="purchase_pieces_per_packet{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchasereturn_piece_per_packet }}">
                                                                            </td>
                                                                            <td class="col-1 mycol" scope="col">
                                                                                <input readonly type="number"
                                                                                    name="purchase_products_packets[]"
                                                                                    id="purchase_products_packets{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchasereturn_packets_total }}">
                                                                                <input readonly type="hidden"
                                                                                    name="purchase_packets_per_carton[]"
                                                                                    id="purchase_packets_per_carton{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchasereturn_packet_per_carton }}">
                                                                            </td>
                                                                            <td class="col-1 mycol" scope="col">
                                                                                <input readonly type="number"
                                                                                    name="purchase_products_cartons[]"
                                                                                    id="purchase_products_cartons{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchasereturn_cartons_total }}">
                                                                                <input readonly type="hidden"
                                                                                    name="purchase_pieces_per_carton[]"
                                                                                    id="purchase_pieces_per_carton{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchasereturn_piece_per_carton }}">
                                                                            </td>
                                                                            <td class="col-1 mycol" scope="col">
                                                                                <input readonly type="number"
                                                                                    name="purchase_products_unit_price[]"
                                                                                    id="purchase_products_unit_price{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchasereturn_trade_price_piece }}">
                                                                            </td>
                                                                            <td class="col-1 mycol" scope="col">
                                                                                <input readonly type="number"
                                                                                    name="purchase_products_discount[]"
                                                                                    id="purchase_products_discount{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchasereturn_trade_discount }}">
                                                                            </td>
                                                                            <td class="col-2 lastcol" scope="col">
                                                                                <input readonly type="number"
                                                                                    name="purchase_products_sub_total[]"
                                                                                    id="purchase_products_sub_total{{ $i }}"
                                                                                    class="form-control form-col-12"
                                                                                    value="{{ $oneselectedproduct->purchasereturn_product_sub_total }}">
                                                                            </td>
                                                                        </tr>
                                                                        <?php $i++; ?>
                                                                    @endforeach
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
                                                                            <input readonly type="number"
                                                                                name="purchase_free_piece"
                                                                                id="purchase_free_piece"
                                                                                class="form-control form-col-12"
                                                                                value="{{ $purchase_return->purchase_return_free_piece }}">
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="purchase_free_amount"
                                                                                id="purchase_free_amount_i"
                                                                                class="form-control form-col-12"
                                                                                value="{{ $purchase_return->purchase_return_free_amount }}">
                                                                        </td>
                                                                        <td class="col-2 mycol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="purchase_total_price"
                                                                                id="purchase_total_price"
                                                                                class="form-control form-col-12"
                                                                                value="{{ $mysubtotal_amount }}">
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="purchase_add_amount"
                                                                                id="purchase_add_amount_i"
                                                                                class="form-control form-col-12"
                                                                                value="{{ $purchase_return->purchase_return_add_amount }}">
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
                                                                            <input readonly type="number"
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
                                                                    <input readonly type="text" name="purchase_note"
                                                                        id="purchase_note" class="form-control col-12"
                                                                        value="{{ $purchase_return->purchase_return_note }}">
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
                                                                        value="{{ $purchase_return->purchase_return_invoice_id }}">
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
                        </div>
                        <div class="card-footer-custom row">
                            <div class="col-6">
                            </div>
                            </form>
                            <div class="col-6">
                                <a type="button" href="{{ URL::previous() }}"
                                    class="btn btn-secondary btn-round pull-right">{{ __('Back') }}</a>
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

    <script>
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
    </script>

@endsection
