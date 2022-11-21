<?php
    function  add_admins($user,$pass) {
        $sql = "insert into admins(user,pass) values('$user','$pass')";
        pdo_execute($sql);
    }
    function check_admins($user,$pass) {
        $sql = "select * from admins where user = '$user' and pass = '$pass'";
        $check_admins = pdo_query_one($sql);
        return $check_admins;
    }
?>