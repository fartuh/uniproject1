<?php

class BaseController
{
    private
        $method,
        $url;

    function __construct($method, $getName){
        $this->method = $method;

        if(!isset($_GET[$getName])) $this->url = [''];
        else $this->url = explode('/', $_GET['url']);

//        echo "method: $method; page:". $this->url[0];
    }

    public function map(){
        if($this->method == 'get') $this->get();
        elseif($this->method == 'post') $this->post();
    }

    private function get(){
        $urls = $this->url;
        if($urls[0] == 'chat'){
            if($this->logged()){
                $pdo = DB::getVar();
                $stmt = $pdo->prepare("SELECT * FROM messages LEFT JOIN users ON users.id = messages.user_id");
                $stmt->execute();

                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $this->view("chat.php", $data);

            } 
            else{
                header('Location: login');
                exit();
            }
        }
        elseif(explode('?', $urls[0])[0] == 'newTheme'){
            $_SESSION['theme'] = trim($_GET['newTheme']);
            header("Location: chat");
            exit();
        }
        elseif($urls[0] == 'login'){
            if($this->logged()){
                header("Location: chat");
                exit();
            }
            
            $this->view('login.php');
        }
        elseif($urls[0] == 'logout'){
            session_destroy();
            header('Location: login');
            exit();
        }
        else{
            if($this->logged()){
                header("Location: chat");
                exit();
            }
            header("Location: login");
            exit();
        
        }
    }

    private function post(){
        $urls = $this->url;
        if($urls[0] == 'newMsg'){
            if($this->logged()){
                $msg = trim($_POST['msg']);
                $pdo = DB::getVar();
                $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
                $stmt->execute([$_SESSION['login']]);
                $userData = $stmt->fetch(PDO::FETCH_ASSOC);

                $stmt = $pdo->prepare("INSERT INTO messages VALUES(NULL, ?, ?)");
                $stmt->execute([$msg, $userData['id']]);
                header('Location: chat');
                exit();
            }
            else{
                header('Location: login');
                exit();
            }
        }
        if($urls[0] == 'login'){
            $login = trim($_POST['login']);
            $pass = trim($_POST['pass']);

            if($this->logged()){
                header("Location: chat");
                exit();
            }
            else{
                $this->auth($login, $pass);
            }
        }
    }

    private function auth($login, $pass){
        $pdo = DB::getVar(); 
        $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
        $stmt->execute([$login]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if(isset($data['login'])){
            if(hash('sha256', $pass) == $data['password']){
                $_SESSION['login'] = $data['login'];
                header('Location: chat');
                exit();
            }
            else{
                echo "<script>alert('Невiрний пароль або логiн вже зайнятий');</script>";
                $this->view('login.php');
            }

        }
        else {
            $stmt = $pdo->prepare("INSERT INTO users VALUES(NULL, ?, ?)");
            $stmt->execute([$login, hash('sha256', $pass)]);

            $_SESSION['login'] = $login;
            header('Location: chat');
            exit();
        }

    }

    private function logged(){
        if(isset($_SESSION['login']))
            return true;
        return false;
    }

    private function view($name, $args = []){
        /*foreach($args as $arg){
            $$arg[0] = $arg[1];
    } */
        $data = $args;
        
        include($name);
    }

}

?>
