<?php /** @var Array $data */ ?>

<!--Image slider-->

<div id="carousel" class="carousel slide" data-ride="carousel">

    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="public/img/nahrdelnik.jpg" class="w-100"  alt="necklace">
        </div>
        <div class="carousel-item">
            <img src="public/img/nahrdelnik2.jpg" class="w-100" alt="necklace">
        </div>
        <div class="carousel-item">
            <img src="public/img/nahrdelnik3.jpg" class="w-100" alt="necklace">
        </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

</div>


<!--Categories-->

<section class="new">
    <div class="container py-5">
        <div class="row pt-5">
            <div class="col-lg-7 m-auto">
                <div class="row text-center">
                    <div class="col-lg-4">
                        <img src="public/img/necklace.png" class="img-luid" alt="necklace">
                        <h6>Necklaces</h6>
                    </div>

                    <div class="col-lg-4">
                        <img src="public/img/bracelet.png" class="img-luid" alt="bracelet">
                        <h6>Bracelets</h6>
                    </div>

                    <div class="col-lg-4">
                        <img src="public/img/ring.png" class="img-ring" alt="ring">
                        <h6>Rings</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!--Bestsellers-->

<section class="product">
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-lg-5 m-auto text-center">
                <h1>Bestsellers</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 text-center">
                <div class="card">
                    <div CLASS="card-body">
                        <img src="https://img.ltwebstatic.com/images3_pi/2020/10/30/16040380178ea98540196437bd35f5ea01efaca4c9_thumbnail_600x.webp" class="w-100" alt="necklace">
                    </div>
                </div>
                <h6>Metal chain necklace</h6>
                <p>$7.50</p>
            </div>

            <div class="col-lg-3 text-center">
                <div class="card">
                    <div CLASS="card-body">
                        <img src="https://img.ltwebstatic.com/images3_pi/2020/03/13/1584083377937d4f4489bcfd4071c44273ed32f6f0_thumbnail_600x.webp" class="w-100" alt="necklace">
                    </div>
                </div>
                <h6>Simple Chain Bracelet</h6>
                <p>$8.99</p>
            </div>

            <div class="col-lg-3 text-center">
                <div class="card">
                    <div CLASS="card-body">
                        <img src="https://img.ltwebstatic.com/images3_pi/2019/11/11/1573457479e2f6bdfcaeec40883dcce1a94e60b943_thumbnail_600x.webp" class="w-100" alt="necklace">
                    </div>
                </div>
                <h6>Decor Ring Set</h6>
                <p>$6.50</p>
            </div>

            <div class="col-lg-3 text-center">
                <div class="card">
                    <div CLASS="card-body">
                        <img src="https://img.ltwebstatic.com/images3_pi/2020/10/30/1604028171a45d78678ec9a71fe7ecfb0835549f2d_thumbnail_600x.webp" class="w-100" alt="necklace">
                    </div>
                </div>
                <h6>Pendant layered necklace</h6>
                <p>$9.80</p>
            </div>

            <div class="row">
                <div class="col-lg-6 text-center m-auto">
                    <button type="button" class="btn0 btn-md" disabled>Click For More</button>
                </div>
            </div>

        </div>
    </div>
</section>

<!--Connect-->
<div class="container-fluid padding">
    <div class="row text-center padding align-items-center">
        <div class="col-12">
            <hr class="light">
            <h2>Connect</h2>
        </div>
        <div class="col-12 social padding">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-google-plus-g"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</div>
