<h4>1- Quel est la différence entre un langage de programmation et un langage de description ? Citez un exemple pour chacun d'entre d'eux.</h4>
<ul>
    <li>Un langage de programmation, comme PHP, permet de coder un algorithme. Ce sont des suites d'instructions permettant de réaliser des actions.</li>
    <li>A la différence d'un langage de description comme HTML, qui permet de structurer et de décrire une page web, sans réaliser d'instruction.</li>
</ul>

<h4>2- PHP s'exécute côté serveur, qu'est-ce que cela veut dire ? Décrivez comment se déroule une communication entre un navigateur et ces éléments côté serveur : php, apache, mysql.</h4>
PHP est exécuté côté serveur, c'est-à-dire qu'exécute sur un serveur qui répond à une demande client. Son code source n'est donc pas accessible.<br>
Déroulement :
    <ul>
        <li>Le navigateur envoie une requête HTTP vers un serveur (grâce à un nom de domaine ou une IP)</li>
        <li>Le serveur Apache reçoie la demande, puis vérifie si la requête correspond à une page existante.</li>
        <li>Le code de la page étant en PHP, Apache demande à PHP d'exécuter les instructions codées dans cette page.</li>
        <li>Si jamais il y a une requête SQL, PHP l'envoie au serveur MySQL, qui l'exécute, puis renvoie des données à PHP</li>
        <li>PHP termine les instructions, puis renvoie des données (HTML, texte, etc.) à Apache</li>
        <li>Apache renvoie au client (navigateur) la réponse finale ainsi générée</li>
    </ul>

<h4>3- Citez un langage de programmation qui s'exécute coté client.</h4>
Javascript s'exécute côté client, dans le navigateur. Il est donc exécuté sans faire d'appel à un serveur. Le code source est accessible depuis le navigateur.

<h4>4- Citez quelques types primitifs de variable. Est-il possible en PHP de comparer des variables de type primitif différent ? Si oui, que se passe-t-il si par exemple on compare une chaine avec un entier ?</h4>
<ul>
    <li>Chaine de caractères</li>
    <li>Entier</li>
    <li>Booléen</li>
</ul>
Oui il est possible de comparer des variables de différents types. Si vous demandez à PHP de comparer une chaine avec un entier, alors PHP va comparer la valeur numérique de la chaine, avec l'entier.
C'est-à-dire que si on compare la chaine "155" avec l'entier 10, la valeur numérique de la chaine "155" est 155.

<h4>5- Comment peut-on parcourir en PHP une variable de type tableau (array) ?</h4>
On peut la parcourir grâce à une boucle (structure itérative) : for, foreach, while.

<h4>6- Quels sont les opérateurs PHP de comparaison stricte ? Ecrivez une ligne de code qui compare strictement deux variables php.</h4>
Les opérateurs sont :
    <ul>
        <li>Strictiment équivalent : ===</li>
        <li>Strictiment différent : !==</li>
        <li>Exemple : if ("5" === 5) { echo 'La chaine "5" est strictement équivalent à l'entier 5, que ce soit la valeur ou le type : ce qui est faux.'; }</li>
    </ul>
<h4>7- Ecrivez un script PHP :</h4>
    <h5>- Codez une fonction multiplication() avec deux paramètres, qui réalise la multiplication de ces paramètres puis renvoie le résultat</h5>
    <h5>- Utilisez cette fonction dans le script puis affichez l'opération elle-même ainsi que son résultat.</h5>

<?php

/* la fonction */
function multiplication ($chiffre1, $chiffre2) {
    $resultat = $chiffre1 * $chiffre2;

    return $resultat;
}

/* le script */
$premierChiffre = 15;
$deuxiemeChiffre = 20;
$resultatCalcul = multiplication($premierChiffre, $deuxiemeChiffre);
echo "Le résultat de ".$premierChiffre." * ".$deuxiemeChiffre." est égal à ".$resultatCalcul;
echo "<br>";
echo "(Voir le code source dans le fichier php)";
