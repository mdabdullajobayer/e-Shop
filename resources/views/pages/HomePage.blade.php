@extends('layouts.master')
@section('content')
    @include('components.HomeSlider')
    @include('components.TopCategory')
    @include('components.ExclusiveProducts')
    @include('components.TopBrand')
    <script>
        (async () => {
            await LoadHeroBanner();
            await TopCategory();
            await LoadProduuct('new', "newtab");
            await LoadProduuct('popular', "populartab");
            await LoadProduuct('top', "toptab");
            await LoadProduuct('special', "specialtab");
            await LoadProduuct('trending', "trendingtab");
            await LoadProduuct('regular', "regulartab");
            await TopBrand();
            hideLoader();
        })()
    </script>
@endsection
