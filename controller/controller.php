<?php 

if(isset($_GET['view'])){
    $view=$_GET['view'];
        switch ($view) {
            case 'login':
                header('location:view/login.php'); 
                break;
            case 'sign-up':
                include('view/sign-up.php'); 
                break;
            case 'sign_up':
                $name=$_POST['name'];
                $email=$_POST['email'];
                $sdt=$_POST['sdt'];
                $address=$_POST['address'];
                $password=$_POST['password'];
                $newuser=newUser($name,$email,$sdt,$address,$password);
                if ($newuser) {
                    header('location:view/login.php'); 
                    break;       
                }else{
                    include('view/sign-up.php'); 
                    break;       
                }    
            case 'logout':
                if(isset($_SESSION['laclac_khachang'])){
                    unset($_SESSION['laclac_khachang']);
                    header('location:view/login.php'); 
                }
                break;    
            case 'user':
                include('view/user.php'); 
                break;
            case 'contact':
                include('view/contact.php'); 
                break;
            case 'about':
                include('view/about.php'); 
                break;    
            case 'home':
                include('view/home.php');
                break;
            case 'products':
                include('view/products.php');
                break;
            case 'products-category':
                include('view/products-category.php');
                break;
                case 'products-search':
                    include('view/products-category.php');
                    break;        
            case 'product-detail':
                include('view/product-detail.php');
                break;
            case 'addtocart':
                include('model/cart.php');
                break;
            case 'order':
                include('model/cart.php');
                break;       
            case 'order-complete':
                include('view/order-complete.php');
                break; 
            case 'cart':
                include('view/cart.php');
                break;
            case 'thanhtoan2':
                include('view/checkout.php');
                break;    
            case 'online':
                include('view/online_checkout.php');
                break;      
            case 'addtoreview':
                if(isset($_SESSION['laclac_khachang'])){
                    $kh=$_SESSION['laclac_khachang'];
                    print_r($_SESSION['laclac_khachang']) ;
                    $nd=$_POST['noidung'];
                    $masp=$_POST['masp'];
                    $sosao=$_POST['sosao'];
                    if($nd && $nd){
                        $addtoreview=product_addtoreview($masp,$kh['MaKH'],$sosao,$nd);   
                        if ($addtoreview) {
                            header('location:?view=product-detail&id='.$masp);
                        }               
                    }else{
                        header('location:?view=product-detail&id='.$masp.'&alert=Bạn cần phải điền đủ bao gồm số sao và nội dung đánh giá');
                    }
                }else{
                    header('Location:view/login.php');   
                    break;
                }                 

            case 'timkiem':
                    if(isset($_POST['btsearch'])){include('view/main/timkiem.php');}
                    break;

            default:
                    include('view/home.php');   
                   
                    break;
        }
}
else {
    include('view/home.php');
}

?>