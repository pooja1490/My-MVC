<?php
require_once ("../Model/dbConnect.php"); 
require_once ("../Model/queriesCrud.php");

$db_handle = new dbConnect();

$action = "";
if (! empty($_GET["action"])) {
    $action = $_GET["action"];
}
switch ($action) {
    case "user-add":
        if (isset($_POST['add'])) {
            $username = $_POST['username'];
            $password = base64_encode($_POST['password']);
          //  $pass = $_POST['password'];
         //  $password = password_hash($pass,PASSWORD_BCRYPT);
          // print_r($password);
           
            $QueriesCrud = new queriesCrud();
            $insertId = $QueriesCrud->addUser($username, $password);
          //  print_r($insertId);
        //    exit;
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: collectData.php");
            }
        }
        require_once "../View/registerUser.php";
        break;
    
  case "user-edit":
        $id = $_GET["id"];
       $QueriesCrud = new queriesCrud();
        
        if (isset($_POST['add'])) {
            $username = $_POST['username'];
            $password = base64_encode($_POST['password']);
                       
            $QueriesCrud->editUser($username, $password,$id);
            
            header("Location: collectData.php");
        }
        
        $result = $QueriesCrud->getUserById($id);
        require_once "../View/userEdit.php";
        break; 
    
    case "user-delete":
        $id = $_GET["id"];
        $QueriesCrud = new queriesCrud();
        
        $QueriesCrud->deleteUser($id);
        
        $result = $QueriesCrud->getAllUser();
         require_once "../View/dashbaord.php";
        break; 

    default:
        $QueriesCrud = new queriesCrud();
        $result = $QueriesCrud->getAllUser();
        require_once "../View/dashbaord.php";
        break;
}
    ?>