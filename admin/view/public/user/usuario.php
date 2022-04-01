<?php
require_once("../public_config.php")
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">



    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tabela de usuários</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card hidden-inativo">
              <div class="card-header">
                <h3 class="card-title">Tabela de ilustração de usuarios existentes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nome</th>
                      <th>email</th>
                      <th>status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $objectController = new Controller_Usuario();
                    $results = $objectController->selectAll();
                    for ($i = 0; $i != count($results); $i++) {
                    ?>
                      <tr>
                        <td><?php
                            echo ($results[$i]["usu_id_usuario"]);
                            ?></td>
                        <td><?php
                            echo ($results[$i]["nome"]);
                            ?></td>
                        <td><?php
                            echo ($results[$i]["email"]);
                            ?></td>
                        <td><?php
                            if ($results[$i]["status"] == 1) {
                              echo ("Ativo");
                            } else {
                              echo ("Inativo");
                            }
                            ?></td>
                        <td>
                          <div class="container-button">
                            <a class="col-2 btn-user btn btn-primary" href="javascript:trocarHidden()">Entrar</a>
                            <a class="col-2 btn-user btn btn-block btn-warning" href="form_update_usuario.php?id=<?php echo ($results[$i]["usu_id_usuario"])?>">Editar</a>
                            <a class="col-2 btn-user btn btn-danger" href="../../view_usuario.php?id=<?php echo ($results[$i]["usu_id_usuario"])?>&&stmt=delete">Deletar</a>


                          </div>

                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

            </div>
            <div class="hidden-inativo container-button container-button-add">
              <a class="col-2 btn-user btn btn-success" href="form_usuario.php">Adicionar usuário</a>


            </div>
            <!-- /.card -->
            <div class="form-hidden hidden-ativo card card-primary col-8">
              <div class="card-header">
                <h3 class="card-title">Fazer login</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../insert.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Digite seu e-mail</label>
                    <input type="email" name="email" required class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Digite sua senha</label>
                    <input type="password" name="password" required class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="col-4 btn btn-primary">Entrar</button>
                  <a class="link-voltar" href="javascript:trocarHidden()">Voltar</a>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

      <!-- /.container-fluid -->

    </section>


    <!-- /.content -->
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../../../plugins/jszip/jszip.min.js"></script>
  <script src="../../../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../../../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../../dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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

    function trocarHidden(){
    var hidden = document.querySelectorAll(".hidden-ativo")
    var noHidden = document.querySelectorAll(".hidden-inativo")
    
    hidden.forEach(
        element => {
            element.classList.add("hidden-inativo");
            element.classList.remove("hidden-ativo");
        }
    )

    noHidden.forEach(
        element => {
            element.classList.add("hidden-ativo");
            element.classList.remove("hidden-inativo");
        }
    )
}
  </script>
  <style>
    .container-button {
      display: flex;
      align-items: center;

    }

    .container-button-add {
      justify-content: flex-end;
      margin-bottom: 15vh;
    }

    .btn-user {
      height: 40px !important;
      margin: 0 5px;
    }

    .hidden-ativo {
      display: none;
    }

    .link-voltar {
      margin-left: 2vw;
    }

    .form-hidden{
      margin-bottom: 38vh;
    }
  </style>
</body>

</html>