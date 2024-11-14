<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./img/logo.png">
</head>
<body>
    <!-- inicio navegaçao -->
    
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="text-center py-3">
            <img src="./img/logo.png" alt="Logo" width="100">
        </div>
        <div class="container">
            <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav text-center">
                    <li class="nav-item">
                        <a class="nav-link bi bi-house text-light" href="#"> Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bi bi-cake2 text-light" href="#"> Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bi bi-info-circle text-light" href="#"> Sobre nós</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bi bi-geo-alt text-light" href="#"> Localização</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bi bi-person-fill text-light" href="#"> Equipe</a>
                    </li>
                    <li class="nav-item d-flex">
                        <button class="nav-link text-light bi bi-cart4 text-center" onclick="ToggleCarrinho()" class="btn btn-outline-success"> Ver carrinho</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- fim navegaçao -->

    <main>
        <!-- inicio carrosel -->
        <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active ">
                <img class="d-block w-100" src="./img/do_ces.png" alt="Primeiro Slide" height=" 450px" style="object-fit: fill;">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100 " src="./img/slideDonuts.png" alt="Segundo Slide" height=" 450px" style="object-fit: fill;">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="./img/slideBolos.png" alt="Terceiro Slide" height=" 450px" style="object-fit: fill;">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" >
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Próximo</span>
            </a>
          </div>
         <!-- fim carrosel -->

         <h1>Nossos produtos</h1>

         <!-- inicio card produtos -->

         <?php
$produtos = include 'product.php';

