<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="public/css/prouduct.css">
    
</head>
<body> 

    <main>
        <section>
            <div class="grid wide container">
                <div class="row">
                    <!-- Cột danh mục -->
                    <div class="col l-3">
                        <div class="search-bar">
                            <input type="text" placeholder="Tìm kiếm sản phẩm">
                            <button><i class="fas fa-search"></i></button>
                        </div>
                        <h3 class="title"><?=$data['nameCate'][0]['name']?></h3>
                        <ul class="cateProduct">
                            <?php
                            $cate = $data['cate'];
                            foreach($cate as $item){
                                extract($item);
                                echo "<li><a class='nameCate' href='index.php?page=product&id=$id'>$name</a></li>";
                            }
                            
                            ?>

                        </ul>

                        <!-- Bảng sản phẩm nổi bật -->

                        <table class="featured-products">
                            <tr class="featured-title">
                                <td>
                                    <h3>Sản phẩm nổi bật</h3>
                                </td>
                            </tr>
                            <?php
                                $listpro = $data['prohot'];
                                foreach ($listpro as $item) {
                                    extract($item);
                                
                                ?>
                            <tr>
                                <td>
                                    <a href="">
                                        <img class="featured-img" src="public/image/<?=$image?>" alt="">
                                    </a>
                                    <a href="#">
                                        <p><?=$name?></p>
                                        <p><?=$view?> lượt xem</p>
                                        <p><?=number_format($price)?> đ</p>
                                        <p><?=$salePrice?></p>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>

                            
                        </table>
                    </div>

                    <!-- Cột sản phẩm -->
                    <div class="col l-9">
                        <section class="row">
                        <?php
                                $listpro = $data['products'];
                                foreach ($listpro as $item) {
                                    extract($item);
                                
                                ?>
                                <div class="col l-4 m-4 c-12">
                                    <div class="product">
                                        <a href="index.php?page=productDetail&id=<?=$id?>">
                                        <div class="img-product">
                                            <img src="public/image/<?=$image?>" alt="">
                                        </div>
                                        <div class="name-product">
                                            <span><?=$name?></span>
                                        </div>
                                        <div class="price-product">
                                            <span><?=number_format($price)?> đ</span>
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
                        </section>
                    </div>

    </main>

</body>
<script src="public/js/product.js"></script>
</html>