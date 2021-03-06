@extends('dashboard.base')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-info btn-round text-white pull-right"
                                href="{{ route('purchase.paymentcreate') }}">{{ __(' Add Purchase Payment') }}</a>
                            <h4 class="card-title">{{ __(' Purchase Payment List') }}</h4>
                            <div class="col-12">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <!-- Here you can write extra buttons/actions for the toolbar -->
                            </div>
                            <table id="paymentTable"
                                class="table table-sm table-striped table-bordered dataTable display compact hover order-column"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th colspan="1" class="text-center">Supp Info</th>
                                        <th colspan="6" class="text-center">Payment Info</th>
                                        <th colspan="2" class="text-center">Payment Amount</th>
                                        <th colspan="3" class="text-center">Invoice Info</th>
                                        <th colspan="1" class="text-center">Cashier </th>
                                        {{-- <th colspan="1" class="disabled-sorting text-center">Actions</th> --}}
                                    </tr>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Name</th>
                                        {{-- <th class="text-center">Supp Recieved/P</th>
                                        <th class="text-center">Supp Dues</th> --}}
                                        <th class="text-center">Type</th>
                                        <!-- <th class="text-center">Ref_No</th> -->
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Method</th>
                                        <th class="text-center">Cheque No.</th>
                                        <th class="text-center">Cheque Date</th>
                                        <th class="text-center">Remarks</th>
                                        <!-- <th class="text-center">Purchase</th> -->
                                        <th class="text-center">Paid</th>
                                        <th class="text-center">Dues</th>
                                        <th class="text-center">Payment Inv.No</th>
                                        <th class="text-center">Inv Date</th>
                                        <th class="text-center">Purchase Inv.No</th>
                                        <th class="text-center">Created By</th>
                                        {{-- <th>Warehouse</th> --}}
                                        {{-- <th class="disabled-sorting text-center">Edit</th> --}}
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center">Total:</th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                    </tr>
                                </tfoot>
                                {{-- <tbody>
                @foreach ($payments as $key => $value)
                <tr>
                  <td>{{ $value->payment_id }}</td>
                  <td>{{ $value->payment_ref_no }}</td>
                  <td>{{ $value->supplier_name }}</td>
                  <td>{{ $value->payment_status }}</td>
                  <-- <td>{{ $value->payment_date }}</td> -->
                  <td>{{ $value->payment_amount_paid }}</td>
                  <td>{{ $value->payment_amount_dues }}</td>
                  <td>{{ $value->payment_payment_method }}</td>
                  <td>{{ $value->payment_payment_status }}</td>
                  <td>{{ $value->payment_invoice_id }}</td>
                  <td>{{ $value->payment_invoice_date }}</td>
                  <td class="text-right">
                    <a type="button" href="{{ route('payment.edit', ['payment' => $value->payment_id,]) }}" rel="tooltip" class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
                      <i class="fa fa-edit"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody> --}}
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

    <script>
        $(document).ready(function() {
            var dt = $('#paymentTable').DataTable({
                // processing: true,
                // autoWidth: true,
                serverSide: true,
                // fixedColumns: true,
                // scrollCollapse: true,
                // scroller:       true,
                // searching:      true,
                // paging:         true,
                // info:           false,
                ajax: '{{ route('api.payment_p_row_details') }}',
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
                        {{-- width:'25%', --}} className: 'dt-body-center',
                        data: 'supplier_name',
                        name: 'supplier_name'
                    },
                    // {
                    //     className: 'dt-body-center',
                    //     data: 'supplier_amount_recieved',
                    //     name: 'supplier_amount_recieved'
                    // },
                    // {
                    //     className: 'dt-body-center',
                    //     data: 'supplier_amount_dues',
                    //     name: 'supplier_amount_dues'
                    // },
                    {
                        className: 'dt-body-center',
                        data: 'payment_type',
                        name: 'payment_type'
                    },
                    //   { className: 'dt-body-center', data: 'payment_ref_no', name: 'payment_ref_no' },
                    {
                        className: 'dt-body-center',
                        data: 'payment_status',
                        name: 'payment_status'
                    },
                    {
                        className: 'dt-body-center',
                        data: 'payment_method',
                        name: 'payment_method'
                    },
                    {
                        className: 'dt-body-center',
                        data: 'payment_cheque_no',
                        name: 'payment_cheque_no'
                    },
                    {
                        className: 'dt-body-center',
                        data: 'payment_cheque_date',
                        name: 'payment_cheque_date'
                    },
                    {
                        className: 'dt-body-center',
                        data: 'payment_note',
                        render: function(data) {
                            if (data) {
                                return (data.length > 30) ? data.substring(0, 30) + '...' : data;
                            } else {
                                return '';
                            }
                        },
                        name: 'payment_note'
                    },
                    //   { className: 'dt-body-center', data: 'purchase_id', name: 'purchase_id' },
                    {
                        className: 'dt-body-center',
                        data: 'payment_amount_paid',
                        name: 'payment_amount_paid'
                    },
                    {
                        className: 'dt-body-center',
                        data: 'payment_amount_balance',
                        name: 'payment_amount_balance'
                    },
                    {
                        {{-- width:'25%', --}} className: 'dt-body-center',
                        data: 'payment_invoice_id',
                        name: 'payment_invoice_id'
                    },
                    {
                        {{-- width:'25%', --}} className: 'dt-body-center',
                        data: 'payment_invoice_date',
                        name: 'payment_invoice_date'
                    },
                    {
                        {{-- width: '25%', --}} className: 'dt-body-center',
                        data: 'purchase_invoice_id',
                        name: 'purchase_invoice_id'
                    },
                    {
                        {{-- width:'25%', --}} className: 'dt-body-center',
                        data: 'name',
                        name: 'name'
                    },
                    // { className: 'dt-body-center', data: 'action', name: 'action'},
                    // {
                    //       "targets": [ 12 ],
                    //       "visible": false
                    // },
                    // { data: 'warehouse_name', name: 'warehouse_name' },
                    // { data: 'action', name: 'action', orderable: false, searchable: false }
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
                // drawCallback: function () {
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
                    // total_1 = api
                    //     .column(2)
                    //     .data()
                    //     .reduce(function(a, b) {
                    //         return intVal(a) + intVal(b);
                    //     }, 0);

                    // total_2 = api
                    //     .column(3)
                    //     .data()
                    //     .reduce(function(a, b) {
                    //         return intVal(a) + intVal(b);
                    //     }, 0);

                    total_3 = api
                        .column(8)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    total_4 = api
                        .column(9)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // $(api.column(2).footer()).html(total_1.toFixed(2));
                    // $(api.column(3).footer()).html(total_2.toFixed(2));
                    $(api.column(8).footer()).html(total_3.toFixed(2));
                    $(api.column(9).footer()).html(total_4.toFixed(2));

                },
            });
        });
    </script>

@endsection
