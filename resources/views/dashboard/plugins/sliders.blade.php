@extends('dashboard.base')

@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
      <div class="card">
        <div class="card-header">
          Ion.RangeSlider
          <div class="card-actions">
            <a href="http://ionden.com/a/plugins/ion.rangeSlider/demo.html">
              <small class="text-muted">docs</small>
            </a>
          </div>
        </div>
        <div class="card-body">

          <h6>Start without params</h6>
          <input type="text" id="range_01" name="example_name" value="">

          <hr>

          <h6>Set min value, max value and start point</h6>
          <input type="text" id="range_02" name="example_name" value="">

          <hr>

          <h6>Set type to double and specify range, also showing grid and adding prefix "$"</h6>
          <input type="text" id="range_03" name="example_name" value="">

          <hr>

          <h6>Set up range with negative values</h6>
          <input type="text" id="range_04" name="example_name" value="">

          <hr>

          <h6>Using step 250</h6>
          <input type="text" id="range_05" name="example_name" value="">

          <hr>

          <h6>Set up range with fractional values, using fractional step</h6>
          <input type="text" id="range_06" name="example_name" value="">

          <hr>

          <h6>Set up you own numbers</h6>
          <input type="text" id="range_07" name="example_name" value="">

          <hr>

          <h6>Using any strings as your values</h6>
          <input type="text" id="range_08" name="example_name" value="">

          <hr>

          <h6>One more example with strings</h6>
          <input type="text" id="range_09" name="example_name" value="">

          <hr>

          <h6>No prettify. Big numbers are ugly and unreadable</h6>
          <input type="text" id="range_10" name="example_name" value="">

          <hr>

          <h6>Prettify enabled. Much better!</h6>
          <input type="text" id="range_11" name="example_name" value="">

          <hr>

          <h6>Don't like space as separator? Use anything you like!</h6>
          <input type="text" id="range_12" name="example_name" value="">

          <hr>

          <h6>You don't like default prettify function? Use your own!</h6>
          <input type="text" id="range_13" name="example_name" value="">

          <hr>

          <h6>Using prefixes</h6>
          <input type="text" id="range_14" name="example_name" value="">

          <hr>

          <h6>Using postfixes</h6>
          <input type="text" id="range_15" name="example_name" value="">

          <hr>

          <h6>Whant to show that max number is not the biggest one?</h6>
          <input type="text" id="range_16" name="example_name" value="">

          <hr>

          <h6>Taking care about how from and to values connect? Use decorate_both option:</h6>
          <input type="text" id="range_17" name="example_name" value="">

          <hr>

          <h6>Remove double decoration</h6>
          <input type="text" id="range_18" name="example_name" value="">

          <hr>

          <h6>Use your own separator symbol with values_separator option. Like →</h6>
          <input type="text" id="range_19" name="example_name" value="">

          <hr>

          <h6>Or " to ":</h6>
          <input type="text" id="range_20" name="example_name" value="">

          <hr>

          <h6>You can disable all the sliders visual details, if you wish. Like this:</h6>
          <input type="text" id="range_21" name="example_name" value="">

          <hr>

          <h6>Or hide any part you wish</h6>
          <input type="text" id="range_22" name="example_name" value="">

          <hr>

          <h6>And some more</h6>
          <input type="text" id="range_23" name="example_name" value="">

          <hr>

          <h6>And some more</h6>
          <input type="text" id="range_24" name="example_name" value="">

        </div>
      </div>
    </div>
</div>
@endsection

@section('javascript')
    <!-- Plugins and scripts required by this views -->
    <script src="{{ asset('js/coreui/min/ion.rangeSlider.min.js') }}"></script>

    <!-- Custom scripts required by this view -->
    <script src="{{ asset('js/coreui/sliders.js') }}"></script>
@endsection