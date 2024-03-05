<?php 
define("host","localhost:3307");
define("user","root");
define("password","");
define("databse","restoran");


function connect(){

global $link;

$link=mysqli_connect(host,user,password,databse) or die ("greska 01". mysqli_connect_error());

}

?>
