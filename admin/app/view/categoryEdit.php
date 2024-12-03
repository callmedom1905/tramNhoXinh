<div class="main">
    <div class="main-category">
        <div class="main-danhmuc">
            <p>Sửa danh mục</p>
            <a href="?page=category">Quay về</a>
        </div>
        <div class="main-header">
        </div>
    </div>
    <!-- xong phần header -->
    <?php $type = $data['type']; ?>
    <form action="?page=updatecate" method="POST" enctype="multipart/form-data">
        <div class="main-product">
            <div class="category-main-product">
                <label for="Tên danh mục">Tên danh mục</label>
                <input type="text" name="name" id="name" value="<?= $type['name'] ?>">
            </div>
            <input type="hidden" name="id" value="<?= $type['id'] ?>">
            <div class="category-main-product">
                <label for="status">Trạng thái</label>
                <select name="status" id="status">
                    <option class="status success" value="1" <?= $type['status'] == 1 ? 'selected' : '' ?>>Đã hoạt động</option>
                    <option class="status pending" value="2" <?= $type['status'] == 2 ? 'selected' : '' ?>>Tạm ngưng</option>
                    <option class="status danger" value="3" <?= $type['status'] == 3 ? 'selected' : '' ?>>Đã hủy</option>
                </select>
            </div>
        </div>
        <div class="submit-main-product">
            <button type="submit" name="submit">Cập nhật</button>
        </div>
    </form>
</div>
</div>
</div>
</div>
</body>

</html>