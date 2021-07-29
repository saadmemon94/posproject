@extends('dashboard.base')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Available Stock List</h4>
                        </div>
                        <div class="card-body-custom col-12">
                            <form id="product_available" method="post" action="{{ route('purchase.availableprint') }}"
                                autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="form-first-col-3"></div>
                                            <div class="form-col-3"></div>
                                            <div class="form-col-3">
                                                <div class="form-group">
                                                    <label for="product_company"
                                                        class=" col-12 control-label">&nbsp;&nbsp;{{ __(' Company') }}</label>
                                                    <div class=" col-12">
                                                        <select name="product_company"
                                                            class="selectpicker form-control col-12" data-live-search="true"
                                                            data-live-search-style="begins" title="Select Company...">
                                                            <option selected value="">Select</option>
                                                            @foreach ($companies as $single_company)
                                                                <option value="{{ $single_company->company_name }}">
                                                                    {{ $single_company->company_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @include('alerts.feedback', ['field' => 'product_company'])
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-last-col-3">
                                                <div class="form-group">
                                                    <label for="save-btn"
                                                        class=" col-12 control-label">&nbsp;&nbsp;{{ __('') }}</label>
                                                    <div class=" col-12">
                                                        <button type="submit" id="save-btn"
                                                            class="btn btn-info btn-round pull-right">{{ __('Print') }}</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table id="availableTable"
                                class="table table-sm table-striped table-bordered dataTable display compact hover order-column"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Product RefNo</th>
                                        <th class="text-center">Product Name</th>
                                        <th class="text-center">Company</th>
                                        <th class="text-center">Brand</th>
                                        {{-- <th class="text-center">Product Pieces</th>
                  <th class="text-center">Product Packets</th>
                  <th class="text-center">Product Cartons</th> --}}
                                        <th class="text-center">Product Quantity</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                @foreach ($products as $key => $value)
                <tr>
                  <td>{{ $value->product_id }}</td>
                  <td>{{ $value->product_ref_no }}</td>
                  <td>{{ $value->product_name }}</td>
                  <td>{{ $value->product_company."/".$value->product_brand }}</td>
                  <td>{{ $value->product_pieces_available }}</td>
                  <td>{{ $value->product_packets_available }}</td>
                  <td>{{ $value->product_cartons_available }}</td>
                  <td>{{ $value->product_quantity_available }}</td> 
                </tr>
                @endforeach
              </tbody> --}}
                                <tfoot>
                                    <tr>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center">Total:</th>
                                        <th style="text-align:center"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- end content-->
                    </div>
                    <!--  end card  -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
        </div>
    </div>
@endsection

@section('javascript')

    <script type="text/javascript">
        $(document).ready(function() {
            var dt = $('#availableTable').DataTable({
                // processing: true,
                // autoWidth: true,
                serverSide: true,
                // fixedColumns: true,
                // scrollCollapse: true,
                // scroller:       true,
                // searching:      true,
                // paging:         true,
                // info:           false,
                // rowReorder: true,      
                ajax: '{{ route('api.available_row_details') }}',
                columns: [
                    // {
                    //   "className":      'dt-body-center',
                    //   "orderable":      false,
                    //   "searchable":     false,
                    //   // "targets": 0,
                    //   "data":           null,
                    //   "defaultContent": ''
                    //   // "data": null, 
                    //   // "render": function (data, type, full, meta) {
                    //   //   return meta.row + 1;
                    //   // },
                    // },
                    {
                        className: 'dt-body-center',
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        className: 'dt-body-center',
                        data: 'product_ref_no',
                        name: 'product_ref_no'
                    },
                    {
                        className: 'dt-body-center',
                        data: 'product_name',
                        name: 'product_name'
                    },
                    {
                        className: 'dt-body-center',
                        data: 'product_company',
                        name: 'product_company'
                    },
                    {
                        className: 'dt-body-center',
                        data: 'product_brand',
                        name: 'product_brand'
                    },
                    // { className: 'dt-body-center', data: 'product_pieces_available', name: 'product_pieces_available' },
                    // { className: 'dt-body-center', data: 'product_packets_available', name: 'product_packets_available' },
                    // { className: 'dt-body-center', data: 'product_cartons_available', name: 'product_cartons_available' },
                    {
                        className: 'dt-body-center',
                        data: 'product_quantity_available',
                        name: 'product_quantity_available'
                    },
                    // { className: 'dt-body-center', width:'25%', data: 'name', name: 'name' },
                    // {
                    //       "targets": [ 12 ],
                    //       "visible": false
                    // },
                ],
                // .unshift({data : 'Index'}),
                order: [
                    [1, 'asc']
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                },
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                dom: '<"offset-1"lfB>rt<"offset-1"ip>',
                // dom: '<"top"i>rt<"bottom"flp><"clear">',
                buttons: [{
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible:Not(.not-exported-sale)',
                            rows: ':visible'
                        },
                        action: function(e, dt, button, config) {
                            $.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, button,
                                config);
                        },
                        footer: true
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible:Not(.not-exported-sale)',
                            rows: ':visible'
                        },
                        action: function(e, dt, button, config) {
                            $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button,
                                config);
                        },
                        footer: true
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible:Not(.not-exported-sale)',
                            rows: ':visible'
                        },
                        action: function(e, dt, button, config) {
                            $.fn.dataTable.ext.buttons.print.action.call(this, e, dt, button,
                                config);
                        },
                        footer: true
                    },
                    {
                        extend: 'colvis',
                        columns: ':gt(0)'
                    }
                ],
                // drawCallback: function() {
                //     var api = this.api();
                // },
                footerCallback: function(row, data, start, end, display) {
                    var api = this.api(),
                        data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column(5)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    $(api.column(5).footer()).html(total.toFixed(3));

                },
            });
            //  create index for table at columns zero
            // dt.on('order.dt search.dt', function () {
            //   dt.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            //         cell.innerHTML = i + 1;
            //         // dt.cell(cell).invalidate('dom');
            //     });
            // }).draw();
        });

    </script>

@endsection
