<?php
require_once 'parametres.php.inc';
$db = new PDO('mysql:host='.$host.';dbname='.$bdd, $user,$password);
?>
 
<!DOCTYPE html>
<html lang="fr">
  <meta charset= "latin1" />
  <head>
    <title>Capitale Europeene</title>
  </head>
  <body>
    <h1>Capitale Europeene</h1>
    <form method="post" action="capitale.php" >
       <label>Choississez une ville: </label>
       <?php $res=$db->query("SELECT nom FROM capitale"); ?>
       <select name="nom" required>
        <?php
          foreach ($res as $nom) { ?>
            <option><?php echo $nom['nom']; ?></option>  
          <?php } ?>
       </select>
       <input type="submit" value="Envoyer"/>
    </form>
        <?php
    if(isset($nom)) {
      extract($_POST);
      $sql="SELECT * FROM capitale WHERE nom='$nom'";
      $ens=$db->query($sql);
      foreach($ens as $result) {
        echo $result['nom'];
        ?>
    <br>
    <img src="<?php echo $result['image'];?>">
    <br>
    <label> Capital la plus loin:</label>
    <?php
    $id=$result['id'];
    $sql="SELECT nom,distance FROM capitale,distance WHERE id1=$id and id=id2 order by distance desc limit 1";
    $res=$db->query($sql);
    foreach($res as $result) {
    echo $result['nom'].":".$result['distance']."km";
    }?>
    <br>
    <label> Capital la plus proche:</label>
    <?php
    $sql="SELECT nom,distance FROM capitale,distance WHERE id1=$id and id=id2 and id1!=id2 order by distance asc limit 1";
    $res=$db->query($sql);
    foreach($res as $result) {
    echo $result['nom'].":".$result['distance']."km";
    }}}?>
  </body>
</html>