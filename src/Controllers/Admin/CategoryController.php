<?php
namespace Admin\Asm\Controllers\Admin ;
use Admin\Asm\Commons\Controller;
use Admin\Asm\Models\Categories;

class CategoryController extends Controller{
    private Categories $catagory ;

    private string $folder = 'categories.' ;
    public function __construct() {
        $this->catagory = new Categories() ;
    }

     // Danh sách
     public function index() {
        $data['categories'] = $this->catagory->getAll() ;

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    // Thêm mới
    public function create() {
        if (!empty($_POST)) {
            $this->catagory->insert($_POST['name']) ;

            header('Location: /admin/categories');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }

    // Xem chi tiết theo ID
    public function show($id) {
        $data['category'] = $this->catagory->getByID($id) ;

        if (empty($data['category'])) {
            die(404);
        }

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    // Cập nhật theo ID
    public function update($id) {
        $data['category'] = $this->catagory->getByID($id) ;

        if (empty($data['category'])) {
            die(404);
        }

        if (!empty($_POST)) {
            $this->catagory->update(
                $id,
                $_POST['name']
            );

            $_SESSION['success'] = 'Thao tác thành công!';

            header("Location: /admin/categories/$id/update");
            exit();
        }

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    // Delete theo ID
    public function delete($id) {
        $this->catagory->deleteByID($id);

        header('Location: /admin/categories');
        exit();
    }
}