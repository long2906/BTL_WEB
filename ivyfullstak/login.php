<?php
    require_once('./class/auth_class.php');
    $auth = new Auth();
    include "header.php";
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $params = [
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
        ];
        var_dump($params);
        $checkLogin = $auth ->login($params);
    }
?>
<section class="login-page">
    <div class="container">
        <div class="row">
            <form action="" method="post" id="loginForm">
                <h4 class="title">
                    <i class="fa fa-user-circle icon"></i>
                    Đăng nhập tài khoản
                </h4>

                <p style="color:red; margin-bottom: 20px; text-align: center">
                    <?php
                        if(isset($checkLogin)){ echo $checkLogin; }
                    ?>
                </p>

                <div class="form-group">
                    <label>Tên đăng nhập <span class="required">*</span></label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Mật khẩu <span class="required">*</span></label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <button class="btn btn-black" type="submit">
                        <i class="fa fa-sign-in"></i>
                        Đăng nhập
                    </button>
                </div>

                <div class="form-group">
                    <div style="font-size: 14px;">
                        Bạn chưa có tài khoản?
                        <a href="register.php">Đăng ký ngay</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $("#loginForm").validate({
			rules: {
				username: "required",
				password: {
					required: true,
					minlength: 5
				},
			},
			messages: {
				username: "Trường này không được để trống",
				password: {
					required: "Trường này không được để trống",
					minlength: "Mật khẩu tối thiểu 5 ký tự"
				},
			}
		});
    </script>
</section>
<?php
include "footer.php";
?>