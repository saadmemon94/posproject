@extends('layouts.app', [
    'namePage' => 'Register page',
    'activePage' => 'register',
    'backgroundImage' => asset('assets') . "/img/pos-system-1.jpg",
])

@section('content')
  <div class="content">
    <div class="container">
      <div class="col-md-12 ml-auto mr-auto">
        <div class="header bg-gradient-info py-10 py-lg-2 pt-lg-12">
          <div class="container">
            <div class="header-body text-center mb-7">
              <div class="row justify-content-center">
                <div class="col-md-4 ml-auto mr-auto">
                  <div class="card card-signup text-center">
                    <div class="card-header ">
                      <h4 class="card-title">{{ __('Register') }}</h4>
                    </div>
                    <div class="card-body ">
                      <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!--Begin input name -->
                        <div class="input-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="now-ui-icons users_circle-08"></i>
                            </div>
                          </div>
                          <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                          @if ($errors->has('name'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                            </span>
                          @endif
                        </div>
                        <!--Begin input email -->
                        {{-- <div class="input-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="now-ui-icons ui-1_email-85"></i>
                            </div>
                          </div>
                          <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif --}}
                        <!--Begin input user type-->
                        
                        <!--Begin input password -->
                        <div class="input-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="now-ui-icons objects_key-25"></i>
                            </div>
                          </div>
                          <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" required>
                          @if ($errors->has('password'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                            </span>
                          @endif
                        </div>
                        <!--Begin input confirm password -->
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="now-ui-icons objects_key-25"></i></i>
                            </div>
                          </div>
                          <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                        </div>
                        <div class="form-check text-left">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox">
                            <span class="form-check-sign"></span>
                            {{ __('I agree to the') }}
                            <a href="#something">{{ __('terms and conditions') }}</a>.
                          </label>
                        </div>
                        <div class="card-footer ">
                          <button type="submit" class="btn btn-info btn-round btn-lg">{{__('Get Started')}}</button>
                        </div>
                      </form>
                    </div>
                  </div>
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
