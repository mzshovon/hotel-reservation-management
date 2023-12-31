@extends('auth.layouts.master')
@section('content')
    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ asset('/') }}admin/assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">{{env('APP_NAME')}}</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation" novalidate>
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Your Name</label>
                                            <input type="text" name="name" class="form-control" id="yourName"
                                                required>
                                            @if ($errors->has('name'))
                                                {{--  <div class="invalid-feedback" style="display: inline-block">Please, enter your name!</div>  --}}
                                                <div class="invalid-feedback" style="display: inline-block">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Your Email</label>
                                            <input type="email" name="email" class="form-control" id="yourEmail"
                                                required>
                                            @if ($errors->has('email'))
                                                {{--  <div class="invalid-feedback" style="display: inline-block">Please enter a valid Email adddress!</div>  --}}
                                                <div class="invalid-feedback" style="display: inline-block">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required>
                                            @if ($errors->has('password'))
                                                {{--  <div class="invalid-feedback" style="display: inline-block">Please enter your password!</div>  --}}
                                                <div class="invalid-feedback" style="display: inline-block">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>

                                        <div class="col-12">
                                            <label for="confirmYourPassword" class="form-label">Password
                                                Confirmation</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="confirmYourPassword" required>
                                            @if ($errors->has('password_confirmation'))
                                                {{--  <div class="invalid-feedback" style="display: inline-block">Please confirm your password!</div>  --}}
                                                <div class="invalid-feedback" style="display: inline-block">{{ $errors->first('password_confirmation') }}</div>
                                            @endif
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox"
                                                    value="" id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the
                                                    <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>
                                        @include('auth.layouts.partials.socialAuth')
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a
                                                    href="{{route('login')}}">Log in</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                Developed & Designed by <a href="#">Friends Kingdom</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main>
@endsection
