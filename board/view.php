<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>~게시글보기~</title>
</head>
<body>
    <h1>게시판</h1>
    <h2>게시글</h2>
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

    // GET으로 넘어온 게시글 번호의 내용을 보여줌
    $view_num = $_GET['number'];

    // 테이블에서 글 조회
    $sql = "SELECT * FROM msg_board WHERE number = $view_num";
    $result = mysqli_query($conn, $sql);


    if ($row = mysqli_fetch_array($result)){
    ?>

    <h3>글번호: <?= $row['number'] ?> / 글쓴이: <?= $row['name'] ?></h3>
    <div><?= $row['message'] ?></div>

    <?php 
    } 
    ?>

    <hr/><a href='index.php'>메인으로 이동하기</a>

</body>
</html>