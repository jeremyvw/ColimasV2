{% extends 'template/layout.volt' %}
{% block content %}
<!-- <h1>Welcome to Our Library</h1> -->
<style>
    h1 {
        font-weight: 400;
        text-transform: uppercase;
        font-size: 28px;
    }

    .main-text {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 100%;

        height: 0vh;
    }

    .button {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 100%;
        height: 20vh;
        transition-duration: 0.4s;
    }

    .btn {
        border: 2px solid #008CBA;
        padding: 10px 30px;
        text-decoration: none;
        font-size: 13px;
        text-transform: uppercase;
        background-color: white;
    }

    .btn:hover {
        background-color: cornflowerblue;
    }
</style>
<!-- <img src="/img/logo-large-resize.png" style="display: block; margin-left: auto; margin-right: auto; margin-top: 0px;" alt="">
    <div class="main-text">
        <h1>Welcome to our Library</h1>
    </div>
            <div class="button">
                <a href="/book/manage" class="btn btn-hover">View Collections</a>
            </div> -->

<div class="home">
    <!------ Slider_bg ------------>
    <div class="slider_bg">
        <div class="wrap">
            <!-- <div class="page-header" >
            Welcome To Our Library
        </div> -->
            <!------ Slider------------>
            <div class="slider">
                <div class="slider-wrapper theme-default">
                    <div id="slider" class="nivoSlider">
                        <img src="images/banner1.jpg" data-thumb="images/1.jpg" alt="" />
                        <img src="images/banner2.jpg" data-thumb="images/2.jpg" alt="" />
                        <img src="images/banner3.jpg" data-thumb="images/3.jpg" alt="" />
                    </div>
                </div>
            </div>
            <!---728x90--->

            <!------End Slider ------------>
            <div class="grids_1_of_3">
                <div class="grid_1_of_3 images_1_of_3">
                    <img src="img/icon1.jpg">
                    <h3>Satisfaction</h3>
                    <p>People who read for 30 minutes a week reported feeling 20% more satisfied with their lives in the
                        latest Quick Reads study.</p>
                </div>
                <div class="grid_1_of_3 images_1_of_3">
                    <img src="img/icon2.jpg">
                    <h3>Reading Benefit</h3>
                    <p>Reading plays a significant role in our lives. It's how we learn, express ourselves, and
                        communicate with others.</p>
                </div>
                <div class="grid_1_of_3 images_1_of_3">
                    <img src="img/icon3.jpg">
                    <h3>Reading Habit</h3>
                    <p>88% of financially successful people read at least 30 mins per day. In fact, the average number
                        of books read by CEO is 60 books per year, or five books each month</p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        </>
        <!--main-->
        <!---728x90--->

        <div class="main_bg">
            <div class="wrap">
                <div class="main">
                    <div class="content">
                        <h2>what our student says</h2>
                        <h3>Reza Adipatria Maranatha, Informatics ITS 2017</h3>
                        <p><a href="#"><img src="img/pic1.jpg"></a> Cadipisicing elit,Nam ornare vulputate risus,id
                            volutpat elit porttitor non.In consequat nisi vel lectus dapibus sodales.Nam ornare
                            vulputate risus, id volutpat elit porttitor non. In consequat nisi vel lectus dapibus
                            sodales.Nam ornare vulputate risus, id volutpat elit porttitor non. In consequat nisi vel
                            lectus dapibus sodales.Nam ornare vulputate risus, id volutpat elit porttitor non. In
                            consequat nisi vel lectus dapibus sodales. Pellentesque habitant morbi tristique senectus
                            Nam ornare vulputate risus, id volutpat elit porttitor non. In consequat nisi vel lectus
                            dapibus sodales. PellentesqueNam ornare vulputate risus, id volutpat elit porttitor non. In
                            consequat nisi vel lectus dapibus sodales. Pellentesque habitant morbi tristique senectus et
                            netus et malesuada fames ac turpis egestas Pellentesque habitant morbi tristique senectus et
                            netus et malesuada fames. sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua.Nam ornare vulputate risus,id volutpat elit porttitor non. In consequat nisi vel
                            lectus dapibus sodales.Nam ornare vulputate risus, id volutpat elit porttitor non.</p>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="main_btm">
                <div class="wrap">
                    <div class="main">
                        <div class="gallery">
                            <h3>Our latest projects</h3>
                            <ul>
                                <li><a class="gallery-img" href="img/gallery1.jpg"><img src="img/gallery1.jpg"
                                            alt=""></a><a href="#"></a></li>
                                <li><a class="gallery-img" href="img/gallery2.jpg"><img src="img/gallery2.jpg"
                                            alt=""></a><a href="#"></a></li>
                                <li><a class="gallery-img" href="img/gallery3.jpg"><img src="img/gallery3.jpg"
                                            alt=""></a><a href="#"></a></li>
                                <li><a class="gallery-img" href="img/gallery4.jpg"><img src="img/gallery4.jpg"
                                            alt=""></a><a href="#"></a></li>
                                <li><a class="gallery-img" href="img/gallery4.jpg"><img src="img/gallery4.jpg"
                                            alt=""></a><a href="#"></a></li>
                                <li><a class="gallery-img" href="img/gallery3.jpg"><img src="img/gallery3.jpg"
                                            alt=""></a><a href="#"></a></li>
                                <li><a class="gallery-img" href="img/gallery5.jpg"><img src="img/gallery5.jpg"
                                            alt=""></a><a href="#"></a></li>
                                <li><a class="gallery-img" href="img/gallery6.jpg"><img src="img/gallery6.jpg"
                                            alt=""></a><a href="#"></a></li>
                            </ul>
                        </div>
                        <script type="text/javascript" src="js/jquery.lightbox.js"></script>
                        <link rel="stylesheet" type="text/css" href="css/lightbox.css" media="screen">
                        <script type="text/javascript">
                            $(function () {
                                $('.gallery a.gallery-img').lightBox();
                            });
                        </script>
                        <div class="terminals">
                            <h3>Testimonials</h3>
                            <p>sed tempor ipsum dolor sit amet,Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt aliqua. Ut enim ad minim veniam,consectetur adipisicing
                                elit,sed do eiusmod tempor incididunt magna aliqua. </p>
                            <p>sed tempor Ipsum dolor sit amet,Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt aliqua. Ut enim ad minim veniam,consectetur adipisicing
                                elit,sed do eiusmod tempor incididunt magna aliqua. </p>
                            <span><a href="#">- Lorem ipsum</a> USA.</span>
                        </div>
                        <div class="clear"> </div>
                    </div>
                </div>
            </div>
            <!---728x90--->

            <!--footer-->
            <div class="footer-bg">
                <div class="wrap">
                    <div class="footer">
                        <div class="box1">
                            <h4 class="btm">What We Do</h4>
                            <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                                interested. ions from the 1914 below for those by H. Rackham</p>
                            <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those The
                                standard chunk of Lorem Ipsum used since the 1500s is reproduced reproduced</p>
                        </div>
                        <div class="box1">
                            <h4 class="btm">Categories</h4>
                            <nav>
                                <ul>
                                    <li><a href="#">The standard chunk of Lorem Ipsum used since </a></li>
                                    <li><a href="#">Duis a augue ac libero euismod viverra sitth</a></li>
                                    <li><a href="#">Duis a augue ac libero euismod viverra sit </a></li>
                                    <li><a href="#">The standard chunk of Lorem Ipsum used since </a></li>
                                    <li><a href="#">Duis a augue ac libero euismod viverra sit </a></li>
                                    <li><a href="#">The standard chunk of Lorem Ipsum used since </a></li>
                                    <li><a href="#">Duis a augue ac libero euismod viverra sit </a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="box1">
                            <h4 class="btm">Get in touch</h4>
                            <div class="box1_address">
                                <p>500 Lorem Ipsum Dolor Sit,</p>
                                <p>22-56-2-9 Sit Amet, Lorem,</p>
                                <p>USA</p>
                                <p>Phone:(00) 222 666 444</p>
                                <p>Fax: (000) 000 00 00 0</p>
                                <p>Email: <a href="mailto:info@gmail.com">info[at]mycompany.com</a></p>
                                <p>Follow on: <a href="#">Facebook</a>, <a href="#">Twitter</a></p>

                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <!--footer1-->
            <div class="ftr-bg">
                <div class="wrap">
                    <div class="footer">
                        <div class="copy">
                            <p class="w3-link">© 2020 Colimas. All Rights Reserved</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {% endblock %}