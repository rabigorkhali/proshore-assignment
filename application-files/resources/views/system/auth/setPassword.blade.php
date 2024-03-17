@extends('system.layouts.masterGuest')
@section('content')
    @php $routename = Route::current()->getName();@endphp
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div class="login-main">
                        <form class="theme-form login-form" method="post"
                              action="{{ url(getSystemPrefix() . '/set-password') }}">
                            @csrf
                            @include('system.partials.message')
                            <h4 class="mb-3">{{($title) }}</h4>
                            <input type="hidden" name="token" value="{{$token}}">
                            @if ($routename == 'change.password')
                                <input type="hidden" name="email" value="{{$email}}">
                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="email" value="{{ $email }}">
                                </div>
                            @else
                                <div class="form-group">
                                    <label>{{('Email')}}</label>
                                    <div class="input-group"><span class="input-group-text"><i
                                                class="icon-lock"></i></span>
                                        <input class="form-control" type="email" name="email"
                                               value="{{ $email }}" autocomplete="off" readonly>
                                    </div>
                                    @error('email')
                                    <p class="invalid-text text-danger">{{($message) }}</p>
                                    @enderror
                                </div>
                            @endif
                            <div class="form-group">
                                <label>{{('New Password')}}</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control password" type="password" name="password"
                                           placeholder="{{('Password') }}">
                                </div>
                                @error('password')
                                <p class="invalid-text text-danger">{{($message) }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{('Retype Password')}}</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control confirm-password" type="password" name="password_confirmation"
                                           placeholder="{{('Confirm Password') }}">
                                </div>
                                @error('password_confirmation')
                                <p class="invalid-text text-danger">{{($message) }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block"
                                        type="submit">{{ isset($buttonText) ? translate($buttonText) : translate($title) }}
                                </button>
                            </div>
                            @if ($routename == 'change.password')
                                <div class="form-group">
                                    <a href="{{ route('logout') }}" class="btn login-btn btn-danger btn-block"
                                       style="padding-top: 13px;">{{('Cancel') }}</a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
