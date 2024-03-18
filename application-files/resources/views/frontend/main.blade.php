<!DOCTYPE html>
<html lang="en">
@include('frontend.layouts.layoutHeader')

<body>
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3>{{ $title ?? '' }}</h3>
                            </div>
                            <div class="col-12 col-sm-6">
                                <ol class="breadcrumb">
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
                            <br />
                            <div class="card-header pb-0 mb-4">
                                <div class="content-display clearfix custom-border">
                                    <div class="panel panel-default custom-padding">
                                        <div class="panel-body">
                                            @yield('form')
                                        </div>
                                    </div><!-- panel -->
                                </div><!-- ends content-display -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- ends content-display -->

        </div>
    </div>
</body>

</html>
