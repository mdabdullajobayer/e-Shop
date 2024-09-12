<div class="container mt-5">
    <div class="row" id="policy">

    </div>
</div>

<script>
    async function LoadPolicy() {
        let searchParam = new URLSearchParams(window.location.search);
        let type = searchParam.get('type');
        if (type === 'about') {
            $('#policyName').text('About Us');
        } else if (type === 'refund') {
            $('#policyName').text('Refund Policy');
        } else if (type === 'terms') {
            $('#policyName').text('Terms & Conditions');
        } else if (type === 'how to buy') {
            $('#policyName').text('how to buy');
        } else if (type === 'contact') {
            $('#policyName').text('contact');
        } else if (type === 'complain') {
            $('#policyName').text('complain');
        } else {
            window.location.href = '/';
        }

        var policy = $("#policy");
        let res = await axios.get('policy-type/' + type);
        policy.empty();
        let data = res.data['des'];
        policy.html(data);
    }
</script>
