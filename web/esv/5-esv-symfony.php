<h4>1- Qu'est-ce qu'un Framework . Donnez différents avantages et inconvénients.</h4>
Un framework (littéralement "cadre de travail") est ce qu'on peut appelé une boite à outils. Il est basé sur un langage, et apporte des outils avancés et éprouvés qui permettent de développer plus rapidement et efficacement sans réinventer la roue, et en suivant une architecture définie.
Les avantages sont donc :
<ul>
    <li>Gain de temps et d'efficacité</li>
    <li>Documentation en ligne</li>
    <li>En connaissant un framework, on peut reprendre facilement le code de quelqu'un d'autre développé avec ce frameworl</li>
    <li>Un code qui évolue</li>
</ul>
Inconvénients:
<ul>
    <li>Courbe d'apprentissage plus longue.</li>
    <li>Peut être lourd pour des applications qui doivent être ultra-réactives, car on charge des choses pas forcément nécessaires.</li>
</ul>

<h4>2- Qu'est qu'un ORM et à quoi cela sert-il ? Quel est l'ORM par défaut utilisé avec symfony ?</h4>
Un ORM est une couche d'abstraction de la base de données. C'est un système qui permet, entre autres, d'éviter d'avoir à se préoccuper des requêtes SQL.
Grâce à un mapping objet/base de données, on peut travailler exclusivement en objet.

<h4>3- A quoi sert Composer et que permet-il d'éviter ?</h4>
Composer est un gestionnaire de dépendance. Il permet grâce à une description des dépendances qu'à un projet avec des bibliothéques externes, d'installer ces dernières automatiquement.
Il permet d'éviter des incompatibilités entre différentes bibliothèques, à cause de leur version : avant de pouvoir les installer il faudra choisir des bibliothèques compatibles.

<h4>4- Qu'est-ce que le service routing ? Décrivez comment symfony attrape une route, puis ce qu'il se passe ensuite jusqu'à la réponse au navigateur. Décrivez ce qu'il se passe au niveau d'apache et de php.</h4>
Le service routing est ce qui gère la correspondance route/controller dans symfony.
Lors d'une requête HTTP, apache réceptionne la demande. C'est un site sous symfony qui est demandé, donc PHP va charger symfony.
Lors du chargement du noyau de symfony, un objet Request est créé. Il contient l'url demandée par le navigateur. Le service routing va donc chercher une correspondance entre cette URL et un controller.
Si un controller matche, son code va être exécuté. Un objet Response sera retourné au controller frontal, pour renvoyer une réponse à Apache puis au navigateur.

<h4>5- Créer un projet symfony 3.4. Vous pouvez récupérer celui que j'ai mis en ligne : git clone https://bitbucket.org/fsanter/esv_symfony.git</h4>

<h4>6- Installer ensuite les vendors, qui ne sont pas versionnés : composer update</h4>

<h4>7- Connectez cette application à la base de donnée de l'exercice PHP BDD : configurez le fichier parameter.yml.</h4>
Configurez votre fichier <b>app/config/parameters.yml</b>

<h4>8- Modélisez à nouveau la classe stagiaire des exercices précédents, cette fois-ci en passant par la ligne de commande : php bin/console doctrine:generate:entity</h4>
Voir le fichier : <b>src/AppBundle/Entity/Stagiaire.php</b>

<h4>9- Modélisez une autre classe "Competence", et la lier à la classe stagiaire en tenant compte de ceci : un stagiaire peut avoir plusieurs compétences, et une compétence peut être liée à plusieurs stagiaires.</h4>
Voir le fichier <b>src/AppBundle/Entity/Competence.php</b><br>

Créer la relation manyToMany (voir les deux fichiers), puis lancer la commande pour générer les getters/setters de cette relation : php bin/console doctrine:generate:entities AppBundle<br>
Puis mettre à jour la structure de la BDD : <b>php bin/console doctrine:schema:update --force</b><br>

<h4>10- Créez le formulaire qui permet d'ajouter dans la base une compétence :</h4>
php bin/console doctrine:generate:form AppBundle:Competence<br>
Voir le <b>fichier src/AppBundle/Form/CompetenceType.php</b><br>
Retirer le champ "stagiaires" du formulaire, car en créant une compétence on ne va pas lui associer des stagiaires. On le fera dans l'autre sens : en ajoutant un stagiaire, on lui associera des compétences.
<br>
Voir le template associé : <b>app/Resources/views/app/form_competence.html.twig</b>

<h4>11- Créez également un formulaire qui permet d'ajouter dans la base un stagiaire. Ce formulaire doit proposer de lier des compétences à ce stagiaire.</h4>
php bin/console doctrine:generate:form AppBundle:Stagiaire<br>
Voir le fichier <b>src/AppBundle/Form/StagiaireType.php</b><br>
Retirer le champ "createdAt" du formulaire, car ce n'est pas l'utilisateur qui va saisir la date de création d'un stagiaire : on va laisser PHP le faire automatiquement,
en initialisant cette valeur dans le constructeur de Stagiaire : voir le constructeur dans le fichier <b>src/AppBundle/Entity/Stagiaire.php</b> ligne 58
<br>
Voir le template associé : <b>app/Resources/views/app/form_competence.html.twig</b>

<h4>12- Créez les pages web (route, controller, template) qui affichent ces formulaires.</h4>
Voir le controller <b>src/AppBundle/Controller/AppController.php</b><br>
Les deux templates se trouvent dans <b>app/Resources/view/app/</b>

<h4>13- Gérez les validations grâce aux annotations (Assert) en forçant tous les champs à être obligatoires, le téléphone à 10 chiffres.</h4>
Voir les annotations @Assert dans le controller <b>src/AppBundle/Entity/Stagiaire</b><br>
Des Assert ont été mis sur chaque propriété (sauf ID), et le téléphone en a deux : NotBlank et Regex pour forcer le format 10 chiffres.

<h4>14- Sécurisez ces pages formulaires en ne les rendant accessibles qu’aux utilisateurs qui ont le rôle ROLE_ADMIN (Créer le formulaire d'identification, configurez le fichier security.yml, etc.)</h4>
Voir le fichier <b>app/config/security.yml</b><br>
Voir le template <b>app/Resources/views/app/form_login.html.twig</b>
Voir le controller à partir de la ligne 111 : <b>src/AppBundle/Controller/AppController.php</b>
Un utilisateur est configuré pour accéder aux formulaires : admin passAdmin<br>

<br><br>

Les formulaires sont accessibles aux URLS :<br>
/form/stagiaire<br>
/form/competence<br>
<br>
Si vous n'êtes pas connecté, vous serez automatiquement redirigé vers :<br>
Le formulaire de connexion :<br>
/form/login