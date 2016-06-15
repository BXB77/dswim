<?php
require_once 'parametres.php.inc';
$db = new PDO('mysql:host='.$host.';dbname='.$bdd, $user,$password);
?>
 
<!DOCTYPE html>
<html lang="fr">
  <meta charset= "latin1" />
  <head>
    <title>Distance</title>
  </head>
  <body>
    <h1>Distance</h1>
    <table border="1">
      <tr><?php
      $sql="SELECT * FROM capitale ORDER BY `capitale`.`nom` ASC";
      $ens=$db->query($sql);
      foreach($ens as $result) {?>
         <td><?php echo $result['nom']?></td>
<?php } ?>
      </tr>
    </table>
  </body>
</html>