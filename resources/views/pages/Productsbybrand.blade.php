@extends('layouts.master')

@section('content')
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Brand: <span id="brandname"></span></h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    @include('components.ByBrand')
    @include('components.TopBrand')
    <script>
        (async () => {
            await LoadProduuct();
            await TopBrand();
            hideLoader();
        })()
    </script>
@endsection