if (is_array($produtos)) {
    echo '<div class="container-produtos">';
    foreach ($produtos as $produto) {
        echo '<div class="card">';
        echo '<img class="card-img-top" src="' . $produto['imagem'] . '" alt="Produto">';
        echo '<div class="card-body">';
        echo '<p class="card-title">' . $produto['nome'] . '</p>';
        echo '<p class="card-text">Um exemplo de texto rápido para construir o título do card e preencher o conteúdo do card.</p>';
        echo '<p class="card-price">R$: ' . number_format($produto['preco'], 2, ',', '.') . '</p>';
        echo '<button class="btn btn-dark btn-sm" onclick="adicionarProduto(\'' . $produto['nome'] . '\', ' . $produto['preco'] . ', \'' . $produto['imagem'] . '\')">Adicionar ao Carrinho</button>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "Nenhum produto disponível.";
}
?>

        <!--fim card produtos  -->

        <!-- inicio kit bolo -->
        <div class="container-festa">
            <h1>Kit festas</h1>
            <div class="d-flex justify-content-center align-items-center gap-4">
                <img src="./img/kitBolo.png" class="rounded" alt="Kit Bolo">
                <img src="./img/kitDonuts.png" class="rounded" alt="Kit Donuts">
            </div>
        </div>
        
        <!-- fim kit bolo -->

        <!-- inicio localizaçao -->
         <h1>Localização</h1>
  
         <button onclick="maps()" id="mapsButton" class="btn btn-outline-dark">Mudar mapa</button>
         <div class="iphone-container">
    <img src="./img/iphone.png" alt="iPhone" class="iphone-image" />
    <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!3m2!1spt-BR!2sbr!4v1731069831024!5m2!1spt-BR!2sbr!6m8!1m7!1sE0GFw94ohOmuMxr-Vw7qYA!2m2!1d-19.84019129777722!2d-43.9657584710384!3f197.07545061546585!4f10.098844176612175!5f0.7820865974627469" 
                class="iframe-map" id="street"></iframe>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4920.893800013616!2d-43.96900708811232!3d-19.840984935467937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa69592f1db9c47%3A0x298a315a5622a9f2!2sViaBrasil%20Pampulha!5e1!3m2!1spt-BR!2sbr!4v1731160624455!5m2!1spt-BR!2sbr" 
                class="iframe-map" id="maps"></iframe>
    </div>
</div>


     

        <div id="carrinho-tab"></div>
        <div id="carrinho">
            <h2>Carrinho de Comprar<button class="btn btn-danger" onclick="removerTudo()" style="margin-left: 23px;">  Remover Tudo</button></h2>
            <ul id="lista-carrinho"></ul>
            <p>Total: R$ <span id="total-carrinho">0</span></p>
            <div id="paypal-button-container"></div>
            <button class="btn btn-info" onclick="finalizarCompra()">Finalizar compra</button>
        </div>
        <!-- Modal do QR Code -->
        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
          
        </div>

        <!-- inicio equipe -->
        
        <div class="container-equipe">
    <h1 id="tituloEquipe">Equipe</h1>
    <div class="row-cards">
        <!-- Card 1 -->
        <div class="card-container">
            <div class="cartao">
                <div class="card-front">
                    <img src="./img/bichofeio.png" class="cardImgTop" alt="img Pedro">
                    <div class="corpoCard">
                        <h5 class="tituloCard" id="tituloFrente">Pedro Lucas</h5>
                        <p class="textoCard">Desenvolvedor Web | Front-end</p>
                        <p id="saibaMais">SAIBA MAIS</p>
                    </div>
                </div>
                <div class="card-back">
                    <div class="corpoCard">
                        <h5 class="tituloCard">Descrição</h5>
                        <p class="textoCard">Sou Desenvolvedor front-end focado em experiências acessíveis. Com domínio em HTML, CSS e JavaScript, transformo ideias em interfaces intuitivas.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Card 2 -->
        <div class="card-container">
            <div class="cartao">
                <div class="card-front">
                    <img src="./img/bichoLindo.png" class="cardImgTop" alt="img Victor">
                    <div class="corpoCard">
                        <h5 class="tituloCard" id="tituloFrente">Victor</h5>
                        <p class="textoCard">Desenvolvedor Web | Back-end</p>
                        <p id="saibaMais">SAIBA MAIS</p>
                    </div>
                </div>
                <div class="card-back">
                    <div class="corpoCard">
                        <h5 class="tituloCard">Descrição</h5>
                        <p class="textoCard">Possui habilidades excepcionais em desenvolvimento de sistemas que garantem que os processos internos da produção de donuts e bolos sejam rápidos e eficientes, com foco em automação e segurança.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="card-container">
            <div class="cartao">
                <div class="card-front">
                    <img src="./img/myrella.png" class="cardImgTop" alt="img Myrella">
                    <div class="corpoCard">
                        <h5 class="tituloCard" id="tituloFrente">Myrella</h5>
                        <p class="textoCard">Cozinheira </p>
                        <p id="saibaMais">SAIBA MAIS</p>
                    </div>
                </div>
                <div class="card-back">
                    <div class="corpoCard">
                        <h5 class="tituloCard">Descrição</h5>
                        <p class="textoCard">Especialista em confeitaria criativa, com habilidades que trazem um toque único a cada bolo, destacando-se pela inovação e apresentação detalhada.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row-cards">
        <!-- Card 4 -->
        <div class="card-container">
            <div class="cartao">
                <div class="card-front">
                    <img src="./img/Sabrina.jpg" id="imgSabrina" class="cardImgTop" alt="img Sabrina">
                    <div class="corpoCard">
                        <h5 class="tituloCard" id="tituloFrente">Sabrina</h5>
                        <p class="textoCard">Gestão de pessoas</p>
                        <p id="saibaMais">SAIBA MAIS</p>
                    </div>
                </div>
                <div class="card-back">
                    <div class="corpoCard">
                        <h5 class="tituloCard">Descrição</h5>
                        <p class="textoCard">Habilidades notáveis em motivação e desenvolvimento de equipes, garantindo que cada funcionário se sinta valorizado e trabalhando em sintonia para entregar os melhores doces.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="card-container">
            <div class="cartao">
                <div class="card-front">
                    <img src="./img/willfredo.png" class="cardImgTop" alt="img Willfredo">
                    <div class="corpoCard">
                        <h5 class="tituloCard" id="tituloFrente">Willfredo</h5>
                        <p class="textoCard">Cozinheiro </p>
                        <p id="saibaMais">SAIBA MAIS</p>
                    </div>
                </div>
                <div class="card-back">
                    <div class="corpoCard">
                        <h5 class="tituloCard">Descrição</h5>
                        <p class="textoCard">Mestre em técnicas de confeitaria tradicional e tem habilidades precisas em criar donuts que combinam sabor e textura de forma impecável..</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="card-container">
            <div class="cartao">
                <div class="card-front">
                    <img src="./img/Manu.jpg" class="cardImgTop" alt="img Emanuelle">
                    <div class="corpoCard">
                        <h5 class="tituloCard" id="tituloFrente">Emanuelle</h5>
                        <p class="textoCard">Fundadora </p>
                        <p id="saibaMais">SAIBA MAIS</p>
                    </div>
                </div>
                <div class="card-back">
                    <div class="corpoCard">
                        <h5 class="tituloCard">Descrição</h5>
                        <p class="textoCard">Habilidades excepcionais em gestão estratégica e visão de negócios, combinadas com um profundo conhecimento em confeitaria gourmet, garantindo que cada donut e bolo reflita o padrão de excelência da marca. Também se destaca na inovação de produtos e na criação de novas receitas que encantam os clientes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    

    
        
        <!-- fim equipe -->
    </main>
    
    <footer class="text-center bg-dark text-light mt-auto">
        <p>&copy 2024 Do Cês. Todos os direitos reservados</p>
    </footer>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    </main>
  
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>