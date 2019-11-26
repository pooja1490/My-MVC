<!--all the curd operations queries code will here and after registrtion user will insert into users table-->

<?php 
require_once ("C:\wamp\www\My-MVC\Model\queriesCrud.php");
class queriesCrud
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new dbConnect();
    }
    
    function addUser($username, $password) {
        $query = "INSERT INTO login (username,password) VALUES (?, ?)";
        $paramType = "si"; //string and int
        $paramValue = array(
            $username,
            $password
            );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function editUser($username,$password,$id) {
        $query = "UPDATE login SET username = ?,password = ? WHERE id = ?";
        $paramType = "ssi";
        $paramValue = array(
            $username,
            $password,
            $id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteUser($id) {
        $query = "DELETE FROM login WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getUserById($id) {
        $query = "SELECT * FROM login WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
       // print _r($result);
        return $result;
       
    }
    
    function getAllUser() {
        $sql = "SELECT * FROM login";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>