<!-- Titre de la page -->
<?php $this->titre = "Accueil"; ?>

<?php if (empty($_SESSION['mail'])): ?>
  la varialble session est vide
<?php else: ?>
  la variable session est set
<?php endif; ?>

<ul>
    <li>Accueil</li>
    <li><a href="index.php?page=connexion">Connexion</a></li>
    <li>S'enregistrer</li>
    <li>A Propos</li>
</ul>

    <table border="1" width="100%">
        <tr>
            <td><h1>Découvrez nos tout nouveaux produits</h1>
                <img class="pub" src="public/Capteur_infrarouge.png">
                <p><a href="https://www.generationrobots.com/fr/400833-capteur-de-distance-infrarouge.html">En savoir plus</a></p>
            </td>
        </tr>
        <tr>
            <td>Ligne 2, colonne 1</td>
        </tr>
    </table>
