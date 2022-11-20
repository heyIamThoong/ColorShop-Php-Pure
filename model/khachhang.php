<?php
    function add_khachhang($user,$pass,$address,$email) {
        $sql ="insert into khach_hang(name,pass,address,email) values('$user','$pass','$address','$email')";
        pdo_execute($sql);
    }
    function loadall_khachhang() {
        $sql = "select * from khach_hang";
        $list_khachhang = pdo_query($sql);
        return $list_khachhang;
    }
    function delete_khachhang($id_kh) {
        $sql = "delete from khach_hang where id_kh=".$id_kh;
        pdo_execute($sql);
    }
    function update_khachhang($name,$pass,$address,$email,$id_kh) {
        $sql = "update khach_hang set name='$name', pass='$pass', address='$address', email='$email' where id_kh =".$id_kh;
        pdo_execute($sql);
    }
    function loadone_khachhang($id_kh) {
        $sql = "select * from khach_hang where id_kh=".$id_kh;
        $listone_khachhang = pdo_query_one($sql);
        return $listone_khachhang;
    }
    function check_kh($email,$pass) {
        $sql = "select * from khach_hang where email='$email' and pass='$pass'";
        $check_kh = pdo_query_one($sql);
        return $check_kh;
    }
    function quen_mk($email) {
        $sql = "select * from khach_hang where email='$email'";
        $quen_mk = pdo_query_one($sql);
        return $quen_mk;
    }
?>