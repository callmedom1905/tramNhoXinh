<div class="main">
    <div class="main-category">
        <div class="main-danhmuc">
            <p>Xem đơn hàng</p>
            <a href="../html/adminOrder.html">Quay về</a>
        </div>
        <div class="main-header">
            <div class="right-main-header">
                <input type="text" placeholder="Tìm kiếm">
                <div class="filter"><i class="fa-solid fa-filter"></i></div>
                <div class="sort"><i class="fa-solid fa-arrow-down-a-z"></i></div>
            </div>
        </div>
    </div>
    <!-- Body chính (Cứ sửa những cột trong bảng, nếu dư thì cứ xóa, nó tự nhảy) -->
    <!--không cần phải css thêm -->
    <div class="main-product">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hình Ảnh</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá Sản Phẩm</th>
                    <th>Số lượng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['ordDetail'] as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><img src="../public/image/<?= $item['image'] ?>" alt="<?= $item['productName'] ?>" width="100px" height="100px"></td>
                        <td><?= $item['productName'] ?></td>
                        <td class="price"><?= number_format($item['priceItem']); ?> đ</td>
                        <td class="quantity"><?= $item['quantity'] ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr class="total">
                    <td colspan="3" style="text-align: center;">Tổng cộng</td>
                    <td colspan="2" id="total">???</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
<script src="public/js/total.js"></script>
</body>

</html>