@extends('layouts.master')

@section('content')
    @include('components.ProductWishList')
    @include('components.TopBrand')
    <script>
        (async () => {
            await LoadProduuct();
            await TopBrand();
            hideLoader();
        })()
    </script>
@endsection
