@extends('layouts.master')

@section('content')
    @include('components.VerifyPage')
    @include('components.TopBrand')
    <script>
        (async () => {
            await TopBrand();
            hideLoader();
        })()
    </script>
@endsection
