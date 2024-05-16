<!--affichage!-->
<?php
            // Inclure le contenu de liste_cours.php
            require_once 'liste_cours.php';
            
            // Appeler la méthode listeCours() pour récupérer la liste des cours
            $listeCours = $coursC->listeCours();

            // Afficher chaque cours dans le tableau
            foreach ($listeCours as $cours) {
                echo "<tr>";
                echo "<td>" . $cours->getTitre() . "</td>";
                echo "<td>" . $cours->getDescription() . "</td>";
                // Ajoutez d'autres cellules pour les autres propriétés du cours
                echo "</tr>";
            }
?>

