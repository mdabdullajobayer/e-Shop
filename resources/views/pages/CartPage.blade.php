 @extends('layouts.master')

 @section('content')
     @include('components.CartListPage')
     @include('components.TopBrand')
     <script>
         (async () => {
             await CartList();
             await TopBrand();
             hideLoader();
         })()
     </script>
 @endsection
