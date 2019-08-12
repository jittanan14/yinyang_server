<?php
    include 'config.php';

    $email = $_POST['email_user'];
    $password = md5($_POST['pass_user'], PASSWORD_DEFAULT);
//    $password = $_POST['pass_user'];

    $sql = "SELECT * FROM profile_user WHERE email_user = '$email'";
    $r = mysqli_query($conn, $sql);
    $res = array();

    if(mysqli_num_rows($r) == 0){
        $res['status'] = false;
        $res['messages'] = "ไม่มีอีเมลนี้ในระบบ";
    }

    else if(mysqli_num_rows($r) >0){
        $sql = "SELECT pass_user FROM profile_user WHERE email_user = '$email'";
        $r =mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($r);
        
        if($row['pass_user'] == $password){
            $sql = "SELECT * FROM profile_user WHERE email_user = '$email'";
            $r = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($r);
            
            $user['email']      = $row['email_user'];
            $user['password']   = "";
            $user['username']   = $row['name_user'];
            $user['gender']     = $row['gender_user'];
            $user['birthday']   = $row['Birth_user'];
            $user['element']    = $row['element_user'];
            $user['food']       = $row['food_user'];
            $user['image_user'] = $row['Pic_user'];
            $user['body']       = $row['body_user'];
            $user['num_yhin']   = $row['num_yhin'];
            $user['num_yhang']  = $row['num_yhang'];
            
            $res['status'] = true;
            $res['messages'] = "เข้าสู่ระบบสำเร็จ";
            $res['user'] = $user;

        }
        else{ 
            $res['status'] = false;
            $res['messages'] = "รหัสผ่านผิด";
        }
    }
    echo json_encode($res);
?>
