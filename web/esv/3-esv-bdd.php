<h4>1- A quoi sert MySQL ?</h4>
MySQL est un SGBD : système de gestion de base données.
C'est un serveur sur lequel on peut avoir différentes bases de données. Le serveur reçoit les requêtes en provenance d'un langage (comme PHP ou Java), les exécute puis renvoie les résultats.


<h4>2- Quelle est la différence entre une base de donnée, des cookies et des variables de session ? Précisez à quel moment chacune de ces données sont supprimées.</h4>
<ul>
    <li>Une base de données permet d'enregistrer des données sans durée déterminée : la persistance. Une fois que l'on quitte le site ou l'application, les données se sont pas perdues et peuvent être récupérées par le programme plus tard.</li>
    <li>Les cookies sont stockées dans le navigateur. On peut y enregistrer des données qui peut être récupérées de page en page, mais elles ont une durée de vie déterminée : un cookie expire à une date et heure précises. Le navigateur peut accéder directement aux données (et donc les modifier par exemple).</li>
    <li>Les variables de session permettent d'enregistrer des données pour y avoir accès de page en page. Tout comme  les cooies, elles ont une durée de vie déterminée : environ 20 minutes après quitté le navigateur, après une durée déterminée par le serveur. La différence avec les cookies, c'est que les données sont stockés sur le serveur, et donc le navigateur n'y a pas accès directement.</li>
    <li>Les cookies prennent donc de la place sur le poste client, alors que les variables de session prennent de la place sur le serveur.</li>
</ul>

<h4>3- Concevez une base de données "esv_m2i" via phpmyadmin en créant une table stagiaire, qui contient 5 colonnes en faisant le meilleur choix pour le type : id, created_at, name, phone, birthday</h4>

CREATE TABLE IF NOT EXISTS `stagiaire` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`created_at` datetime NOT NULL,
`name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
`phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
`birthday` date NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<h4>4- Ecrivez un script PHP qui se connecte à cette  base de données "esv_m2i", grâce à PDO.</h4>

<h4>5- Ecrivez le script PHP, qui une fois connecté à cette base, récupère tous les enregistrements de la table stagiaire et dans les affiche dans la page. Affichez l'ensemble des informations de chaque stagiaire séparées par des tirets, avec un retour à la ligne entre chaque stagiaire. Pour tester ce script, vous pouvez ajouter manuellement des enregistrements grâce à phpmyadmin.</h4>

<?php
    // question 4 : connexion
    try {
        $user = "root";
        $pass = "";
        $pdo = new PDO('mysql:host=localhost;dbname=esv_m2i', $user, $pass);

    } catch (PDOException $e) {
        print "Erreur : " . $e->getMessage() . "<br/>";
        exit;
    }

    // question 5 : requête
    $statement = $pdo->prepare('SELECT * FROM stagiaire');
    $statement->execute();
    $stagiaires = $statement->fetchAll();

    // question 5 : affichage
    foreach ($stagiaires as $stagiaire) {
        echo  "
                <ul>
                    <li>Utilisateur ID : ".$stagiaire['id']."</li>
                    <li>".$stagiaire['created_at']."</li>
                    <li>".$stagiaire['name']."</li>
                    <li>".$stagiaire['phone']."</li>
                    <li>".$stagiaire['birthday']."</li>
                </ul>";
    }

?>