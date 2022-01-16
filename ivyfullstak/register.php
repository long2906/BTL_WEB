<?php
    require_once('./class/auth_class.php');
    $auth = new Auth();
    include "header.php";
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $params = [
            'username' => $_POST['username'],
            'fullname' => $_POST['fullname'],
            'password' => md5($_POST['confirm_password']),
        ];
        $auth ->register($params);
    }
?>

<section class="login-page">
    <div class="container">
        <div class="row">
            <form action="" method="post" id="signupForm" autocomplete="false">
                <h4 class="title">
                    <i class="fa fa-user-circle icon"></i>
                    Đăng ký tài khoản
                </h4>

                <div class="form-group">
                    <label>Tên đăng nhập <span class="required">*</span></label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Họ tên <span class="required">*</span></label>
                    <input type="text" name="fullname" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Mật khẩu <span class="required">*</span></label>
                    <input type="password" name="password" class="form-control" required id="password">
                </div>

                <div class="form-group">
                    <label>Nhập lại mật khẩu <span class="required">*</span></label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>

                <div class="form-group">
                    <button class="btn btn-black" type="submit">
                        <i class="fa fa-sign-in"></i>
                        Đăng ký
                    </button>
                </div>

                <div class="form-group">
                    <div style="font-size: 14px;">
                        Bạn đã có tài khoản?
                        <a href="login.php">Đăng nhập</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $("#signupForm").validate({
			rules: {
				username: "required",
				fullname: "required",
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
			},
			messages: {
				username: "Trường này không được để trống",
				fullname: "Trường này không được để trống",
				password: {
					required: "Trường này không được để trống",
					minlength: "Mật khẩu tối thiểu 5 ký tự"
				},
				confirm_password: {
					required: "Trường này không được để trống",
					minlength: "Mật khẩu tối thiểu 5 ký tự",
					equalTo: "Mật khẩu không trùng nhau"
				},
			}
		});
    </script>
</section>
<?php
include "footer.php";
?>