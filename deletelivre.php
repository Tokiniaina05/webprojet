<?php include("include/db.php")?>
<?php 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $req = $db->query("DELETE FROM livre WHERE id = '$id' ");
        if($req)//rehefa executer le requete
        {
            header("location:table.php");
        }
    }
?>