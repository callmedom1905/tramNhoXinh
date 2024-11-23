<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="public/css/productDetail.css">
</head>

<body>
    <main>
        <section>
            <div class="grid wide container">
                <div class="row">
                    <div class="l-12">
                        <!--Chi tiết sản phẩm-->
                        <?php
                        $product = $data['detail'];
                        extract($product);
                        if (!empty($listImages)) {
                            // Nếu $listImages không rỗng, tách chuỗi thành mảng
                            $list = explode(',', $listImages);
                        } else {
                            // Nếu $listImages rỗng, gán mảng trống
                            $list = [];
                        }

                        ?>
                        <div class="product-detail">
                            <div class="product-detail-thumbnails">
                                <?php
                                if (!empty($list)) {
                                    $count = count($list);
                                    for ($i = 0; $i < $count; $i++) {
                                        // in số lượng ảnh có trong mảng
                                        if (isset($list[$i])) {
                                            echo "<img src='public/image/img_product/{$list[$i]}' alt='Thumbnail " . ($i + 1) . "' class='thumbnail'>";
                                        }
                                    }
                                }else{
                                    echo '';
                                }
                                ?>
                            </div>
                            <img src="public/image/img_product/<?= $image ?>" alt="Tên sản phẩm">
                            <div class="info">
                                <h2><?= $name ?></h2>
                                <p class="price"><?= $price ?> đ</p>
                                <p class="price"><?= $salePrice ?> đ</p>
                                <div class="quantity-controls">
                                    <button onclick="minus()"><i class="fa-solid fa-minus"></i></button>
                                    <input type="text" id="amount" value="1">
                                    <button onclick="plus()"><i class="fa-solid fa-plus"></i></button>
                                </div>
                                <p>Mô tả</p>
                                <div class="cart-button">
                                    <button>Thêm vào giỏ hàng</button>
                                    <button>Mua ngay</button>
                                </div>
                            </div>
                        </div>
                        <!-- Mô tả chi tiết sản phẩm-->
                        <div class="">
                            <h3 class="product-detail-title">Chi tiết sản phẩm</h3>
                            <p class="product-detail-description"><?= $detail ?></p>
                            <H4 class="product-detail-info">Thông tin sản phẩm</H4>
                            <table class="product-detail-table">
                                <tr>
                                    <td>Loại sản phẩm</td>
                                    <td>Nón</td>
                                </tr>
                                <tr>
                                    <td>Chất liệu</td>
                                    <td><?= $material ?></td>
                                </tr>
                                <tr>
                                    <td>Kích thước</td>
                                    <td>15×30×20</td>
                                </tr>
                                <tr>
                                    <td>Màu sắc</td>
                                    <td><?= $color ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>


                    <div class="l-12">
                        <div class="review-section">
                            <h3 class="rating-title">Đánh giá</h3>
                            <div class="rating-summary">
                                <div class="average-rating">
                                    <p>4.8</p>
                                    <p class="review-count">Của 123 đánh giá</p>
                                    <span class="star-rating">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star-half-stroke"></i>
                                    </span>
                                </div>
                                <div class="rating-distribution">
                                    <div class="rating-bar"><span>Xuất sắc</span>
                                        <div class="bar">
                                            <div class="fill" style="width: 100%;"></div>
                                        </div><span>100</span>
                                    </div>
                                    <div class="rating-bar"><span>Tốt</span>
                                        <div class="bar">
                                            <div class="fill" style="width: 11%;"></div>
                                        </div><span>80</span>
                                    </div>
                                    <div class="rating-bar"><span>Trung bình</span>
                                        <div class="bar">
                                            <div class="fill" style="width: 3%;"></div>
                                        </div><span>50</span>
                                    </div>
                                    <div class="rating-bar"><span>Kém</span>
                                        <div class="bar">
                                            <div class="fill" style="width: 8%;"></div>
                                        </div><span>20</span>
                                    </div>
                                    <div class="rating-bar"><span>Rất kém</span>
                                        <div class="bar">
                                            <div class="fill" style="width: 1%;"></div>
                                        </div><span>10</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Phần bình luận -->
                        <div class="comment-section">
                            <?php
                            echo 'function show comments ';
                            ?>
                            <div class="comment">
                                <div class="user-avatar"></div>
                                <div class="user-review">
                                    <p class="user-name">Trần Chí Minh</p>
                                    <p>Viết bình luận</p>
                                </div>
                                <p class="comment-date">01/01/2024</p>
                            </div>
                            <div class="comment">
                                <div class="user-avatar"></div>
                                <div class="user-review">
                                    <p class="user-name">Trần Chí Minh</p>
                                    <p>Viết bình luận</p>
                                </div>
                                <p class="comment-date">01/01/2024</p>
                            </div>
                            <div class="comment">
                                <div class="user-avatar"></div>
                                <div class="user-review">
                                    <p class="user-name">Trần Chí Minh</p>
                                    <p>Viết bình luận</p>
                                </div>
                                <p class="comment-date">01/01/2024</p>
                            </div>
                        </div>
                        <div class="center-button-container">
                            <button class="load-more-btn">Xem thêm
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Sản phẩm liên quan-->

                    <div class="col l-12">
                        <section class="row">
                            <div class="title-box">`
                                <h3>Sản phẩm mới</h3>
                            </div>
                            <div class="row">
                                <?php
                                $newPro = $data['newpro'];
                                foreach ($newPro as $item) {
                                    extract($item);
                                    ?>
                                    <div class="col l-3 m-4 c-12">
                                        <div class="product">
                                            <a href="index.php?page=productDetail&id=<?= $id ?>">
                                                <div class="img-product">
                                                    <img src="public/image/img_product/<?= $image ?>" alt="">
                                                </div>
                                                <div class="name-product">
                                                    <span><?= $name ?></span>
                                                </div>
                                                <div class="price-product">
                                                    <span><?= $price ?></span>
                                                    <span> <sub><del><?= $salePrice ?></del></sub> </span>
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


                            </div>

                        </section>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
</body>
<script src="public/js/product.js"> </script>