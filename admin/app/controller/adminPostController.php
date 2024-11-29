<?php
class PostAdminController
{
    private $postModel;
    private $postCateModel;
    function __construct()
    {
        $this->postModel = new postModel();
        $this->postCateModel = new postCateModel();
    }
    function renderView($view, $data = [])
    {
        extract($data);
        $view = 'app/view/' . $view . '.php';
        require_once $view;
    }
    function view()
    {
        $postDB = $this->postModel->getAllPost();

        foreach ($postDB as &$post) {
            // lấy tên danh mục cảu bài viết
            $catePost = $this->postCateModel->getCateId($post['idCatePost']);
            $post['catePost'] = $catePost['name'];

            // Xử lý View không để trống
            if ($post['view'] === null) {
                $post['view'] = 0;
            } else {
                $post['view'] = $post['view'];
            };
            // xử lý trạng thái
            $statusHtml = '';
            if ($post['status'] === 1) {
                $statusHtml = '<span class="status success">Đã đăng</span>';
            } else if ($post['status'] === 0) {
                $statusHtml = '<span class="status pending">Chưa đăng</span>';
            } else if ($post['status'] === 2) {
                $statusHtml = '<span class="status danger">Đã hủy</span>';
            }
            $post['status'] = $statusHtml;
        }
        require_once 'app/view/post.php';
    }
    function addPost()
    {
        $listCatePost = $this->postCateModel->getAllCatePost();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        $error = [];
        $dataForm = [];
        if (isset($_POST['submitForm'])) {
            $dataForm['title'] = $_POST['tieuDe'];
            $dataForm['text'] = $_POST['noiDung'];
            $dataForm['datePost'] = $date;
            $dataForm['description'] = $_POST['moTaNgan'];
            $dataForm['status'] = $_POST['status'];
            $dataForm['idCatePost'] = $_POST['danhMuc'];
            $dataForm['idUserPost'] = 1;
            $dataForm['image'] = $_FILES['img']['name'];
            $error['title'] = (empty($dataForm['title'])) ? 'Tiều đều không được để trống' : '';
            $error['text'] = (empty($dataForm['text'])) ? 'Nội dung không được để trống' : '';
            $error['description'] = (empty($dataForm['description'])) ? 'Mô tả ngắn không được để trống' : '';
            $error['image'] = (empty($dataForm['image'])) ? 'Ảnh bài viết không được để trống' : '';
            if (empty($error['title']) && empty($error['text']) && empty($error['description']) && empty($error['image'])) {
                $fileSaveImage = '../public/image/' . $dataForm['image'];
                if (move_uploaded_file($_FILES['img']['tmp_name'], $fileSaveImage)) {
                    $this->postModel->insertPost($dataForm);
                    echo '<script>
                    alert("Thêm bài viết thành công");
                    window.location.href = "index.php?page=post";
                    </script>';
                } else {
                    echo 'Up false';
                }
            }
        }
        $this->renderView('postAdd', ['error' => $error, 'listCatePost' => $listCatePost, 'dataForm' => $dataForm]);
    }

    function viewEditPost()
    {
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $id = $_GET['id'];
            $postID = $this->postModel->getPost($id);
            $getAllCatePost = $this->postCateModel->getAllCatePost();
            
            $this->renderView('postEdit', ['postID' => $postID, 'getAllCatePost' => $getAllCatePost]);
        }
    }



    function editPost()
    {
        $data = [];
        if (isset($_POST['updatePost'])) {
            $data['id'] = $_POST['idBaiViet'];
            $data['title'] = $_POST['tieuDe'];
            $data['text'] = $_POST['noiDung'];
            $data['description'] = $_POST['moTaNgan'];
            $data['status'] = $_POST['trangThai'];
            $data['idCatePost'] = $_POST['danhMucPost'];
            $data['image_old'] = $_POST['image_old'];
            $data['image'] = $_FILES['img']['name'];
            if ($data['image'] == '') {
                $data['image'] = $data['image_old'];
            } else {
                $fileSaveimage = '../public/image/' . $data['image'];
                move_uploaded_file($_FILES['img']['tmp_name'], $fileSaveimage);
                $file_old = '../public/image/' . $data['image_old'];
                unlink($file_old);
            }
            $this->postModel->editPost($data);
            echo '<script>
                alert("Sửa bài viết thành công");
                window.location.href = "index.php?page=post";
        </script>';
        }
        // require_once 'app/view/postEdit.php';
    }

    function delPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $deleteIds = $_POST['delete_ids'] ?? [];
            if (!empty($deleteIds)) {
                foreach ($deleteIds as $id) {
                    $post = $this->postModel->getPost($id);
                    if ($post) {
                        $filePath = '../public/image/' . $post['image'];
                        if (file_exists($filePath)) {
                            unlink($filePath); // Xóa file ảnh
                        }
                        $this->postModel->deletePost($id);
                    }
                }
                echo '<script>
                    alert("Xóa bài viết thành công");
                    window.location.href = "index.php?page=post";
                    </script>';
            } else {
                echo '<script>
                    alert("Không có bài viết nào được chọn để xóa");
                    window.location.href = "index.php?page=post";
                    </script>';
            }
        }
    }
}
