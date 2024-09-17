@extends('layouts.master')

@section('content')
    @include('components.LoginPage')
    @include('components.TopBrand')
    <script>
        (async () => {
            await TopBrand();
            hideLoader();
        })()
    </script>
@endsection
