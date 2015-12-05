<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Documentation class de validation</title>
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
            <h1>Documentation class de validation</h1>
            <h2 id="sommaire">Sommaire</h2>
            <ul>
                <li><a href="#a">Implémentation et appel des fonctions de la class</a></li>
                <li>
                    <a href="#b">Les différents types de validation</a>
                    <ul>
                        <li><a href="#c">Validation d'une adresse e-mail</a></li>
                        <li><a href="#d">Validation d'une url</a></li>
                        <li><a href="#e">Validation d'un nombre entier</a></li>
                        <li><a href="#f">Validation d'un nombre à virgule</a></li>
                        <li><a href="#g">Validation d'une chaîne de caractère</a></li>
                        <li><a href="#h">Validation d'un booléen</a></li>
                        <li><a href="#i">Validation d'un chiffre</a></li>
                        <li><a href="#j">Validation d'une valeur contenue dans un array</a></li>
                        <li><a href="#k">Validation date/heure</a></li>                        
                    </ul>
                </li>
            </ul>
            <h2 id="a">Implémentation et appel des fonctions de la class.</h2>
            <p>Fonctionne comme suis :</p>
            <pre>
        <code>
/** include du fichier de validation */
include "Validation.class.php";
/** instance de la class, la variable peut-être appelé de la façon que vous voulez */
$truc = new Validation;
/** Ajoute les valeurs à valider sous forme de tableau (exemple un $_POST) */
$truc->ajoutSource(tableau);
/** Ajoute une règle de validation */
$truc->AjoutRegle('nom de la variable',array('type'=>'type de validation', option....));
/** Ajoute une autre règle de validation */
$truc->AjoutRegle('nom de la variable B',array('type'=>'type de validation', option....));
/** Lance la validation */
$truc->valide();
        </code>
            </pre>
            <p>La fonction valide retourne les informations suivantes :</p>
            <p>Dans le tableau nettoyer, les valeurs validées.</p>
            <pre>
        <code>
echo '&lt;pre&gt;';
var_dump($truc->nettoyer);
echo '&lt;/pre&gt;';
        </code>
            </pre>
            <p>Dans le tableau erreurs, les valeurs erronées.</p>
            <pre>
            <code>
echo '&lt;pre&gt;';
var_dump($truc->erreurs);
echo '&lt;/pre&gt;';
            </code>
            </pre>
            <p>Dans le tableau omis, les valeurs non-obligatoire et non-présente dans les valeurs à valider</p>
            <pre>
            <code>
echo '&lt;pre&gt;';
var_dump($truc->omis);
echo '&lt;/pre&gt;';
            </code>
            </pre>
            <p><a href="#sommaire">Sommaire</a></p>
            <h2 id="b">Les différents types de validation</h2>
            <h3 id="c">Validation d'une adresse e-mail</h3>
            <p>Valide si la variable correspond à un paterne e-mail.</p>
            <p>Ne vérifie pas si l'adresse existe réellement.</p>
            <p>Appel:</p>
            <pre>
            <code>
$truc->AjoutRegle('NomDeLaVariable', array(
    'type' => 'email',
    'requis' => true,
    'trim' => true
        )
);
            </code>
            </pre>
            <ul>
                <li>NomDeLaVariable => nom de la variable</li>
                <li>type => email, obligatoire</li>
                <li>requis => true ou false, non obligatoire, par default false</li>
                <li>trim => true ou false, non-obligatoire mais recommandé, enlève les espaces en début et fin de variable</li>
            </ul>
            <p><a href="email.php">Exemple</a></p>
            <p><a href="#sommaire">Sommaire</a></p>
            <h3 id="d">Validation d'une url</h3>
            <p>Valide si la variable correspond à un paterne url.</p>
            <p>Appel:</p>
            <pre>
            <code>
$truc->AjoutRegle('NomDeLaVariable', array(
    'type' => 'url',
    'requis' => true,
    'trim' => true
        )
);
            </code>
            </pre>
            <ul>
                <li>NomDeLaVariable => nom de la variable</li>
                <li>type => url, obligatoire</li>
                <li>requis => true ou false, non obligatoire, par default false</li>
                <li>trim => true ou false, non-obligatoire mais recommandé, enlève les espaces en début et fin de variable</li>
            </ul>
            <p><a href="url.php">Exemple</a></p>
            <p><a href="#sommaire">Sommaire</a></p>
            <h3 id="e">Validation d'un nombre entier</h3>
            <p>Valide si la variable est un nombre entier.</p>
            <p>Appel:</p>
            <pre>
            <code>
