<h4>1- Quelles sont les différences entre le langage orienté objet et le style procédural ? Donnez les avantages et les inconvénients de chacun d'entre d'eux.</h4>
<ul>
    <li>En procédural, le programme est centré sur le traitement. Les instructions sont pensées de façon linéaire, et via des procédures et fonctions.</li>
    <li>En POO (programmation orientée objet), le programme est centré sur les objets. On cherche à modéliser des concepts et à centraliser tout ce qui s'y rapporte dans une classe.</li>
</ul>
<h4>2- Comment déclare-t-on et instancie-t-on un objet en PHP ?</h4>
$objet = new Objet();

<h4>3- A quoi sert un constructeur ?</h4>
Le constructeur est automatiquement appelé par un objet au moment de son instanciation. Il permet par exemple d'iniatialiser des valeurs pour les propriétés de cet objet.

<h4>4- Quelles sont les rôles des accesseurs / mutateurs ?</h4>
Les getters/setters sont les méthodes qui permettent d'obtenir ou de modifier les valeurs des propriétés d'un objet. Avec le principe d'encapsulation, cela permet de garantir l'intégrité des données, en centralisant à un seul endroit l'accès ou la modification de ces données.

<h4>5- Quelles sont les différences entre des propriétés/méthodes privées et publiques ?</h4>
Privé : accessible uniquement au sein de la classe elle-même.
Public : accessible partout, également en dehors de la classe.

<h4>6- Qu'est-ce que l'héritage ? Quel est le mot-clé utilisé en PHP pour l'héritage ?</h4>
L'héritage permet un objet enfant (qui hérite), d'obtenir toutes les propriétés et méthodes de son parent, sans avoir à les définir.
En PHP, l'héritage est fait avec le mot clé <b>extends</b>

<h4>7- Qu'est-ce qu'une interface ? Avec quel mot-clé une classe PHP peut-elle implémenter une interface ?</h4>
Une interface permet de créer un modèle (propriétés et méthodes), que devra posséder toute classe qui implémente cette interface. Le corps des méthodes n'est pas écrit dans les interface, mais dans les classes qui l'implémente.
Les interfaces sont donc souvent créees en amont du développement, afin de définir ce dont nous avons besoin.

<h4>8- Qu'est-ce qu'une classe abstraite ?</h4>
Une classe abstraite est une classe que l'on ne peut pas instancier. Elle sert donc uniquement à être héritée.
Elles peuvent définir le corps de certaines méthodes, ou alors avoir des méthodes abstraites, dont le corps devra obligatoirement être défini par les classes qui hériteront de cette classe abstraite.

<h4>9- Qu'est-ce qu'une méthode magique en PHP ? Donnez quelques exemples et expliquez leur utilité.</h4>
Une méthode abstraite est une méthode qui est appelée automatiquement par un objet, en fonction d'un événement précis, par exemple :
<ul>
    <li>__construct : c'est le constructeur d'un objet, automatiquement appelé lors de l'instanciation</li>
    <li>__toString : méthode appelée lorsque un objet doit être converti en chaine de caractères (pour l'afficher par exemple, il faut bien choisir quelle propriété de l'objet on souhaite afficher)</li>
</ul>

<h4>10- Quel opérateur en PHP permet de savoir si une variable objet est bien une instance d'une classe en particulier ?</h4>
<b>instanceof</b><br>
if ($stagiaire instanceof Stagiaire) echo { "C'est un stagiaire"; }

<h4>11- Ecrivez une classe PHP qui modélise un stagiaire : id, created_at, name, phone, birthday. Cette classe doit contenir les propriétés, le constructeur et les getters/setters correspondants.</h4>
Voir le fichier Stagiaire.php dans ce dossier.

<h4>12- Utilisez cette classe dans un script PHP, en l'important grâce à un autoload PHP. Instancier un stagiaire et donner une valeur à chacune de ses propriétés.</h4>
Voir le code de ce fichier.<br><br>
<?php

// question 12
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$stagiaire = new Stagiaire(1, new DateTime(), "Toto", "0320203030", new DateTime("1990-01-01"));

echo "Nom du stagiaire : ".$stagiaire->getName();