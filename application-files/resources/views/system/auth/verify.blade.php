@extends('system.layouts.masterGuest')
@section('title')
    {{('Verify') }}
@endsection
@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div class="login-main">
                        <form class="theme-form login-form" method="post" action="{{ route('verify.post') }}">
                            @csrf
                            @include('system.partials.message')
                            <h4 class="mb-3 align-center">{{('Enter Verification Code.') }}</h4>
                            <p>{{ 'We have sent you a verification code in your email.' }} <br>
                                {{('Copy a 6-digit verification code and enter it below.') }}</p>
                            <br>
                            <div class="form-group  @error('code') has-error @enderror">
                                <label>New Password</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control" type="text" name="code"
                                        placeholder="{{('Please Enter Verification Code.') }}">
                                </div>
                                @error('password')
                                    <p class="invalid-text text-danger">{{($message) }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">{{('Verify') }}
                                </button>
                            </div>
                            <div class="form-group">
                                <a href="{{ route('logout') }}" class="btn login-btn btn-danger btn-block"
                                    style="padding-top: 13px;">{{('Cancel') }}</a>
                            </div>
                            <p>Didn't get email?<a class="ms-2"
                                    href="{{ route('verify.send.again') }}">{{('Send Again') }}</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