$truc->AjoutRegle('NomDeLaVariable', array(
    'type' => 'numeric',
    'requis' => true,
    'min' => 1,
    'max' => 100,
    'trim' => true
        )
);
            </code>
            </pre>
            <ul>
                <li>NomDeLaVariable => nom de la variable</li>
                <li>type => numeric, obligatoire</li>
                <li>requis => true ou false, non obligatoire, par default false</li>
                <li>min => valeur minimum de la variable, non obligatoire</li>
                <li>max => valeur maximum de la variable, non obligatoire</li>
                <li>trim => true ou false, non-obligatoire mais recommandé, enlève les espaces en début et fin de variable</li>
            </ul>
            <p><a href="entier.php">Exemple</a></p>
            <p><a href="#sommaire">Sommaire</a></p>
            <h3 id="f">Validation d'un nombre à virgule</h3>
            <p>Valide si la variable est un nombre à virgule.</p>
            <p>Appel:</p>
            <pre>
            <code>
$truc->AjoutRegle('NomDeLaVariable', array(
    'type' => 'float',
    'requis' => true,
    'min' => 1,
    'max' => 100,
    'separateur' => '.',
    'trim' => true
        )
);
            </code>
            </pre>
            <ul>
                <li>NomDeLaVariable => nom de la variable</li>
                <li>type => float, obligatoire</li>
                <li>requis => true ou false, non obligatoire, par default false</li>
                <li>min => valeur minimum de la variable, non-obligatoire</li>
                <li>max => valeur maximum de la variable, non-obligatoire</li>
                <li>separateur => format de la virgule, soit ,(virgule) soit .(point), par defaut .(point), non obligatoire, si non specifier, la virgule est convertie en point si presente.</li>
                <li>trim => true ou false, non-obligatoire mais recommandé, enlève les espaces en début et fin de variable</li>
            </ul>
            <p><a href="virgule.php">Exemple</a></p>
            <p><a href="#sommaire">Sommaire</a></p>
            <h3 id="g">Validation d'une chaîne de caractère</h3>
            <p>Valide si la variable est une chaîne de caractère et la filtre.</p>
            <p>Appel:</p>
            <pre>
            <code>
$truc->AjoutRegle('NomDeLaVariable', array(
    'type' => 'string',
    'requis' => true,
    'min' => 1,
    'max' => 100,
    'filtre' => 'simple',
    'trim' => true
        )
);
            </code>
            </pre>
            <ul>
                <li>NomDeLaVariable => nom de la variable</li>
                <li>type => string, obligatoire</li>
                <li>requis => true ou false, non obligatoire, par default false</li>
                <li>min => Longueur minimum de la variable, texte uniquement, non-obligatoire</li>
                <li>max => Longueur maximum de la variable, texte uniquement, non-obligatoire</li>
                <li>filtre => par defaut : simple. 
                    <ul>
                        <li>simple => filtre en enlevant tout le code html</li>
                        <li>nom => netoyage pour un formatage Xxxxx</li>
                        <li>SdL => filtre en enlevant tout le code html sauf les saut de ligne</li>
                        <li>Html => laisse le code html</li>
                        <li>url => format la chaine pour être compatible dans une url</li>
                        <li>min => formate la chaine tout en minuscule</li>
                        <li>maj => formate la chaine tout en majuscule</li>
                    </ul>
                </li>
                <li>trim => true ou false, non-obligatoire mais recommandé, enlève les espaces en début et fin de variable</li>
            </ul>
            <p><a href="chaine.php">Exemple</a></p>
            <p><a href="#sommaire">Sommaire</a></p>
            <h3 id="h">Validation d'un booléen</h3>
            <p>Valide si la variable est une booléen.</p>
            <p>Soit les valeurs 1, true, on, yes, 0, false, off, no.</p>
            <p>Appel:</p>
            <pre>
            <code>
