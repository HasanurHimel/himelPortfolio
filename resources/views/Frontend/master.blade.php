<!doctype html>
<html lang="en">
<head>
    <!--meta tags-->
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="portfolio template based on HTML5">
    <meta name="keywords" content="Himel,hasanur,hasanur rahman,hasanur rahman himel,himel khan,web-developer,web-designer,bangladeshi web developer,bangladeshi web designer, resume, cv, personal, portfolio, personal resume">
    <meta name="author" content="MouriTheme">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--template title-->
    <title>Himel -Personal Portfolio Website</title>

    <!--==========Favicon==========-->

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <link rel="stylesheet" href="{{ mix('css/frontend_app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/all.css') }}">





</head>
<body>

<!--preloader starts-->

<div class="loader_bg"><div class="loader"></div></div>

<!--preloader ends-->

<!--navigation area starts-->

@include('Frontend.Partials.header')

<!--navigation area ends-->

<!--Banner area starts-->

@include('Frontend.Partials.banner')
<!--Banner area ends-->

<!--about area starts-->

@include('Frontend.Partials.about')

<!--about area ends-->

<!--Services Area Starts-->

@include('Frontend.Partials.service')


@include('Frontend.Partials.education')

<!--Services Area Ends-->

<!--number area starts-->

@include('Frontend.Partials.statistics')

<!--number area ends-->

<!--Portfolio Area Starts-->

@include('Frontend.Partials.portfolio')


<!--Portfolio Area Ends-->

<!--Testimonial Section Starts-->

@include('Frontend.Partials.testimonial')

<!--Testimonial Section Ends-->

<!--contact area starts-->

@include('Frontend.Partials.contact')

<!--contact area ends-->

<!--Brand area starts-->

@include('Frontend.Partials.brand')

<!--Brand area ends-->

<!--Footer Area Starts-->

@include('Frontend.Partials.footer')




<script src="{{ mix('js/all.js') }}"></script>
<script src="{{ mix('js/frontend_app.js') }}"></script>






</body>
</html>


