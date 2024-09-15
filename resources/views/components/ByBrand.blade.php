<div class="container mt-5">
    <div class="row" id="productlist">

    </div>
</div>

<script>
    async function LoadProduuct() {
        let searchParam = new URLSearchParams(window.location.search);
        let id = searchParam.get('id');
        // alert(id)
        var tabid = $("#productlist");
        let res = await axios.get('list-product-brand/' + id);
        tabid.empty();
        res.data['data'].forEach((item, i) => {
            let product = `
                        <div class="col-3">
                            <div class="product_wrap">
                                <div class="product_img">
                                    <a href="details?id=${item['id']}">
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
                                    <h6 class="product_title"><a href="details?id=${item['id']}">${item['title']}</a></h6>
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
            $('#brandname').text(res.data['data'][0]['brand']['brandName']);
        });
    }
</script>
