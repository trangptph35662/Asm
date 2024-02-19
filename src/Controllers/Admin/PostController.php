<?php
namespace Admin\Asm\Controllers\Admin ;
use Admin\Asm\Commons\Controller;
use Admin\Asm\Models\Categories;
use Admin\Asm\Models\Post;

class PostController extends Controller {
    private Post $post ;

    private string $folder = 'posts.' ;
    const PATH_UPLOAD = '/uploads/posts/' ;

    public function  __construct() {
        $this->post = new Post ;
    }

    // Danh sách
    public function index()
    {
        $data['posts'] = $this->post->getAll();

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    // Thêm mới
    public function create()
    {
        if (!empty($_POST)) {
            $categoryID = $_POST['categories_id'];
            $title      = $_POST['title'];
            $excerpt    = $_POST['excerpt'];
            $content    = $_POST['content'];
            $post_time = date('Y-m-d H:i:s');

            $image      = $_FILES['image'] ?? null;
            $imagePath  = null;
            if ($image) {
                $imagePath = self::PATH_UPLOAD . time() . $image['name'];

                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = null;
                }
            }

            $this->post->insert(
                $categoryID,
                $title,
                $content, $post_time,
                $excerpt,
                $imagePath
            );

            header('Location: /admin/posts');
            exit();
        }

        $data['categories'] = (new Categories)->getAll();

        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }

    // Xem chi tiết theo ID
    public function show($id)
    {
        $data['posts'] = $this->post->getByID($id);

        if (empty($data['posts'])) {
            die(404);
        }

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    //  Chỉnh sửa bài viết
    public function update($id){
        $data['post'] = $this->post->getByID($id);

        if(empty($data['post'])){
            die(404) ;
        }

        if(!empty($_POST)){
            $categories_id = $_POST['categories_id'];
            $title = $_POST['title'] ;
            $excerpt = $_POST['excerpt'] ;
            $content = $_POST['content'] ;
            $post_time = date("Y-m-d H:i:s");

            $image = $_FILES['image'] ?? null ;
            $imagePath = $data['post']['p_image'];
            $move = false ;

            if($image){
                $imagePath = self::PATH_UPLOAD . time() . $image['name'];

                if(!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)){
                    $imagePath = $data['post']['p_image'];
                }else{
                    $move = true ;
                }
            }

                $this->post->update($id, $categories_id, $title,$content,$post_time, $excerpt, $imagePath);

                if($move && $data['post']['p_image'] && file_exists(PATH_ROOT . $data['post']['p_image'])){
                    unlink(PATH_ROOT . $data['post']['p_image']);
                }

                $_SESSION['success'] = ' Thao tác thành công' ;

                header("Location: /admin/posts/$id/update");
                exit() ;
            }

            $data['categories'] = (new Categories) -> getAll() ;

            return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
        
    }

    // delete 
    public function delete($id){
        $post = $this->post->getByID($id) ;

        if(empty($post)){
            die(404);
        }

        $this->post->deleteByID($id) ;
        if($post['image'] && file_exists(PATH_ROOT . $post['image'])) {
            unlink(PATH_ROOT . $post['image']) ;
        }
        header("Location: /admin/posts");
        exit() ;
    }
}