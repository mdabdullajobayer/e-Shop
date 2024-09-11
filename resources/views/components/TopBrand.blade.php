<!-- START SECTION CATEGORIES -->
<div class="section small_pb small_pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s4 text-center">
                    <h2>Top Brand</h2>
                </div>
                <p class="text-center leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit
                    massa enim Nullam nunc varius.</p>
            </div>
        </div>
        <div class="row align-items-center" id="TopBrand">

        </div>
    </div>
</div>
<!-- END SECTION CATEGORIES -->
<script>
    async function TopBrand() {
        let res = await axios.get('brand-list');
        $('#TopBrand').empty();
        res.data['data'].forEach((item, i) => {
            let data =
                `<div class="col-2 mb-2">
                <div class="item">
                        <div class="categories_box">
                            <a href="by-brand?id=${item['id']}">
                                <img src="${item['brandImage']}" alt="cat_img1" />
                                <span>${item['brandName']}</span>
                            </a>
                        </div>
                    </div> </div>`
            $('#TopBrand').append(data);
        });
    }
</script>
