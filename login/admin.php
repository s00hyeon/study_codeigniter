<?php
    session_start(); //로그인 페이지에 만든 세션이 유지됨

    require_once('config.php');
    require_once('functions.php');

    // 세션이 유지되었는지 입력값으로 확인
    // 세션은 브라우저별로 저장이 되기때문에 세션이 유지되지 않는 브라우저에션 아래가 출력되지 않음.
    echo $_SESSION['email'];

    // 관리자가 맞는지 인증
    ensure_user_is_authenticated();

    include('header.php');

?>

<a href="logout.php">LOGOUT</a>

<?php
    include('footer.php');
?>