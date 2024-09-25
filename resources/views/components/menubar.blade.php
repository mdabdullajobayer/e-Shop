<!-- START HEADER -->
<header class="header_wrap">
    <div class="top-header light_skin bg_dark d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="header_topbar_info">
                        <div class="header_offer">
                            <span>mdabdullajobayer@gmail.com</span>
                        </div>
                        <div class="download_wrap">
                            <span class="me-3">+8801567833593</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                        @if (Cookie::get('token') !== null)
                            <span class="me-3"><a class="text-white" href="/profile">Account</a></span>
                            <span class="me-3"><a class="text-white btn btn-danger btn-sm"
                                    href="/UserLogout">Logout</a></span>
                        @else
                            <span class="me-3"><a class="text-white" href="/login">Login</a></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle-header dark_skin">
        <div class="container">
            <div class="nav_block">
                <a class="navbar-brand" href="/">
                    <img class="logo_light" src="assets/images/logo_light.png" height="65px" alt="logo">
                    <img class="logo_dark" src="assets/images/logo_dark.png" alt="logo">
                </a>
                <div class="product_search_form radius_input search_form_btn">
                    <form>
                        <div class="input-group">
                            <input class="form-control" placeholder="Search Product..." required="" type="text">
                            <button type="submit" class="search_btn3">Search</button>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a href="/profile" class="nav-link"><i class="linearicons-user"></i></a></li>
                    <li><a href="/wish" class="nav-link"><i class="linearicons-heart"></i></a></li>
                    <li><a class="nav-link cart_trigger" href="/cart"><i class="linearicons-bag2"></i></a>

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase border-top">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-12 col-md-12 col-sm-23 col-12">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler side_navbar_toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSidetoggle" aria-expanded="false">
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="pr_search_icon">
                            <a href="javascript:;" class="nav-link pr_search_trigger"><i
                                    class="linearicons-magnifier"></i></a>
                        </div>
                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                            <ul class="navbar-nav">

                                <li class="dropdown">
                                    <a class="dropdown-toggle nav-link" href="#"
                                        data-bs-toggle="dropdown">Category</a>
                                    <div class="dropdown-menu">
                                        <ul id="CategoryItem">

                                        </ul>
                                    </div>
                                </li>
                                <li><a class="nav-link nav_item" href="policy?type=about">About Us</a></li>
                                <li><a class="nav-link nav_item" href="policy?type=complain">Complain</a></li>
                                <li><a class="nav-link nav_item" href="policy?type=refund">Refund Policy</a></li>
                                <li><a class="nav-link nav_item" href="policy?type=how to buy">How to Buy</a></li>
                                <li><a class="nav-link nav_item" href="policy?type=terms">Terms & Condition</a></li>
                                <li><a class="nav-link nav_item" href="policy?type=contact">Contact</a></li>
                            </ul>
                        </div>
                        <div class="contact_phone contact_support">
                            <i class="linearicons-phone-wave"></i>
                            <span>123-456-7689</span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER -->
<script>
    Category();
    async function Category() {
        let res = await axios.get('categroy-list');
        // console.log(res.data.message);
        // console.log(res.data.data);
        $('#CategoryItem').empty();
        res.data['data'].forEach((item, i) => {
            let data =
                `<li><a class="dropdown-item nav-link nav_item" href="/bycategory?id=${item['id']}">${item['categoryName']}</a></li>`
            $('#CategoryItem').append(data);
        });
    }
</script>
