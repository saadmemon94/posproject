@extends('dashboard.base')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Balance Sheet CreditDurationWise</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <table id="balancecreditTable"
                                class="table table-sm table-striped table-bordered dataTable display compact hover order-column"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Customer RefNo</th>
                                        <th>Customer Name</th>
                                        <th>Customer Balance Paid</th>
                                        <th>Customer Balance Dues</th>
                                        <th>Sale Rate</th>
                                        <th>Credit Duration(Days)</th>
                                        <th>Credit Limit</th>
                                        <th>Credit Over</th>
                                    </tr>
                                </thead>
                                {{-- <tfoot>
                <tr>
                </tr>
              </tfoot> --}}
                                {{-- <tbody>
                @foreach ($customers as $key => $value)
                <tr>
                  <td>{{ $value->customer_id }}</td>
                  <td>{{ $value->customer_ref_no }}</td>
                  <td>{{ $value->customer_name }}</td>
                  <td>{{ $value->customer_balance_paid }}</td>
                  <td>{{ $value->customer_balance_dues }}</td>
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
        var dt = $('#balancecreditTable').DataTable({
            // processing: true,
            // autoWidth: true,
            serverSide: true,
            // fixedColumns: true,
            // scrollCollapse: true,
            // scroller:       true,
            // searching:      true,
            // paging:         true,
            // info:           false,
            ordering: false,
            ajax: '{{ route('api.balance_creditduration_row_details') }}',
            columns: [{
                    className: 'dt-body-center',
                    data: 'customer_id',
                    name: 'customer_id'
                },
                {
                    className: 'dt-body-center',
                    data: 'customer_ref_no',
                    name: 'customer_ref_no'
                },
                {
                    width: '25%',
                    className: 'dt-body-center',
                    data: 'customer_name',
                    name: 'customer_name'
                },
                {
                    className: 'dt-body-center',
                    data: 'customer_balance_paid',
                    name: 'customer_balance_paid'
                },
                {
                    className: 'dt-body-center',
                    data: 'customer_balance_dues',
                    name: 'customer_balance_dues'
                },
                {
                    className: 'dt-body-center',
                    data: 'customer_sale_rate',
                    name: 'customer_sale_rate'
                },
                {
                    className: 'dt-body-center',
                    data: 'customer_credit_duration',
                    name: 'customer_credit_duration'
                },
                {
                    className: 'dt-body-center',
                    data: 'customer_credit_limit',
                    name: 'customer_credit_limit'
                },
                {
                    className: 'dt-body-center',
                    data: 'credit_overdue',
                    name: 'credit_overdue'
                },
                // { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            // order: [[5, 'asc']],
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
            drawCallback: function() {
                var api = this.api();
            },
        });
    </script>

@endsection
