@extends('layouts.login')

@section('login')


<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Regnbow Market</h1>
                            </div>
                            <form method="POST" action="{{ route('register') }}" class="user">
                                @csrf
                                <div class="form-group">

                                    <input id="name" type="text"
                                        class="form-control  @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" placeholder="Full Name" required autocomplete="name"
                                        autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <input id="cellphone" type="text"
                                        class="form-control  @error('cellphone') is-invalid @enderror" name="cellphone"
                                        value="{{ old('cellphone') }}" placeholder="Cellphone" required
                                        autocomplete="cellphone" autofocus>

                                    @error('cellphone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <input id="email" type="email"
                                        class="form-control  @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" placeholder="Email" required autocomplete="email"
                                        autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <input id="country" type="text"
                                        class="form-control  @error('country') is-invalid @enderror" name="country"
                                        value="{{ old('country') }}" placeholder="Country" required
                                        autocomplete="country" autofocus>

                                    @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control"
                                        placeholder="Confirm Password" name="password_confirmation" required
                                        autocomplete="new-password">


                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Create Account') }}
                                </button>

                        </div>

                        </form>
                        <div class="text-center">
                            <a class="small" href="{{route('login')}}">Log in to your Account!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

@endsection