
<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title>index2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/stylesheet.css">
</head>

<body>
<?php
session_start();
// Check if the user is logged in
if (isset($_SESSION['pseudo'])) {
    // If the user is logged in, display their pseudo at the top of the page
    echo "<p>Bienvenue, " . htmlspecialchars($_SESSION['pseudo']) . "!</p>";
}

// Check if the product ID is provided
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Check if the product is already in the cart
    if (!isset($_SESSION['panier'][$product_id])) {
        // If not, add it with quantity 1
        $_SESSION['panier'][$product_id] = 1;
    } else {
        // If it is, increment the quantity
        $_SESSION['panier'][$product_id]++;
    }

    // Redirect back to the index page
    header('Location: index.php');
    exit;
}
 ?>


<?php if (isset($_SESSION['pseudo'])): ?>
<p>Welcome, <?php echo $_SESSION['pseudo']; ?></p>
<?php endif; ?>

<script>
    window.embeddedChatbotConfig = {
        chatbotId: "7ii2A38I6QVnHt08twGLH",
        domain: "www.chatbase.co"
    }
</script>
<script
        src="https://www.chatbase.co/embed.min.js"
        chatbotId="7ii2A38I6QVnHt08twGLH"
        domain="www.chatbase.co"
        defer>
</script>


<body>
<nav class="navbar navbar-expand-lg bg-body-secondary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><strong>>_MYWEBSITE</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#Accueil">Accueil</a>
                <a class="nav-link active" href="#tarifs">Formules et tarifs</a>
                <a class="nav-link active" href="#activités">prestations</a>
                <a class="nav-link active" href="#noslocaux"> Nos locaux et horaires</a>
                <a class="nav-link active" href="#organigramme">Organigramme</a>
                <a class="nav-link active" href="#notreequipe">notre équipe</a>
                <a class="nav-link active" href="#Avis">avis</a>
                <a class="nav-link active" href="#apropos">A propos de Nous</a>
                <a class="nav-link active" href="#notrehistoire">Notre Histoire</a>
                <a class="nav-link active" href="#nosinformations">nos informations</a>
                <a class="nav-link active" href="#contact"> nous Contacter</a>
                <?php if (!isset($_SESSION['pseudo'])): ?>
                    <a class="nav-link active" href="/public/parties/connexion.php"> se connecter </a>
                <?php endif; ?>
                <?php if (!isset($_SESSION['pseudo'])): ?>
                    <a class="nav-link active" href="/public/parties/register.php"> s'enregistrer  <i class="bi-person"></i> </a>
                <?php endif; ?>
                </a>
                <a class="nav-link active" href="public/parties/panier.php">
                    <i class="bi-cart"></i>
                </a>
            </div>
        </div>
    </div>
</nav>
<section id="Accueil">
    <div class="container">
        <div class="row">
            <div class="col tight-lines">
                <br><br><br>
                <h1>MYWEBSITE</h1>
                <h2> Votre site web, notre responsabilité</h2>
                    <ul>
                    Des solutions web sur-mesure et évolutives</ul>
                   <ul> Un accompagnement personnalisé tout au long de votre projet</ul>
                <ul>    Un design moderne et responsive </ul>
                <ul>  Des technologies de pointe pour un site performant</ul>
                <ul>    Un référencement optimisé pour une meilleure visibilité</p></ul>
            </div>
            <div class="col">
                <br><br><br>
                <img src="/img/abc.png" alt="abc" class="img-fluid" width="800">
            </div>
        </div>
