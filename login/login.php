<?php
    session_start(); //세션 시작은 항상 페이지 처음에 위치

    $title = 'login';
    require('config.php'); // 관리자 정보를 상수값으로 지정
    include('header.php');
    require_once('functions.php');


    // 이미 관리자로 로그인되어 있는 경우
    if(is_user_authenticated()){
        redirect('admin.php');
        die();
    }


    if(isset($_POST['login'])){
        // output($_POST);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];

        if ($email == false){
            $status = "이메일 형식에 맞게 입력해주세요.";
        }

        // 유효성 검사
        if (authenticate_user($email, $password)){
            $_SESSION['email'] = $email; // 세션에 사용자가 입력한 이메일 정보를 저장
            redirect('admin.php'); // 페이지 이동
            die(); // 페이지 이동 후 작업 종료

        }
        else{
            $status = '비밀번호가 일치하지 않습니다.';
        }
    }

?>

<form action="" method="POST">
    <p>
        <label for="email">EMAIL:</label>
        <!-- type="text"이기 때문에 사용자 입력 검증이 필요함. -->
        <input type="text" id="email" name="email">
    </p>
    <p>
        <label for="password">PASSWORD:</label>
        <input type="password" id="password" name="password">
    </p>
    <p>
        <!-- 한 화면에 여러개의 form이 존재하는 경우 name의 값으로 form을 구분 -->
        <input type="submit" name="login" value="LOGIN">
    </p>
</form>

<div class="error">
    <p>
        <?php
            if (isset($status)){
                echo $status;
            }
        ?>
    </p>
</div>


<?php
    include('footer.php');
?>

