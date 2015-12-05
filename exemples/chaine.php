<?php
require_once '../src/Validation.class.php';
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Documentation class de validation : Validation d'une chaîne de caractère</title>
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
            <h1>Exemple : Validation d'une chaîne de caractère</h1>
            <h2>Formulaire</h2>
            <form action="#" method="post">
                <label for="inputa">Chaine simple de 1 à 5 caractères, obligatoire : </label> <input id="inputa" type="text" name="variable_obligatoire">
                <br>
                <label for="inputb">Chaine simple de 1 à 20 caractères convetie en format nom, non-obligatoire : </label> <input id="inputb" type="text" name="variable_nom">
                <br>
                <label for="inputc">Texte de 1 à 50 caractères avec ou sans saut de ligne filtre les balises mais laisse les sauts de lignes, non-obligatoire : </label>
                <br>
                <textarea id="inputc" name="variable_br"></textarea>
                <br>
                <label for="inputd">Texte de 1 à 50 caractères avec ou sans saut de ligne laisse passer les balises ou le code, non-obligatoire : </label>
                <br>
                <textarea id="inputd" name="variable_html"></textarea>
                <br>
                <label for="inpute">Chaine simple de 1 à 20 caractères convertie en texte compatible avec une url, obligatoire : </label> <input id="inpute" type="text" name="variable_url">
                <br>
                <label for="inputf">Chaine simple de 1 à 20 caractères convertie en minuscule, obligatoire : </label> <input id="inputf" type="text" name="variable_min">
                <br>
                <label for="inputg">Chaine simple de 1 à 20 caractères convertie en majuscule, obligatoire : </label> <input id="inputg" type="text" name="variable_maj">
                <br><br>
                <input type="submit" value="Submit">
            </form>

            <?php
            if (isset($_POST) && !empty($_POST)) {
                $validation = new Validation;
                $validation->ajoutSource($_POST);
                /** la variable suivante est obligatoire, filtre simple */
                $validation->AjoutRegle('variable_obligatoire', array(
                    'type' => 'string',
                    'min' => 1,
                    'max' => 5,
                    'requis' => true,
                    'trim' => true
                        )
                );
                /** la variable suivante est convertie en nom, mais peux être vide */
                $validation->AjoutRegle('variable_nom', array(
                    'type' => 'string',
                    'min' => 1,
                    'max' => 20,
                    'requis' => false,
                    'filtre' => 'nom',
                    'trim' => true
                        )
                );
                /** la variable suivante vire les codes mais laisse les sauts de ligne, mais peux être vide */
                $validation->AjoutRegle('variable_br', array(
                    'type' => 'string',
                    'min' => 1,
                    'max' => 50,
                    'requis' => false,
                    'filtre' => 'SdL',
                    'trim' => true
                        )
                );
                /** la variable suivante laisse tout, mais peux être vide, gaffe à la sécurité de votre site!!!! */
                $validation->AjoutRegle('variable_html', array(
                    'type' => 'string',
                    'min' => 1,
                    'max' => 50,
                    'requis' => false,
                    'filtre' => 'Html',
                    'trim' => true
                        )
                );
                /** la variable suivante est convertie en url, mais peux être vide */
                $validation->AjoutRegle('variable_url', array(
                    'type' => 'string',
                    'min' => 1,
                    'max' => 20,
                    'requis' => false,
                    'filtre' => 'url',
                    'trim' => true
                        )
                );
                /** la variable suivante est convertie en minuscule, mais peux être vide */
                $validation->AjoutRegle('variable_min', array(
                    'type' => 'string',
                    'min' => 1,
                    'max' => 20,
                    'requis' => false,
                    'filtre' => 'min',
                    'trim' => true
                        )
                );
                /** la variable suivante est convertie en majuscule, mais peux être vide */
                $validation->AjoutRegle('variable_maj', array(
                    'type' => 'string',
                    'min' => 1,
                    'max' => 20,
                    'requis' => false,
                    'filtre' => 'maj',
                    'trim' => true
                        )
                );
                /** la variable suivante est obligatoirement un numeric, mais peux être vide et n'existe pas */
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
