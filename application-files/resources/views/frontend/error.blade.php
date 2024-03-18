@extends('frontend.main')
@section('form')
    <div class="modal-body message-body">
        <div class="container">
            @if ( $errors->first('alert-danger'))
                <div class="alert alert-danger" role="alert"
                    style="position: relative; background-color: #dc3545; color: white;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close"
                        style="position: absolute; top: 0; right: 2px; color: white; text-decoration: none;">×</a>
                        <p class="" style="margin-bottom: 0; margin-right: 2px;"><span
                                class="fa fa-exclamation-triangle" aria-hidden="true"></span>&nbsp;{{ $errors->first('alert-danger') }}
                        </p>
                </div>
            @endif
            @if ($errors->first('alert-success') )
                <div class="alert alert-success" role="alert"
                    style="position: relative; background-color: green; color: white;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close"
                        style="position: absolute; top: 0; right: 2px; color: white; text-decoration: none;">×</a>
                        <p class="" style="margin-bottom: 0; margin-right: 2px;"><span
                                class="fa fa-exclamation-triangle" aria-hidden="true"></span>&nbsp;{{ $errors->first('alert-success') }}
                        </p>
                </div>
            @endif
            <a href="#" onclick="window.history.back()" class="btn btn-info btn-sm">Back</a>
        </div>
    </div>
@endsection
