<div class="main">
    <div class="main-category">
        <div class="main-danhmuc">
            <p>Xem đơn hàng</p>
            <a href="?page=order">Quay về</a>
        </div>
        <div class="main-header">
            
        </div>
    </div>
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
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">
                        <form action method="POST" id="statusForm">
                            <div class="category-main-product">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="status" onchange="confirmChangeStatus(this)">
                                    <option value="1" <?= ($data['orderStatus'] == 1) ? 'selected' : '' ?>>Chờ xác nhận</option>
                                    <option value="2" <?= ($data['orderStatus'] == 2) ? 'selected' : '' ?>>Đang vận chuyển</option>
                                    <option value="3" <?= ($data['orderStatus'] == 3) ? 'selected' : '' ?>>Đã giao</option>
                                    <option value="0" <?= ($data['orderStatus'] == 0) ? 'selected' : '' ?>>Đã hủy</option>
                                </select>
                                <input type="hidden" name="order_id" value="<?= $_GET['id'] ?>">
                            </div>
                        </form>
                    </td>
                </tr>
                <tr class="total">
                    <td colspan="3" style="text-align: center;">Tổng cộng</td>
                    <td colspan="2" id="total">???</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
    function confirmChangeStatus(selectElement) {
        // Lấy trạng thái đã chọn
        const newStatus = selectElement.value;
        // Hiển thị cảnh báo xác nhận trước khi thay đổi trạng thái
        if (confirm('Bạn có chắc chắn muốn thay đổi trạng thái đơn hàng không?')) {
            // Nếu xác nhận, submit form
            document.getElementById('statusForm').submit(); // Đảm bảo form được submit
        } else {
            // Nếu không xác nhận, khôi phục lại trạng thái cũ
            const previousStatus = '<?= $data['orderStatus'] ?>'; // Trạng thái cũ từ PHP
            selectElement.value = previousStatus;
        }
    }
</script>
</div>
</div>
</div>
<script src="public/js/total.js"></script>
</body>

</html>