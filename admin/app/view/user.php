<div class="main">
    <form action="?page=deleteuser" method="post" id="delete-form">
        <div class="main-category">
            <div class="main-danhmuc">
                <p>Người dùng</p>
                <a href="index.php?page=addUser">+ Thêm người dùng</a>
            </div>
            <div class="main-header">
                <div class="left-main-header">
                    <p id="selected-count">Đã chọn 0 mục</p>
                    <button type="submit" id="delete-btn" style="display: none;">Xóa</button> <!-- Nút Xóa -->
                </div>
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
                        <th><input type="checkbox" id="select-all"></th>
                        <th>ID</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th>Trạng thái</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- 1 box -->
                    <?php
                    $html = '';
                    foreach ($usersDB as $item) {
                        extract($item);
                        $html .= '
                                <tr>
                                    <td><input type="checkbox" class="item-checkbox" name="delete_ids[]" value="' . $id . '"></td>
                                    <td>' . $id . '</td>
                                    <td>' . $name . '</td>
                                    <td>' . $email . '</td>
                                    <td>' . $role . '</td>
                                    <td>' . $active . '</td>
                                    <td><a href="index.php?page=viewEditUser&id=' . $id . '">Sửa</a></td>
                                </tr>
                            ';
                    }
                    echo $html;
                    ?>
                </tbody>
            </table>
        </div>
    </form>
    <!-- button chuyển trang -->
    <div class="main-turnpage">
        <button class="prev">1</button>
        <button class="next">2</button>
        <button class="nextpage">></button>
    </div>
</div>
</div>
</div>
</div>
<script src="public/js/delete.js"></script>
</body>

</html>