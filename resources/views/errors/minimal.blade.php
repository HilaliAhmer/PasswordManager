<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .page_error {
            padding: 40px 0;
            background: #fff;
            font-family: 'Kanit', sans-serif;
        }

        .page_error img {
            width: 100%;
        }

        .four_zero_four_bg {

            background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
            height: 400px;
            background-position: center;
        }


        .four_zero_four_bg h1 {
            font-size: 80px;
        }

        .four_zero_four_bg h3 {
            font-size: 80px;
        }

        .link_error {
            color: #fff !important;
            padding: 10px 20px;
            background: #39ac31;
            margin: 20px 0;
            display: inline-block;
        }

        .contant_box_error {
            margin-top: -50px;
        }

        .mt-25 {
            margin-top: 25% !important;
        }

        .mb-25 {
            margin-bottom: 25% !important;
        }

        .fs-1 {
            font-size: calc(1.375rem + 1.5vw) !important;
        }

        .fs-3 {
            font-size: calc(1.3rem + 0.6vw) !important;
        }

        .fs-4 {
            font-size: calc(1.275rem + 0.3vw) !important;
        }
    </style>
</head>


<body>
    <section class="page_error">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mt-25 mb-25">
                    <div class="col-sm-10 col-sm-offset-1 text-center">
                        <div class="four_zero_four_bg"></div>
                        <div class="contant_box_404">
                            <p class="fs-1">@yield('code')</p>
                            <p class="fs-3">Kaybolmuş gibi gözüküyorsun.</p>
                            <p class="fs-4">@yield('message')</p>
                            <a href="{{ route('dashboard') }}" class="btn btn-warning">Anasayfaya Geri Dön</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
