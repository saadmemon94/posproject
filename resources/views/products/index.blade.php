@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Products List',
    'activePage' => 'Products List',
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
              <a class="btn btn-info btn-round text-white pull-right" href="{{ route('product.create') }}">Add Product</a>
            <h4 class="card-title">Products</h4>
            <div class="col-12 mt-2">
                                        </div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr class="now-th">
                  <th>S.No</th>
                  {{-- <th>Ref.Id</th> --}}
                  <th>Name</th>
                  <th>Barcode</th>
                  <th>Company</th>
                  <th>Brand</th>
                  <th>Total Qty</th>
                  <th>Available Qty</th>
                  {{-- <th>Damage Qty</th> --}}
                  <th>Unit</th>
                  {{-- <th>Piece Carton</th> --}}
                  <th>T.P</th>
                  {{-- <th>Creation date</th> --}}
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
                  {{-- <td>ER345WE67FHG</td> --}}
                  <td>Earphone</td>
                  <td>0142352</td>
                  <td>Samsung</td>
                  <td>Samsung Accessories</td>
                  <td>10</td>
                  <td>8</td>
                  {{-- <td>2</td> --}}
                  <td>piece</td>
                  {{-- <td>60</td> --}}
                  <td>Rs257</td>
                  {{-- <td>25/02/2020 10:14</td> --}}
                  <td class="text-right">
                    <a type="button" href="{{ route('product.edit', ['product' => 1,]) }}" rel="tooltip" class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
                      <i class="fa fa-edit"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  {{-- <td>ER345567FHG</td> --}}
                  <td>Datacable</td>
                  <td>01423786</td>
                  <td>Samsung</td>
                  <td>Samsung Accessories</td>
                  <td>20</td>
                  <td>13</td>
                  {{-- <td>2</td> --}}
                  <td>piece</td>
                  {{-- <td>60</td> --}}
                  <td>Rs100</td>
                  {{-- <td>25/02/2020 10:14</td> --}}
                  <td class="text-right">
                    <a type="button" href="{{ route('product.edit', ['product' => 1,]) }}" rel="tooltip" class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
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