<?php

  include 'config.php';

  $email = $_POST['email'];
  $password = md5($_POST['password'], PASSWORD_DEFAULT);
  $firstname =$_POST['firstname'];
  $lastname = $_POST['lastname'];
  $gender = $_POST['gender'];
  $birthday = $_POST['birthday'];
  $telephone = $_POST['telephone'];
  $image_user = $_POST['image_user'];
    if($image_user != ""){
        $image_name = uniqid(). ".jpg";
        $upload_path = "images/prof/$image_name";
        file_put_contents($upload_path,base64_decode($image_user));
    }

  $sql = "SELECT * FROM member WHERE email = '$email'";
  $r = mysqli_query($conn, $sql);
  $res = array();
  
  if(mysqli_num_rows($r) == 0){

    $sql = "INSERT INTO member (email, password, firstname, lastname, gender, birthday, telephone, image_user)
    VALUES ('$email', '$password', '$firstname','$lastname','$gender','$birthday','$telephone','$image_name')";
    $r = mysqli_query($conn, $sql);
    if($r){

    
    $res['status'] = true;
    $res['messages'] = "สมัครสมาชิกเสร็จสมบูรณ์";}

  }else{
    
    $res['status'] = false;
    $res['messages'] = "มีอีเมลนี้ในระบบแล้ว";
  
  }

  echo json_encode($res);

?>
