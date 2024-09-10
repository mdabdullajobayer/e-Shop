<!-- START SECTION BANNER -->
<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-bs-ride="carousel">
        <div class="carousel-inner" id="Herobanner">

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev"><i
                class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next"><i
                class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- END SECTION BANNER -->

<script>
    LoadHeroBanner();
    async function LoadHeroBanner() {

        let res = await axios.get('/list-product-slider');
        $('#Herobanner').empty();
        res.data['data'].forEach((item, i) => {
            let activeclass = '';
            if (i == 0) {
                activeclass = 'active';
            }
            let bannerItem = `
         <div class="carousel-item background_bg ${activeclass}" style="background-image: url('${item['image']}')">
                <div class="banner_slide_content banner_content_inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-10">
                                <div class="banner_content overflow-hidden">
                                    <h2 class="staggered-animation" data-animation="slideInLeft"
                                        data-animation-delay="0.5s">${item['title']}</h2>
                                    <h5 class="mb-3 mb-sm-4 staggered-animation font-weight-light"
                                        data-animation="slideInLeft" data-animation-delay="1s">${item['short_des']}</h5>
                                    <a class="btn btn-fill-out staggered-animation text-uppercase"
                                        href="#" data-animation="slideInLeft"
                                        data-animation-delay="1.5s">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `;
            $('#Herobanner').append(bannerItem);
        });
    }
</script>
