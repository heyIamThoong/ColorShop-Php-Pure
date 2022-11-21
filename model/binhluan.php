<?php 
    function loadall_binhluan() {
        $sql = "select * from binh_luan";
        $list_binhluan = pdo_query($sql);
        rerturn $list_binhluan;
    }
    
?>