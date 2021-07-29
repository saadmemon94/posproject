@extends('dashboard.base')

@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Edit Supplier")}}</h5>
          </div>
          <div class="card-body-custom">
            <form id="supplier_update" method="post" action="{{ route('supplier.update', ['supplier' => $supplier[0]->supplier_id,]) }}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              @method('put')
              @include('alerts.success')
              <div class="row">
                <div class="card-body-custom col-12 ">
                  <div class="row">
                    <div class="col-3 ">
                      <div class="form-group">
                        <label for="supplier_ref_no" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Reference No.")}}</label>
                          <div class=" col-12">
                            <input type="text" name="supplier_ref_no" class="form-control col-12" value="{{ $supplier[0]->supplier_ref_no }}">
                            @include('alerts.feedback', ['field' => 'supplier_ref_no'])
                          </div>
                      </div>
                    </div>
                    <div class="col-3 ">
                      <div class="form-group">
                        <label for="supplier_type" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Supplier Type")}}</label>
                        <div class=" col-12">
                          <select name="supplier_type" class="selectpicker form-control col-12" data-live-search="true" data-live-search-style="begins" title="Select Brand...">
                            <option value="general" {{ $supplier[0]->supplier_type == 'general' ? 'selected' : '' }}>General</option>
                            <option value="booker" {{ $supplier[0]->supplier_type == 'booker' ? 'selected' : '' }}>Booker</option>
                          </select>
                          @include('alerts.feedback', ['field' => 'supplier_type'])
                        </div>
                      </div>
                    </div>
                    <div class="col-3 ">
                        <div class="form-group">
                          <label for="supplier_name" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Supplier Name")}}</label>
                          <div class=" col-12">
                            <input type="text" name="supplier_name" class="form-control col-12" value="{{ $supplier[0]->supplier_name }}">
                            @include('alerts.feedback', ['field' => 'supplier_name'])
                          </div>
                        </div>
                    </div>
                    <div class="col-3 ">
                      <div class="form-group">
                        <label for="supplier_shop_name" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Shop Name")}}</label>
                          <div class=" col-12">
                            <input type="text" name="supplier_shop_name" class="form-control col-12" value="{{ $supplier[0]->supplier_shop_name }}">
                            @include('alerts.feedback', ['field' => 'supplier_shop_name'])
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class=" col-6 ">
                        <div class="form-group">
                          <label for="supplier_shop_info" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Shop Description")}}</label>
                            <div class=" col-12">
                              <input type="text" name="supplier_shop_info" rows="2" class="form-control col-12" value="{{ $supplier[0]->supplier_shop_info }}">
                              @include('alerts.feedback', ['field' => 'supplier_shop_info'])
                            </div>
                        </div>
                    </div>
                    <div class=" col-3 ">
                      <div class="form-group">
                        <label for="supplier_balance_paid" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Balance Paid")}}</label>
                          <div class=" col-12 input-group ">
                            <div class="input-group-prepend">
                              <span class="input-group-text rs">Rs: </span>
                            </div>
                            <input type="number" name="supplier_balance_paid" class="form-control" value="{{ $supplier[0]->supplier_balance_paid }}">
                            @include('alerts.feedback', ['field' => 'supplier_balance_paid'])
                          </div>
                      </div>
                    </div>
                    <div class=" col-3 ">
                        <div class="form-group">
                          <label for="supplier_balance_dues" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Balance Dues")}}</label>
                            <div class=" col-12 input-group ">
                              <div class="input-group-prepend">
                                <span class="input-group-text rs">Rs: </span>
                              </div>
                              <input type="number" name="supplier_balance_dues" class="form-control" value="{{ $supplier[0]->supplier_balance_dues }}">
                              @include('alerts.feedback', ['field' => 'supplier_balance_dues'])
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class=" col-6">
                      <div class="form-group">
                        <label for="supplier_email" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Email")}}</label>
                          <div class=" col-12">
                            <input type="text" name="supplier_email" class="form-control col-12" value="{{ $supplier[0]->supplier_email }}">
                            @include('alerts.feedback', ['field' => 'supplier_email'])
                          </div>
                      </div>
                    </div>
                    <div class=" col-6">
                        <div class="form-group">
                          <label for="supplier_alternate_email" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Alternate Email")}}</label>
                          <div class=" col-12">
                            <input type="text" name="supplier_alternate_email" class="form-control col-12" value="{{ $supplier[0]->supplier_alternate_email }}">
                            @include('alerts.feedback', ['field' => 'supplier_alternate_email'])
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class=" col-3 ">
                      <div class="form-group">
                        <label for="supplier_cnic_number" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Cnic Number")}}</label>
                          <div class=" col-12">
                            <input type="text" name="supplier_cnic_number" class="form-control col-12" value="{{ $supplier[0]->supplier_cnic_number }}">
                            @include('alerts.feedback', ['field' => 'supplier_cnic_number'])
                          </div>
                      </div>
                    </div>
                    <div class=" col-3 ">
                      <div class="form-group">
                        <label for="supplier_phone_number" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Phone Number")}}</label>
                          <div class=" col-12">
                            <input type="text" name="supplier_phone_number" class="form-control col-12" value="{{ $supplier[0]->supplier_phone_number }}">
                            @include('alerts.feedback', ['field' => 'supplier_phone_number'])
                          </div>
                      </div>
                    </div>
                    <div class=" col-3 ">
                        <div class="form-group">
                          <label for="supplier_office_number" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Office Number")}}</label>
                          <div class=" col-12">
                            <input type="text" name="supplier_office_number" class="form-control col-12" value="{{ $supplier[0]->supplier_office_number }}">
                            @include('alerts.feedback', ['field' => 'supplier_office_number'])
                          </div>
                        </div>
                    </div>
                    <div class=" col-3 ">
                      <div class="form-group">
                        <label for="supplier_alternate_number" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Alternate Phone")}}</label>
                        <div class=" col-12">
                          <input type="text" name="supplier_alternate_number" class="form-control col-12" value="{{ $supplier[0]->supplier_alternate_number }}">
                          @include('alerts.feedback', ['field' => 'supplier_alternate_number'])
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class=" col-3">
                      <div class="form-group">
                        <label for="status_id" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Status")}}</label>
                        <div class=" col-12">
                          <select name="status_id" class="form-control col-12">
                            <option value="1" {{ $supplier[0]->supplier_type == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $supplier[0]->supplier_type == '0' ? 'selected' : '' }}>Inactive</option>
                          </select>
                          {{-- <input type="text" name="status_id" class="form-control" value="{{ $supplier[0]->supplier_status }}"> --}}
                          @include('alerts.feedback', ['field' => 'status_id'])
                        </div>
                      </div>
                    </div>
                    <div class=" col-3 ">
                      <div class="form-group">
                        <label for="supplier_zipcode" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Zip Code")}}</label>
                        <div class=" col-12">
                          <input type="text" name="supplier_zipcode" class="form-control col-12" value="{{ $supplier[0]->supplier_zipcode }}">
                          @include('alerts.feedback', ['field' => 'supplier_zipcode'])
                        </div>
                      </div>
                    </div>
                    <div class=" col-3 ">
                      <div class="form-group">
                        <label for="supplier_town" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Town")}}</label>
                        <div class=" col-12">
                          <input type="text" name="supplier_town" class="form-control col-12" value="{{ $supplier[0]->supplier_town }}">
                          @include('alerts.feedback', ['field' => 'supplier_town'])
                        </div>
                      </div>
                    </div>
                    <div class=" col-3 ">
                      <div class="form-group">
                        <label for="supplier_area" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Area")}}</label>
                        <div class=" col-12">
                          <input type="text" name="supplier_area" class="form-control col-12" value="{{ $supplier[0]->supplier_area }}">
                          @include('alerts.feedback', ['field' => 'supplier_area'])
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class=" col-12 ">
                      <div class="form-group">
                        <label for="supplier_shop_address" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Shop Address")}}</label>
                        <div class=" col-12">
                          <input type="text" name="supplier_shop_address" class="form-control col-12" value="{{ $supplier[0]->supplier_shop_address }}">
                          @include('alerts.feedback', ['field' => 'supplier_shop_address'])
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class=" col-12 ">
                      <div class="form-group">
                        <label for="supplier_resident_address" class=" col-12 control-label">&nbsp;&nbsp;{{__(" Residential Address")}}</label>
                        <div class=" col-12">
                          <input type="text" name="supplier_resident_address" class="form-control col-12" value="{{ $supplier[0]->supplier_resident_address }}">
                          @include('alerts.feedback', ['field' => 'supplier_resident_address'])
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer row">
                <div class="col-6">
                  <button type="submit" class="btn btn-info btn-round pull-left">{{__('Update')}}</button>
                </div>
            </form>
                <div class="col-6">
                  <a type="button" href="{{ URL::previous() }}" class="btn btn-secondary btn-round pull-right">{{__('Back')}}</a>
                  <form action="{{ route('supplier.destroy', $supplier[0]->supplier_id) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger btn-round pull-right">{{__('Delete')}}</button>
                  </form>
                </div>
              </div>
              <hr class="half-rule"/>
            {{-- </form> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('javascript')
<script>
  $(function (){
    $('#supplier_update').validate({
      rules: {
        supplier_ref_no: 'required',
        supplier_name: 'required',
        supplier_balance_paid: 'required',
        supplier_balance_dues: 'required',
        status_id: 'required',
      },
      messages: {
        supplier_ref_no: 'Please Enter Supplier Ref No',
        supplier_name: 'Please Enter Supplier Name',
        supplier_balance_paid: 'Please Enter Supplier Balance Paid',
        supplier_balance_dues: 'Please Enter Supplier Balance Dues',
        status_id: 'Please Select Status',
      },
      errorElement: 'em',
      errorPlacement: function ( error, element ) {
        error.addClass( 'invalid-feedback' );
        if ( element.prop( 'type' ) === 'checkbox' ) {
          error.insertAfter( element.parent( 'label' ) );
        } else {
          error.insertAfter( element );
        }
      },
      // errorElement: 'span',
      // errorPlacement: function (error, element) {
      //   error.addClass('invalid-feedback');
      //   element.closest('.form-group').append(error);
      // },
      errorClass: "error fail-alert",
      validClass: "valid success-alert",
      highlight: function ( element, errorClass, validClass ) {
        $( element ).addClass( 'is-invalid' ).removeClass( 'is-valid' );
      },
      unhighlight: function (element, errorClass, validClass) {
        // $( element ).addClass( 'is-valid' ).removeClass( 'is-invalid' );
        $( element ).removeClass( 'is-invalid' );

      }
    });
    $.validator.setDefaults( {
      // debug: true,
      // success: "valid",
      submitHandler: function(form) {
        form.submit();
      }
    });
  });
</script>
@endsection