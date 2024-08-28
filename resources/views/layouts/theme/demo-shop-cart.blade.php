<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <x-partials.shop.head-includes />

        <title>Assan Shop</title>
    </head>

    <body>
        <!--Preloader Spinner-->
        <div class="spinner-loader bg-gradient bg-secondary text-white">
            <div class="spinner-border text-primary" role="status">
            </div>
            <span class="small d-block ms-2">Loading...</span>
        </div>
     

        <x-partials.headers.shop.header-default page='shop' />
                
                    <!--Main content-->
                    <main>
{{$slot}}
        </main>


        <x-partials.shop.footer-scripts />
    </body>

</html>
