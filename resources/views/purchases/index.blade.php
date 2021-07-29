@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Purchases List',
    'activePage' => 'Purchases List',
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
              <a class="btn btn-info btn-round text-white pull-right" href="{{ route('purchase.create') }}">Add Purchase</a>
            <h4 class="card-title">Purchases</h4>
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
                  <th>Supplier Name</th>
                  <th>!Product Name!</th>
                  <th>Purchase Status</th>
                  <th>Purchase Date</th>
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
                  <td>Ali</td>
                  <td>Earphones</td>
                  <td>Completed</td>
                  <td>22/01/2021</td>
                  <td>2,563</td>
                  <td>1,500</td>
                  <td>1,063</td>
                  <td>Cash</td>
                  <td>due</td>
                  <!-- <td>786</td>
                  <td>22/01/2021</td> -->
                  <td>25</td>
                  <td>days</td>
                  <td class="text-right">
                    <a type="button" href="{{ route('purchase.edit', ['purchase' => 1,]) }}" rel="tooltip" class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
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
