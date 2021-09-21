@extends('dashboard.base')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __(' View Sale Return') }}</h5>
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
                            <form id="sale_update" action="" autocomplete="off">
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
                                                    <div class="form-first-col-4">
                                                        <div class="form-group">
                                                            <label readonly for="sale_customer_name"
                                                                class="form-col-10 control-label">&nbsp;&nbsp;{{ __(' Customer Name') }}</label>
                                                            <div class="form-col-12 input-group ">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text barcode">
                                                                        <a class="" data-toggle=" modal"
                                                                            data-target="#customer-list"
                                                                            id="product-list-btn"><i
                                                                                class="fa fa-user"></i></a>
                                                                    </span>
                                                                </div>
                                                                <input readonly type="text" name="sale_customer_name"
                                                                    id="customer_name" placeholder="customer Name"
                                                                    class="form-control col-12"
                                                                    value="{{ $customer->customer_name }}" />
                                                                <input readonly type="hidden" name="sale_customer_id"
                                                                    id="customer_id" class="form-control col-12"
                                                                    value="{{ $customer->customer_id }}" />
                                                                <?php
                                                                $snameArray = [];
                                                                $snamecodeArray = [];
                                                                ?>
                                                                @foreach ($customers as $one_customer)
                                                                    <div class="customernames_array" style="display: none">
                                                                        {{ $snameArray[] = $one_customer->customer_name }}
                                                                    </div>
                                                                    <div class="customernamecode_array"
                                                                        style="display: none">
                                                                        {{ $snamecodeArray[] = $one_customer->customer_name . ', ' . $one_customer->customer_ref_no }}
                                                                    </div>
                                                                @endforeach
                                                                @include('alerts.feedback', ['field' =>
                                                                'sale_customer_name'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-col-1">
                                                        <div class="form-group">
                                                            <label for="customer_status"
                                                                class="form-col-12 control-label">&nbsp;&nbsp;{{ __(' Cust Status') }}</label>
                                                            <div class="form-col-12">
                                                                <input readonly type="text" name="customer_status"
                                                                    id="customer_status" class="form-control col-12"
                                                                    value="@if ($customer->status_id == 1) Active @else Inactive @endif">
                                                                @include('alerts.feedback', ['field' => 'customer_status'])
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <div class="form-col-2">
                                                        <div class="form-group">
                                                            <label for="sale_amount_paid"
                                                                class="form-col-12 control-label">&nbsp;&nbsp;{{ __(' Sale Return Amount Paid') }}</label>
                                                            <div class="form-col-12 input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text rs">Rs: </span>
                                                                </div>
                                                                <input readonly type="number" name="sale_amount_paid"
                                                                    id="sale_balance_paid" class="form-control"
                                                                    value="{{ $sale_return->sale_return_amount_return }}">
                                                                <input readonly type="hidden" name="customer_balance_paid"
                                                                    id="customer_balance_paid" class="form-control col-12"
                                                                    value="{{ $customer->customer_balance_paid }}">
                                                                @include('alerts.feedback', ['field' => 'sale_amount_paid'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-col-2">
                                                        <div class="form-group">
                                                            <label for="sale_amount_dues"
                                                                class="form-col-12 control-label">&nbsp;&nbsp;{{ __(' Sale Return Dues') }}</label>
                                                            <div class="form-col-12 input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text rs">Rs: </span>
                                                                </div>
                                                                <input readonly type="number" name="sale_amount_dues"
                                                                    id="sale_balance_dues" class="form-control"
                                                                    value="{{ $sale_return->sale_return_amount_dues }}">
                                                                <input readonly type="hidden" name="customer_balance_dues"
                                                                    id="customer_balance_dues" class="form-control col-12"
                                                                    value="{{ $customer->customer_balance_dues }}">
                                                                @include('alerts.feedback', ['field' => 'sale_amount_dues'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-col-2">
                                                        <div class="form-group">
                                                            <label for="customer_balance_paid"
                                                                class="form-col-12 control-label">&nbsp;&nbsp;{{ __(' Customer Paid') }}</label>
                                                            <div class="form-col-12 input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text rs">Rs: </span>
                                                                </div>
                                                                <input readonly type="number" name="customer_balance_paid"
                                                                    id="customer_balance_paid" class="form-control col-12"
                                                                    value="{{ $customer->customer_balance_paid }}">
                                                                @include('alerts.feedback', ['field' =>
                                                                'customer_balance_paid'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-last-col-2">
                                                        <div class="form-group">
                                                            <label for="customer_balance_dues"
                                                                class="form-col-12 control-label">&nbsp;&nbsp;{{ __(' Customer Dues') }}</label>
                                                            <div class="form-col-12 input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text rs">Rs: </span>
                                                                </div>
                                                                <input readonly type="number" name="customer_balance_dues"
                                                                    id="customer_balance_dues" class="form-control col-12"
                                                                    value="{{ $customer->customer_balance_dues }}">
                                                                @include('alerts.feedback', ['field' =>
                                                                'customer_balance_dues'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-last-col-2">
                                                        <div class="form-group">
                                                            <label for="sale_status"
                                                                class="form-col-12 control-label">{{ __(' Sale Status') }}</label>
                                                            <div class="form-col-12">
                                                                <select name="sale_status"
                                                                    class="selectpicker form-control col-12"
                                                                    data-live-search="true" data-live-search-style="begins"
                                                                    title="Sale Status">
                                                                    <option @if ($sale_return->sale_return_status == 'pending') selected @endif value="pending">Pending
                                                                    </option>
                                                                    <option @if ($sale_return->sale_return_status == 'created') selected @endif value="created">Created
                                                                    </option>
                                                                    <option @if ($sale_return->sale_return_status == 'completed') selected @endif value="completed">
                                                                        Completed</option>
                                                                </select>
                                                                @include('alerts.feedback', ['field' => 'sale_status'])
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <div class="row">
                                                    <div class="form-first-col-2">
                                                        <div class="form-group">
                                                            <label for="sale_payment_method"
                                                                class="form-col-12 control-label">&nbsp;&nbsp;{{ __(' Payment Method') }}</label>
                                                            <div class="form-col-12">
                                                                <select readonly required id="sale_payment_method"
                                                                    name="sale_payment_method"
                                                                    class="selectpicker form-control col-12"
                                                                    data-live-search="true" data-live-search-style="begins"
                                                                    title="Select Payment Method...">
                                                                    <option @if ($sale_return->sale_return_payment_method == 'cash') selected @endif value="cash">
                                                                        Cash</option>
                                                                    <option @if ($sale_return->sale_return_payment_method == 'credit') selected @endif value="credit">Credit
                                                                    </option>
                                                                    <option @if ($sale_return->sale_return_payment_method == 'nonbulk') selected @endif value="nonbulk">Non
                                                                        Bulk</option>
                                                                </select>
                                                                @include('alerts.feedback', ['field' =>
                                                                'sale_payment_method'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-col-2">
                                                    <div class="form-group">
                                                        <label for="sale_invoice_id" class="form-col-12 control-label">&nbsp;&nbsp;{{__(" Invoice ID")}}</label>
                                                        <div class="form-col-12">
                                                            <div class="myrow">
                                                            <input readonly type="text" name="sale_invoice_id" class="form-control form-col-10" value="{{ $sale_return->sale_return_invoice_id }}">
                                                            <button type="button" href="{{ route('sale.edit', ['sale' => 1,]) }}" class="btn btn-sm btn-warning btn-icon form-col-2" title="Re-Open">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </button>
                                                            </div>
                                                            @include('alerts.feedback', ['field' => 'sale_invoice_id'])
                                                        </div>
                                                    </div>
                                                    </div> --}}
                                                    <div class="form-col-3">
                                                        <div class="form-group">
                                                            {{-- <label for="available_stock" class=" form-col-12 control-label">{{__(" Available Pcs/Pkts/Crtns")}}</label> --}}
                                                            <div class="row">
                                                                <div class=" form-col-4">
                                                                    <label for=""
                                                                        class=" form-col-12 control-label">{{ __(' Avail.Pcs') }}</label>
                                                                    <input readonly type="number" name="available_pcs"
                                                                        id="available_pcs" class="form-control col-12"
                                                                        value="">
                                                                </div>
                                                                <div class=" form-col-4">
                                                                    <label for=""
                                                                        class=" form-col-12 control-label">{{ __(' Avail.Pkts') }}</label>
                                                                    <input readonly type="number" name="available_pkts"
                                                                        id="available_pkts" class="form-control col-12"
                                                                        value="">
                                                                </div>
                                                                <div class=" form-col-4">
                                                                    <label for=""
                                                                        class=" form-col-12 control-label">{{ __(' Aval.Crtns') }}</label>
                                                                    <input readonly type="number" name="available_crtns"
                                                                        id="available_crtns" class="form-control col-12"
                                                                        value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-col-3">
                                                        <div class="form-group">
                                                            <label for="sale_invoice_date"
                                                                class="form-col-12 control-label">&nbsp;&nbsp;{{ __(' Sale Return/Invoice Date') }}</label>
                                                            <div class="form-col-12 input-group ">
                                                                <input readonly type="date" name="sale_invoice_date"
                                                                    class="form-control"
                                                                    value="{{ $sale_return->sale_return_invoice_date }}">
                                                                @include('alerts.feedback', ['field' =>
                                                                'sale_invoice_date'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-last-col-4">
                                                        <div class="row">
                                                            <div class="form-col-6">
                                                                <label for="payterm_duratype"
                                                                    class="form-col-12 control-label">{{ __('Payterm') }}</label>
                                                                <div class="form-col-12">
                                                                    <input readonly type="text" name="payterm_duratype"
                                                                        id="payterm_duratype" class="form-control col-12"
                                                                        value="{{ $customer->customer_credit_duration . ' ' }}{{ $customer->customer_credit_type }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-last-col-6">
                                                                <label for="customer_credit_limit"
                                                                    class=" form-col-12 control-label">{{ __(' Credit Limit') }}</label>
                                                                <div class=" form-col-12">
                                                                    <input readonly type="number"
                                                                        name="customer_credit_limit"
                                                                        id="customer_credit_limit"
                                                                        class="form-control col-12"
                                                                        value="{{ $customer->customer_credit_limit }}">
                                                                    <div id="credit_limit_alert"
                                                                        class="alert alert-danger alert-dismissible fade hide">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-last-col-2">
                                                        <div class="form-group">
                                                            <label for="sale_document"
                                                                class="form-col-12 control-label">&nbsp;&nbsp;{{ __(' Upload Document') }}</label>
                                                            <div class="form-col-12 input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text barcode">
                                                                        <i class="fa fa-file-text-o"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="file" name="sale_document" id="sale_document"
                                                                    class="form-control col-12"
                                                                    value="{{ $sale_return->sale_return_document }}">
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
                                                        <div class="table-responsive-custom">
                                                            <table id="myTable"
                                                                class="table table-hover table-fixed table-bordered order-list">
                                                                <thead class="thead-dark">
                                                                    <tr class="row thead-dark-custom">
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
                                                                <tbody class="sale-product">
                                                                    <?php
                                                                    // $count_$salereturnproducts = count($salereturnproducts);
                                                                    $i = 1;
                                                                    $j = 1;
                                                                    $mytotal_quantity = 0;
                                                                    $mytotal_discount = 0;
                                                                    $mysubtotal_amount = 0;
                                                                    $mygrandtotal_amount = 0;
                                                                    ?>
                                                                    @foreach ($salereturnproducts as $singlesaleproduct)
                                                                        <?php
                                                                        $myproduct_quantity = $singlesaleproduct->salereturn_quantity_total;
                                                                        $myproduct_discount = $singlesaleproduct->salereturn_trade_discount;
                                                                        $myproduct_unit_price = $singlesaleproduct->salereturn_trade_price_piece;
                                                                        
                                                                        $mytotal_items = $j;
                                                                        $mytotal_quantity = $mytotal_quantity + $myproduct_quantity;
                                                                        $mytotal_discount = $mytotal_discount + $myproduct_discount;
                                                                        
                                                                        $myproduct_sub_total = $singlesaleproduct->return_product_sub_total;
                                                                        $mysubtotal_amount = $mysubtotal_amount + $myproduct_sub_total;
                                                                        $mygrandtotal_amount = $mysubtotal_amount + $sale_return->sale_return_free_amount + $sale_return->sale_return_add_amount;
                                                                        $j++;
                                                                        ?>
                                                                    @endforeach
                                                                    @foreach ($salereturnproducts as $oneselectedproduct)
                                                                        <tr class="row prtr">
                                                                            <td class="col-2 firstcol" scope="col">
                                                                                <input readonly type="text"
                                                                                    name="sale_products_barcode[]"
                                                                                    id="sale_products_barcode{{ $i }}"
                                                                                    class="form-control col-12"
                                                                                    placeholder="Scan/Search barcode"
                                                                                    value="{{ $oneselectedproduct->salereturn_product_barcode }}">
                                                                            </td>
                                                                            <td class="col-3 mycol" scope="col">
                                                                                <input readonly type="text"
                                                                                    name="product_name[]"
                                                                                    id="product_name{{ $i }}"
                                                                                    class="form-control col-12"
                                                                                    placeholder="Search product by name/code"
                                                                                    value="{{ $oneselectedproduct->salereturn_product_name . ' <' . $oneselectedproduct->salereturn_product_punch_time . '>' }}">
                                                                                <input readonly type="hidden"
                                                                                    name="product_code[]"
                                                                                    id="product_code{{ $i }}"
                                                                                    class="form-control col-12"
                                                                                    value="{{ $oneselectedproduct->salereturn_product_ref_no }}">
                                                                                <input readonly type="hidden"
                                                                                    name="product_id[]"
                                                                                    id="product_id{{ $i }}"
                                                                                    class="form-control col-12"
                                                                                    value="{{ $oneselectedproduct->product_id }}">
                                                                            </td>
                                                                            <td class="col-1 mycol" scope="col">
                                                                                <input readonly type="number"
                                                                                    name="sale_products_pieces[]"
                                                                                    id="sale_products_pieces{{ $i }}"
                                                                                    class="form-control col-12"
                                                                                    value="{{ $oneselectedproduct->salereturn_pieces_total }}">
                                                                                <input readonly type="hidden"
                                                                                    name="sale_pieces_per_packet[]"
                                                                                    id="sale_pieces_per_packet{{ $i }}"
                                                                                    class="form-control col-12"
                                                                                    value="{{ $oneselectedproduct->salereturn_piece_per_packet }}">
                                                                            </td>
                                                                            <td class="col-1 mycol" scope="col">
                                                                                <input readonly type="number"
                                                                                    name="sale_products_packets[]"
                                                                                    id="sale_products_packets{{ $i }}"
                                                                                    class="form-control col-12"
                                                                                    value="{{ $oneselectedproduct->salereturn_packets_total }}">
                                                                                <input readonly type="hidden"
                                                                                    name="sale_packets_per_carton[]"
                                                                                    id="sale_packets_per_carton{{ $i }}"
                                                                                    class="form-control col-12"
                                                                                    value="{{ $oneselectedproduct->salereturn_packet_per_carton }}">
                                                                            </td>
                                                                            <td class="col-1 mycol" scope="col">
                                                                                <input readonly type="number"
                                                                                    name="sale_products_cartons[]"
                                                                                    id="sale_products_cartons{{ $i }}"
                                                                                    class="form-control col-12"
                                                                                    value="{{ $oneselectedproduct->salereturn_cartons_total }}">
                                                                                <input readonly type="hidden"
                                                                                    name="sale_pieces_per_carton[]"
                                                                                    id="sale_pieces_per_carton{{ $i }}"
                                                                                    class="form-control col-12"
                                                                                    value="{{ $oneselectedproduct->salereturn_piece_per_carton }}">
                                                                            </td>
                                                                            <td class="col-1 mycol" scope="col">
                                                                                <input readonly type="number"
                                                                                    name="sale_products_unit_price[]"
                                                                                    id="sale_products_unit_price{{ $i }}"
                                                                                    class="form-control col-12"
                                                                                    value="{{ $oneselectedproduct->salereturn_trade_price_piece }}">
                                                                                <input readonly type="hidden"
                                                                                    name="sale_products_packet_price[]"
                                                                                    id="sale_products_packet_price{{ $i }}"
                                                                                    value="{{ $oneselectedproduct->salereturn_trade_price_packet }}">
                                                                                <input readonly type="hidden"
                                                                                    name="sale_products_carton_price[]"
                                                                                    id="sale_products_carton_price{{ $i }}"
                                                                                    value="{{ $oneselectedproduct->salereturn_trade_price_carton }}">
                                                                            </td>
                                                                            <td class="col-1 mycol" scope="col">
                                                                                <input readonly type="number"
                                                                                    name="sale_products_discount[]"
                                                                                    id="sale_products_discount{{ $i }}"
                                                                                    class="form-control col-12"
                                                                                    value="{{ $oneselectedproduct->salereturn_trade_discount }}">
                                                                                <input readonly type="hidden"
                                                                                    name="sale_products_punch[]"
                                                                                    id="sale_products_punch{{ $i }}"
                                                                                    value="{{ $oneselectedproduct->salereturn_product_punch_time }}">
                                                                            </td>
                                                                            <td class="col-2 lastcol" scope="col">
                                                                                <input readonly type="number"
                                                                                    name="sale_products_sub_total[]"
                                                                                    id="sale_products_sub_total{{ $i }}"
                                                                                    class="form-control col-12"
                                                                                    value="{{ $oneselectedproduct->salereturn_product_sub_total }}">
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
                                                                            Returned Amount</th>
                                                                    </tr>
                                                                    <tr class="row table-info">
                                                                        <td class="col-1 firstcol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="sale_total_items"
                                                                                id="sale_total_items"
                                                                                class="form-control col-12"
                                                                                value="{{ $sale_return->sale_return_total_items }}">
                                                                            {{-- value="{{ $mytotal_items }}"> --}}
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="sale_total_qty" id="sale_total_qty"
                                                                                class="form-control col-12"
                                                                                value="{{ $sale_return->sale_return_total_quantity }}">
                                                                            {{-- value="{{ $mytotal_quantity }}"> --}}
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="sale_free_piece" id="sale_free_piece"
                                                                                class="form-control col-12"
                                                                                value="{{ $sale_return->sale_return_free_piece }}">
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="sale_free_amount"
                                                                                id="sale_free_amount"
                                                                                class="form-control col-12"
                                                                                value="{{ $sale_return->sale_return_free_amount }}">
                                                                        </td>
                                                                        <td class="col-2 mycol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="sale_total_price"
                                                                                id="sale_total_price"
                                                                                class="form-control col-12"
                                                                                value="{{ $sale_return->sale_return_total_price }}">
                                                                            {{-- value="{{ $mysubtotal_amount }}"> --}}
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="sale_add_amount" id="sale_add_amount"
                                                                                class="form-control col-12"
                                                                                value="{{ $sale_return->sale_return_add_amount }}">
                                                                        </td>
                                                                        <td class="col-1 mycol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="sale_discount" id="sale_discount"
                                                                                class="form-control col-12"
                                                                                value="{{ $sale_return->sale_return_discount }}">
                                                                            {{-- value="{{ $mytotal_discount }}"> --}}
                                                                        </td>
                                                                        <td class="col-2 mycol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="sale_grandtotal_price"
                                                                                id="sale_grandtotal_price"
                                                                                id="sale_grandtotal_price"
                                                                                class="form-control col-12"
                                                                                value="{{ $sale_return->sale_return_grandtotal_price }}">
                                                                            {{-- value="{{ $mygrandtotal_amount }}"> --}}
                                                                        </td>
                                                                        <td class="col-2 lastcol" scope="col">
                                                                            <input readonly type="number"
                                                                                name="sale_amount_recieved"
                                                                                id="sale_amount_recieved"
                                                                                class="form-control col-12"
                                                                                value="{{ $sale_return->sale_return_amount_return }}">
                                                                        </td>
                                                                    </tr>
                                                        </div>
                                                        </thead>
                                                        <tbody class="___class_+?206___">
                                                        </tbody>
                                                        <tfoot class="thead-dark">
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
                                    <input type="text" name="sale_invoice_id" class="form-control col-12" value="{{ old('sale_invoice_id', '') }}">
                                  </td>
                                  <td class="col-3 midcol" scope="col">
                                    <div class="row">
                                      <input type="text" name="sale_invoice_date" class="form-control col-9" value="{{ old('sale_invoice_date', '') }}">
                                      <button type="button" href="{{ route('sale.edit', ['sale' => 1,]) }}" class="btn btn-sm btn-warning btn-icon col-2" title="Re-Open">
                                        <i class="fa fa-file-text-o"></i>
                                      </button>
                                    </div>
                                  </td> --}}
                                                                {{-- <td class="col-2 mycol" scope="col">
                                    <input type="file" name="sale_document" id="sale_document" class="form-control col-12" value="{{ old('sale_document', '') }}">
                                  </td> --}}
                                                                <td class="col-10 firstcol" scope="col">
                                                                    <input readonly type="text" name="sale_note"
                                                                        id="sale_note" class="form-control col-12"
                                                                        value="{{ $sale_return->sale_return_note }}">
                                                                </td>
                                                                {{-- <td class="col-2 mycol" scope="col">
                                                                    <select readonly name="sale_payment_status"
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
                                                                    <input readonly type="text" name="sale_invoice_id"
                                                                        class="form-control form-col-12"
                                                                        value="{{ $sale_return->sale_return_invoice_id }}">
                                                                    {{-- <button type="button" href="{{ route('sale.edit', ['sale' => 1,]) }}" class="btn btn-sm btn-warning btn-icon form-col-2" title="Re-Open">
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
                                                    {{-- <input type="hidden" name="sale_products_barcode_2" id="product_barcode2" value="{{ $one_product->product_barcode }}"/> --}}
                                                    <input type="hidden" name="pieces_per_packet" id="pieces_per_packet"
                                                        value="{{ $one_product->product_piece_per_packet }}" />
                                                    <input type="hidden" name="pieces_per_carton" id="pieces_per_carton"
                                                        value="{{ $one_product->product_piece_per_carton }}" />
                                                    {{-- <input type="hidden" name="items" id="items"/>
                          <input type="hidden" name="total_qty" id="total_qty"/>
                          <input type="hidden" name="total_price" />
                          <input type="hidden" name="grand_total" />
                          <input type="hidden" name="total_discount" value="0.00"/>
                          <input type="hidden" name="sale_status" value="1" />
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
                                                <h5 id="exampleModalLabel" class="modal-title">Finalize sale</h5>
                                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <div class="row">
                                                            <div class="col-6 mt-1">
                                                                <label>Recieved Amount *</label>
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
                                                                <label>sale Note</label>
                                                                <textarea rows="3" class="form-control" name="sale_note"></textarea>
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
                        <div class="card-footer row">
                            <div class="col-6">
                            </div>
                            </form>
                            <div class="col-6">
                                <a type="button" href="{{ route('sale.return') }}" {{-- URL::previous() --}}
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

    <script type="text/javascript">
        var total_items;
        var total_quantity;
        var total_discount
        var subtotal_amount;
        var grandtotal_amount;
        var sale_free_amount;
        var sale_add_amount;
        var sale_amount_recieved;
        var sale_return_change;
        var product_quantity;
        var product_sub_total;
        var customer_balance_dues;
        var customer_balance_dues2;
        var customer_balance_dues3;
        var my_total_qty;
        var i = 1;

        var rowindex;
        var customer_sale_rate;
        var row_product_price;
        var pos;

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
