<?php

session_start();
$_SESSION["id"] = 7;
require_once("admin/model/Sql.php");


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Currículum</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/aos.css?ver=1.1.0" rel="stylesheet">
  <link href="css/bootstrap.min.css?" rel="stylesheet">
  <link href="css/main.css?" rel="stylesheet">
  <link rel="shortcut icon" href="images/portfolio-icon.png" type="image/x-icon">
  <noscript>
    <style type="text/css">
      [data-aos] {
        opacity: 1 !important;
        transform: translate(0) scale(1) !important;
      }
    </style>
  </noscript>
</head>

<body id="top">
  <header>
    <div class="profile-page sidebar-collapse">
      <nav class="navbar navbar-expand-lg fixed-top navbar-transparent bg-primary" color-on-scroll="400">
        <div class="container">
          <div class="navbar-translate"><a class="navbar-brand" href="#" rel="tooltip">Meu curriculum</a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-bar bar1"></span><span class="navbar-toggler-bar bar2"></span><span class="navbar-toggler-bar bar3"></span></button>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link smooth-scroll" href="#about">About</a></li>
              <li class="nav-item"><a class="nav-link smooth-scroll" href="#skill">Skills</a></li>
              <li class="nav-item"><a class="nav-link smooth-scroll" href="#portfolio">Portfolio</a></li>
              <li class="nav-item"><a class="nav-link smooth-scroll" href="#experience">Experience</a></li>
              <li class="nav-item"><a class="nav-link smooth-scroll" href="#contact">Contact</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <div class="page-content">
    <div>
      <div class="profile-page">
        <div class="wrapper">
          <div class="page-header page-header-small" filter-color="green">
            <div class="page-header-image" data-parallax="true" style="background-image: url('images/fundo-tecnologia.png')"></div>
            <div class="container">
              <div class="content-center">
                <div class="cc-profile-image"><a href="#"><img src="images/perfil.jpg" alt="Image" /></a></div>
                <div class="h2 title">Davi ferreira</div>
                <p class="category text-white">Desenvolvedor web, Programador php</p><a class="btn btn-primary smooth-scroll mr-2" href="#contact" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Fale comigo</a><a class="btn btn-primary" href="#" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Download CV</a>
              </div>
            </div>
            <div class="section">
              <div class="container">
                <div class="button-container"><a class="btn btn-default btn-round btn-lg btn-icon" href="https://www.instagram.com/davisena.dev/" rel="tooltip" title="Follow me on Facebook"><i class="fa fa-facebook"></i></a><a class="btn btn-default btn-round btn-lg btn-icon" href="https://www.instagram.com/davisena.dev/" rel="tooltip" title="Follow me on Instagram"><i class="fa fa-instagram"></i></a>

                  <a class="btn btn-default btn-round btn-lg btn-icon" href="https://www.instagram.com/davisena.dev/" rel="tooltip" title="Follow me on Instagram"><img style="width: 27px;  margin-top:15px;" src="images/icon-git-hub.png" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section" id="about">
        <div class="container">
          <div class="card" data-aos="fade-up" data-aos-offset="10">
            <div class="row">
              <div class="col-lg-6 col-md-12">
                <div class="card-body">
                  <div class="h4 mt-0 title">Sobre mim</div>
                  <?php

                  require_once("admin/model/user/Sobre.php");
                  require_once("admin/controller/Controller_Sobre.php");
                  $objectController_Sobre = new Controller_Sobre($_SESSION["id"]);
                  $results = $objectController_Sobre->selectAll();
                  $about = $results[0];
                  extract($about);
                  echo $conteudo;
                  ?>
                </div>


              </div>
              <div class="col-lg-6 col-md-12">
                <div class="card-body">
                  <div class="h4 mt-0 title">Informações básicas</div>
                  <div class="row">
                    <div class="col-sm-4"><strong class="text-uppercase">Idade:</strong></div>
                    <div class="col-sm-8"><?php echo $idade; ?></div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Email:</strong></div>
                    <div class="col-sm-8"><?php echo $email; ?></div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Telefone:</strong></div>
                    <div class="col-sm-8"><?php echo $telefone; ?></div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Endereço:</strong></div>
                    <div class="col-sm-8"><?php echo $numero . ", " . $rua . ", " . $cidade . ", " . $estado . ", " . $pais; ?></div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section" id="skill">
        <div class="container">
          <div class="h4 text-center mb-4 title">Professional Skills</div>
          <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <div class="card-body">
              <div class="row">

                <?php

                require_once("admin/model/user/Habilidade.php");
                require_once("admin/controller/Controller_Habilidade.php");
                $objectController_Habilidade = new Controller_Habilidade($_SESSION["id"]);
                $results = $objectController_Habilidade->selectAll();

                for ($i = 0; $i != count($results); $i++) {
                ?>

                  <div class="col-md-6">
                    <div class="progress-container progress-primary"><span class="progress-badge"><?php echo $results[$i]["nome_habilidade"]; ?></span>
                      <div class="progress">
                        <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $results[$i]["nivel_habilidade"] ?>%;"></div><span class="progress-value"><?php echo $results[$i]["nivel_habilidade"] ?>%;</span>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>


              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section" id="portfolio">
        <div class="container">
          <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
              <div class="h4 text-center mb-4 title">Portfolio</div>

            </div>
          </div>
          <div class="tab-content gallery mt-5">
            <div class="tab-pane active" id="web-development">
              <div class="ml-auto mr-auto">
                <div class="row">
                  <?php

                  require_once("admin/model/user/Portfolio.php");
                  require_once("admin/controller/Controller_Portfolio.php");
                  $objectController_Portfolio = new Controller_Portfolio($_SESSION["id"]);
                  $results = $objectController_Portfolio->selectAll();
                  for ($i = 0; $i != count($results); $i++) {
                  ?>
                    <div class="col-md-6">
                      <div class=" cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="<?php echo $results[$i]["link"] ?>">
                          <figure class="cc-effect"><img src="admin/view/<?php echo $results[$i]["image_source"]; ?>" alt="Image" />
                            <figcaption>
                              <div class="h4"><?php echo $results[$i]["nome"]; ?></div>
                            </figcaption>
                          </figure>
                        </a></div>
                    </div>

                  <?php
                  }
                  ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section" id="experience">
        <div class="container cc-experience">
          <div class="h4 text-center mb-4 title">Experiência de trabalho</div>
          <?php

          require_once("admin/model/user/Experiencia.php");
          require_once("admin/controller/Controller_Experiencia.php");
          $objectController_Experiencia = new Controller_Experiencia($_SESSION["id"]);
          $results = $objectController_Experiencia->selectAll();

          for ($i = 0; $i != count($results); $i++) {

          ?>
            <div class="card">
              <div class="row">
                <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                  <div class="card-body cc-experience-header">
                    <p><?php echo $results[$i]["data_inicio"] ?> - <?php echo $results[$i]["data_termino"] ?></p>
                    <div class="h5"><?php echo $results[$i]["area"] ?></div>
                  </div>
                </div>
                <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                  <div class="card-body">
                    <div class="h5"><?php echo $results[$i]["profissao"] ?></div>
                    <?php echo $results[$i]["descricao"] ?>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>
      <div class="section">
        <div class="container cc-education">
          <div class="h4 text-center mb-4 title">Histórico acadêmico</div>
          <?php

          require_once("admin/model/user/Academico.php");
          require_once("admin/controller/Controller_Academico.php");
          $objectController_Academico = new Controller_Academico($_SESSION["id"]);
          $results = $objectController_Academico->selectAll();
          for ($i = 0; $i != count($results); $i++) {

          ?>
            <div class="card">
              <div class="row">
                <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                  <div class="card-body cc-education-header">
                    <p><?php echo $results[$i]["data_inicio"] ?> - <?php echo $results[$i]["data_termino"] ?></p>
                    <div class="h5"><?php echo $results[$i]["nivel"] ?></div>
                  </div>
                </div>
                <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                  <div class="card-body">
                    <div class="h5"><?php echo $results[$i]["experiencia"] ?></div>
                    <p class="category"><?php echo $results[$i]["instituicao"] ?></p>
                    <p><?php echo $results[$i]["descricao"] ?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          <div class="section" id="reference">
            <div class="container cc-reference">
              <div class="h4 mb-4 text-center title">References</div>
              <div class="card" data-aos="zoom-in">
                <div class="carousel slide" id="cc-Indicators" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li class="active" data-target="#cc-Indicators" data-slide-to="0"></li>
                    <li data-target="#cc-Indicators" data-slide-to="1"></li>
                    <li data-target="#cc-Indicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="row">
                        <div class="col-lg-2 col-md-3 cc-reference-header"><img src="images/reference-image-1.jpg" alt="Image" />
                          <div class="h5 pt-2">Aiyana</div>
                          <p class="category">CEO / WEBM</p>
                        </div>
                        <div class="col-lg-10 col-md-9">
                          <p> Habitasse venenatis commodo tempor eleifend arcu sociis sollicitudin ante pulvinar ad, est porta cras erat ullamcorper volutpat metus duis platea convallis, tortor primis ac quisque etiam luctus nisl nullam fames. Ligula purus suscipit tempus nascetur curabitur donec nam ullamcorper, laoreet nullam mauris dui aptent facilisis neque elementum ac, risus semper felis parturient fringilla rhoncus eleifend.</p>
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="row">
                        <div class="col-lg-2 col-md-3 cc-reference-header"><img src="images/reference-image-2.jpg" alt="Image" />
                          <div class="h5 pt-2">Braiden</div>
                          <p class="category">CEO / Creativem</p>
                        </div>
                        <div class="col-lg-10 col-md-9">
                          <p> Habitasse venenatis commodo tempor eleifend arcu sociis sollicitudin ante pulvinar ad, est porta cras erat ullamcorper volutpat metus duis platea convallis, tortor primis ac quisque etiam luctus nisl nullam fames. Ligula purus suscipit tempus nascetur curabitur donec nam ullamcorper, laoreet nullam mauris dui aptent facilisis neque elementum ac, risus semper felis parturient fringilla rhoncus eleifend.</p>
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="row">
                        <div class="col-lg-2 col-md-3 cc-reference-header"><img src="images/reference-image-3.jpg" alt="Image" />
                          <div class="h5 pt-2">Alexander</div>
                          <p class="category">CEO / Webnote</p>
                        </div>
                        <div class="col-lg-10 col-md-9">
                          <p> Habitasse venenatis commodo tempor eleifend arcu sociis sollicitudin ante pulvinar ad, est porta cras erat ullamcorper volutpat metus duis platea convallis, tortor primis ac quisque etiam luctus nisl nullam fames. Ligula purus suscipit tempus nascetur curabitur donec nam ullamcorper, laoreet nullam mauris dui aptent facilisis neque elementum ac, risus semper felis parturient fringilla rhoncus eleifend.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="section" id="contact">
            <div class="cc-contact-information" style="background-image: url('images/staticmap.png')">
              <div class="container">
                <div class="cc-contact">
                  <div class="row">
                    <div class="col-md-9">
                      <div class="card mb-0" data-aos="zoom-in">
                        <div class="h4 text-center title">Contact Me</div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="card-body">
                              <form action="https://formspree.io/your@email.com" method="POST">
                                <div class="p pb-3"><strong>Feel free to contact me </strong></div>
                                <div class="row mb-3">
                                  <div class="col">
                                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                      <input class="form-control" type="text" name="name" placeholder="Name" required="required" />
                                    </div>
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <div class="col">
                                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                      <input class="form-control" type="text" name="Subject" placeholder="Subject" required="required" />
                                    </div>
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <div class="col">
                                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                      <input class="form-control" type="email" name="_replyto" placeholder="E-mail" required="required" />
                                    </div>
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <div class="col">
                                    <div class="form-group">
                                      <textarea class="form-control" name="message" placeholder="Your Message" required="required"></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col">
                                    <button class="btn btn-primary" type="submit">Send</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="card-body">
                              <p class="mb-0"><strong>Address </strong></p>
                              <p class="pb-2">140, City Center, New York, U.S.A</p>
                              <p class="mb-0"><strong>Phone</strong></p>
                              <p class="pb-2">+1718-111-0011</p>
                              <p class="mb-0"><strong>Email</strong></p>
                              <p>anthony@company.com</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container text-center"><a class="cc-facebook btn btn-link" href="#"><i class="fa fa-facebook fa-2x " aria-hidden="true"></i></a><a class="cc-twitter btn btn-link " href="#"><i class="fa fa-twitter fa-2x " aria-hidden="true"></i></a><a class="cc-google-plus btn btn-link" href="#"><i class="fa fa-google-plus fa-2x" aria-hidden="true"></i></a><a class="cc-instagram btn btn-link" href="#"><i class="fa fa-instagram fa-2x " aria-hidden="true"></i></a></div>
        <div class="h4 title text-center">Anthony Barnett</div>
        <div class="text-center text-muted">
          <p>&copy; Creative CV. All rights reserved.<br>Design - <a class="credit" href="https://templateflip.com" target="_blank">TemplateFlip</a></p>
        </div>
      </footer>
      <script src="js/core/jquery.3.2.1.min.js?ver=1.1.0"></script>
      <script src="js/core/popper.min.js?ver=1.1.0"></script>
      <script src="js/core/bootstrap.min.js?ver=1.1.0"></script>
      <script src="js/now-ui-kit.js?ver=1.1.0"></script>
      <script src="js/aos.js?ver=1.1.0"></script>
      <script src="scripts/main.js?ver=1.1.0"></script>
</body>

</html>