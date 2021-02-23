@extends('layouts.frame')
@section('title')
    Register
@endsection

@section('main')

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Register</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="{{route('login')}}" class="btn_3">Login Your Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form border shadow p-4 p-md-5">
                        <div class="login_part_form_iner pt-4">
                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>
                            <form class="row contact_form" action="{{route('register')}}" method="post" novalidate="novalidate">
                                @csrf



                                <div class="col-md-12 form-group p_star mb-5">
                                    <label for="name">Full Name </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                           required autocomplete="name" placeholder="" autofocus/>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>









                                <div class="col-md-12 form-group p_star mb-5">
                                    <label for="">Email Address</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                          required autocomplete="email" placeholder="" autofocus/>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                                <div class="col-md-12 form-group p_star mb-5">
                                    <label for="phone">Phone Number</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                          required autocomplete="off" placeholder="" autofocus/>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>














                                <div class="col-md-12 form-group p_star mb-5">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value=""
                                           placeholder="" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">

                                    <button type="submit" value="submit" class="btn_3">
                                        log in
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="lost_pass" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

@endsection