</section>
<section id="tarifs" class="container bg-body-primary mt-5 mb-4">
    <h1 class=" text-center"> 🥇NOS FORMULES ET TARIFS🥇</h1>
    <br><BR>
  <div class="card-group">
        <div class="row row-cols-1 row-cols-md-3 g-4 ">
            <div class="col">
                <div class="card h-100">
                    <img src="img/pictos_oacom-site_vitrine.png" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <form action="public/parties/add_to_cart.php" method="post">
                                <input type="hidden" name="product_id" value="1"> <!-- Replace 1 with the actual product ID -->
                                <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                            </form>
                            <a href="#contact"> <button type="button"  class="btn btn-outline-primary">réaliser un Devis</button></a>
                            <br>
                            <h5 class="card-title">SITE WEB VITRINE</h5>
                            <p class="card-text">UN site web responsible, esthetique, avec ajouts de vos produits</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <strong class="text-body-secondary">à partir de 900€</strong>
                    </div>
                </div>
            </div>
            <div class="col card border-primary mb-3">
                <div class="card-header">formule recommandée</div>
                <div class="card h-100">
                    <img src="img/marchand.png" class="card-img-top img-fluid" alt="...">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center text-primary ">
                        <form action="public/parties/add_to_cart.php" method="post">
                            <input type="hidden" name="product_id" value="2"> <!-- Replace 1 with the actual product ID -->
                            <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                        </form>
                        <a href="#contact"> <button type="button"  class="btn btn-outline-primary">réaliser un Devis</button></a>
                        <br>
                        <h5 class="card-title">SITE WEB MARCHAND</h5>
                        <p class="card-text xxx">UN site web responsible, esthetique, avec ajouts de vos produits,Un site internet
                            marchand est un site internet qui permet à ses visiteurs de commander et/ou de payer des produits et/ou
                            services. Il se distingue du site internet vitrine, ou site institutionnel, dont l'objectif se limite
                            généralement à la présentation d'une entreprise, de ses produits et/ou de ses services.</p>
                    </div>
                    <div class="card-footer">
                        <strong class="text-body-secondary">à partir de 2500€</strong>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="img/host.jpg" class="card-img-top img-fluid" alt="...">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <form action="public/parties/add_to_cart.php" method="post">
                            <input type="hidden" name="product_id" value="3"> <!-- Replace 1 with the actual product ID -->
                            <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                        </form>
                        <a href="#contact"> <button type="button"  class="btn btn-outline-primary">réaliser un Devis</button></a>
                        <br>
                        <h5 class="card-title">HEBERGEMENT</h5>
                        <p class="card-text">cette formule permettra à nos clients de bénéficier d'un hébergement et d'une maintenance de qualité,
                            avec un design moderne et adapté à leurs besoins</p>
                    </div>
                    <div class="card-footer">
                        <strong class="text-body-secondary"> à partir de 80€/mois</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="activités">
    <br>
    <h1 class="text-center"> NOS FORMULES</h1>
    <br>
    <div class="container text-center">
        <div class="row align-items-start">
            <div class="col">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1700">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/img/definition-site-web-1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/responsive-design.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/Cest-quoi-le-référencement-SEO.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                FORMULE #1: services de création de site web vitrines
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                cette formule permettra à nos clients de bénéficier d'un site web vitrine de qualité, avec un design
                                moderne et adapté à leurs besoins.
                                Un site vitrine est un site web qui présente votre entreprise, vos produits ou services, et vos coordonnées. Il sert à vous faire connaître et à générer des leads ou des ventes.<br>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                FORMULE #2: services de création de site web marchands
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                cette formule permettra à nos clients de bénéficier d'un site web marchand de qualité, avec un design
                                moderne et adapté à leurs besoins. Un site e-commerce est un site web qui permet de vendre des produits ou services en ligne. La création d'un site e-commerce est plus complexe que celle d'un site vitrine, car elle nécessite de mettre en place un système de paiement sécurisé et de gestion des stocks.<br>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" style="box-sizing: border-box">
                        <h2 class="accordion-header">
                            <button class="accordion-button btn btn-outline-primary collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                FORMULE #3: services d'herbergements et de maintenance
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                cette formule permettra à nos clients de bénéficier d'un hébergement et d'une maintenance de qualité,
                                avec un design moderne et adapté à leurs besoins. <br>
                            </div>
                        </div>
                    </div>
                </div>
