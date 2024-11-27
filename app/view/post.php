<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang bài viết</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="public/css/post.css">
</head>
<body>
<main>
    <section>
        <div class="grid wide container">
            <div class="row">
          
                <!-- Cột danh mục -->
                <div class="l-3">
                    <div class="search-bar">
                        <input type="text" placeholder="Tìm kiếm bài viết" >
                        <button><i class="fas fa-search"></i></button>
                    </div>
                    
                    <!-- Bảng bài viết nổi bật -->
                    
                    <table class="featured-posts">
                        <tr class="featured-title">
                            <td>
                                <h3>Bài viết nổi bật</h3>
                            </td>
                        </tr>
                        <?php
                        $listpost = $data['post1'];
                        foreach ($listpost as $one){
                            extract($one);
                      
                        ?>
                        <tr>
                      
                            <td>

                                <a href=""><img src="public/image/img_product/<?=$image?>" alt="" class="featured-img"></a>
                                <a href="index.php?page=postProBandana">
                                    <p><?=$title?></p>

                                    <p><?=$datePost?></p>
                                </a>
                            </td>
                            <?php } ?>
                        </tr>
                    </table>
                </div>

                <!-- Cột bài viết -->
                <div class="l-9">
                    <?php
                        $listpost = $data['post1'];
                        foreach ($listpost as $one){
                            extract($one);
                      
                        ?>
                    <div class="post-item">
                        <div class="post-img">
                            <img src="public/image/img_product/<?=$image?>" alt="">
                        </div>
                        <div class="post-content">

                                <h3><?=$title?></h3>
                                <p class="author-date"><?=$datePost?></p>
                                <p class="description"><?=$description?></p>
                                <a href="index.php?page=postProBandana">Xem thêm...</a>
                        </div>
                  
                    </div>
                    <?php } ?>

                
                    <div class="pagination">
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#"><i class="fas fa-arrow-right"></i></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
</html>
