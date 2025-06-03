{{--@if (session()->has('coupon_code'))
    @php
        session()->forget('coupon_code');
    @endphp
<script>

    sessionStorage.removeItem('couponCode');

</script>

@endif--}}

<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-xl-8">

            <div class="width-10x height-10x rounded-circle position-relative bg-success text-white flex-center mb-4">
                <i class="bx bx-check lh-1 display-4 fw-normal"></i>
            </div>
            <h1 class="display-4 mb-3">
                Vielen Dank für Ihre Bestellung
            </h1>

            <h3 class="display-5 mb-3">
                Nur noch ein Schritt ..
            </h3>
            <p class="mb-5 lead mx-auto">
                Wir haben Ihnen eine E-Mail zum <b>Freischalten Ihres Benutzerkontos zugesendet</b>. Bitte überprüfen Sie Ihren Posteingang und <b>klicken Sie auf den Link in der E-Mail</b>, um Ihre
                E-Mail-Adresse zu bestätigen. Sollten Sie die E-Mail nicht erhalten haben, senden wir Ihnen gerne eine neue zu. </p>


        </div>

    </div>
</div>
