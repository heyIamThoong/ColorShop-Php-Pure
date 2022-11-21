<?php
    session_start();
    include 'model/pdo.php';
    include 'model/danhmuc.php';
    include 'model/number_home.php';
    include 'model/admins.php';
    include 'model/sanpham.php';
    include 'model/khachhang.php';

    
    if(isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
        // controller Loại sản phẩm
            case 'loai_san_pham':
                if(!isset($_SESSION['admin'])){
                    header('location:index.php?action=login_admin');
                    // include 'admin/account/login_admin.php';
                }

                $list_dm = loadall_danhmuc();
                include 'admin/loai_san_pham/loai_san_pham.php';
                break;
            //  Thêm sản phẩm danh mục
            case 'add_dm':

                if(!isset($_SESSION['admin'])){
                    header('location:index.php?action=login_admin');
                    // include 'admin/account/login_admin.php';
                }

                if(isset($_POST['btn_dm'])){
                    $list_dm = loadall_danhmuc();
                    $category = $_POST['category'];
                    $allupload = true;
                    foreach ($list_dm as $key => $row) {
                        if($category == $row['name'] || $category == ""){
                            $error_dm = "Tên danh mục đã tồn tại hoặc bị để trống";
                            $allupload = false;
                        }
                    }

                    if($allupload == true){
                        add_danhmuc($category);
                    }
   
                }
                $list_dm = loadall_danhmuc();
                include 'admin/loai_san_pham/loai_san_pham.php';
                break;
            // Xoá sản phẩm danh mục
            case 'xoadm':

                if(!isset($_SESSION['admin'])){
                    header('location:index.php?action=login_admin');
                    // include 'admin/account/login_admin.php';
                }

                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    delete_danhmuc($id);
                    delete_sanpham_danhmuc($id);
                    $list_dm = loadall_danhmuc();
                }
                include 'admin/loai_san_pham/loai_san_pham.php';
                break;
            // Lấy dữ liệu của phần tử muốn sửa
            case 'suadm':

                if(!isset($_SESSION['admin'])){
                    header('location:index.php?action=login_admin');
                    // include 'admin/account/login_admin.php';
                }
                unset($_SESSION['error_dm']);
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $listone_danhmuc = loadone_danhmuc($id);
                }
                include 'admin/loai_san_pham/update.php';
                break;
            // cập nhật dữ liệu mới
            case 'update_dm':

                if(!isset($_SESSION['admin'])){
                    header('location:index.php?action=login_admin');
                    // include 'admin/account/login_admin.php';
                }

                if(isset($_POST['update_dm'])){
                    
                    $category = $_POST['category'];
                    $id = $_POST['id'];
                    $list_dm = loadall_danhmuc();
                    $allupload = true;
                    // foreach ($list_dm as $key => $row) {
                    //     if($category == $row['name'] || $category == ""){
                    //         // $_SESSION['error_dm'] = "Tên danh mục đã tồn tại hoặc bị để trống";
                    //         $error_dm = "Tên danh mục đã tồn tại hoặc bị đển trống";
                    //         $allupload = false;
                    //     }
                    //     else{
                    //         unset($_SESSION['error_dm']);
                    //     }
                    // }
                        if($allupload == true){
                            update_danhmuc($id,$category);
                        }
                        if($allupload == false){
                            header('location: index.php?action=suadm&id='.$id);
                            $_SESSION['error_dm'] = $error_dm;
                        } 
                }
                $list_dm = loadall_danhmuc();
                include 'admin/loai_san_pham/loai_san_pham.php';
                break;

        // controller Sản phẩm
            // Thêm sản phẩm
            case 'add_sp':

                if(!isset($_SESSION['admin'])){
                    header('location:index.php?action=login_admin');
                    // include 'admin/account/login_admin.php';
                }
                
                if(isset($_POST['add_sp'])){
                    $iddm = $_POST['name_dm'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $details = $_POST['details'];

                    $img = $_FILES['image']['name'];
                    $target_dir = "uploaded_img/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

                    $img2 = $_FILES['image2']['name'];
                    $target_dir = "uploaded_img/";
                    $target_file = $target_dir . basename($_FILES["image2"]["name"]);
                    move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file);

                    $img3 = $_FILES['image3']['name'];
                    $target_dir = "uploaded_img/";
                    $target_file = $target_dir . basename($_FILES["image3"]["name"]);
                    move_uploaded_file($_FILES["image3"]["tmp_name"], $target_file);

                    // bắt lỗi thêm sản phẩm
                    $upload = true;
                    $list_sp = loadall_sanpham();
                    if($iddm == ""){
                        $error_iddm = "id danh mục không được để trống";
                        $upload = false;
                    }
                    
                    foreach ($list_sp as $key => $row) {
                        if($name == ""){
                            $error_name = "tên sản phầm không được để trống";
                            $upload = false;
                        }if($name == $row['name']){
                            $error_name = "Tên sản phẩm đã tồn tại";
                            $upload = false;
                        }
                        
                    }
                    if($price == "" ){    
                        $error_price = "Giá không được để trống hoặc bắt buộc phải nhập số";
                        $upload = false;
                        
                    }
                    
                    if($img == "" || $img2 == "" || $img3 == ""){
                        $error_img = "Ảnh không được để trống";
                        $upload = false;
                    }
                    
                    if($details == ""){
                        $error_detail = "chi tiết sản phẩm không được để trống";
                        $upload = false;
                    }
                    
                    if($upload == true){
                        add_sanpham($name,$price,$img,$img2,$img3,$details,$iddm); 
                        header('location: index.php?action=list_sp');
                    }
                    
                }
                $list_dm = loadall_danhmuc();
                
                include 'admin/hang_hoa/add.php';
                break;
            // select sản phẩm
            case 'list_sp':

                if(!isset($_SESSION['admin'])){
                    header('location:index.php?action=login_admin');
                    // include 'admin/account/login_admin.php';
                }

                $list_sp = loadall_sanpham();
                include 'admin/hang_hoa/list.php';
                break;
            // xoá sản phẩm
            case 'xoasp':

                if(!isset($_SESSION['admin'])){
                    header('location:index.php?action=login_admin');
                    // include 'admin/account/login_admin.php';
                }

                if(isset($_GET['id_sp'])){
                    $id_sp = $_GET['id_sp'];
                    delete_sanpham($id_sp);
                    $list_sp = loadall_sanpham();
                }else{
                    include 'admin/hang_hoa/list.php';
                }
                include 'admin/hang_hoa/list.php';
                break;
            // lấy dữ liệu sản phẩm cần update
            case 'suasp':

                if(!isset($_SESSION['admin'])){
                    header('location:index.php?action=login_admin');
                    // include 'admin/account/login_admin.php';
                }

                if(isset($_GET['id_sp'])){
                    $id_sp = $_GET['id_sp'];
                    $listone_sanpham = loadone_sanpham($id_sp);
                }
                include 'admin/hang_hoa/update.php';
                break;
            // Update sản phẩm
            case 'update_sp':

                if(!isset($_SESSION['admin'])){
                    header('location:index.php?action=login_admin');
                    // include 'admin/account/login_admin.php';
                }

                if(isset($_POST['update_sp'])){
                    // $iddm = $_POST['name_dm'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $details = $_POST['details'];
                    $id_sp = $_POST['id_sp'];

                    $img = $_FILES['image']['name'];
                    $target_dir = "uploaded_img/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

                    $img2 = $_FILES['image2']['name'];
                    $target_dir = "uploaded_img/";
                    $target_file = $target_dir . basename($_FILES["image2"]["name"]);
                    move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file);

                    $img3 = $_FILES['image3']['name'];
                    $target_dir = "uploaded_img/";
                    $target_file = $target_dir . basename($_FILES["image3"]["name"]);
                    move_uploaded_file($_FILES["image3"]["tmp_name"], $target_file);

                    update_sanpham($name,$price,$img,$img2,$img3,$details,$id_sp);
                }
                $list_sp = loadall_sanpham();
                include 'admin/hang_hoa/list.php';
                break;

        // Controller tài khoản admins
            case 'login_admin':
                if(isset($_POST['login_admin'])){
                    $user = $_POST['name'];
                    $pass = $_POST['pass'];
                    $check_admins = check_admins($user,$pass);
                    if(is_array($check_admins)){
                        $_SESSION['admin'] = $check_admins;
                        header('location:index.php');
                        // include 'index.php';
                    }else{
                        include 'admin/account/login_admin.php';
                    }   
                }else{
                    include 'admin/account/login_admin.php';
                }
                break;
            // case 'index':
            //     if(isset($_SESSION['admin'])){
            //         header('location:index.php');
            //     }else{
            //         include 'admin/account/login_admin.php';
            //     }
            //     break;
            case 'logout_admin':
                unset($_SESSION['admin']);
                include 'admin/account/login_admin.php';
                break;
            case 'register_admin':

                if(!isset($_SESSION['admin'])){
                    header('location:index.php?action=login_admin');
                    // include 'admin/account/login_admin.php';
                }

                if(isset($_POST['add_admins'])){
                    $user = $_POST['username'];
                    $pass = $_POST['pass'];
                    add_admins($user,$pass);
                }
                include 'admin/account/register_admin.php';
                break;
        // contrller khách hàng
            case 'list_khachhang':

                if(!isset($_SESSION['admin'])){
                    header('location:index.php?action=login_admin');
                    // include 'admin/account/login_admin.php';
                }

                $list_khachhang = loadall_khachhang();
                include 'admin/nguoi_dung/list_khachhang.php';
                break;
            case 'xoa_kh':

                if(!isset($_SESSION['admin'])){
                    header('location:index.php?action=login_admin');
                    // include 'admin/account/login_admin.php';
                }

                if(isset($_GET['id_kh'])){
                    $id_kh = $_GET['id_kh'];
                    delete_khachhang($id_kh);
                }
                $list_khachhang = loadall_khachhang();
                include 'admin/nguoi_dung/list_khachhang.php';
                break;
            default:
                include 'views/home_admin.php';
                break;
        }
    }else{
        if(isset($_SESSION['admin'])){
            // header('location:index.php');
            include 'views/home_admin.php';
        }else{
            // header('location:index.php?action=login_admin');
            include 'admin/account/login_admin.php';
        }
    }

?>

