<?php
class ProAdminController
{
    private $product;
    private $category;
    private $data;

    function __construct()
    {
        $this->product = new ProductModel();
        $this->category = new CategoryModel();
    }

    function renderView($view, $data = null)
    {
        $view = './app/view/' . $view . '.php';
        require_once $view;
    }

    function viewPro()
    {
        $this->data['listpro'] = $this->product->getProduct();
        $this->renderView('product', $this->data);
    }

    function viewEditPro()
    {
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $id = $_GET['id'];
            $this->data['listcate'] = $this->category->getCate();
            $this->data['detail'] = $this->product->getIdPro($id);
            $this->renderView('productEdit', $this->data);
        }
        $this->renderView('productEdit', $this->data);
    }

    function updatePro()
    {
        if (isset($_POST['submit'])) {
            $data = [];
            $data['id'] = $_POST['idPro'];
            $data['name'] = $_POST['name'];
            $data['idCate'] = $_POST['idCate'];
            $data['price'] = $_POST['price'];
            $data['salePrice'] = $_POST['salePrice'];
            $data['quantity'] = $_POST['quantity'];
            $data['status'] = $_POST['status'];
            if (!empty($_FILES['image']['name'])) {
                $data['image'] = $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], "../public/image/" . $data['image']);
                if (!empty($_POST['image_old'])) {
                    $oldImage = "../public/image/" . $_POST['image_old'];
                }
            } else {
                $data['image'] = $_POST['image_old'];
            }
            if (!empty($_FILES['listImages']['name'][0])) {
                $numFiles = count($_FILES['listImages']['name']);
                if ($numFiles > 4) {
                    echo '<script>alert("Chỉ được tải tối đa 4 ảnh.");</script>';
                    return;
                }
                $existingImages = !empty($_POST['listImages_old']) ? explode(',', $_POST['listImages_old']) : [];
                foreach ($_FILES['listImages']['name'] as $key => $fileName) {
                    move_uploaded_file($_FILES['listImages']['tmp_name'][$key], "../public/image/" . $fileName);
                    $existingImages[] = $fileName;
                }
                $data['listImages'] = implode(',', $existingImages);
                if (!empty($_POST['listImages_old'])) {
                    $oldImages = explode(',', $_POST['listImages_old']);
                    foreach ($oldImages as $oldImage) {
                        $oldImagePath = "../public/image/" . $oldImage;
                    }
                }
            } else {
                $data['listImages'] = $_POST['listImages_old'];
            }
            $this->product->upProduct($data);
            echo '<script>alert("Cập nhật thành công");</script>';
            echo '<script>location.href="?page=product";</script>';
        }
    }

    function view()
    {
        require_once './app/view/product.php';
    }

    function viewAdd()
    {
        $this->data['listcate'] = $this->category->getCate();
        $this->renderView('productAdd', $this->data);
    }

    function addPro()
    {
        if (isset($_POST['submit'])) {
            $data = [];
            $data['name'] = $_POST['name'];
            $data['idCate'] = $_POST['idCate'];
            $data['price'] = $_POST['price'];
            $data['salePrice'] = $_POST['salePrice'];
            $data['quantity'] = $_POST['quantity'];
            $data['status'] = $_POST['status'];
            if (!empty($_FILES['image']['name'])) {
                $data['image'] = $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], "../public/image/" . $data['image']);
            } else {
                $data['image'] = null;
            }
            if (!empty($_FILES['listImages']['name'][0])) {
                $listImages = [];
                if (count($_FILES['listImages']['name']) > 4) {
                    echo '<script>alert("Chỉ được upload tối đa 4 ảnh phụ!");</script>';
                    echo '<script>location.href="?page=viewaddpro";</script>';
                    return;
                }
                foreach ($_FILES['listImages']['tmp_name'] as $key => $tmpName) {
                    $filename = $_FILES['listImages']['name'][$key];
                    move_uploaded_file($tmpName, "../public/image/" . $filename);
                    $listImages[] = $filename;
                }
                $data['listImages'] = implode(',', $listImages);
            } else {
                $data['listImages'] = null;
            }
            $this->product->insertPro($data);
            echo '<script>alert("Thêm sản phẩm thành công!");</script>';
            echo '<script>location.href="?page=product";</script>';
        }
    }

    public function delPro()
    {
        if (isset($_POST['delete_ids']) && !empty($_POST['delete_ids'])) {
            $deleteIds = $_POST['delete_ids'];
            foreach ($deleteIds as $id) {
                $product = $this->product->getIdPro($id);
                if (!empty($product['image'])) {
                    $imagePath = "../public/image/" . $product['image'];
                }
                if (!empty($product['listImages'])) {
                    $images = explode(',', $product['listImages']);
                    foreach ($images as $img) {
                        $imagePath = "../public/image/" . trim($img);
                    }
                }
                $this->product->deletePro($id);
            }
            echo '<script>alert("Sản phẩm đã được xóa.")</script>';
            echo '<script>location.href="?page=product"</script>';
        }
    }
}
