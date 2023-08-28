<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Journey</title>
  <link rel="shortcut icon" href="assets/images/logo.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="//fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<?php
require './assets/lib/vendor/autoload.php';

use SendGrid\Mail\Mail;
use SendGrid\Mail\From;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];

    $sendgridApiKey = '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';

    $emailObj = new Mail();
    $from = new From('joaopinto9179@gmail.com', 'Journey');
    $emailObj->setFrom($from);
    $emailObj->setSubject('Journey - Seção Contato');
    $emailObj->addTo('joaopinto9179@gmail.com', 'Journey');
    $emailObj->addContent("text/plain", "Uma nova mensagem foi recebida da seção contato\n\nNome: $nome\nEmail: $email\nMensagem:\n$mensagem");

    $sendgrid = new \SendGrid($sendgridApiKey);

    try {
        $response = $sendgrid->send($emailObj);

        if ($response->statusCode() === 202) {
            $envioMensagem = "Dados enviados com sucesso!";
            $envioStatus = "success";
        } else {
            $envioMensagem = "Ocorreu um erro ao enviar os dados.";
            $envioStatus = "error";
        }
    } catch (\Exception $e) {
        $envioMensagem = "Ocorreu um erro ao enviar os dados: " . $e->getMessage();
        $envioStatus = "error";
    }
}
?>

  <div class="header-w3l">
    <header id="site-header" class="fixed-top">
      <div class="container">
        <nav class="navbar navbar-expand-lg stroke">
          <a class="navbar-brand pr-lg-5" href="index.html">
            Journey
          </a>
          <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
            data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
            <span class="navbar-toggler-icon fa icon-close fa-times"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-lg-auto">
              <li class="nav-item active">
                <a class="nav-link" onclick="topFunction()">Início</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#sobre">Sobre nós</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#servicos">Serviços</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contato">Contato</a>
              </li>
            </ul>
          </div>
          <div class="mobile-position">
            <nav class="navigation">
              <div class="font-size-controls">
                <div class="font-size-buttons">
                  <button class="font-size-button fonte" id="increase-font" aria-label="Aumentar Tamanho da Fonte"
                    title="Aumentar Tamanho da Fonte">
                    A+
                  </button>
                  <button class="font-size-button fonte" id="decrease-font" aria-label="Diminuir Tamanho da Fonte"
                    title="Diminuir Tamanho da Fonte">
                    A-
                  </button>
                </div>
                <label class="theme-switch" for="checkbox" aria-label="Alternar Alto Contraste"
                  title="Alternar Alto Contraste">
                  <input type="checkbox" id="checkbox">
                  <div class="mode-container">
                    <i class="fas fa-adjust"></i>
                  </div>
                </label>
              </div>
            </nav>
          </div>
        </nav>
      </div>
    </header>
  </div>
  <section class="w3l-banner py-5" id="banner">
    <div class="midd-w3">
      <div class="container py-lg-2">
        <div class="row">
          <div class="col-lg-6 banner-content align-self pr-lg-5">
            <h5 data-adjust-font-size class="title-subhny mb-2">Bem-vindo à Journey!</h5>
            <h3>Comece sua jornada de sucesso conosco</h3>
            <p data-adjust-font-size class="mt-3">Na Journey, estamos comprometidos em fornecer soluções inovadoras e de
              alta qualidade para
              nossos clientes. Nossa equipe está pronta para ajudá-lo a alcançar seus objetivos e acompanhar
              você em cada passo da jornada.</p>
            <a href="#sobre" class="btn btn-style btn-primary mt-lg-5 mt-4 mr-2">Saiba Mais <span
                class="fa fa-arrow-right  ml-3"></a>
            <a href="#contato" class="btn btn-style btn-outline-dark mt-lg-5 mt-4">Fale Conosco <span
                class="fa fa-arrow-right  ml-3"></a>
          </div>
          <div class="col-lg-6 text-center mt-lg-0 mt-md-5 mt-4">
            <div class="image-block position-relative">
              <img src="assets/images/1.png" alt="Logo da Empresa" class="img-fluid mt-lg-0 mt-4">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!----Vlibras-->

  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>

  <section class="w3l-content-4 py-5" id="sobre">
    <div class="content-4-main py-lg-5 py-md-4">
      <div class="container">
        <div class="ab-info-in row">
          <div class="ab-min-left col-lg-5">
            <div class="title-content text-left">
              <h3 data-adjust-font-size class="title-subhny">Nossa História</h3>
              <h3 class="title-w3l pr-lg-5">Construindo soluções inovadoras para sua carreira e vida profissional.</h3>
            </div>
          </div>
          <div class="ab-min-right col-lg-7 pl-lg-5">
            <p data-adjust-font-size class="my-3"> A história da nossa empresa começa em 2023, na ETEC CT, quando um
              grupo de 10 estudantes
              com interesses em comum decidiu unir forças para criar um projeto de TCC que pudesse fazer a diferença na
              vida das pessoas. O objetivo era criar uma plataforma que pudesse ajudar os usuários a encontrar
              oportunidades de trabalho e desenvolvimento profissional de forma inovadora e intuitiva.</p>
            <p data-adjust-font-size> Desde então, a Journey tem trabalhado incansavelmente para levar ao mercado
              soluções criativas
              e eficientes para as necessidades de nossos clientes. Nosso nome é inspirado em nosso propósito de guiar e
              direcionar as pessoas em suas jornadas pessoais e profissionais, sendo simples e fácil de pronunciar,
              o que facilita nossa atuação em novos projetos e mercados.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="w3l-agent-block py-5">
    <div class="container py-lg-4">
      <div class="row align-items-center mt-lg-5">
        <div class="col-lg-6">
          <div class="agent-block-image px-lg-5">
            <img src="assets/images/4.png" class="img-fluid" alt="representação trabalho em equipe">
          </div>
        </div>
        <div class="col-lg-6 mt-lg-0 mt-5 pl-lg-5">
          <h6 data-adjust-font-size class="title-subhny">Trabalho em Equipe</h6>
          <h3 class="title-w3l">
            Nosso Método</h3>
          <p data-adjust-font-size class="my-3"> Somos uma equipe que acredita em trabalhar em conjunto para atingir
            nossos objetivos e
            entregar o melhor resultado para nossos clientes. Cada um dos nossos membros é valorizado e suas habilidades
            são colocadas em prática para contribuir para o sucesso do projeto.</p>
          <p data-adjust-font-size> Acreditamos que trabalhar em equipe é essencial para o sucesso de um projeto. Nosso
            processo
            colaborativo nos permite compartilhar ideias e soluções criativas, aprimorando nossos resultados finais e
            melhorando a experiência do usuário. </p>
        </div>
      </div>
    </div>
  </div>

  <section class="w3l-content-4 py-5" id="features">
    <div class="content-4-main py-lg-5 py-md-4">
      <div class="container">
        <div class="title-content text-center">
          <h3 data-adjust-font-size class="title-subhny">Razões para escolher nossa empresa</h3>
          <h3 class="title-w3l">Nós ajudamos você a alcançar o sucesso profissional</h3>
        </div>
        <div class="content-info-in row pt-5">
          <div class="content-left col-lg-4 mt-lg-0 mt-md-5 mt-3">
            <div class="content-4-main-gd">
              <div class="row content4-right-grids">
                <div class="col-sm-3 content4-right-icon">
                  <div class="content4-icon custom-icon">
                    <img src="assets/images/tra.png" alt="icone">
                  </div>
                </div>
                <div class="col-sm-9 content4-right-info pl-4">
                  <h6 data-adjust-font-size><a>Transparência</a></h6>
                  <p data-adjust-font-size>Nós trabalhamos de forma colaborativa e transparente para oferecer a melhor
                    experiência aos nossos clientes.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="content-left col-lg-4 mt-lg-0 mt-md-5 mt-3">
            <div class="content-4-main-gd">
              <div class="row content4-right-grids">
                <div class="col-sm-3 content4-right-icon">
                  <div class="content4-icon custom-icon">
                    <img src="assets/images/ino.png" alt="icone">
                  </div>
                </div>
                <div class="col-sm-9 content4-right-info pl-4">
                  <h6 data-adjust-font-size><a>Inovação</a></h6>
                  <p data-adjust-font-size>Estamos sempre buscando novas soluções e tecnologias para aprimorar a
                    experiência dos nossos usuários.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="content-left col-lg-4 mt-lg-0 mt-md-5 mt-3">
            <div class="content-4-main-gd">
              <div class="row content4-right-grids">
                <div class="col-sm-3 content4-right-icon">
                  <div class="content4-icon custom-icon">
                    <img src="assets/images/agi.png" alt="icone">
                  </div>
                </div>
                <div class="col-sm-9 content4-right-info pl-4">
                  <h6 data-adjust-font-size><a>Agilidade</a></h6>
                  <p data-adjust-font-size>Nossa equipe trabalha de forma ágil e eficiente para atender às necessidades
                    dos nossos clientes e usuários.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="w3l-team">
    <div class="team py-5">
      <div class="container py-md-5 py-3">
        <div class="title-content text-center">
          <h6 data-adjust-font-size class="title-subhny text-center">Equipe</h6>
          <h3 class="title-w3l mb-sm-5 mb-4 pb-sm-o pb-2 text-center">Conheça Nossa Equipe</h3>
        </div>
        <div class="card-deck" style="margin-top: 30px;">
          <div class="col-12 col-md-6 col-lg-3 team-wrap mt-md-0 mt-4 mt-md-0 pt-md-0 mt-4 pt-2">
            <div class="team-info">
              <div class="column position-relative img-circle">
                <a><img src="assets/images/time.png" alt="Foto do Danilo" class="img-fluid" /></a>
              </div>
              <div class="column-btm">
                <h3 class="name-pos"><a class="">Danilo Carvalho</a></h3>
                <p>CEO</p>
                <div class="social">
                  <a href="#" class="instagram"><span class="fa fa-instagram" aria-hidden="true"></span></a>
                  <a href="#" class="github"><span class="fa fa-github" aria-hidden="true"></span></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-3 team-wrap mt-md-0 mt-4 mt-md-0 pt-md-0 mt-4 pt-2">
            <div class="team-info">
              <div class="column position-relative img-circle">
                <a><img src="assets/images/time.png" alt="Foto da Camila" class="img-fluid" /></a>
              </div>
              <div class="column-btm">
                <h3 class="name-pos"><a class="">Camila Vitoria</a></h3>
                <p>COO</p>
                <div class="social">
                  <a href="#" class="instagram"><span class="fa fa-instagram" aria-hidden="true"></span></a>
                  <a href="#" class="github"><span class="fa fa-github" aria-hidden="true"></span></a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card-deck" style="margin-top: 30px;">
          <div class="col-12 col-md-6 col-lg-3 team-wrap mt-md-0 mt-4 mt-md-0 pt-md-0 mt-4 pt-2">
            <div class="team-info">
              <div class="column position-relative img-circle">
                <a><img src="assets/images/time.png" alt="" class="img-fluid" /></a>
              </div>
              <div class="column-btm">
                <h3 class="name-pos"><a class="">Daniel Alves</a></h3>
                <p>CTO</p>
                <div class="social">
                  <a href="#" class="instagram"><span class="fa fa-instagram" aria-hidden="true"></span></a>
                  <a href="#" class="github"><span class="fa fa-github" aria-hidden="true"></span></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-3 team-wrap mt-md-0 mt-4 mt-md-0 pt-md-0 mt-4 pt-2">
            <div class="team-info">
              <div class="column position-relative img-circle">
                <a><img src="assets/images/time.png" alt="" class="img-fluid" /></a>
              </div>
              <div class="column-btm">
                <h3 class="name-pos"><a>Felipe Bozzo</a></h3>
                <p>CTO</p>
                <div class="social">
                  <a href="#" class="instagram"><span class="fa fa-instagram" aria-hidden="true"></span></a>
                  <a href="#" class="github"><span class="fa fa-github" aria-hidden="true"></span></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-3 team-wrap mt-md-0 mt-4 mt-md-0 pt-md-0 mt-4 pt-2">
            <div class="team-info">
              <div class="column position-relative img-circle">
                <a><img src="assets/images/time.png" alt="Foto do Guilherme" class="img-fluid" /></a>
              </div>
              <div class="column-btm">
                <h3 class="name-pos"><a>Guilherme B</a></h3>
                <p>CMO</p>
                <div class="social">
                  <a href="#" class="instagram"><span class="fa fa-instagram" aria-hidden="true"></span></a>
                  <a href="#" class="github"><span class="fa fa-github" aria-hidden="true"></span></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-3 team-wrap mt-md-0 mt-4 mt-md-0 pt-md-0 mt-4 pt-2">
            <div class="team-info">
              <div class="column position-relative img-circle">
                <a><img src="assets/images/time.png" alt="Foto da Juliana" class="img-fluid" /></a>
              </div>
              <div class="column-btm">
                <h3 class="name-pos"><a>Juliana Leal</a></h3>
                <p>CMO</p>
                <div class="social">
                  <a href="#" class="instagram"><span class="fa fa-instagram" aria-hidden="true"></span></a>
                  <a href="#" class="github"><span class="fa fa-github" aria-hidden="true"></span></a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card-deck" style="margin-top: 30px;">
          <div class="col-12 col-md-6 col-lg-3 team-wrap mt-md-0 mt-4 mt-md-0 pt-md-0 mt-4 pt-2">
            <div class="team-info">
              <div class="column position-relative img-circle">
                <a><img src="assets/images/time.png" alt="Foto do Paulo" class="img-fluid" /></a>
              </div>
              <div class="column-btm">
                <h3 class="name-pos"><a>Paulo Henrique</a></h3>
                <p>CIO</p>
                <div class="social">
                  <a href="#" class="instagram"><span class="fa fa-instagram" aria-hidden="true"></span></a>
                  <a href="#" class="github"><span class="fa fa-github" aria-hidden="true"></span></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-3 team-wrap mt-md-0 mt-4 mt-md-0 pt-md-0 mt-4 pt-2">
            <div class="team-info">
              <div class="column position-relative img-circle">
                <a><img src="assets/images/time.png" alt="Foto do Rafael" class="img-fluid" /></a>
              </div>
              <div class="column-btm">
                <h3 class="name-pos"><a>Rafael Lucilio</a></h3>
                <p>CIO</p>
                <div class="social">
                  <a href="#" class="instagram"><span class="fa fa-instagram" aria-hidden="true"></span></a>
                  <a href="#" class="github"><span class="fa fa-github" aria-hidden="true"></span></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-3 team-wrap mt-md-0 mt-4 mt-md-0 pt-md-0 mt-4 pt-2">
            <div class="team-info">
              <div class="column position-relative img-circle">
                <a><img src="assets/images/time.png" alt="Foto do Robson" class="img-fluid" /></a>
              </div>
              <div class="column-btm">
                <h3 class="name-pos"><a>Robson Dias</a></h3>
                <p>CTO</p>
                <div class="social">
                  <a href="#" class="instagram"><span class="fa fa-instagram" aria-hidden="true"></span></a>
                  <a href="#" class="github"><span class="fa fa-github" aria-hidden="true"></span></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-3 team-wrap mt-md-0 mt-4 mt-md-0 pt-md-0 mt-4 pt-2">
            <div class="team-info">
              <div class="column position-relative img-circle">
                <a><img src="assets/images/time.png" alt="Foto do Ryan" class="img-fluid" /></a>
              </div>
              <div class="column-btm">
                <h3 class="name-pos"><a>Ryan Felix</a></h3>
                <p>CTO</p>
                <div class="social">
                  <a href="#" class="instagram"><span class="fa fa-instagram" aria-hidden="true"></span></a>
                  <a href="#" class="github"><span class="fa fa-github" aria-hidden="true"></span></a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <section class="w3l-bottom-grids-6 py-5" id="servicos">
    <div class="container py-lg-5 py-md-4 py-2">
      <div class="title-content text-center">
        <h6 data-adjust-font-size class="title-subhny text-center">Nossos Serviços</h6>
        <h3 class="title-w3l mb-sm-5 mb-4 pb-sm-o pb-2 text-center">Como Podemos Ajudar</h3>
      </div>
      <div class="grids-area-hny main-cont-wthree-fea row">
        <div class="col-lg-4 col-md-6 grids-feature">
          <div class="area-box icon-blue">
            <div class="img-icon img-icon">
              <img src="assets/images/net.png" alt="icone">
            </div>
            <h4 data-adjust-font-size><a class="title-head">Networking</a></h4>
            <p data-adjust-font-size>Ajudamos nossos clientes a se conectarem com pessoas e empresas relevantes para
              suas carreiras, ou negócios para o crescimento e desenvolvimento.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 grids-feature mt-md-0 mt-4">
          <div class="area-box icon-pink">
            <div class="img-icon img-icon">
              <img src="assets/images/mel.png" alt="icone">
            </div>
            <h4 data-adjust-font-size><a class="title-head">Melhorias</a></h4>
            <p data-adjust-font-size>Trabalhamos com nossos clientes para identificar novas oportunidades e criar
              soluções inovadoras para seus desafios para ficar à frente de nossos concorrentes.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 grids-feature mt-lg-0 mt-4">
          <div class="area-box icon-yellow">
            <div class="img-icon img-icon">
              <img src="assets/images/par.png" alt="icone">
            </div>
            <h4 data-adjust-font-size><a class="title-head">Parcerias</a></h4>
            <p data-adjust-font-size>Formamos parcerias estratégicas com nossos clientes para ajudá-los a atingir seus
              objetivos negócios e maximizar seu potencial de crescimento.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="w3l-faq-block py-5" id="faq">
    <div class="container py-lg-4">
      <div class="row mt-5">
        <div class="col-lg-6">
          <div class="faq-image">
            <img src="assets/images/9.png" class="img-fluid" alt="imagem ilustrativa sobre as principais perguntas">
          </div>
        </div>
        <div class="col-lg-6 mt-lg-0 mt-5 pl-lg-5">
          <h6 data-adjust-font-size class="title-subhny">Principais Perguntas</h6>
          <h3 class="title-w3l">Como o nosso projeto pode ajudar você? </h3>
          <p data-adjust-font-size class="my-3"> Nosso projeto foi criado para ajudar você a escolher cursos, faculdades
            ou até empregos que
            favorecem seus gostos. Tudo isso através de um quiz de perguntas e respostas que utiliza algoritmos
            avançados para conectar você com as melhores opções de acordo com seu perfil.</p>
          <section class="w3l-faq mt-5" id="faq">
            <div class="faq-page">
              <ul>
                <li>
                  <input type="checkbox" id="1">
                  <i></i>
                  <h4 data-adjust-font-size>O que fazemos?</h4>
                  <p data-adjust-font-size>Oferecemos uma plataforma que permite que você crie um perfil detalhado e
                    personalizado com
                    informações sobre suas habilidades, experiências e objetivos profissionais. Através de algoritmos
                    avançados, a plataforma faz a conexão entre você e as empresas e oportunidades que melhor se
                    encaixam em seu perfil. Além disso, também oferecemos conteúdos e dicas sobre o mercado de trabalho
                    e desenvolvimento profissional para ajudá-lo a se preparar melhor para o futuro.</p>
                </li>
                <li>
                  <input type="checkbox" id="2">
                  <i></i>
                  <h4 data-adjust-font-size>Quais são os benefícios do nosso projeto?</h4>
                  <p data-adjust-font-size>Com o nosso projeto, você terá acesso a uma plataforma que usa tecnologia
                    avançada para ajudá-lo a
                    encontrar oportunidades profissionais que realmente sejam compatíveis com suas habilidades e gostos.
                    Isso pode economizar muito tempo e esforço na busca por uma carreira adequada. Além disso, nossos
                    conteúdos e dicas podem ajudá-lo a se preparar melhor para o mercado de trabalho e desenvolver suas
                    habilidades profissionais.</p>
                </li>
                <li>
                  <input type="checkbox" id="3">
                  <i></i>
                  <h4 data-adjust-font-size>Como posso começar a utiliza-lo?</h4>
                  <p data-adjust-font-size>Para começar a usar nossa plataforma, basta se cadastrar gratuitamente em
                    nosso site e preencher
                    seu perfil com informações precisas e detalhadas. Depois, você poderá responder a um quiz de
                    perguntas e respostas que ajudará a definir seus gostos e habilidades profissionais. Com base nas
                    suas respostas, nossa plataforma fará a conexão com as oportunidades mais adequadas para você.</p>
                </li>
              </ul>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
  <section class="w3l-grids-4 py-5">
    <div class="container py-md-5 py-2">
      <div id="grids4-block" class="">
        <div class="title-content text-center">
          <h6 data-adjust-font-size class="title-subhny text-center">O que oferecemos </h6>
          <h3 class="title-w3l mb-sm-5 mb-4 pb-sm-o pb-2 text-center">Teste seus gostos e encontre a carreira perfeita
            para você!</h3>
        </div>
        <div class="item">
          <div class="grids4-info">
            <div class="info-bg">
              <h5 data-adjust-font-size><a>Flyvoo</a></h5>
              <span class="price">Grátis</span><br>
              <div class="img-container">
                <a><img class="img-proj2" src="assets/images/projeto.png" alt="Imagem do Projeto" /></a>
              </div>
              <p data-adjust-font-size>Com o Flyvoo, é possível descobrir qual carreira profissional mais combina com
                seus gostos e habilidades em apenas alguns minutos de jogo de perguntas e respostas. Experimente agora e
                veja as possibilidades que estão ao seu alcance!</p>
              <a href="#" class="btn btn-style btn-primary mt-4">Teste agora</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="w3l-contact-2 py-5" id="contato">
    <div class="container py-lg-5 py-md-4 py-2">
      <div class="title-content text-center">
        <h6 data-adjust-font-size class="title-subhny text-center">Contato</h6>
        <h3 class="title-w3l mb-sm-5 mb-4 pb-sm-o pb-2 text-center">Envie sua Mensagem</h3>
      </div>
      <div class="contact-grids d-grid">
        <div class="contact-left-img">
          <div class="cont-details">
            <div class="cont-top margin-up">
            </div>
            <div class="cont-top margin-up">
              <div class="cont-left text-center">
                <span class="fa fa-phone"></span>
              </div>
              <div class="cont-right">
                <h6 data-adjust-font-size>Ligue para Nós</h6>
                <p data-adjust-font-size><a href="tel:+55 (11) 99999 9999">+55 (11) 99999 9999</a></p>
              </div>
            </div>
            <div class="cont-top margin-up">
              <div class="cont-left text-center">
                <span class="fa fa-envelope-o"></span>
              </div>
              <div class="cont-right">
                <h6 data-adjust-font-size>Envie um Email</h6>
                <p><a href="mailto:Journeycompany2023@gmail.com" class="mail">Journeycompany2023@gmail.com</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="contact-right">
          <form action="" method="post" class="signin-form">
            <div class="input-grids">
              <input type="text" name="nome" id="nome" placeholder="Seu Nome*" class="contact-input" required />
              <input type="email" name="email" id="email" placeholder="Seu Email*" class="contact-input" required />
            </div>
            <div class="form-input">
              <textarea type="text" name="mensagem" id="mensagem" placeholder="Escreva sua mensagem aqui*"
                required></textarea>
            </div>
            <div class="form-buttonhny text-lg-right">
              <button class="btn btn-style btn-primary" id="enviar">Enviar Mensagem</button>
            </div>
          </form>
          <p><?php echo $envioMensagem; ?></p>
        </div>
      </div>
    </div>
    <div id="successModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Dados enviados com sucesso!</h3>
        <p>Sua mensagem foi enviada com sucesso. Agradecemos o seu contato.</p>
        <div class="modal-checkmark"><i class="fas fa-check-circle"></i></div>
      </div>
    </div>
  </section>
  <section class="footer-17">
    <div class="footer17_sur py-5">
      <div class="container py-lg-5 py-md-4">
        <div class="footer17-top">
          <div class="footer17-top-left1_sur pr-lg-4">
            <h6 data-adjust-font-size>Contate-nos</h6>
            <p data-adjust-font-size>Em caso de dúvidas, não se preocupe em nos mandar mensagem.</p>
            <ul>
              <li data-adjust-font-size><a href="mailto:Journeycompany2023@gmail.com">Journeycompany2023@gmail.com</a>
              </li>
              <li data-adjust-font-size><a href="tel:+55 (11) 99999 9999">+55 (11) 99999 9999</a></li>
            </ul>
            <ul class="footers-17_social">
              <!--<li><a href="#url" class="github"><span class="fa fa-github"></span></a></li>
              <li><a href="#url" class="linkedin"><span class="fa fa-linkedin"></span></a></li>-->
              <li><a href="https://www.instagram.com/journey.futures" target="_blank" class="instagram"><span
                    class="fa fa-instagram"></span></a></li>
            </ul>
          </div>
          <div class="footer17-top-left3_sur">
            <h6>Links rápidos</h6>
            <ul>
              <li><a href="#">Início</a></li>
              <li><a href="#sobre">Sobre nós</a></li>
              <li><a href="#servicos">Serviços</a></li>
              <li><a href="#contato">Contato</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="copyright text-center">
        <div class="container">
          <p class="copy-footer-29">© 2023 Journey. Todos os Direitos Reservados.</p>
        </div>
      </div>




      <button onclick="topFunction()" id="movetop" title="Ir para Cima">
        &#10548;
      </button>
      <script>

        window.onscroll = function () {
          scrollFunction()
        };

        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("movetop").style.display = "block";
          } else {
            document.getElementById("movetop").style.display = "none";
          }
        }

        function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }
      </script>
    </div>
  </section>

  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script>
    $(function () {
      $('.navbar-toggler').click(function () {
        $('body').toggleClass('noscroll');
      })
    });
  </script>

  <script>
    $(window).on("scroll", function () {
      var scroll = $(window).scrollTop();

      if (scroll >= 80) {
        $("#site-header").addClass("nav-fixed");
      } else {
        $("#site-header").removeClass("nav-fixed");
      }
    });

    $(".navbar-toggler").on("click", function () {
      $("header").toggleClass("active");
    });
    $(document).on("ready", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
      $(window).on("resize", function () {
        if ($(window).width() > 991) {
          $("header").removeClass("active");
        }
      });
    });
  </script>

  <!-- Vlibras atrasando o carregamento da página
  
    <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  
  
  -->
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/faq.js"></script>
  <script src="assets/js/acessibilidade.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>


</body>

</html>