</section>
<br>
<section id="noslocaux">
    <h1 class="text-center"> NOS LOCAUX ET HORAIRES</h1>
    <br>
    <div class="container text-center">
        <div class="row align-items-start">
            <div class="col">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                🕐 HORAIRES🕐
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                >_MYWEBSITE votre agence Web vous accueillera: <br> du Lundi au Vendredi <br> de 10h à 12h et de 14h à 17h
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Un OpenSpace de qualté
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                >_MYWEBSITE met un point d'honneur sur le confort de ses collaborateurs et clients:<br>
                                <li> Votre agence Web met à disposition de ses collaborateurs et clients un OpenSpace révové en 2020.</li>
                                <li>  Un Open space baigné de lumière naturelle, favorisant la collaboration et la créativité.</li>
                                <li> Un Design moderne et épuré, avec des touches de couleurs vives pour une ambiance dynamique.</li>
                                <li>Ainsi que des  Espaces de travail variés pour répondre aux besoins de tous : postes individuels, tables collaboratives, salles de réunion et zones de détente</li>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1700">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/img/istockphoto-1410270664-612x612.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/modern-office-design.webp" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/Modern-Offices-Interior-Design-Ideas.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</div>
</div>
<section id="organigramme" >
    <br>
    <br>
    <br>
    <h1 class="text-center" id="organigramme-title"> ORGANIGRAMME</h1>
    <div class="orga">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <img src="/img/orgav2.png" class="img-fluid " alt="..." style="border-style: double" id="orga-image">
        </div>
    </div>

    <section id="notreequipe" class="container">
        <h1 class="text-center">👥NOTRE EQUIPE👥</h1>
        <br>
        <br>


        <div class="card-group">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 row-col g-4">
                <div class="col">
                    <div class="card h-100">
                        <img src="/img/user1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">JORIS ABLATO</h5>
                            <h7 class="card-subtitle mb-2 text-muted">BACK-END WEB DEVELOPPER</h7>
                            <br>
                            <p class="card-text">Crée l'architecture et les fonctionnalités des sites web et applications mobiles.
                                Expert en langages de programmation back-end, il garantit  sécurité et  fiabilité
                            </p>
                            <br><br><br><br><br><br>
                            <a href="public/parties/backend.html" class="btn btn-outline-primary">consulter le detail </a>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="/img/elmo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> TITOUAN EL MOUAFIK </h5>
                            <h7 class="card-subtitle mb-2 text-muted">PROJECT MANAGER</h7>
                            <br>
                            <p class="card-text">Pilote les projets web de la conception à la livraison. Doté d'excellentes capacités de
                                communication et de gestion, il coordonne le travail des équipes et garantit le respect des délais et des
                                budgets.</p>
                            <a href="public/parties/manager.html" class="btn btn-outline-primary">consulter le detail</a>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="/img/user3.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">JASMINA ACAI</h5>
                            <h7 class="card-subtitle mb-2 text-muted">FRONTEND DEVELOPPER</h7>
                            <br>
                            <p class="card-text">Donne vie aux designs web en code HTML, CSS et JavaScript. Doté d'une grande rigueur et
                                d'un excellent sens du détail, il veille à la performance et à la compatibilité des interfaces sur tous
                                les supports..</p>
                            <a href="public/parties/frontend.html" class="btn btn-outline-primary">consulter le detail</a>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col">

                    <div class="card h-100">
                        <img src="/img/user4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">JEANNE PARETTTO</h5>
                            <h7 class="card-subtitle mb-2 text-muted">WEB DESIGNER</h7>
                            <br>
                            <p class="card-text"> Crée des interfaces web intuitives et esthétiques, alliant créativité et technicité
                                pour une expérience utilisateur optimale. Passionné par les tendances du web design, il propose des
                                solutions innovantes et adaptées aux besoins des clients.</p>
                            <a href="public/parties/webdesign.html" class="btn btn-outline-primary">consulter le detail</a>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="/img/pp.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">JACK DANINI</h5>
                            <h7 class="card-subtitle mb-2 text-muted">WEB INTEGRATOR</h7>
                            <br>
                            <p class="card-text">Spécialiste de la construction web invisible, transformer les designs graphiques en pages web fonctionnelles et esthétiques. </p>
                            <a href="public/parties/integrator.html" class="btn btn-outline-primary">consulter le detail</a>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <br>
        <br>
        <section id="Avis" class="container bg-body">
            <section id="Avis-inner">
                <h1 class="display-1 text-center">✨AVIS✨</h1>
                <br>
                <br>
                <section>
                    <?php
                    require_once '../mywebsite/private/db-config.php';

                    $pdo = getConnexion();
                    $stmt = $pdo->prepare("SELECT u.pseudo, c.commentaire, c.note FROM commentaires c JOIN users u ON c.user_id = u.id");
                    $stmt->execute();
                    $commentaires = $stmt->fetchAll();
                    function displayStars($note) {
                        $stars = '';
                        for ($i = 0; $i < $note; $i++) {
                            $stars .= '⭐';
                        }
                        return $stars;
                    }
                    foreach ($commentaires as $commentaire) {
                        echo '<div class="card">';
                        echo '<h5 class="card-header">' . htmlspecialchars($commentaire['pseudo']) . ' - Note : ' . displayStars($commentaire['note']) . '</h5>';
                        echo '<div class="card-body">';
                        echo '<p class="card-text">' . htmlspecialchars($commentaire['commentaire']) . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </section>
            </section>
            <a href="public/parties/ajout_commentaire.php" class="btn btn-primary">Ajouter un commentaire</a>
        </section>
        <br>
        <br>
        <br>
        <section id="apropos">
            <h1 class="text-center">A PROPOS DE NOUS</h1>
            <br>
            <br>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <strong>   Nos services :</strong>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul>
                                <li> <strong> Création de site web : </strong>Nous concevons et réalisons des sites web sur-mesure pour tous types d'entreprises et de professionnels.</li>
                                <li> <strong> Refonte de site web :</strong> Nous vous accompagnons dans la refonte de votre site web existant pour le moderniser et l'optimiser.</li>
                                <li> <strong> Hébergement web :</strong> Nous proposons des solutions d'hébergement fiables et sécurisées pour votre site web.</li>
                                <li> <strong> Maintenance web :</strong> Nous assurons la maintenance corrective et évolutive de votre site web pour garantir sa performance et sa sécurité.</li>
                                <li> <strong> Référencement web :</strong> Nous optimisons votre site web pour les moteurs de recherche afin d'améliorer sa visibilité.</li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <strong>  Nos valeurs : </strong>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul>
                                <li> <strong>Engagement :</strong> Nous sommes passionnés par notre métier et nous nous investissons pleinement dans chaque projet.</li>
                                <li> <strong>Professionnalisme :</strong> Nous offrons un service de qualité irréprochable et respectons toujours nos engagements.</li>
                                <li> <strong>Écoute :</strong> Nous sommes à l'écoute de vos besoins et nous adaptons nos solutions à vos exigences spécifiques.</li>
                                  <li> <strong>Innovation :</strong> Nous sommes constamment à la recherche de nouvelles technologies et de nouvelles solutions pour vous proposer les meilleurs services possibles.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <strong>  Notre mission :</strong>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul>
                                <li> <strong> Accompagner </strong>les entreprises et les professionnels dans la création de leur site internet, du brief à la mise en ligne et au-delà.</li>
                                <li><strong> Professionnalisme :</strong> Nous offrons un service de qualité irréprochable et respectons toujours nos engagements.</li>
                                <li> <strong>Proposer des solutions web</strong> innovantes et performantes pour garantir une expérience utilisateur optimale.</li>
                                <li> <strong>Développer un partenariat</strong> durable avec nos clients pour les aider à atteindre leurs objectifs de communication digitale.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <strong>Notre équipe :</strong>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul>
                                <li><strong>Notre équipe </strong>est composée de professionnels expérimentés et passionnés par le web. Nous sommes tous animés par la même volonté de vous offrir un service de qualité et de vous aider à réussir votre communication digitale.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <br><br><br>
            </div>
            </div>
        </section>
    <section id="notrehistoire">

        <div class="col">
            <div class="container text-center">
                <div class="row align-items-start">
                    <h1>NOTRE HISTOIRE </h1>
                    <br>
                    <br>
                    <ul>
                        <li style="--accent-color:#41516C">
                            <div class="date">2015</div>
                            <div class="title">Création de l'entreprise</div>
                            <div class="descr">Le 8 avril 2015, M EL MOUAFIK (fondateur) décide la création juridique de >_MYWEBSITE .</div>
                        </li>
                        <li style="--accent-color:#FBCA3E">
                            <div class="date">2015</div>
                            <div class="title">Création du site Web</div>
                            <div class="descr">dès la premiere année de création de >_MYWEBSITE , le fondateur décide de la réalisation de son site internet.Ce site permettra par la suite la mise en relation des entreprises voulant leur propre site internet avec les professionels de chez  >_MYWEBSITE</div>
                        </li>
                        <li style="--accent-color:#E24A68">
                            <div class="date">2017</div>
                            <div class="title"> Recrutement de notre Premier employé BACK-END</div>
                            <div class="descr">Recruter notre premier développeur web backend en 2017 a été une étape cruciale dans la croissance de notre entreprise. JORIS ABLATO a apporté ses compétences et son savoir-faire en developpement BACK-END et a contribué à la création de sites web robustes et sécurisés.</div>
                        </li>
                        <li style="--accent-color:#1B5F8C">
                            <div class="date">2018</div>
                            <div class="title">Recrutement de notre developpeuse web front-end</div>
                            <div class="descr">En 2018, l'équipe s'agrandit avec l'arrivée de JASMINA ACAI, notre premier développeur web front-end. Son expertise en developpement FRONT-END a été un atout majeur pour le développement de sites web performants et évolutifs.</div>
                        </li>
                        <li style="--accent-color:#4CADAD">
                            <div class="date">2018</div>
                            <div class="title">Recrutement de notre Web-designeuse</div>
                            <div class="descr">Un élément essentiel de notre croissance a été l'arrivée de JEANNE PARETTO en 2018 en tant que première web designeuse. Son approche centrée sur l'utilisateur et sa maîtrise des outils de design ont permis de créer des interfaces à la fois intuitives et engageantes..</div>
                        </li>
                        <li style="--accent-color: #800080">
                            <div class="date">2019</div>
                            <div class="title"> Recrutement de notre intégrateur web</div>
                            <div class="descr"> Chez >_MYWEBSITE , nous sommes convaincus que l'intégration web est un élément essentiel pour un site web performant. C'est pourquoi nous sommes heureux d'avoir accueilli JACK DANINI en 2019 en tant que premier intégrateur web. Son expertise a permis de garantir la fluidité et la réactivité de nos sites web..</div>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
        </div>
    </section>
    <br><br>
        <section id="nosinformations">
            <h1 class="text-center">NOS INFORMATIONS</h1>
            <br> <br>
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="d-flex justify-content-center align-items-center" style="height: 50vh; border-style: double">
                            <div class="card" style="width: 30rem;">
                                <img src="/img/abc.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">>_MYWEBSITE</h5>
                                    <p class="card-text">VOTRE SITE, NOTRE RESPONSABILITE</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">tel: 0381845622</li>
                                    <li class="list-group-item">mail: mywebsite.orga@gmail.com</li>
                                    <li class="list-group-item">RUE DES BUIS 25400 PARIS </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="d-flex justify-content-center align-items-center"
                             style="height: 50vh;border:black;border-style:double">
                            <h2  class="yyy text-center align-text-top">OU SOMMES NOUS ?</h2>
                            <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.77824574492!2d2.2646349176566782!3d48.8589384346083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sen!2sfr!4v1707291494684!5m2!1sen!2sfr"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
        </section>
        <div class="container" >
        <section id="contact" class="bg-body">
            <h1 class="text-center">Formulaire de contact</h1>
            <br>
            <br>
            <form class="row g-3 needs-validation" novalidate>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">NOM DE FAMILLE</label>
                    <input type="text" class="form-control" id="validationCustom01" value="" required placeholder="DEFRESNE">
                    <div class="valid-feedback">
                        ok!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">PRENOM</label>
                    <input type="text" class="form-control" id="validationCustom02" value="" required placeholder="Marc" ">
                    <div class="valid-feedback">
                        ok!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@email</span>
                        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend"
                               required placeholder="marc.defresne@email.com">
                        <div class="valid-feedback">
                            choissisez un pseudonyme.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">ville</label>
                    <input type="text" class="form-control" id="validationCustom03" required placeholder="Sevran">
                    <div class="valid-feedback">
                        entrer une ville valide
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">pays</label>
                    <select class="form-select" id="validationCustom04" required>
                        <option selected disabled value="">Choisir un pays:</option>
                        <option>FRANCE</option><option>DANEMARK</option><option>ESPAGNE</option><option>ALLEMAGNE</option><option>BELGIQUE</option><option>SUISSE</option><option>Afghanistan</option><option>Albanie</option><option>Algérie</option><option>Andorre</option><option>Angola</option><option>Antigua-et-Barbuda</option><option>Arabie saoudite</option><option>Argentine</option><option>Arménie</option><option>Australie</option><option>Autriche</option><option>Azerbaïdjan</option><option>Bahamas</option><option>Bahreïn</option><option>Bangladesh</option><option>Barbade</option><option>Biélorussie</option><option>Belize</option><option>Bénin</option><option>Bhoutan</option><option>Bolivie</option><option>Bosnie-Herzégovine</option><option>Botswana</option><option>Brésil</option><option>Brunei</option><option>Bulgarie</option><option>Burkina Faso</option><option>Burundi</option>
                    </select>
                    <div class="valid-feedback">
                        entrer un pays valide
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">code postale</label>
                    <input type="int" class="form-control" id="validationCustom05" required placeholder="91000">
                    <div class="valid-feedback">
                        merci de donner un code postale valide
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Votre demande</label>
                    <input type="text" class="form-control" id="validationCustom05" required placeholder="laisser votre message"  >
                    <div class="valid-feedback">
                        merci de laisser votre message
                    </div>
                <div class="col-12">
                    <div class="form-check">
                        <br>   <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                           <label class="form-check-label" for="invalidCheck">
                            Accepter les termes et conditions
                        </label>
                        <div class="valid-feedback">
                            vous devez accepter les termes et conditions
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">nous contacter</button>
                </div>
            </form>
        </section>
        </div>
        <script src="./js/bootstrap.bundle.min.js"></script>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>>_MYWEBSITE</h5>
                <p>VOTRE SITE, NOTRE RESPONSABILITE</p>
            </div>
            <div class="col-md-4">
                <h5>Mentions légales</h5>
                <ul>
                    <li><a href="#tarifs">Conditions d'utilisation</a></li>
                    <li><a href="#nosinformations">Politique de confidentialité</a></li>
                    <li><a href="#">Politique de cookies</a></li>
                    <li><a href="#nosinformations">Informations légales</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Nous contacter</h5>
                <ul>
                    <li><a href="#contact">Tel: 0381845622</a></li>
                    <li><a href="#contact">Email: mywebsite.orga@gmail.com</a></li>
                    <li><a href="#contact">Adresse: RUE DES BUIS 25400 PARIS</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="copyright">© 2023 >_MYWEBSITE</p>
            </div>
        </div>
    </div>
</footer>
</html>

