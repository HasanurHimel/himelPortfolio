<style>

    /*.white-popup {*/
    /*    position: relative;*/
    /*    background: #FFF;*/
    /*    padding: 1px;*/
    /*    width: auto;*/
    /*    max-width: 57%;*/
    /*    margin: 0 auto;*/
    /*}*/


    .carousel{position:relative}.carousel-inner{position:relative;width:100%;overflow:hidden}.carousel-item{position:relative;display:none;width:100%}@media (-webkit-transform-3d){.carousel-item{-webkit-transition:-webkit-transform .6s ease-in-out;transition:-webkit-transform .6s ease-in-out;-o-transition:-o-transform .6s ease-in-out;transition:transform .6s ease-in-out;transition:transform .6s ease-in-out,-webkit-transform .6s ease-in-out,-o-transform .6s ease-in-out;-webkit-backface-visibility:hidden;backface-visibility:hidden;-webkit-perspective:1000px;perspective:1000px}}@supports ((-webkit-transform:translate3d(0,0,0)) or (transform:translate3d(0,0,0))){.carousel-item{-webkit-transition:-webkit-transform .6s ease-in-out;transition:-webkit-transform .6s ease-in-out;-o-transition:-o-transform .6s ease-in-out;transition:transform .6s ease-in-out;transition:transform .6s ease-in-out,-webkit-transform .6s ease-in-out,-o-transform .6s ease-in-out;-webkit-backface-visibility:hidden;backface-visibility:hidden;-webkit-perspective:1000px;perspective:1000px}}.carousel-item-next,.carousel-item-prev,.carousel-item.active{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}.carousel-item-next,.carousel-item-prev{position:absolute;top:0}@media (-webkit-transform-3d){.carousel-item-next.carousel-item-left,.carousel-item-prev.carousel-item-right{-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0)}.active.carousel-item-right,.carousel-item-next{-webkit-transform:translate3d(100%,0,0);transform:translate3d(100%,0,0)}.active.carousel-item-left,.carousel-item-prev{-webkit-transform:translate3d(-100%,0,0);transform:translate3d(-100%,0,0)}}@supports ((-webkit-transform:translate3d(0,0,0)) or (transform:translate3d(0,0,0))){.carousel-item-next.carousel-item-left,.carousel-item-prev.carousel-item-right{-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0)}.active.carousel-item-right,.carousel-item-next{-webkit-transform:translate3d(100%,0,0);transform:translate3d(100%,0,0)}.active.carousel-item-left,.carousel-item-prev{-webkit-transform:translate3d(-100%,0,0);transform:translate3d(-100%,0,0)}}.carousel-control-next,.carousel-control-prev{position:absolute;top:0;bottom:0;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;width:15%;color:#fff;text-align:center;opacity:.5}.carousel-control-next:focus,.carousel-control-next:hover,.carousel-control-prev:focus,.carousel-control-prev:hover{color:#fff;text-decoration:none;outline:0;opacity:.9}.carousel-control-prev{left:0}.carousel-control-next{right:0}.carousel-control-next-icon,.carousel-control-prev-icon{display:inline-block;width:20px;height:20px;background:transparent no-repeat center center;-webkit-background-size:100% 100%;background-size:100% 100%}.carousel-control-prev-icon{background-image:url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M4 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E")}.carousel-control-next-icon{background-image:url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M1.5 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E")}.carousel-indicators{position:absolute;right:0;bottom:10px;left:0;z-index:15;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;padding-left:0;margin-right:15%;margin-left:15%;list-style:none}.carousel-indicators li{position:relative;-webkit-box-flex:1;-webkit-flex:1 0 auto;-ms-flex:1 0 auto;flex:1 0 auto;max-width:30px;height:3px;margin-right:3px;margin-left:3px;text-indent:-999px;cursor:pointer;background-color:rgba(255,255,255,.5)}.carousel-indicators li::before{position:absolute;top:-10px;left:0;display:inline-block;width:100%;height:10px;content:""}.carousel-indicators li::after{position:absolute;bottom:-10px;left:0;display:inline-block;width:100%;height:10px;content:""}.carousel-indicators .active{background-color:#fff}.carousel-caption{position:absolute;right:15%;bottom:20px;left:15%;z-index:10;padding-top:20px;padding-bottom:20px;color:#fff;text-align:center}
</style>

<div id="portfolio" class="portfolio-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header wow fadeInDown" data-wow-delay="0.2s">
                    <p class="line-one"></p>
                    <h2>My Works</h2>
                    <p class="line-one"></p>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="portfolio-items">



                <div class="col-md-4 col-sm-6 col-xs-12 no-pad wow rotateInUpLeft animated" data-wow-delay="0.2s">
                    <div id="inline-popups" class="port-box">
                        <a href="#test-popupp1" data-effect="mfp-zoom-out">
                            <div class="hovereffect">

                                <img src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="portfolio image" class="img-responsive"> <!--edit image-->
                                <div class="overlay">
                                    <h2>Project One</h2> <!--your project name-->
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, dolores, velit. Accusantium mollitia obcaecati quos.</p>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div id="test-popupp1" class="white-popup mfp-with-anim mfp-hide">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="">



                                    <div id="carouselExampleIndicator" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicator" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicator" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicator" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port2.jpg" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="Third slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicator" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicator" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="por-text">
                                    <h2>My Project Title</h2> <!--your project title-->
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, delectus deserunt eum eveniet, illo iste magni nobis non omnis quia</p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div><div class="col-md-4 col-sm-6 col-xs-12 no-pad wow rotateInUpLeft animated" data-wow-delay="0.3s">
                    <div id="inline-popups" class="port-box">
                        <a href="#test-popupp2" data-effect="mfp-zoom-out">
                            <div class="hovereffect">

                                <img src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="portfolio image" class="img-responsive"> <!--edit image-->
                                <div class="overlay">
                                    <h2>Project One</h2> <!--your project name-->
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, dolores, velit. Accusantium mollitia obcaecati quos.</p>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div id="test-popupp2" class="white-popup mfp-with-anim mfp-hide">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="">



                                    <div id="carouselExampleIndicator" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicator" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicator" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicator" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port2.jpg" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="Third slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicator" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicator" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="por-text">
                                    <h2>My Project Title</h2> <!--your project title-->
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, delectus deserunt eum eveniet, illo iste magni nobis non omnis quia</p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div><div class="col-md-4 col-sm-6 col-xs-12 no-pad wow rotateInUpLeft animated" data-wow-delay="0.3s">
                    <div id="inline-popups" class="port-box">
                        <a href="#test-popupp3" data-effect="mfp-zoom-out">
                            <div class="hovereffect">

                                <img src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="portfolio image" class="img-responsive"> <!--edit image-->
                                <div class="overlay">
                                    <h2>Project One</h2> <!--your project name-->
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, dolores, velit. Accusantium mollitia obcaecati quos.</p>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div id="test-popupp3" class="white-popup mfp-with-anim mfp-hide">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="">



                                    <div id="carouselExampleIndicator" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicator" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicator" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicator" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port2.jpg" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="Third slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicator" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicator" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="por-text">
                                    <h2>My Project Title</h2> <!--your project title-->
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, delectus deserunt eum eveniet, illo iste magni nobis non omnis quia</p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div><div class="col-md-4 col-sm-6 col-xs-12 no-pad wow rotateInUpLeft animated" data-wow-delay="0.4s">
                    <div id="inline-popups" class="port-box">
                        <a href="#test-popupp4" data-effect="mfp-zoom-out">
                            <div class="hovereffect">

                                <img src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="portfolio image" class="img-responsive"> <!--edit image-->
                                <div class="overlay">
                                    <h2>Project One</h2> <!--your project name-->
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, dolores, velit. Accusantium mollitia obcaecati quos.</p>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div id="test-popupp4" class="white-popup mfp-with-anim mfp-hide">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="">



                                    <div id="carouselExampleIndicator" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicator" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicator" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicator" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port2.jpg" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="Third slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicator" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicator" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="por-text">
                                    <h2>My Project Title</h2> <!--your project title-->
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, delectus deserunt eum eveniet, illo iste magni nobis non omnis quia</p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div><div class="col-md-4 col-sm-6 col-xs-12 no-pad wow rotateInUpLeft animated" data-wow-delay="0.4s">
                    <div id="inline-popups" class="port-box">
                        <a href="#test-popupp5" data-effect="mfp-zoom-out">
                            <div class="hovereffect">

                                <img src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="portfolio image" class="img-responsive"> <!--edit image-->
                                <div class="overlay">
                                    <h2>Project One</h2> <!--your project name-->
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, dolores, velit. Accusantium mollitia obcaecati quos.</p>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div id="test-popupp5" class="white-popup mfp-with-anim mfp-hide">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="">



                                    <div id="carouselExampleIndicator" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicator" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicator" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicator" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port2.jpg" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="Third slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicator" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicator" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="por-text">
                                    <h2>My Project Title</h2> <!--your project title-->
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, delectus deserunt eum eveniet, illo iste magni nobis non omnis quia</p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div><div class="col-md-4 col-sm-6 col-xs-12 no-pad wow rotateInUpLeft animated" data-wow-delay="0.5s">
                    <div id="inline-popups" class="port-box">
                        <a href="#test-popupp6" data-effect="mfp-zoom-out">
                            <div class="hovereffect">

                                <img src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="portfolio image" class="img-responsive"> <!--edit image-->
                                <div class="overlay">
                                    <h2>Project One</h2> <!--your project name-->
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, dolores, velit. Accusantium mollitia obcaecati quos.</p>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div id="test-popupp6" class="white-popup mfp-with-anim mfp-hide">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="">



                                    <div id="carouselExampleIndicator" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicator" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicator" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicator" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port2.jpg" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ asset('/') }}Frontend/images/portfolio/port1.jpg" alt="Third slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicator" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicator" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="por-text">
                                    <h2>My Project Title</h2> <!--your project title-->
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, delectus deserunt eum eveniet, illo iste magni nobis non omnis quia</p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                 <!--end portfolio grid -->



    </div>
</div>
    </div>
</div>
<script src="{{ mix('js/carousel.js') }}"></script>
