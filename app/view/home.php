<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="public/css/main.css">
</head>

<body>
    <!-- Trang chủ Trạm Nhỏ Xinh của Huy -->
    <main class="grid wide">
        <section class="row">
            <div class="col l-12 m-12 c-12 banner" style="padding: 0px;"> <!--có css ở đây-->
                <div class="banner-home">
                    <div class="slider-container">
                        <div class="slide"><img src="public/image/bannerSlide.jpg" alt="Slide 1"></div>
                        <div class="slide"><img src="public/image/bannerSlide.jpg" alt="Slide 2"></div>
                        <div class="slide"><img src="public/image/bannerSlide.jpg" alt="Slide 3"></div>
                        <div class="slide"><img src="public/image/bannerSlide.jpg" alt="Slide 4"></div>
                    </div>
                    <div class="dots-container"></div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="title-box">`
                <h3>Sản phẩm mới</h3>
            </div>
            <div class="row">
                <?php
                $list8Pro = $data['product8'];
                foreach ($list8Pro as $item){
                    extract($item);
                
                ?>
                
                <div class="col l-3 m-4 c-12">
                    <div class="product">
                    <a href="index.php?page=productDetail&id=<?=$id?>">
                        <div class="img-product">
                            <img src="public/image/img_product/<?=$image?>" alt="">
                        </div>
                        <div class="name-product">
                            <span><?=$name?></span>
                        </div>
                        <div class="price-product">
                            <span><?=$price?></span>
                            <span> <sub><del><?=$salePrice?></del></sub> </span>
                        </div>
                    </a>

                        <button class="addCart-product">Thêm vào giỏ hàng</button>
                        <button class="heart-button">
                            <i class="icon on fa-solid fa-heart"></i>
                            <i class="icon off fa-regular fa-heart"></i>
                        </button>
                    </div>
                </div>
                <?php } ?>

               
                <!-- Thêm các sản phẩm khác tương tự -->
            </div>

        </section>
        <!-- banner phụ -->
        <section class="row">
            <div class="col l-12 m-12 c-12 banner-sub">
                <div class="sub-banner-home">
                    <img src="public/image/banner1.png" alt="">
                </div>
            </div>
        </section>
        <!-- banner phụ -->
        <!-- sản phẩm nổi bật -->
        <section class="row">
            <div class="title-box">
                <h3>Sản phẩm nổi bật</h3>
            </div>

            <div class="col l-12 m-12 c-12 " style="padding: 0px;"> <!--có css ở html-->

                <div class="box-hot-product">
                    <button class="prev-btn"> <i class="fa-solid fa-chevron-left"></i> </button>
                    <div class="products-container">
                        <?php
                        $list6Pro = $data['product6'];
                        foreach ($list6Pro as $item){
                            extract($item);
                        ?>
                                <div class="product">
                                    <a href="index.php?page=productDetail&id=<?=$id?>">
                                        <div class="img-product">
                                            <img src="public/image/img_product/<?=$image?>" alt="">
                                        </div>
                                        <div class="name-product">
                                            <span><?=$name?></span>
                                        </div>
                                        <div class="price-product">
                                            <span><?=$price?></span>
                                            <span> <sub><del><?=$salePrice?></del></sub> </span>
                                        </div>
                                     </a>

                                    <button class="addCart-product">Thêm vào giỏ hàng</button>
                                    <button class="heart-button">
                                        <i class="icon on fa-solid fa-heart"></i>
                                        <i class="icon off fa-regular fa-heart"></i>
                                    </button>
                                </div>
                        <?php } ?>

                    </div>
                    <button class="next-btn"> <i class="fa-solid fa-chevron-right"></i> </button>
                </div>
            </div>
        </section>
        <section class="row">
            <div class="title-box">
                <h3>Bài viết mới nhất</h3>
            </div>
            <div class="col l-4 m-6 c-12">
                <div class="post">
                    <div class="img-post">
                        <a href="#"><img src="public/image/y-tuong-lam-do-handmade-2.webp" alt=""></a>

                    </div>
                    <div class="name-post">
                        <a href="#">Lorem ipsum dolor sit amet coectetur adipisicing elit. Odio, nostrum?
                            Lorem
                            ipsum dolor sit amet consectetur, adipisicing elit. Doloribus,
                            recusandae.</a>
                    </div>
                    <div class="description">
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. Excepturi, totam.
                            Cum, est? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit, veritatis.</span>
                    </div>
                </div>
            </div>

            <div class="col l-4 m-6 c-12">
                <div class="post">
                    <div class="img-post">
                        <a href="#"><img src="public/image/y-tuong-lam-do-handmade-2.webp" alt=""></a>

                    </div>
                    <div class="name-post">
                        <a href="#">Lorem ipsum dolor sit amet coectetur adipisicing elit. Odio, nostrum?
                            Lorem
                            ipsum dolor sit amet consectetur, adipisicing elit. Doloribus,
                            recusandae.</a>
                    </div>
                    <div class="description">
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. Excepturi, totam.
                            Cum, est? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit, veritatis.</span>
                    </div>
                </div>
            </div>

            <div class="col l-4 m-6 c-12">
                <div class="post">
                    <div class="img-post">
                        <a href="#"><img src="public/image/y-tuong-lam-do-handmade-2.webp" alt=""></a>

                    </div>
                    <div class="name-post">
                        <a href="#">Lorem ipsum dolor sit amet coectetur adipisicing elit. Odio, nostrum?
                            Lorem
                            ipsum dolor sit amet consectetur, adipisicing elit. Doloribus,
                            recusandae.</a>
                    </div>
                    <div class="description">
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. Excepturi, totam.
                            Cum, est? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit, veritatis.</span>
                    </div>
                </div>
            </div>

        </section>
        <section class="row">
            <div class="col l-4 m-6 c-12">
                <div class="policy-home">
                    <h1>Chính sách</h1>
                </div>
            </div>
            <div class="col l-4 m-6 c-12">
                <div class="policy-home">
                    <h1>Chính sách</h1>
                </div>
            </div>
            <div class="col l-4 m-6 c-12">
                <div class="policy-home">
                    <h1>Chính sách</h1>
                </div>
            </div>


        </section>
    </main>
    <!-- END Trang chủ Trạm Nhỏ Xinh của Huy -->

</body>

<script src="public/js/main.js"></script>

</html>