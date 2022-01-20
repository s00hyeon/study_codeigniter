
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>
    

<?php
    // 접속확인
    // localhost주소, id, pw, database명
    // $conn = mysqli_connect("localhost:81", "root", "qwer1234", "abc_corp");

    // // db 연결이 없으면 에러처리
    // if(!$conn){
    //     echo 'DB에 연결하지 못했습니다.'. mysqli_connect_error();

    // }
    // else{
    //     echo "DB접속완료";

    // }


    // 목표: write.php의 name, message 값을 post로 받아서 insert.php에서 처리

    // name, message 값을 post로 받아서 => 변수에 저장
    $user_name = $_POST['name'];
    $user_msg = $_POST['message'];

    echo "$user_name - $user_msg";


    // mysqli_close($conn);

    echo "<hr/><a href='index.html'>메인으로 이동하기</a>";

?>


</body>
</html>
