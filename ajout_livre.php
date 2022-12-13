<?php
include("connect.php");
$t=$_POST["Titre"];
echo $t."<br>";
$i=$_POST['id'];
echo $i."<br>";
/*$a=$_POST['Auteur'];
echo $a."<br>";
$l=$_POST['Langue'];
echo $l."<br>";
$c=$_POST['Catégorie'];
echo $c."<br>";*/

$sql="insert into livres (Titre,id) values ('".$t. "','".$i."')";
$res=mysqli_query($connect,$sql);
if ($res==true)
	echo "ok";
	//header ("Location:consult.php");

?>