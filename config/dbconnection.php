<?php



define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "password");
define("DATABASE", "teste_tecnico_db");


$connection = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);

if(!$connection){
    die("failed");
}
echo "got it";

