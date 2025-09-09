<?php include("include/db.php")?>
<?php 
    if(isset($_GET['iduser']))
    {
        $id = $_GET['iduser'];
        $req = $db->query("DELETE FROM users WHERE iduser = '$id' ");
        if($req)//rehefa executer le requete
        {
            header("location:listeUser.php");
        }
    }
?>