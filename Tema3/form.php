
<?php
$dbservername = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'blogapp';
$dboptions = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => true
);
$nombre = $_GET['nombre'];
$correo = $_GET['correo'];

//Open connection
function connectDB($dbservername, $dbusername, $dbpassword, $dbname, $dboptions)
{
    try {
        $conn = new PDO("mysql:host=$dbservername;$dbname", $dbusername, $dbpassword, $dboptions);
        // set the PDO error mode to exception
        return $conn;
    } catch (PDOException $e) {
        echo "Conexión fallida: " . $e->getMessage();
    }
}

//Create new user
function createUser($conn, $nombre, $correo)
{
    try {
        $sql = "INSERT INTO blogapp.USUARIOS (NOMBRE, CORREO) VALUES (:nombre, :correo)";
        $resultado = $conn->prepare($sql);
        $resultado->execute(array(":nombre" => $nombre, ":correo" => $correo));
        echo "Registro insertado";
    } catch (PDOException $e) {
        echo "A fallado el registro: " . $e->getMessage();
    }
}

//Close connection
function close($db_conn)
{
    $db_conn = null;
}


$newConnection = connectDB($dbservername, $dbusername, $dbpassword, $dbname, $dboptions);

createUser($newConnection, $nombre, $correo);

close($newConnection);
