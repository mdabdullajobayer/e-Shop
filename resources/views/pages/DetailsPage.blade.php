@extends('layouts.master')

@section('content')
    @include('components.productDetails')
    @include('components.ProductSpecification')
    @include('components.TopBrand')
    <script>
        (async () => {
            await productDetails();
            await productReview();
            await TopBrand();
            hideLoader();
        })()
    </script>
@endsection
