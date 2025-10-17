<?php

class AccesoBD{
    const RUTA = "localhost"; //3306
    const BD = "ammunation";
    const USER = "ammuadmin";
    const PASS = "z";
    public $conexion;

    function __construct(){
        $this->conectar();
    }
    
    function conectar(){
        $this->conexion=mysqli_connect(self::RUTA,self::USER,self::PASS,self::BD) or
        die("Error al establecer la conexión");
        echo "Conexión establecida";
    }


    function cerrarConexion(){
        mysqli_close($this->conexion);

    }

    function getUser($mail, $pass){
        $sql="SELECT name, mail, rol_id 
              FROM users 
              WHERE mail = '$mail' AND password = '$pass'
              LIMIT 1";
        
        $result = mysqli_query($this->conexion, $sql);

        if ($result && $fila = mysqli_fetch_assoc($result)){
            extract($fila);  //genera variables por cada clave del array   

            //Conseguir privilegios del rol de este usuario
            

            $user = new User($name,$mail,$privilegios); //$user = new User($fila['name'],...);
            return $user;

            //return new User($fila['name'],$fila['mail']);

        }
        return null;
    }

    //Ejemplo de como obtener y recorrer varios registros
    function getUsers(){
        $sql="SELECT name, mail 
              FROM users";
        $result = mysqli_query($this->conexion, $sql);
        $users = [];
        if ($result) {
            while ($fila = mysqli_fetch_assoc($result)) {
                extract($fila);  
                $user = new User($name, $mail);
                $users[] = $user;
            }
        }
        return $users;
    }

    function registrarUsuario($name, $mail, $pass){
        //Preparar la SQL con los campos recibidos
        $pass = md5($pass);

        $sqlCheck = "SELECT id FROM users WHERE mail='$mail' ";
        $result = $this->lanzarSQL($sqlCheck);

        if ($result && mysqli_num_rows($result)>0){
            return false; //El usuario ya existe
        }
        //Por fin! Registrar el usuario
        $sqlInsert = "INSERT INTO users(name,mail,password)
                      VALUES ('$name','$mail','$pass')";
        $this->lanzarSQL($sqlInsert);
        return true;
    }
    


    function lanzarSQL($SQL)
    {
        //Capturar "select" ... "SeLeCT"
        $tipoSQL = substr($SQL, 0, 6);
        if (strtoupper($tipoSQL)=="SELECT"){
            //Es bidireccional
            $result = mysqli_query($this->conexion,$SQL);
            return $result;
        }else{
            //Es unidireccional
            $result = mysqli_query($this->conexion,$SQL);
        }

    }





    


}
?>