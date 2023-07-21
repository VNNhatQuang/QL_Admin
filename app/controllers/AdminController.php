<?php

include_once "Core/renderView.php";
include_once "Core/renderView.php";
include_once "Core/functions.php";
include_once "app/requests/StoreAdminRequest.php";
include_once "app/requests/UpdateAdminRequest.php";

class AdminController
{

    /**
     * Hiển thị danh sách Admin
     *
     * @return void
     */
    public function index()
    {
        session_start();
        session_destroy();
        // main
        $search = $_GET['search'] ?? '';
        $admin = new Admin();
        $list = $admin->getAll($search);
        renderView('index', ['list' => $list]);
    }


    /**
     * Tìm kiếm Admin sử dụng AJAX
     *
     * @return void
     */
    public function search()
    {
        $search = $_GET['search'] ?? '';
        $admin = new Admin();
        $list = $admin->getAll($search);
        renderView('table', ['list' => $list]);
    }


    /**
     * Hiển thị form thêm mới Admin
     *
     * @return void
     */
    public function showCreateForm()
    {
        renderView('create');
    }


    /**
     * Thực hiện thêm mới Admin
     *
     * @return void
     */
    public function store()
    {
        session_start();
        $data = [
            'tendn' => $_POST['tendn'],
            'password' => $_POST['password'],
            'quyen' => $_POST['quyen'],
        ];
        if (!StoreAdminRequest($data)) {
            $_SESSION['error'] = 'Trường dữ liệu không hợp lệ hoặc Tên đăng nhập đã tồn tại.';
            header("Location: /create");
        } else {
            session_destroy();
            $admin = new Admin();
            $admin->store($data);
            header("Location: /");
        }
    }


    /**
     * Hiển thị form chỉnh sửa Admin
     *
     * @return void
     */
    public function showEditForm()
    {
        $key = $_GET['tendn'];
        $admin = new Admin();
        $result = $admin->getAdminById($key);
        // If Exits Admin
        if ($result) {
            renderView('edit', ['admin' => $result]);
        } else
            header("Location: /");
    }


    /**
     * Thực hiện cập nhật Admin
     *
     * @return void
     */
    public function update()
    {
        session_start();
        $data = [
            'tendn' => $_POST['tendn'],
            'password' => $_POST['password'],
            'quyen' => $_POST['quyen'],
        ];
        if (!UpdateAdminRequest($data)) {
            $_SESSION['error'] = 'Mật khẩu không hợp lệ.';
            header("Location: " . $_POST['uri']);
        } else {
            $admin = new Admin();
            $admin->update($data);
            header("Location: /");
        }
    }


    /**
     * Thực hiện xóa Admin
     *
     * @return void
     */
    public function destroy()
    {
        if (isset($_POST['destroy'])) {
            $key = $_POST['tendn'];
            $admin = new Admin();
            $admin->destroy($key);
        }
        header("Location: /");
    }
}
