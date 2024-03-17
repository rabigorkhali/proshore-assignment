@if ($errors->any())
    @if (!($errors->first('alert-success') ||
            $errors->first('alert-danger') ||
            $errors->first('alert-warning') ||
            $errors->first('success')))

        <div class="alert alert-danger" role="alert"
            style="position: relative; background-color: #dc3545; color: white;">
            <a href="#" class="close" data-dismiss="alert" aria-label="Close"
                style="position: absolute; top: 0; right: 2px; color: white; text-decoration: none;">×</a>
            @foreach ($errors->all() as $error)
                <p class="" style="margin-bottom: 0; margin-right: 2px;"><span class="fa fa-exclamation-triangle"
                        aria-hidden="true"></span>&nbsp;{{ $error }}</p>
            @endforeach
        </div>

    @endif
@endif


