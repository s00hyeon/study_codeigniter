<?php

    session_start(); // 세션 유지

    // 세션 특정 변수에 저장된 값 초기화(2가지 방법)
    // unset($_SESSION['email']);
    // $_SESSION['email']
    session_unset(); // 세션 배열의 모든 값 초기화
    
    session_destroy(); // 세션에 저장된 변수 삭제

    require_once('functions.php');
    redirect('login.php');
    die();

?>


