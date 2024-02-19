<?php

namespace Admin\Asm\Controllers\Admin;

use Admin\Asm\Commons\Controller;
use Admin\Asm\Models\User;

class UserController extends Controller
{

    private User $user;
    const PATH_UPLOAD = '/uploads/users/';

    private string $folder = 'users.';

    public function __construct()
    {
        $this->user = new User;
    }

    //Danh sách 
    public function index()
    {
        $data['users'] = $this->user->getAll();

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    //Thêm mới 
    public function create()
    {
        if (!empty($_POST)) {
            $name =  $_POST['name'];
            $email = $_POST['email'];
            $password =  $_POST['password'];

            $avatar =  $_FILES['avatar'] ?? null;
            $avatarPath = null;

            if ($avatar) {
                $avatarPath = self::PATH_UPLOAD . time() . $avatar['name'];

                if (!move_uploaded_file($avatar['tmp_name'], PATH_ROOT . $avatarPath)) {
                    $avatarPath = null;
                }
            }

            $this->user->insert(
                $name,
                $email,
                $password,
                $avatarPath
            );

            header('Location: /admin/users');
            exit();
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }

    //Xem chi tiết theo id

    public function show($id)
    {
        $data['user'] = $this->user->getByID($id);

        if (empty($data['user'])) {
            die(404);
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }

    //cập nhật theo id

    public function update($id)
    {
        $data['user'] = $this->user->getByID($id);

        if (empty($data['user'])) {
            die(404);
        }

        if (!empty($_POST)) {


            $name =  $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $avatar = $_FILES['avatar'] ?? null;
            $avatarPath = $data['user']['avatar'];
            $move = false;

            if ($avatar) {
                $avatarPath = self::PATH_UPLOAD . time() . $avatar['name'];

                if (!move_uploaded_file($avatar['tmp_name'], PATH_ROOT . $avatarPath)) {
                    $avatarPath = $data['user']['avatar'];
                } else {
                    $move = true;
                }
            }
            $this->user->update(
                $id,
                $name,
                $email,
                $password,
                $avatarPath
            );

            if ($move && $data['user']['avatar'] && file_exists(PATH_ROOT . $data['user']['avatar'])) {
                unlink(PATH_ROOT . $data['user']['avatar']);
            }

            $_SESSION['success'] = 'Thao tác thành công!';

            header("Location: /admin/users/$id/update");
            exit();
        }

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }



    public function delete($id)
    {
        $user =  $this->user->getByID($id);
        if (empty($user)) {
            die(404);
        }
        $this->user->deleteByID($id);

        if ($user['avatar'] && file_exists(PATH_ROOT . $user['avatar'])) {
            unlink(PATH_ROOT . $user['avatar']);
        }

        header('Location: /admin/users');
        exit();
    }
}
