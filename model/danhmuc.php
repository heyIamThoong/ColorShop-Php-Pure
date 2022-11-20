<?php
    function add_danhmuc($category) {
        $sql = "insert into loai_san_pham(name) values('$category')";
        pdo_execute($sql);
    }
    function loadall_danhmuc() {
        $sql = "select * from loai_san_pham order by id desc";
        $list_dm = pdo_query($sql);
        return $list_dm;
    }
    function delete_danhmuc($id) {
        $sql = "delete from loai_san_pham where id=".$id;
        pdo_execute($sql);
    }
    function update_danhmuc($id,$category) {
        $sql = "update loai_san_pham set name='".$category."' where id =".$id;
        pdo_execute($sql);
    }
    function loadone_danhmuc($id) {
        $sql = "select * from loai_san_pham where id=".$id;
        $listone_danhmuc = pdo_query_one($sql);
        return $listone_danhmuc;
    }
    
?>