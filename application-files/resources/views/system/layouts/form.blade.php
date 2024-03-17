<!DOCTYPE html>
<html lang="en">
@include('system.layouts.layoutHeader')
<body>
<!-- Loader starts-->
@include('system.partials.loader')
<!-- Loader ends-->
<!-- tap on top starts-->
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    @include('system.partials.header')
    <!-- Page Header Ends -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        @include('system.partials.sidebar')
        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3>{{ $title ?? '' }}</h3>
                        </div>
                        <div class="col-12 col-sm-6">
                            <ol class="breadcrumb">
                                @include('system.partials.breadcrumb')
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @section('create')
            @show
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <br/>
                        <div class="card-header pb-0 mb-4">
                            <div class="content-display clearfix custom-border">
                                <div class="panel panel-default custom-padding">
                                    <div class="panel-body">
                                        @include('system.partials.message')
                                        <form method="post"
                                              action="{{ isset($item) ? url($indexUrl . '/' . $item->id) : url($indexUrl) }}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @if (isset($item))
                                                @method('PUT')
                                            @endif
                                            @yield('inputs')
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    @php
                                                        $isProfileChangePassword = $indexUrl === '/system/profile/change-password';
                                                        $submitButtonIcon = $indexUrl !== '/system/mail-test' ? 'fa fa-plus-circle' : 'fa fa-paper-plane';
                                                        $submitButtonLabel = !isset($item) ? 'Create' : 'Update';
                                                        $cancelButtonLabel = 'Cancel';
                                                        $cancelButtonUrl = $isProfileChangePassword || $indexUrl === '/system/profile' ? '/system/home' : $indexUrl;
                                                    @endphp

                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="{{ $submitButtonIcon }}" aria-hidden="true"></i>
                                                        {{ $submitButtonLabelCustom??$submitButtonLabel }}
                                                    </button>

                                                    <a href="{{ url($cancelButtonUrl) }}" class="btn btn-secondary">
                                                        <em class="fa fa-window-close"></em>
                                                        {{ $cancelButtonLabel }}
                                                    </a>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div><!-- panel -->
                            </div><!-- ends content-display -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- ends content-display -->

    </div>

    <!-- Page Sidebar Ends-->

    <!-- footer start-->
    @include('system.layouts.layoutFooter')
    @yield('scripts')
</div>
</body>

</html>
