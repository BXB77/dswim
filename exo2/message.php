<?php
extract($_POST);
if ($langue=="Francais"){
  echo "Bonjour";
}
if ($langue=="Anglais"){
  echo "Hello";
}
if ($langue=="Espagnol"){
  echo "Hola";
}
setcookie("langue",$langue);
?>