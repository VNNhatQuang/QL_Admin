<?php include_once "layouts/head.view.php" ?>


<main class="m-5">
    <h2>Thêm mới</h2>
    <hr>
    <br>
    <div class="container">
        <form action="/update" method="POST">
            <input type="hidden" name="tendn" value="<?= $admin->tendn ?>">
            <input type="hidden" name="uri" value="<?= $_SERVER['REQUEST_URI'] ?>">
            <div class="form-group row">
                <label for="tendn" class="col-sm-2 col-form-label">Tên đăng nhập</label>
                <div class="col-sm-10">
                    <input name="tendn" type="text" class="form-control" id="tendn" value="<?= $admin->tendn ?>" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Mật khẩu mới</label>
                <div class="col-sm-10">
                    <input name="password" type="password" class="form-control" id="password" value="<?= $admin->password ?>" placeholder="Mật khẩu mới">
                </div>
            </div>
            <div class="form-group row">
                <label for="role" class="col-sm-2 col-form-label">Quyền</label>
                <div class="col-sm-10">
                    <select name="quyen" id="role" class="form-control">
                        <option value="0" <?= ($admin->quyen == 0) ? 'selected' : '' ?>>0</option>
                        <option value="1" <?= ($admin->quyen == 1) ? 'selected' : '' ?>>1</option>
                    </select>
                </div>
            </div>
            <br>
            <?php session_start() ?>
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="container" align="end">
                    <span class="text-danger"><?= $_SESSION['error'] ?></span>
                </div>
            <?php } ?>
            <br>
            <div class="form-group row justify-content-end">
                <button type="submit" class="btn btn-primary">Lưu dữ liệu</button>
                &nbsp;
                <a href="/" class="btn btn-warning text-light">Quay lại</a>
            </div>
        </form>
    </div>
</main>


<?php include_once "layouts/foot.view.php" ?>