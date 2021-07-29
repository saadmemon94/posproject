@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Suppliers List',
    'activePage' => 'Suppliers List',
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
              <a class="btn btn-info btn-round text-white pull-right" href="{{ route('supplier.create') }}">Add Supplier</a>
            <h4 class="card-title">Suppliers</h4>
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
                  <th>Supplier Type</th>
                  <th>Shop Name</th>
                  <th>Shop Description</th>
                  <th>Shop Address</th>
                  <th>Balance Paid</th>
                  <th>Balance Dues</th>
                  <th>Credit Number</th>
                  <th>Credit Type</th>
                  <th>Credit Limit</th>
                  <th>Cash Credit Rate</th>
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
                  <td>General</td> 
                  <td>Soap 101</td>
                  <td>Soap Company</td>
                  <td>Korangi, Karachi</td>
                  <td>10,563</td> 
                  <td>5,729</td>
                  <td>30</td>
                  <td>days</td>
                  <td>30,000</td> 
                  <td>-</td> 
                  <td class="text-right">
                    <a type="button" href="{{ route('supplier.edit', ['supplier' => 1,]) }}" rel="tooltip" class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
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