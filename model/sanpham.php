<?php
    function add_sanpham($name,$price,$img,$img2,$img3,$details,$iddm) {
        $sql = "insert into san_pham(name,price,img,img2,img3,mo_ta,iddm) values('$name','$price','$img','$img2','$img3','$details',$iddm)";
        pdo_execute($sql);
    }
    function loadall_sanpham() {
        $sql = "select * from san_pham order by id_sp desc";
        $list_sp = pdo_query($sql);
        return $list_sp;
    }
    function delete_sanpham($id_sp) {
        $sql = "delete from san_pham where id_sp=".$id_sp;
        pdo_execute($sql);
    }
    function loadone_sanpham($id_sp) {
        $sql = "select * from san_pham where id_sp=".$id_sp;
        $listone_sanpham = pdo_query_one($sql);
        return $listone_sanpham;
    }
    function update_sanpham($name,$price,$img,$img2,$img3,$details,$id_sp) {
        
            if(!$id_sp == ""){
                $sql = "update san_pham set name='$name', price='$price', mo_ta='$details' where id_sp=".$id_sp;
                pdo_execute($sql);
            }if(!$img == ""){
                $sql = "update san_pham set img='$img' where id_sp=".$id_sp;
                pdo_execute($sql);
            }if(!$img2 == ""){
                $sql = "update san_pham set img2='$img2' where id_sp=".$id_sp;
                pdo_execute($sql);
            }if(!$img3 == ""){
                $sql = "update san_pham set img3='$img3' where id_sp=".$id_sp;
                pdo_execute($sql);
            }
        
    }
    function delete_sanpham_danhmuc($id){
        $sql = "delete from san_pham where iddm=".$id;
        pdo_execute($sql);
    }
?>