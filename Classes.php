<?php
class UserPDO
{
    // les atributs
    private $id;
    public $login;
    private $password;
   


    // methodes
    public function __construct()
    {
        $username="root";
        $password="";
        try{
            $this->bd = new PDO("mysql:host=localhost;dbname=classes;charset=utf8mb4", $username, $password);
            // $this->bd = new PDO("mysql:host=localhost;dbname=classes;charset=utf8mb4", "root", ""); marche aussi
            // même sans le charset, la bdd ne se connecte pas
            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        }catch (PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
        

    }
    public function register($login,
    $password){
        $req = $this->bd->prepare("INSERT INTO utilisateurs(login,password)VALUES(?,?)");
        $req->execute([$login, $password]);

        $req2 = $this->bd->prepare("SELECT * FROM utilisateurs WHERE id = ?");
        $req2->execute([$_SESSION['login']]);
        $result = $req2->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($result);
        return $result;
    
    }
    public function connect($login, $password)
    {
        $req=$this->bd->prepare("select * from utilisateurs where login=? and password=?");
        $req->execute([$login, $password]);
        $count = $req->rowCount();
        if ($count == 0) {
            $message = "votre login ou mdp est incorrect";
        } else {
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            $message = "vous etes connecté";
        }
        echo $message;
    }

    public function disconnect()
    {
        session_destroy();
        echo " Vous avez été déconnecté";
        exit;
    }
    public function delete()
    {
        $req=$this->bd->prepare("delete from utilisateurs where login=?");
        $req->execute([$_SESSION['login']]);
        session_destroy();
        echo " Vous avez été delete";
        exit;
    }
    public function update(
        $login,
        $password,
    ) {
        $req=$this->bd->prepare("UPDATE utilisateurs SET login=?, password=? WHERE login = ?");
        $req->execute([$login, $password, $_SESSION['login']]);
    }
    public function isConnected()
    {
        if (isset($_SESSION['login'])) {
            return true;
        } else {
            return false;
        }
    }
    public function getAllInfos()
    {
        $req = $this->bd->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $req->execute([$_SESSION['login']]);
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
        return $result;;
    }
    public function getLogin()
    {
        $req = $this->bd->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $req->execute([$_SESSION['login']]);
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result[0]['login']);
        return $result[0]['login'];
    }
   
}

$user=new UserPDO();
// var_dump($_SESSION);




//
class Card
{
    private $id;
    private $image;
    private $state;
    private $items;
    private $paires;

    public function __construct()
    {
        $username="root";
        $password="";
        try{
            $this->bd = new PDO("mysql:host=localhost;dbname=classes;charset=utf8mb4", $username, $password);
            // $this->bd = new PDO("mysql:host=localhost;dbname=classes", "root", ""); marche aussi
            // même sans le charset
            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        }catch (PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
        

    }

    public function getId()
    {
        return $this->id;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    
    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setState($state)
    {
        $this->state = $state;
    }
public function resetGame(){
    
}

}

