<div class="container mt-5">
    <div class="row" id="productlist">

    </div>
</div>

<script>
    async function LoadProduuct() {
        var tabid = $("#productlist");
        let res = await axios.get('ProductWishList/');
        tabid.empty();
        res.data['data'].forEach((item, i) => {
            let product = `
                        <div class="col-3">
                            <div class="product_wrap">
                                <div class="product_img">
                                    <a href="details?id=${item['id']}">
                                        <img src="${item['product']['image']}">
                                        <img class="product_hover_img" src="${item['product']['image']}" alt="el_hover_img1">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="details?id=${item['product']['id']}">${item['product']['title']}</a></h6>
                                    <div class="product_price">
                                        <span class="price">৳ ${item['product']['price']}</span>
                                        <!-- <del>$55.25</del>
                                                                    <div class="on_sale">
                                                                        <span>35% Off</span>
                                                                    </div>-->
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:${item['product']['star']}%"></div>
                                        </div>
                                    </div>
                                    <div class="pr_desc">
                                        <p>${item['product']['short_des']}</p>
                                    </div>
                                    <button class="btn remove_id btn-sm my-2 btn-danger" data-id="${item['product']['id']}">Remove</button>
                                </div>
                            </div>
                        </div>
                      `;
            tabid.append(product);
        });
        $(".remove_id").on('click', function() {
            let id = $(this).data('id');
            RemoveWishList(id);
        })
    }
    async function RemoveWishList(id) {
        $(".preloader").delay(90).fadeIn(100).removeClass('loaded');
        let res = await axios.get("/RemoveWishList/" + id);
        $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        if (res.status === 200) {
            // alert('Wish Removed Success')
            await LoadProduuct();
        } else {
            alert("Request Fail")
        }
    }
</script>
