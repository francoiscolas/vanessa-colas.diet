<?php
define('APP_DIR'    , realpath(__DIR__.'/..'));
define('CONFIG_DIR' , APP_DIR.'/config');
define('PUBLIC_DIR' , APP_DIR.'/public');
define('ASSETS_FILE', CONFIG_DIR.'/assets.yml');
define('DEVMODE'    , file_exists(CONFIG_DIR.'/devmode'));

function assets($key) {
  $assets = yaml_parse_file(ASSETS_FILE);
  return array_map(function ($files) {
    return array_map(function ($file) {
      return str_replace(PUBLIC_DIR, '', APP_DIR.'/'.$file);
    }, $files);
  }, $assets[$key]);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width; initial-scale=1.0; user-scalable=no">
    <title>Vanessa Colas - Diététicienne à Angers</title>
    <?php
    if (DEVMODE) {
      foreach (assets('stylesheets') as $name => $files) {
        for ($i = 0; $i < count($files); $i++) {
          echo '<link rel="stylesheet" href="'.$files[$i].'"/>'.PHP_EOL;
        }
      }
      foreach (assets('javascripts') as $name => $files) {
        for ($i = 0; $i < count($files); $i++) {
          echo '<script src="'.$files[$i].'"></script>'.PHP_EOL;
        }
      }
    } else {
      ?>
      <link rel="stylesheet" href="app.css"/>
      <script src="app.js"></script>
      <?php
    }
    ?>
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <a name="accueil"></a>
      <header class="mdl-layout__header mdl-layout__header--seamed">
        <div class="vd-wrapper">
            <div class="vd-title mdl-layout__header-row">
              <h1>
                <b>Vanessa Colas</b><br>
                Diététicienne-Nutritionniste D.E à Angers
              </h1>
            </div>
            <div class="vd-nav mdl-layout__header-row">
              <div class="mdl-layout-spacer"></div>
              <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="#accueil">Accueil</a>
                <a class="mdl-navigation__link" href="#contact">Contact</a>
                <a class="mdl-navigation__link" href="#localisation">Localisation</a>
                <a class="mdl-navigation__link" href="#tarifs">Tarifs</a>
              </nav>
            </div>
        </div>
      </header>
      <main>
        <section class="presentation mdl-grid">
          <div class="mdl-cell mdl-cell--12-col">
            <div class="mdl-grid mdl-grid--no-spacing">
              <div class="photo mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone">
                <img src="/images/photo.jpg"/>
              </div>
              <div class="mdl-card mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card__title">
                  <h2 class="mdl-card__title-text">Présentation</h2>
                </div>
                <div class="mdl-card__supporting-text">
                  Je suis diététicienne diplômée depuis 2013. Je vous accueille dans mon cabinet
                  à la maison médicale Saint Jacques.<br>
                  <br>
                  Dôtée de plusieurs expériences professionnelles, j'ai exercé en milieu
                  hospitalier au CHU d'Angers dans différents services. J'ai essentiellement
                  accompagné des patients souffrants d'obésité et suivi les
                  <a href="https://fr.wikipedia.org/wiki/Chirurgie_bariatrique">chirurgies bariatriques</a>
                  (anneau gastrique, by-pass gastrique, sleeve gastrectomie, duodenal switch).<br>
                  <br>
                  Je vous soutien, accompagne et vous guide dans l'application des mesures
                  hygienodiététiques pour que votre alimentation reste une source de plaisir
                  et vous apporte bien être.
                </div>
                <div class="mdl-card__actions">
                  <a href="#contact" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect">Prendre rendez-vous !</a>
                </div>
              </div>
              <div class="mdl-card mdl-color--green mdl-cell mdl-cell--3-col-desktop mdl-cell--hide-tablet mdl-cell--hide-phone">
                <div class="mdl-card__supporting-text">
                  <p class="mdl-typography--font-light contact">
                    <i class="material-icons">&#xE0CD;</i> <a href="tel://+33756843555">07 82 02 75 40</a>
                  </p>
                  <p class="mdl-typography--font-light contact">
                    <i class="material-icons">&#xE0BE;</i> <a href="mailto:contact@vanessa-colas.diet">contact@vanessa-colas.diet</a>
                  </p>
                  <p class="mdl-typography--font-light contact localisation">
                    <i class="material-icons">&#xE0C8;</i> <a href="#localisation">4 Rue Saint-Jacques<br>49100 Angers</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="pourquoi mdl-grid">
          <div class="mdl-cell mdl-cell--12-col">
            <div class="mdl-grid mdl-grid--no-spacing">
              <div class="bird-cell mdl-cell mdl-cell--4-col-desktop mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
              <div class="mdl-card mdl-cell mdl-cell--8-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                <div class="mdl-card__title">
                  <h2 class="mdl-card__title-text">Pourquoi consulter ?</h2>
                </div>
                <div class="mdl-card__supporting-text">
                  <p>
                    Je ne prescris aucuns produits ou compléments alimentaires car une <b>alimentation variée</b> et
                    <b>équilibrée</b> apporte tous les éléments indispensables à notre <b>bonne santé</b>.
                  </p>
                  <p>
                    Les consultations diététiques concernent tout le monde (les enfants, les adolescents, les adultes, les
                    femmes enceintes ou allaitantes, les sportifs, les personnes âgées...) car tout au long de la vie, nos
                    besoins nutritionnels changent et notre alimentation doit être adaptée.
                  </p>
                  <p>
                    Les raisons qui peuvent vous amener à consulter peuvent être diverses:
                    <ul>
                      <li>Problèmes de poids (perte ou prise)</li>
                      <li>Pathologie (diabète, hypertension, hypercholestérolémie, cancer, pathologie digestive...)</li>
                      <li>Situation nouvelle (grossesse, allaitement, travail en horaires décalées, médication entraînant une perte ou prise de poids, sevrage tabagique, chirurgie bariatrique...)</li>
                      <li>Intolérance alimentaire (gluten, lactose...)</li>
                      <li>Travail sur votre comportement alimentaire (compulsions, boulimie, anorexie) ou phobie alimentaire</li>
                      <li>Alimentation adaptée avec traitement : corticothérapie, anticoagulants, insulines...</li>
                      <li>Rééquilibrage alimentaire</li>
                    </ul>
                  </p>
                  <p>
                    Consulter une diététicienne vous aidera donc à modifier vos habitudes de vie, à adapter votre
                    alimentation à vos besoins et contribuer ainsi à améliorer votre santé. Nous établirons ensemble
                    vos objectifs et motivations afin d'élaborer un programme individuel qui réponde à votre profil.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <a name="contact"></a>
        <section class="contact mdl-grid">
          <div class="mdl-cell mdl-cell--12-col">
            <div class="mdl-grid mdl-grid--no-spacing">
              <div class="bread-cell mdl-cell mdl-cell--4-col-desktop mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
              <div class="mdl-card mdl-cell mdl-cell--4-col-desktop mdl-cell--3-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card__title">
                  <h2 class="mdl-card__title-text">Contact</h2>
                </div>
                <div class="mdl-card__supporting-text">
                  Pour prendre rendez-vous, vous pouvez utiliser ce formulaire ou
                  directement me contacter par courriel ou téléphone. À bientôt.
                  <br><br>
                  <p class="mdl-typography--font-light contact">
                    <i class="material-icons">&#xE0CD;</i> <a href="tel://+33756843555">07 82 02 75 40</a>
                  </p>
                  <p class="mdl-typography--font-light contact">
                    <i class="material-icons">&#xE0BE;</i> <a href="mailto:contact@vanessa-colas.diet">contact@vanessa-colas.diet</a>
                  </p>
                </div>
              </div>
              <div class="mdl-card mdl-cell mdl-cell--4-col-desktop mdl-cell--5-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card__supporting-text">
                  <form action="#">
                    <div class="mdl-textfield mdl-js-textfield">
                      <label class="mdl-textfield__label">Mr/Mme/Mlle Prénom NOM</label>
                      <input class="mdl-textfield__input" name="person" type="text" required>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                      <label class="mdl-textfield__label">Objet du message</label>
                      <input class="mdl-textfield__input" name="subject" type="text">
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                      <label class="mdl-textfield__label">Téléphone</label>
                      <input class="mdl-textfield__input" name="phone" type="text" required>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                      <label class="mdl-textfield__label">Adresse électronique</label>
                      <input class="mdl-textfield__input" name="email" type="text" required>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                      <label class="mdl-textfield__label">Adresse postale</label>
                      <textarea class="mdl-textfield__input" name="address" rows= "3"></textarea>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                      <label class="mdl-textfield__label">Message</label>
                      <textarea class="mdl-textfield__input" name="message" rows= "6" required></textarea>
                    </div>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">
                      Envoyer
                    </button>
                    <div id="error">
                      Erreur : Merci de vérifier les informations saisies.
                      Si le problème persiste, vous pouvez réessayer plus
                      tard ou me laisser un message téléphonique.
                    </div>
                  </form>
                  <div id="sent">
                    <p><strong>Envoyé !</strong><br/>Je reprendrai contact avec vous au plus vite. À bientôt.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <a name="localisation"></a>
        <section class="localisation mdl-grid">
          <div class="mdl-cell mdl-cell--12-col">
            <div class="mdl-grid mdl-grid--no-spacing">
              <div class="mdl-card mdl-cell mdl-cell--4-col-desktop mdl-cell--3-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card__title mdl-card--expand">
                  <h2 class="mdl-card__title-text">Localisation</h2>
                </div>
                <div class="mdl-card__supporting-text">
                  Je consulte à mon cabinet :<br>
                  4 Rue Saint-Jacques<br>
                  49100 Angers
                </div>
              </div>
              <div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--5-col-tablet mdl-cell--4-col-phone">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2696.8139182638697!2d-0.5705330485362423!3d47.47405550501534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480878ccf425241f%3A0x24b76c24836d749c!2sMaison+M%C3%A9dicale+Saint+Jacques!5e0!3m2!1sfr!2sfr!4v1465926606425" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </section>
        <a name="tarifs"></a>
        <section class="tarifs mdl-grid">
          <div class="mdl-card mdl-cell mdl-cell--12-col">
            <div class="mdl-card__title">
              <h2 class="mdl-card__title-text">Tarifs</h2>
            </div>
            <div class="mdl-grid">
              <div class="mdl-cell mdl-cell--4-col">
                <h5>Consultations individuelles</h5>
                <ul>
                  <li>1ère consultation (1h): 40€</li>
                  <li>consultations de suivi (30min): 25€</li>
                </ul>
              </div>
              <div class="mdl-cell mdl-cell--4-col">
                <h5>Consultations en couple</h5>
                <ul>
                  <li>1ère consultation (1h): 60€</li>
                  <li>consultations de suivi (30min): 40€</li>
                </ul>
              </div>
              <div class="mdl-cell mdl-cell--4-col">
                <h5>Remboursement</h5>
                <p>
                  Même sur prescription médicale, les consultations ne sont pas remboursées
                  par la Sécurité Sociale. Cependant de nombreuses mutuelles prennent en charge
                  une partie des consultations.
                  <br><br>
                  Renseignez-vous auprès de votre mutuelle.
                </p>
              </div>
            </div>
          </div>
        </section>
        <footer class="mdl-mini-footer">
          <div class="vd-wrapper">
              &copy; 2016 - Vanessa Colas - Tous droits réservés
          </div>
        </footer>
      </main>
    </div>
  </body>
</html>
