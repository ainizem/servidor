<?php


class AccesoBD
{
    const RUTA = "localhost"; //por defecto 3306
    const BD = "ammunation";
    const USER = "root";
    const PASS = "z"; //no se pone $ en constantes
    public $conexion;

    function __construct()
    {
        $this->conectar();
    }

    function conectar()
    {
        $this->conexion = mysqli_connect(self::RUTA, self::USER, self::PASS, self::BD) or //para acceder a constantes de la misma clase NOMBRECLASE::NOMBRECONSTANTE// Cuando son constantes, sin hacer objetos nina
            die("Error al establecer la conexión"); //para debuggear
        echo "Conexión establecida";
    }

    function cerrarConexion()
    {

        mysqli_close($this->conexion);
    }

    function getUser($username, $pass)
    {
        $sql = "SELECT username, mail, rolId, roles.rol
            FROM users 
            INNER JOIN roles ON users.rolId=roles.id 
            WHERE username='$username' AND pass='$pass' 
            LIMIT 1;";
        $result = mysqli_query($this->conexion, $sql);

        if ($result && $fila = mysqli_fetch_assoc($result)) {

            //opcion A: usando la clave del array
            //$user = new User($fila['username'], $fila['mail']);

            //opcion B: con extract
            extract($fila); //El extract de un array asociativo crea una variable para cada clave valor, se podría acceder al username directamente con $username sin hacer $fila['username']. Más eficiente cuando lo obtenido de la consulta sql tiene pocas propiedades o se van a usar la mayoría de ellas.

            //crear una instancia de Rol con el rolid obtenido de la bd:
            $rol = new Rol($rol,$rolId);
            // no recoge bien los permisos, siempre los saca todos por alguna razon 
            //obtener la colección de Permisos asociados al rolid del user:
            
            $permisos = $this->getPermisosbyRol($rolId);
            $user = new User($username, $mail, $rol);
            $user->setPermisos($permisos);
            return $user;
        }
        return null;
    }

    function getRol($id)
    {
        $sql = "SELECT id, rol
            FROM roles 
            WHERE id='$id'
            LIMIT 1;";
        $result = mysqli_query($this->conexion, $sql);

        if ($result && $fila = mysqli_fetch_assoc($result)) {
            extract($fila);
            $rol = new Rol($id, $fila['rol']);
            return $rol;
        }
        return null;
    }
    //TO-DO: Seguir aqui: 
    function getPermisosbyRol($rolId)
    {
        $sql = "SELECT permisos.id, permisos.permiso
            FROM roles_permisos 
            INNER JOIN permisos ON roles_permisos.permisoId=permisos.id 
            WHERE roles_permisos.rolId='$rolId';";
        
        $result = mysqli_query($this->conexion, $sql);

        $permisos = [];
        if ($result) {
            while ($fila = mysqli_fetch_assoc($result)) {
                $permisos[] = new Permiso($fila['permiso'],$fila['id']);
            }
            return $permisos;
        }
        return null;
    }


    function registrarUsuario($username, $mail, $pass)
    {
        //preparar SQL con los campos recibidos
        $pass = md5($pass);

        $sqlCheck = "SELECT id FROM users WHERE mail='$mail'";
        $result = $this->lanzarSQL($sqlCheck);

        if ($result && mysqli_num_rows($result) > 0) {
            return false; //el usuario ya existe
        }

        //por fin, registrar usuario
        $sqlInsert = "INSERT INTO users(username, mail, pass)
                    VALUES ('$username','$mail','$pass')";
        $this->lanzarSQL($sqlInsert);
        return true; 
    }

    function lanzarSQL($SQL)
    { //para lanzar cualquier tipo de sentencia 
        //capturar SELECT 
        $tipoSQL = substr($SQL, 0, 6);
        if (strtoupper($tipoSQL) == "SELECT") {
            //si entra: es bidireccional, es select

            $result = mysqli_query($this->conexion, $SQL);
            return $result;
        } else {
            //unidireccional
            $result = mysqli_query($this->conexion, $SQL);
        }
    }
}
