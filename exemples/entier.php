<?php
require_once '../src/Validation.class.php';
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Documentation class de validation : Validation d'un nombre entier</title>
        <link rel="stylesheet" href="knacss.css">
        <style>
            #content{
                width: 800px;
                margin-left: auto;
                margin-right: auto;
                margin-top: 10px;
                margin-bottom: 10px;
            }
            pre{
                background-color: #f7f7f7;
                padding: 16px;
                border-radius: 3px;
            }
        </style>
    </head>
    <body>
        <div id="content">
            <h1>Exemple : Validation d'un nombre entier</h1>
            <h2>Formulaire</h2>
            <form action="#" method="post">
                <label for="inputa">Nombre entier de 1 à 100 obligatoire : </label> <input id="inputa" type="text" name="variable_obligatoire">
                <br>
                <label for="inputb">Nombre entier de 0 à 25 non-obligatoire : </label> <input id="inputb" type="text" name="variable_non_obligatoire">
                <br><br>
                <input type="submit" value="Submit">
            </form>

            <?php
            if (isset($_POST) && !empty($_POST)) {
                $validation = new Validation;
                $validation->ajoutSource($_POST);
                /** la variable suivante est obligatoirement un nombre entier de 1 à 100 */
                $validation->AjoutRegle('variable_obligatoire', array(
                    'type' => 'numeric',
                    'min' => 1,
                    'max' => 100,
                    'requis' => true,
                    'trim' => true
                        )
                );
                /** la variable suivante est obligatoirement un nombre entier de 0 à 25, mais peux être vide */
                $validation->AjoutRegle('variable_non_obligatoire', array(
                    'type' => 'numeric',
                    'min' => 0,
                    'max' => 25,
                    'requis' => false,
                    'trim' => true
                        )
                );
                /** la variable suivante est obligatoirement un nombre entier, mais peux être vide et n'existe pas */
                $validation->AjoutRegle('rien', array(
                    'type' => 'numeric',
                    'requis' => false,
                    'trim' => true
                        )
                );
                $validation->valide();
                echo "<h2>Résultat :</h2>";
                echo "<p>Les valeurs valides :</p>";
                echo '<pre>';
                var_dump($validation->nettoyer);
                echo '</pre>';
                echo "<p>Les valeurs non valides :</p>";
                echo '<pre>';
                var_dump($validation->erreurs);
                echo '</pre>';
                echo "<p>Les valeurs omises :</p>";
                echo '<pre>';
                var_dump($validation->omis);
                echo '</pre>';
            }
            ?>
            <p><a href="index.php">Retour</a></p>
        </div>
    </body>
</html>