$truc->AjoutRegle('NomDeLaVariable', array(
    'type' => 'bool',
    'requis' => true,
    'trim' => true
        )
);
            </code>
            </pre>
            <ul>
                <li>NomDeLaVariable => nom de la variable</li>
                <li>type => bool, obligatoire</li>
                <li>requis => true ou false, non obligatoire, par default false</li>
                <li>trim => true ou false, non-obligatoire mais recommandé, enlève les espaces en début et fin de variable</li>
            </ul>
            <p><a href="booleen.php">Exemple</a></p>
            <p><a href="#sommaire">Sommaire</a></p>
            <h3 id="i">Validation d'un chiffre</h3>
            <p>Récupère uniquement les chiffres d'une chaîne de caractère.</p>
            <p>Appel:</p>
            <pre>
            <code>
$truc->AjoutRegle('NomDeLaVariable', array(
    'type' => 'chiffre',
    'requis' => true,
    'min' => 0,
    'max' => 100,
    'trim' => true
        )
);
            </code>
            </pre>
            <ul>
                <li>NomDeLaVariable => nom de la variable</li>
                <li>type => chiffre, obligatoire</li>                
                <li>requis => true ou false, non obligatoire, par default false</li>
                <li>min => Longueur minimum de la chaîne récupérée, sans espace, chiffre uniquement, non-obligatoire</li>
                <li>max => Longueur maximum de la chaîne récupérée, sans espace, chiffre uniquement, non-obligatoire</li>
                <li>trim => true ou false, non-obligatoire mais recommandé, enlève les espaces en début et fin de variable</li>
            </ul>
            <p><a href="chiffre.php">Exemple</a></p>
            <p><a href="#sommaire">Sommaire</a></p>
            <h3 id="j">Validation d'une valeur contenue dans un array</h3>
            <p>Valide si cette valeur est presente dans l'array.</p>
            <p>Appel:</p>
            <pre>
            <code>
$truc->AjoutRegle('NomDeLaVariable',array(
    'type' => 'array',
    'requis' => true,
    'tableau' => array(1,2,3,"toto"),
    'trim' => true
    )
);
            </code>
            </pre>
            <ul>
                <li>NomDeLaVariable => nom de la variable</li>
                <li>type => array, obligatoire</li>                
                <li>requis => true ou false, non obligatoire, par default false</li>
                <li>tableau => array avec les valeurs de référence, obligatoire</li>
                <li>trim => true ou false, non-obligatoire mais recommandé, enlève les espaces en début et fin de variable</li>
            </ul>
            <p><a href="array.php">Exemple</a></p>
            <p><a href="#sommaire">Sommaire</a></p>
            <h3 id="k">Validation date/heure</h3>
            <p>Valide si la variable est une date, une heure ou un mix valide.</p>
            <p>Appel:</p>
            <pre>
            <code>
$truc->AjoutRegle('NomDeLaVariable', array(
    'type' => 'validedate',
    'requis' => true,
    'formatEntrer' => 'd/m/Y H:i:s',
    'formatSortie' => 'Y-m-d H:i:s',
    'min' => '01/01/2013 12:00:00',
    'max' => '01/01/2020 23:00:00',
    'trim' => true
        )
);
            </code>
            </pre>
            <ul>
                <li>NomDeLaVariable => nom de la variable</li>
                <li>type => validedate, obligatoire</li>                
                <li>requis => true ou false, non obligatoire, par default false</li>
                <li>formatEntrer => obligatoire => le format d'entrer de la date, selon la spécification <a target="_new" href="http://php.net/manual/fr/datetime.createfromformat.php">http://php.net/manual/fr/datetime.createfromformat.php</a></li>
                <li>formatSortie => non-obligatoire, par défaut formatEntrer  => le format de sortie de la date, selon la spécification <a target="_new" href="http://php.net/manual/fr/datetime.createfromformat.php">http://php.net/manual/fr/datetime.createfromformat.php</a></li>
                <li>trim => true ou false, non-obligatoire mais recommandé, enlève les espaces en début et fin de variable</li>
            </ul>
            <p><a href="date.php">Exemple</a></p>
            <p><a href="#sommaire">Sommaire</a></p>
        </div>
    </body>
</html>