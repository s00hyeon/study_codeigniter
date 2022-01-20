<!-- write.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글쓰기</title>
</head>
<body>
    <h1>글쓰기</h1>
    <form action="insert.php" method="post">
        <!-- 아래 사용자가 입력한 내용을 insert.php로 넘겨라 -->
        <p>
            <label for="name">이름:</label>
            <input type="text" id="name" name="name">
            <!-- name="DB필드명" -->
        </p>
        <p>
            <label for="message">메시지:</label>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
        </p>
        <input type="submit" value="글쓰기">
    </form>
</body>
</html>