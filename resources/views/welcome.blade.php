@extends('layouts.app', [
    'namePage' => 'Welcome to Al-Syed General Store',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'welcome',
    'backgroundImage' => asset('assets') . "/img/POS-Cashier-1.jpg",
])

@section('content')
  <div class="content">
    <div class="container">
      <div class="col-md-12 ml-auto mr-auto">
        <div class="header bg-gradient-info py-10 py-lg-2 pt-lg-12">
          <div class="container">
            <div class="header-body text-center mb-7">
              <div class="row justify-content-center">
                <div class="col-lg-12 col-md-9">
                    <div class="logo">
                      <a class="logo" data-toggle="tooltip" data-placement="bottom" title="Al-Syed Store POS">
                        <img class="img-fluid" src="{{asset('assets') . "/img/alsyedstorelogo.png"}}" alt="">
                      </a>
                    </div>
                    <h3 class="text-white">{{ __('Al-Syed Store Point-Of-Sale(POS).') }}</h3>
                    <p class="text-lead text-light mt-3 mb-0">
                        @include('alerts.migrations_check')
                    </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      demo.checkFullPageBackgroundImage();
    });
  </script>
@endpush
