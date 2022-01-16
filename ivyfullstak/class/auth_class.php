<?php
    define('__ROOT__', dirname(dirname(__FILE__))); 
    require_once(__ROOT__.'/admin/lib/database.php');
    require_once(__ROOT__.'/admin/lib/session.php');
?>

<?php
    class Auth
    {
        private $db;

        public function __construct()
        {
            $this ->db = new Database();
        }

        public function register($data)
        {
            $username = $data['username'];
            $fullname = $data['fullname'];
            $password = $data['password'];
            $query = "INSERT INTO tbl_user (user_username,user_fullname,user_password) VALUES ('$username', '$fullname', '$password')";
            $result = $this ->db ->insert($query);
            header('Location:login.php');
            return $result;
        }

        public function login($data){
            $username = $data['username'];
            $password = $data['password'];

            $query = "SELECT * FROM tbl_user  WHERE user_username = '$username' AND user_password = '$password' LIMIT 1 ";
            $result = $this -> db ->select($query);
            if($result) {
                $value = $result ->fetch_assoc();
                Session::set('user_username', $value['user_username']);
                Session::set('user_fullname', $value['user_fullname']);
                Session::set('user_id', $value['user_id']);
                header('Location:index.php');
            } else {
                $alert = "Sai tài khoản hoặc mật khẩu";
                return $alert;
            }
        }

        public function logout()
        {
            if (isset($_SESSION['user_username']) && $_SESSION['user_username']) {
                unset($_SESSION['user_username']);
                unset($_SESSION['user_fullname']);
                unset($_SESSION['user_id']);
            }

            header('Location:login.php');
        }
    }  
?>