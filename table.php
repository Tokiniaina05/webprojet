<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="font-image/Sans-font.png" rel="icon">
    <title>Les livres disponible</title>
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include_once "include/db.php";?>
    <form action="" method="post">
        <header>
            
        </header>
        <div class="form-holder">
            <div class="form-content">
                <div class="card">
                    <div class="card-header">
                        
                        <div class="row">
                        <div class="col-11">
                            <h5>Listes des livres dans mon Bibliothèque</h5>
                        </div>
                        <div class="col-1 " >
                            <div class="text-end" style="margin-right: 2cm;">
                                <a href="principal.php">
                                <img src="icone/retour.png" alt="Icône" 
                                    style="width: 40px; height: 40px; ">
                                </a>
                            </div>

                        </div>
                  </div>
                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Profil</th>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Année de publication</th>
                            <th>Types</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $req = $db->query("SELECT * FROM livre");
                                while($res = $req->fetch_assoc()){
                            ?>
                        <tr>
                            <td><?php echo $res['id']?></td>
                            <td >
                                <?php echo'<img style="height:2cm; width:1.5cm;" src="./images/'.$res['profil'].'" >'; ?>
                            </td>
                            <td><?php echo $res['titre']?></td>
                            <td><?php echo $res['auteur']?></td>
                            <td><?php echo $res['annee']?></td>
                            <td><?php echo $res['type']?></td>
                            <td>
                                <a href="editlivre.php?id=<?= $res['id'];?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="deletelivre.php?id=<?= $res['id'];?>" onclick="if(!confirm('Voulez-vous vraiment Supprimer?')) {return false}" class="btn btn-danger"><i class="fa fa-trash"></i></a>                                
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>                  
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        
        
    </form>
</body>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</html>