<?php
    include "header.php";
    include "leftside.php";

    include "../class/counter_class.php";
    $counter = new Counter();
    $totalViews = $counter->checkIp();
?>
    <div class="admin-content-right dashboard">
        <!-- <div class="admin-content-right-bg">
            <img src="icon/bg.png" alt="">
        </div> -->
        <div class="card">
            <div class="icon">
                <i class="fa fa-eye"></i>
            </div>
            <div class="content">
                <div class="total"><?php echo $totalViews; ?></div>
                <p>Lượt truy cập</p>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>

</html>