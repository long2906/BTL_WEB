<?php
    if (!defined("__ROOT__")) {
        define('__ROOT__', dirname(dirname(__FILE__))); 
    }
    require_once(__ROOT__.'/admin/lib/database.php');
    require_once(__ROOT__.'/admin/lib/session.php');
?>

<?php 
    class Counter
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function checkIp()
        {
            $queryCount = "SELECT COUNT(*) AS totalViews FROM tbl_user";
            $totalViews = $this->db->count($queryCount)->fetch_assoc();
            return $totalViews['totalViews'];
        }

        // public function checkIp()
        // {
        //     $ip_address = $this->getClientIP();

        //     $querySelect = "SELECT * FROM tbl_guest WHERE ip_address = '$ip_address'";
        //     $find = $this->db->select($querySelect);
            
        //     if (!$find) {
        //         $query = "INSERT INTO tbl_guest (ip_address) VALUES ('$ip_address')";
        //         $this->db->insert($query);
        //     }

        //     $queryCount = "SELECT COUNT(*) AS totalViews FROM tbl_guest";
        //     $totalViews = $this->db->count($queryCount)->fetch_assoc();
        //     return $totalViews['totalViews'];
        // }

        // public function getClientIP() {
        //     $ipaddress = '';
        //     if (isset($_SERVER['HTTP_CLIENT_IP']))
        //         $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        //     else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        //         $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        //     else if(isset($_SERVER['HTTP_X_FORWARDED']))
        //         $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        //     else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        //         $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        //     else if(isset($_SERVER['HTTP_FORWARDED']))
        //         $ipaddress = $_SERVER['HTTP_FORWARDED'];
        //     else if(isset($_SERVER['REMOTE_ADDR']))
        //         $ipaddress = $_SERVER['REMOTE_ADDR'];
        //     else
        //         $ipaddress = 'UNKNOWN';
        //     return $ipaddress;
        // }
    }
?>