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
                        <span class="me-3">About</span> <span class="me-3">Account</span>
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
                    <li><a href="#" class="nav-link"><i class="linearicons-user"></i></a></li>
                    <li><a href="#" class="nav-link"><i class="linearicons-heart"></i><span
                                class="wishlist_count">0</span></a></li>
                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#"
                            data-bs-toggle="dropdown"><i class="linearicons-bag2"></i><span
                                class="cart_count">2</span><span class="amount"><span
                                    class="currency_symbol">$</span>159.00</span></a>
                        <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#"><img src="assets/images/cart_thamb1.jpg"
                                            alt="cart_thumb1">Variable product 001</a>
                                    <span class="cart_quantity"> 1 x <span class="cart_amount"> <span
                                                class="price_symbole">$</span></span>78.00</span>
                                </li>

                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span
                                            class="price_symbole">$</span></span>159.00</p>
                                <p class="cart_buttons"><a href="#" class="btn btn-fill-line view-cart">View
                                        Cart</a><a href="#" class="btn btn-fill-out checkout">Checkout</a></p>
                            </div>
                        </div>
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
                                <li><a class="nav-link nav_item" href="contact.html">About Us</a></li>
                                <li><a class="nav-link nav_item" href="contact.html">Policy</a></li>
                                <li><a class="nav-link nav_item" href="contact.html">Contact Us</a></li>
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
