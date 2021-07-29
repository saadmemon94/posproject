@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Sales List',
    'activePage' => 'Sales List',
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
              <a class="btn btn-info btn-round text-white pull-right" href="{{ route('sale.create') }}">Add Sale</a>
            <h4 class="card-title">Sales</h4>
            <div class="col-12 mt-2">
                                        </div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Ref_ID</th>
                  <th>Customer Name</th>
                  <th>!Product Name!</th>
                  <th>Sale Status</th>
                  <th>Sale Date</th>
                  <th>Grandtotal Price</th>
                  <th>Amount Paid</th>
                  <th>Amount Dues</th>
                  <th>Payment Method</th>
                  <th>Payment Status</th>
                  <!-- <th>Invoice Id</th>
                  <th>Invoice Date</th> -->
                  <th>Payterm Duration</th>
                  <th>Payterm Type</th>
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </thead>
              {{-- <tfoot>
                <tr>
                </tr>
              </tfoot> --}}
              <tbody>
                <tr>
                  <td>1</td>
                  <td>EJSI8324</td>
                  <td>Asif</td>
                  <td>Soap 101</td>
                  <td>Completed</td>
                  <td>22/01/2021</td>
                  <td>1,563</td>
                  <td>1,000</td>
                  <td>563</td>
                  <td>Cash</td>
                  <td>due</td>
                  <!-- <td>786</td>
                  <td>22/01/2021</td> -->
                  <td>30</td>
                  <td>days</td>
                  <td class="text-right">
                    <a type="button" href="{{ route('sale.edit', ['sale' => 1,]) }}" rel="tooltip" class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
                      <i class="fa fa-edit"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
    <!-- end row -->
  </div>
@endsection
