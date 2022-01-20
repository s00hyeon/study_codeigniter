
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
    $user = 'root';
    $pass = 'qwer1234';
    $dbname = 'abc_corp';
    $port = '3307';
    $conn = mysqli_connect("localhost", $user, $pass, $dbname, $port);

    // db 연결이 없으면 에러처리
    if(!$conn){
        echo 'DB에 연결하지 못했습니다.'. mysqli_connect_error();
        exit;
    }
    else{
        echo "DB접속완료";

    }

    // 목표: write.php의 name, message 값을 post로 받아서 insert.php에서 처리

    // name, message 값을 post로 받아서 => 변수에 저장
    $user_name = $_POST['name'];
    $user_msg = $_POST['message'];

    print "$user_name - $user_msg";

    $sql = "INSERT INTO msg_board (name, message) VALUES ('$user_name', '$user_msg')";
    // values에 ''안붙여서 에러가 났었음

    // insert 결과 확인; mysqli_query($conn, $sql)
    $result = mysqli_query($conn, $sql);

    if($result === false){
        echo '저장하지 못했습니다';
        error_log(mysqli_error($conn)); //에러로그 출력
    }else{
        echo '저장 성공';
    }

    echo "<hr/><a href='index.html'>메인으로 이동하기</a>";
    mysqli_close($conn);

?>




</body>
</html>
