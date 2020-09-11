<?php
$connection = mysqli_connect("localhost", "root", "","mixorgdb");
$name2=$_GET['q']; 
$txt=$_GET['txt'];
$query = mysqli_query($connection,"insert into imgtxt(imgtext,img) values ('$txt','$name2')"); 
if($query){
echo "1";
}
else
{
	echo "Data Submitted unsuccesfully";
}
mysqli_close($connection); 
?>