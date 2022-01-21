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

        // 테이블에서 글 조회
        $sql = "SELECT * FROM msg_board";
        $result = mysqli_query($conn, $sql);

        // echo, print; 값을 그대로 출력
        // print_r; 배열, 객체모양을 그대로 출력
        // var_dump; 배열, 객체모양을 상세히 출력

        // var_dump($result);
        //object(mysqli_result)#2 (5) { ["current_field"]=> int(0) ["field_count"]=> int(3) ["lengths"]=> NULL ["num_rows"]=> int(2) ["type"]=> int(0) }

        $list = ''; //여기에 하나하나 값을 붙여서 $list를 출력
        
        // 출력결과: N번 : 이름 -> <li>1번 : 이름1</li><li>2번 : 이름1</li>
        // 이름엔 해당 게시물의 내용을 볼 수 있도록 a 태그가 걸려있어야

        // mysqli_fetch_array($result); result의 값을 배열로 바꿔줘
        // 배열 요소 하나씩 $row로 받아서 반복쓰!
        // 비교; foreach($arr as $value){} 순서와 정반대
        // get방식으로 게시글 번호가 넘어감
        echo '<ul>';
        while($row = mysqli_fetch_array($result)){

            $list = $list."<li>{$row['number']} : <a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";

        }
        echo $list;
        echo '</ul>';

        // if ($result === false){
        //     echo '조회불가';
        // }


    ?>
    <hr>
        <p><a href="write.php">글쓰기</a></p>
    <hr>
    <h2>글 검색</h2>
    <form action="search_result.php" method="post">
        <h3>검색할 키워드를 입력하세용.</h3>
        <p>
            <label for="search">키워드:</label>
            <input type="text" id="search" name="skey">
        </p>
        <input type="submit" value="검색">
    </form>
    <hr>
    <h2>글 삭제</h2>
    <form action="delete.php" method="post">
        <h3>삭제할 메시지 번호를 입력하세요.</h3>
        <p>
            <label for="msgdel">번호:</label>
            <input type="text" id="msgdel">
        </p>
        <input type="submit" value="삭제" name="delnum">
    </form>
</body>
</html>