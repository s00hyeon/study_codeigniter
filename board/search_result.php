<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>abc 게시판</title>
</head>
<body>
    <h1>게시판</h1>
    <h2>글목록</h2>
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

        // 키워드 검색
        $user_skey = $_POST['skey'];
        $sql = "SELECT * FROM msg_board WHERE message LIKE '%$user_skey%'";
        $result = mysqli_query($conn, $sql);

        $list = ''; //여기에 하나하나 값을 붙여서 $list를 출력
        
        echo '<ul>';
        while($row = mysqli_fetch_array($result)){

            $list = $list."<li>{$row['number']} : <a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";

        }
        echo $list;
        echo '</ul>';

        mysqli_close($conn);

        // if ($result === false){
        //     echo '조회불가';
        // }


    ?>
    <hr/><a href='index.php'>메인으로 이동하기</a>

</body>
</html>