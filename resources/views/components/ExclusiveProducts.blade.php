<!-- START SECTION SHOP -->
<div class="section small_pb small_pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s1 text-center">
                    <h2>Exclusive Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab-style1">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="popular-tab" data-bs-toggle="tab" href="#popular"
                                role="tab" aria-controls="popular" aria-selected="true">Popular</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="new-tab" data-bs-toggle="tab" href="#new" role="tab"
                                aria-controls="sellers" aria-selected="false">New</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="top-tab" data-bs-toggle="tab" href="#top" role="tab"
                                aria-controls="top" aria-selected="false">Top</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="special-tab" data-bs-toggle="tab" href="#special" role="tab"
                                aria-controls="special" aria-selected="false">Special
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="trending-tab" data-bs-toggle="tab" href="#trending" role="tab"
                                aria-controls="trending" aria-selected="false">Trending
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="regular-tab" data-bs-toggle="tab" href="#regular" role="tab"
                                aria-controls="regular" aria-selected="false">Regular
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="tab_slider tab-content">
                    {{-- Popular --}}
                    <div class="tab-pane fade show active" id="popular" role="popular" aria-labelledby="popular-tab">
                        <div class="row" id="populartab">

                        </div>
                    </div>
                    {{-- Popular --}}
                    {{-- New --}}
                    <div class="tab-pane fade" id="new" role="new" aria-labelledby="new-tab">
                        <div class="row" id="newtab">

                        </div>
                    </div>
                    {{-- New --}}
                    {{-- top --}}
                    <div class="tab-pane fade" id="top" role="top" aria-labelledby="top-tab">
                        <div class="row" id="toptab">

                        </div>
                    </div>
                    {{-- top --}}
                    {{-- special --}}
                    <div class="tab-pane fade" id="special" role="special" aria-labelledby="special-tab">
                        <div class="row" id="specialtab">

                        </div>
                    </div>
                    {{-- special --}}
                    {{-- trending --}}
                    <div class="tab-pane fade" id="trending" role="trending" aria-labelledby="trending-tab">
                        <div class="row" id="trendingtab">

                        </div>
                    </div>
                    {{-- trending --}}

                    {{-- trending --}}
                    <div class="tab-pane fade" id="regular" role="regular" aria-labelledby="regular-tab">
                        <div class="row" id="regulartab">

                        </div>
                    </div>
                    {{-- trending --}}

                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
<script>
    async function LoadProduuct(remark, tabID) {
        var tabid = $("#" + tabID);
        let res = await axios.get('list-product-remark/' + remark);
        tabid.empty();
        res.data['data'].forEach((item, i) => {
            let product = `
                        <div class="col-3">
                            <div class="product_wrap">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="${item['image']}">
                                        <img class="product_hover_img" src="${item['image']}" alt="el_hover_img1">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">${item['title']}</a></h6>
                                    <div class="product_price">
                                        <span class="price">৳ ${item['price']}</span>
                                        <!-- <del>$55.25</del>
                                                                    <div class="on_sale">
                                                                        <span>35% Off</span>
                                                                    </div>-->
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:${item['star']}%"></div>
                                        </div>
                                    </div>
                                    <div class="pr_desc">
                                        <p>${item['short_des']}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                      `;
            tabid.append(product);
        });
    }
</script>
