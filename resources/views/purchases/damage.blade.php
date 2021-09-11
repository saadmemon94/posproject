@extends('dashboard.base')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Damage Stock List</h4>
                        </div>
                        <div class="card-body-custom col-12">
                            <form id="product_damage" method="post" action="{{ route('purchase.damageprint') }}"
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
                                                        class=" col-12 control-label">&nbsp;&nbsp;{{ __(' Select Company for Print') }}</label>
                                                    <div class=" col-12">
                                                        <select name="product_company"
                                                            class="selectpicker form-control col-12" data-live-search="true"
                                                            data-live-search-style="begins" title="Select Company for Print...">
                                                            <option selected value="">Select Company for Print</option>
                                                            @foreach ($companies as $single_company)
                                                                <option value="{{ $single_company->company_name }}">
                                                                    {{ $single_company->company_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @include('alerts.feedback', ['field' => 'product_company'])
                                                        <button type="submit" id="save-btn"
                                                            class="btn btn-info btn-round pull-right">{{ __('Print Company Now') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-last-col-3"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table id="damageTable"
                                class="table table-sm table-striped table-bordered dataTable display compact hover order-column"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Product RefNo</th>
                                        <th class="text-center">Product Name</th>
                                        <th class="text-center">Company</th>
                                        <th class="text-center">Brand</th>
                                        <th class="text-center">Product Quantity(Pcs)</th>
                                        <th class="text-center">Product Damage</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                @foreach ($products as $key => $value)
                <tr>
                  <td>{{ $value->product_id }}</td>
                  <td>{{ $value->product_ref_no }}</td>
                  <td>{{ $value->product_name }}</td>
                  <td>{{ $value->product_company."/".$value->product_brand }}</td>
                  <td>{{ $value->product_quantity_available }}</td>
                  <td>{{ $value->product_quantity_damage }}</td>
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
        var dt = $('#damageTable').DataTable({
            // processing: true,
            // autoWidth: true,
            serverSide: true,
            // fixedColumns: true,
            // scrollCollapse: true,
            // scroller:       true,
            // searching:      true,
            // paging:         true,
            // info:           false,
            ajax: '{{ route('api.damage_row_details') }}',
            columns: [
                // {
                //   "className":      'details-control',
                //   "orderable":      false,
                //   "searchable":     false,
                //   "data":           null,
                //   "defaultContent": ''
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
                    width: '25%',
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
                {
                    className: 'dt-body-center',
                    data: 'product_quantity_available',
                    name: 'product_quantity_available'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_quantity_damage',
                    name: 'product_quantity_damage'
                },
                // { className: 'dt-body-center', width:'25%', data: 'name', name: 'name' },
                // {
                //       "targets": [ 12 ],
                //       "visible": false
                // },
            ],
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
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, button, config);
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
                        $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config);
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
                        $.fn.dataTable.ext.buttons.print.action.call(this, e, dt, button, config);
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
                total_1 = api
                    .column(5)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                total_2 = api
                    .column(6)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                $(api.column(5).footer()).html(total_1+' pcs');
                $(api.column(6).footer()).html(total_2+' pcs');

            },
        });
        // //  create index for table at columns zero
        // dt.on('order.dt search.dt', function () {
        //   dt.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
        //         cell.innerHTML = i + 1;
        //   });
        // }).draw();

    </script>
@endsection
