<?php

    //value 변수에 담긴 값의 고유 형태를 출력하는 함수
    function output($value){
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }

    function authenticate_user($email, $password){
        if($email == USER_NAME && $password == PASSWORD){
            return true;
        }
    }

    function redirect($url){
        // header("Location:주소"); 매개변수로 들어온 주소로 이동
        header("Location:$url"); 
    }

    // 인증된 사용자(관리자)인지 확인
    function is_user_authenticated(){
        // 세션의 email 변수에 값이 저장되어 있다면 true 리턴
        return isset($_SESSION['email']);
    }

    // 인증된 사용자(관리자)가 아닌 경우 로그인페이지로 이동
    function ensure_user_is_authenticated(){
        if(!is_user_authenticated()){
            redirect('login.php');
            die();
        }
    }

?>