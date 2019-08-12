<?php

    include 'config.php';

    $email = $_POST['email_user'];
    $num_yhin   = $_POST['num_yhin'];
    $num_yhang  = $_POST['num_yhang'];

    $sql = "update profile_user set num_yhin = '$num_yhin',
                                    num_yhang = '$num_yhang' where email_user = '$email'";
    $result = mysqli_query($conn, $sql);
    
    
    $res = array();
    if($result)  {
        echo "Success";
    } else {
        echo "Fail";
    }

//  echo json_encode($res);

?>
