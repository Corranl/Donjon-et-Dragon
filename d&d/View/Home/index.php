<?php
session_start();
$user = 'root';
$pass = '';
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bloc3_nvsave;', $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
var_dump($bdd);
var_dump($_SESSION)

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La taverne d'Edève</title>
</head>

<body>
    <header>
        <nav>

            <!--Menu Burger-->
            <div id="mySidenav" class="sidenav">
                <a id="closeBtn" href="#" class="close">×</a>
                <ul>
                    <li><a href="https://play.aidungeon.io/main/home">IA Fun</a></li>
                    <li><a href="#">Vos Personnages</a></li>
                    <li><a href="#">Articles</a></li>
                    <?php
                    if (isset($_SESSION['nom_u'])) {
                        if ($_SESSION['role_u'] == 1) {
                    ?>
                    <li><a href="#">Espace Admin</a></li>
                    <?php
                        } elseif ($_SESSION['role_u'] == 1) {
                    ?>
                    <li><a href="#">Espace utilisateur</a> </li>
                    <?php
                        }
                    }

                    ?>
                </ul>
            </div>
            <a href="#" id="openBtn">
                <span class="burger-icon">
                    <span></span>
                </span>
            </a>
            <!--Script du menu Burger-->
            <script>
                var sidenav = document.getElementById("mySidenav");
                var openBtn = document.getElementById("openBtn");
                var closeBtn = document.getElementById("closeBtn");

                openBtn.onclick = openNav;
                closeBtn.onclick = closeNav;

                /* Set the width of the side navigation to 250px */
                function openNav() {
                    sidenav.classList.add("active");
                }

                /* Set the width of the side navigation to 0 */
                function closeNav() {
                    sidenav.classList.remove("active");
                }

            </script>
            <h1>La taverne d'Édève</h1>
            <div class="user-widget">
                <?php if (isset($_SESSION['nom_u']) && $_SESSION['role_u'] !== null): ?>
                <a href="logout.php">Se déconnecter</a>
                <?php else: ?>
                <a href="connect.php">Se connecter</a>
                <?php endif; ?>
            </div>
            <a class="login" href="utilisateur.php"></a>
        </nav>
    </header>
    <main>
        <section>
            <div class="bienvenu">
                <h2>Bienvenue</h2>
                <br>
                <br>
                <br>
                <p>Bienvenue sur notre site de création de personnage pour le jeu de rôle Donjon & Dragon !

                    Si vous êtes un joueur de D&D, vous savez à quel point il est important de créer un personnage
                    unique et intéressant pour votre aventure. C'est pourquoi nous avons mis en place cet outil pour
                    vous aider à créer facilement votre personnage, que ce soit pour une nouvelle campagne ou pour
                    remplacer un personnage existant.

                    Notre générateur de personnage vous permet de choisir parmi les races, classes, compétences et
                    autres caractéristiques de D&D pour créer le personnage de vos rêves. Vous pouvez également
                    personnaliser votre personnage en ajoutant des détails et des histoires uniques pour le rendre
                    encore plus intéressant.

                    Nous espérons que vous apprécierez utiliser notre site de création de personnage et que vous
                    trouverez ce dont vous avez besoin pour votre prochaine aventure de D&D !</p>
            </div>
        </section>
        <div class="bloc">
            <h3>Les personnages</h3>
            <section class="conteneur">
                <article class="contenu">
                    <img class='Image1'  alt="Chasseur World of Warcraft">
                    <h4>Chasseur Orc</h4>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur corrupti debitis iure
                        cumque
                        necessitatibus unde, soluta quaerat sit quae ab itaque voluptatibus sequi natus, dignissimos
                        beatae
                        inventore doloribus, non veniam.
                        Neque mollitia accusamus expedita rem in excepturi delectus, error fuga inventore aperiam
                        dolores
                        asperiores nesciunt quibusdam exercitationem cupiditate quia commodi. Culpa officiis ea
                        quibusdam
                        quaerat vitae porro, doloribus maiores pariatur.
                        Molestias explicabo eveniet mollitia corporis. Perferendis reiciendis ducimus inventore
                        asperiores
                        voluptates ipsam. Atque excepturi veritatis autem voluptatem suscipit, voluptas officiis,
                        corporis
                        eligendi alias ad quidem laboriosam reprehenderit quaerat non similique.
                    </p>
                    <a class="button" id="sapin" href="/">Choisir cette classe</a>
                </article>


                <article class="contenu">
                    <img class='Image2' alt="Moine World of Warcraft">
                    <h4>Moine Pandaren</h4>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur corrupti debitis iure
                        cumque
                        necessitatibus unde, soluta quaerat sit quae ab itaque voluptatibus sequi natus, dignissimos
                        beatae
                        inventore doloribus, non veniam.
                        Neque mollitia accusamus expedita rem in excepturi delectus, error fuga inventore aperiam
                        dolores
                        asperiores nesciunt quibusdam exercitationem cupiditate quia commodi. Culpa officiis ea
                        quibusdam
                        quaerat vitae porro, doloribus maiores pariatur.
                    </p>
                    <a class="button" id="vert" href="/">Choisir cette classe</a>
                </article>
                <article class="contenu">
                    <img class='Image3' alt="Paladin World of Warcraft">
                    <h4>Paladin Humain</h4>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur corrupti debitis iure
                        cumque
                        necessitatibus unde, soluta quaerat sit quae ab itaque voluptatibus sequi natus, dignissimos
                        beatae
                        inventore doloribus, non veniam.
                        Neque mollitia accusamus expedita rem in excepturi delectus, error fuga inventore aperiam
                        dolores
                        asperiores nesciunt quibusdam exercitationem cupiditate quia commodi. Culpa officiis ea
                        quibusdam
                        quaerat vitae porro, doloribus maiores pariatur.
                        Molestias explicabo eveniet mollitia corporis. Perferendis reiciendis ducimus inventore
                        asperiores
                        voluptates ipsam. Atque excepturi veritatis autem voluptatem suscipit, voluptas officiis,
                        corporis
                        eligendi alias ad quidem laboriosam reprehenderit quaerat non similique.
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur corrupti debitis iure
                        cumque
                        necessitatibus unde, soluta quaerat sit quae ab itaque voluptatibus sequi natus, dignissimos
                        beatae
                        inventore doloribus, non veniam.

                    </p>
                    <a class="button" id="rose" href="/">Choisir cette classe</a>
                </article>
            </section>
            <h3>Les nouvelles du barde</h3>
            <section class="barde">
                <article class="article2">
                    <img src="../d&d/img/digital-art-knight-soldier-fla.png" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum molestiae quos, consequatur
                        ab
                        repellat in quae facilis deserunt voluptatem iusto quo, rerum aperiam ad minima non veniam
                        praesentium
                        pariatur numquam?</p>
                </article>
                <article class="article2">
                    <img src="../d&d//img/article2.png" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum molestiae quos, consequatur
                        ab
                        repellat in quae facilis deserunt voluptatem iusto quo, rerum aperiam ad minima non veniam
                        praesentium
                        pariatur numquam?</p>
                </article>
            </section>
        </div>
    </main>
    <footer>
        <div class="reseaux">
            <a href="http://twitter.com"><img src="/../d&d/img/twitter-1.png" alt="logotwitter"></a>
            <a href="http://twitch.com"><img src="/../d&d/img/twitch-2.png" alt="logotwitch"></a>
            <a href="http://instagram.com"><img src="/../d&d/img/insta-2.png" alt="logotwitter"></a>

            <form class="newsletters">
                <label for="newsletter-email">Inscrivez-vous à notre newsletter :</label><br>
                <input type="email" id="newsletter-email" name="newsletter-email"
                    placeholder="Entrez votre adresse email"><br>
                <button type="submit">S'inscrire</button>
            </form>
        </div>
        <div class="lien">
            <p>
                <a href="">Contact</a>
                <a href="#">Politique de confidentialité</a>
                <a href="#">Cookie</a>
            </p>
        </div>
    </footer>
</body>

</html>