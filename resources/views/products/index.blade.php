@extends('dashboard.base')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-info btn-round text-white pull-right"
                                href="{{ route('product.create') }}">Add Product</a>
                            <h4 class="card-title">Products</h4>
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
                        <div class="card-body">
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <table id="productTable"
                                class="table table-sm table-striped table-bordered dataTable display compact hover order-column"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        {{-- <th>Ref.Id</th> --}}
                                        <th colspan="2"></th>
                                        <th colspan="3">Product Info</th>
                                        {{-- <th colspan="2">Company/Brand</th> --}}
                                        <th colspan="4">Total Quantity</th>
                                        {{-- <th>Totl.Pkt</th>
                  <th>Totl.Crt</th> --}}
                                        <th colspan="4">Aval Quantity</th>
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
                                        {{-- <th class="disabled-sorting text-center">Edit</th> --}}
                                    </tr>
                                    <tr>
                                        {{-- <th>Ref.Id</th> --}}
                                        <th class="text-center"></th>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Company</th>
                                        <th class="text-center">Brand</th>
                                        <th class="text-center">Pc</th>
                                        <th class="text-center">Pkt</th>
                                        <th class="text-center">Crt</th>
                                        <th class="text-center">Ttl</th>
                                        <th class="text-center">Pc</th>
                                        <th class="text-center">Pkt</th>
                                        <th class="text-center">Crt</th>
                                        <th class="text-center">Ttl</th>
                                        {{-- <th>Damage Qty</th> --}}
                                        {{-- <th>Piece Carton</th> --}}
                                        <th class="text-center">Pc</th>
                                        <th class="text-center">Pkt</th>
                                        <th class="text-center">Crt</th>
                                        <th class="text-center">Pc</th>
                                        <th class="text-center">Pkt</th>
                                        <th class="text-center">Crt</th>
                                        <th class="text-center">Pc</th>
                                        <th class="text-center">Pkt</th>
                                        <th class="text-center">Crt</th>
                                        {{-- <th>Expiry</th> --}}
                                        {{-- <th>Status</th> --}}
                                        {{-- <th class="disabled-sorting text-center">Edit</th> --}}
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
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
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center"></th>
                                    </tr>
                                </tfoot>
                                {{-- <tbody>
                @foreach ($products as $key => $value)
                  <tr>
                    <!-- <td>{ $value->product_ref_no }}</td> -->
                    <!-- <td>{ $value->product_warehouse }}</td> -->
                    <td>{{ $value->product_name }}</td>
                    <td>{{ $value->product_barcode }}</td>
                    <td>{{ $value->product_company }}</td>
                    <td>{{ $value->product_brands }}</td>
                    <td>{{ $value->product_pieces_total }}/{{ $value->product_packets_total }}/{{ $value->product_cartons_total }}</td>
                    <td>{{ $value->product_pieces_available }}/{{ $value->product_packets_available }}/{{ $value->product_cartons_available }}</td>
                    <!-- <td>{ $value->product_damage_quantity }}</td>
                    <td>{{ $value->product_piece_per_carton }}</td>  -->
                    <td>{{ $value->product_trade_price_piece }}/{{ $value->product_trade_price_packet }}/{{ $value->product_trade_price_carton }}</td>
                    <td>{{ $value->product_cash_price_piece }}/{{ $value->product_cash_price_packet }}/{{ $value->product_cash_price_carton }}</td>
                    <td>{{ $value->product_credit_price_piece }}/{{ $value->product_credit_price_packet }}/{{ $value->product_credit_price_carton }}</td>
                    <!-- <td>{ $value->product_expirydate }}</td>
                    <td>{ $value->status_id }}</td> -->
                    <td class="text-right">
                      <a type="button" href="{{ route('product.edit', ['product' => $value->product_id,]) }}" rel="tooltip" class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
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
        // var template = Handlebars.compile($("#details-template").html());
        function format(d) {
            var sum = [];
            $.each(d.barcodes, function(i, id) {
                sum[i] = "&nbsp;" + "&nbsp;" + "&nbsp;" + d.barcodes[i].product_barcodes;
                // sum[i] = 'Attached Barcodes: '+"&nbsp;"+"&nbsp;"+"&nbsp;"+d.barcodes[i].product_barcodes+'<br>';
            });
            // $products->product_id
            return '<a href="product/' + d.product_id +
                '/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Edit</a>' + '&nbsp;&nbsp;' +
                'Attached Barcodes: ' + sum;
            // return 'Attached Barcodes: '+sum;
        }
        var dt = $('#productTable').DataTable({
            // processing: true,
            serverSide: true,
            ajax: "{{ route('api.product_row_details') }}",
            columns: [{
                    "className": 'details-control',
                    "orderable": false,
                    "searchable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {
                    className: 'dt-body-center',
                    searchable: false,
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_name',
                    name: 'product_name',
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
                    data: 'product_pieces_total',
                    name: 'product_pieces_total'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_packets_total',
                    name: 'product_packets_total'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_cartons_total',
                    name: 'product_cartons_total'
                },
                {
                    className: 'dt-body-center',
                    data: 'product_quantity_total',
                    name: 'product_quantity_total'
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
                    data: 'product_quantity_available',
                    name: 'product_quantity_available'
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
                // { data: 'action', name: 'action'},
            ],
            order: [
                [2, 'asc']
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
                total_3 = api
                    .column(7)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                total_4 = api
                    .column(8)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                total_5 = api
                    .column(9)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                total_6 = api
                    .column(10)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                total_7 = api
                    .column(11)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                total_8 = api
                    .column(12)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // total_9 = api
                //     .column(13)
                //     .data()
                //     .reduce(function(a, b) {
                //         return intVal(a) + intVal(b);
                //     }, 0);
                // total_10 = api
                //     .column(14)
                //     .data()
                //     .reduce(function(a, b) {
                //         return intVal(a) + intVal(b);
                //     }, 0);
                // total_11 = api
                //     .column(15)
                //     .data()
                //     .reduce(function(a, b) {
                //         return intVal(a) + intVal(b);
                //     }, 0);
                // total_12 = api
                //     .column(16)
                //     .data()
                //     .reduce(function(a, b) {
                //         return intVal(a) + intVal(b);
                //     }, 0);
                // total_13 = api
                //     .column(17)
                //     .data()
                //     .reduce(function(a, b) {
                //         return intVal(a) + intVal(b);
                //     }, 0);
                // total_14 = api
                //     .column(18)
                //     .data()
                //     .reduce(function(a, b) {
                //         return intVal(a) + intVal(b);
                //     }, 0);
                // total_15 = api
                //     .column(19)
                //     .data()
                //     .reduce(function(a, b) {
                //         return intVal(a) + intVal(b);
                //     }, 0);
                // total_16 = api
                //     .column(20)
                //     .data()
                //     .reduce(function(a, b) {
                //         return intVal(a) + intVal(b);
                //     }, 0);
                // total_17 = api
                //     .column(21)
                //     .data()
                //     .reduce(function(a, b) {
                //         return intVal(a) + intVal(b);
                //     }, 0);

                $(api.column(5).footer()).html(total_1);
                $(api.column(6).footer()).html(total_2.toFixed(2));
                $(api.column(7).footer()).html(total_3.toFixed(2));
                $(api.column(8).footer()).html(total_4.toFixed(2));
                $(api.column(9).footer()).html(total_5);
                $(api.column(10).footer()).html(total_6.toFixed(2));
                $(api.column(11).footer()).html(total_7.toFixed(2));
                $(api.column(12).footer()).html(total_8.toFixed(2));

                // $(api.column(13).footer()).html(total_9.toFixed(2));
                // $(api.column(14).footer()).html(total_10.toFixed(2));
                // $(api.column(15).footer()).html(total_11.toFixed(2));

                // $(api.column(16).footer()).html(total_12.toFixed(2));
                // $(api.column(17).footer()).html(total_13.toFixed(2));
                // $(api.column(18).footer()).html(total_14.toFixed(2));

                // $(api.column(19).footer()).html(total_15.toFixed(2));
                // $(api.column(20).footer()).html(total_16.toFixed(2));
                // $(api.column(21).footer()).html(total_17.toFixed(2));

            },
        });

        // $('#productTable table tbody').on('click', 'td.details-control', function () {
        //   var tr = $(this).closest('tr');
        //   var row = mytable.row( tr );

        //   if ( row.child.isShown() ) {
        //     // This row is already open - close it
        //     row.child.hide();
        //     tr.removeClass('shown');
        //   }
        //   else {
        //     // Open this row
        //     row.child( template(row.data()) ).show();
        //     tr.addClass('shown');
        //   }
        // });

        // Array to track the ids of the details displayed rows
        var detailRows = [];

        $('#productTable tbody').on('click', 'tr td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = dt.row(tr);
            var idx = $.inArray(tr.attr('id'), detailRows);

            // console.log(row.data());

            if (row.child.isShown()) {
                tr.removeClass('details');
                row.child.hide();

                // Remove from the 'open' array
                detailRows.splice(idx, 1);
            } else {
                tr.addClass('details');
                row.child(format(row.data())).show();

                // Add to the 'open' array
                if (idx === -1) {
                    detailRows.push(tr.attr('id'));
                }
            }
        });

        // On each draw, loop over the `detailRows` array and show any child rows
        dt.on('draw', function() {
            $.each(detailRows, function(i, id) {
                $('#' + id + ' td.details-control').trigger('click');
            });
        });


        // var selected = [];

        // $('#productTable tbody').on('click', 'tr', function () {
        //   var id = this.id;
        //   var index = $.inArray(id, selected);

        //   if ( index === -1 ) {
        //       selected.push( id );
        //   } else {
        //       selected.splice( index, 1 );
        //   }

        //   $(this).toggleClass('selected');
        // });
    </script>
@endsection
