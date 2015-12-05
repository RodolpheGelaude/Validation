<?php

/** documentaion de la validation */
/**
 * fonctionne comme suis
 * include "Validation.class.php"; => appel de la class
 * $truc = new Validation; => instancier la class, peux être appeler de la façon que vous voulez
 * $truc->ajoutSource(tableau); => ajoute les valeurs à valider sous forme de tableau (exemple un $_POST)
 * $validate->AjoutRegle('nom de la variable',array('type'=>'type de validation', option....)); => ajoute une regle de validation
 * Note : on peux ajouter un tableau de régle de la façon suivante
 * $tableau_de_validation = array(
 * 'nom de la variable',array('type'=>'type de validation', option....),
 * 'nom de la variable',array('type'=>'type de validation', option....),
 * 'nom de la variable',array('type'=>'type de validation', option....)
 * );
 * $validate->AjoutRegles($tableau_de_validation);
 * 
 * 
 */
/** validation d'une adresse email */
/**
 * 'NomDeLaVariable',array('type'=>'email', 'requis'=>true, 'trim'=>true)
 * NomDeLaVariable => nom de la variable
 * type => email, obligatoire
 * requis => true ou false, non obligatoire, par default false
 * trim => true ou false, non obligatoire mais recommandé, enleve les espace en debut et fin de variable
 */
/** validation d'une url */
/**
 * 'NomDeLaVariable',array('type'=>'url', 'requis'=>true, 'trim'=>true)
 * NomDeLaVariable => nom de la variable
 * type => url, obligatoire
 * requis => true ou false, non obligatoire, par default false
 * trim => true ou false, non obligatoire mais recommandé, enleve les espace en debut et fin de variable
 */
/** validation d'un nombre entier */
/**
 * 'NomDeLaVariable',array('type' => 'numeric', 'requis' => true, 'min' => 1, 'max' => 100, 'trim' => true)
 * NomDeLaVariable => nom de la variable
 * type => numeric, obligatoire
 * requis => true ou false, non obligatoire, par default false
 * min => valeur minimum de la variable, non obligatoire
 * max => valeur maximum de la variable, non obligatoire
 * trim => true ou false, non obligatoire, enleve les espace en debut et fin de variable
 */
/** validation d'un nombre à virgule */
/**
 * 'NomDeLaVariable',array('type' => 'float', 'requis' => true, 'min' => 1, 'max' => 100, 'separateur' => '.', 'trim' => true)
 * NomDeLaVariable => nom de la variable
 * type => float, obligatoire
 * requis => true ou false, non obligatoire, par default false
 * min => valeur minimum de la variable, non obligatoire
 * max => valeur maximum de la variable, non obligatoire
 * separateur => format de la virgule, soit , soit ., par defaut ., non obligatoire, si non specifier, la virgule est convertie en point si presente
 * trim => true ou false, non obligatoire, enleve les espace en debut et fin de variable
 */
/** validation d'une chaine de caractere */
/**
 * 'NomDeLaVariable',array('type' => 'string', 'requis' => true, 'min' => 1, 'max' => 100, 'filtre' => 'simple', 'trim' => true)
 * NomDeLaVariable => nom de la variable
 * type => string, obligatoire
 * requis => true ou false, non obligatoire, par default false
 * min => longueur minimum de la variable, texte uniquement, non obligatoire
 * max => longueur maximum de la variable, texte uniquement, non obligatoire
 * filtre => par defaut : simple. simple => filtre en enlevant tout le code html, nom => netoyage pour un formatage Xxxxx, SdL => filtre en enlevant tout le code html sauf les saut de ligne, Html => laisse le code html, url => format la chaine pour être compatible dans une url, min => formate la chaine tout en minuscule, maj => formate la chaine tout en majuscule.
 * trim => true ou false, non obligatoire, enleve les espace en debut et fin de variable
 */
/** validation d'un booléen */
/**
 * 'NomDeLaVariable',array('type' => 'bool', 'requis' => true, 'trim' => true)
 * NomDeLaVariable => nom de la variable
 * type => bool, obligatoire
 * requis => true ou false, non obligatoire, par default false
 * trim => true ou false, non obligatoire, enleve les espace en debut et fin de variable
 * retourne true ou false
 */
/** validation d'un chiffre (chaine de caractere contenant uniquement des chiffres) */
/**
 * 'NomDeLaVariable',array('type' => 'chiffre', 'requis' => true, 'min' => 0, 'max' => 100, 'trim' => true)
 * NomDeLaVariable => nom de la variable
 * type => chiffre, obligatoire
 * requis => true ou false, non obligatoire, par default false
 * min => longueur minimum de la variable, texte uniquement, non obligatoire
 * max => longueur maximum de la variable, texte uniquement, non obligatoire
 * trim => true ou false, non obligatoire, enleve les espace en debut et fin de variable
 */
/** validation d'une valeur contenus dans un array */
/**
 * 'NomDeLaVariable',array('type' => 'array', 'requis' => true, 'tableau' => array(), 'trim' => true)
 * NomDeLaVariable => nom de la variable
 * type => array, obligatoire
 * requis => true ou false, non obligatoire, par default false
 * tableau => array avec les valeurs valides, obligatoire
 * trim => true ou false, non obligatoire, enleve les espace en debut et fin de variable
 */
/** Validation date/heure */
/**
 * 'NomDeLaVariable',array('type' => 'validedate', 'requis' => true, 'formatEntrer' => 'd/m/Y H:i:s', 'formatSortie' => 'Y-m-d H:i:s', 'min' => '01/01/2013 12:00:00', 'max' => '01/01/2014 23:00:00', 'trim' => true)
 * NomDeLaVariable => nom de la variable
 * type => validedate, obligatoire
 * requis => true ou false, non obligatoire, par default false
 * formatEntrer, obligatoire => le format d'entrer de la date, selon spécification http://php.net/manual/fr/datetime.createfromformat.php
 * formatSortie, non obligatoire => le format de sortie de la date, selon spécification http://php.net/manual/fr/datetime.createfromformat.php
 * min => date minimum, non obligatoire (Même format que formatEntrer)
 * max => date maximum, non obligatoire (Même format que formatEntrer)
 * trim => true ou false, non obligatoire, enleve les espace en debut et fin de variable
 */
/** voir les valeurs filtrés */
/*
 * echo '<pre>';
 * var_dump($truc->nettoyer);
 * echo '</pre>';
 */
/** voir les erreurs */
/*
 * echo '<pre>';
 * var_dump($truc->erreurs);
 * echo '</pre>';
 */

/** class de validation
 * 
 */
class Validation {

    /**
     * @les erreurs array
     */
    public $erreurs = array();

    /**
     * @les régles de validation array
     */
    private $RegleDeValidation = array();

    /**
     * @les valeurs filtrés array
     */
    public $nettoyer = array();

    /**
     * @la source
     */
    private $source = array();

    /**
     * @les variables non declarer et non obligatoire
     */
    public $omis = array();

    /**
     *
     * @le constructeur
     *
     */
    public function __construct() {
        
    }

    /**
     *
     * @add les valeurs de base
     *
     * @access public
     *
     * @param array $source
     *
     */
    public function ajoutSource($source) {
        $this->source = $source;
    }

    /**
     *
     * @add ajoute les regles de validation demander
     *
     * @access public
     *
     * @param array $rules_array le tableau des regles de validation
     *
     */
    public function AjoutRegles(array $rules_array) {
        $this->RegleDeValidation = array_merge($this->RegleDeValidation, $rules_array);
    }

    /**
     *
     * @add ajoute une regle de validation
     *
     * @access public
     *
     * @param string $varname la variable à valider
     *
     * @param array $rules le tableau des régles
     *
     */
    public function AjoutRegle($varname, $rules) {
        $this->RegleDeValidation[$varname] = $rules;
    }

    /**
     *
     * @run validation des valeurs
     *
     * @access public
     *
     */
    public function valide() {
        foreach (new ArrayIterator($this->RegleDeValidation) as $var => $opt) {
            /**
             * la variable est elle obligatoirement déclarer
             * return une erreur si la variable est absente et si requis
             */
            if (array_key_exists('requis', $opt) && $opt['requis'] == true) {
                $this->is_set($var);
            }
            /** si requis n'est pas définis, on le passe a false */
            $opt['requis'] = (!isset($opt['requis'])) ? FALSE : $opt['requis'];
            /** si requis et à false et que la variable n'est pas déclaré */
            if (!isset($this->source[$var]) && $opt['requis'] == false) {
                $this->omis[$var] = "Valeur non présente.";
                //Generique::debug("return true") ;
                //return true;
            }
            /**
             * vire les blanc en debut et en fin de variable si trim est demander
             */
            if (array_key_exists('trim', $opt) && $opt['trim'] == true) {
                if (isset($this->source[$var])) {
                    $this->source[$var] = trim($this->source[$var]);
                }
            }
            /**
             * verification si type est déclaré 
             */
            if (!array_key_exists('type', $opt)) {
                $this->erreurs[$var] = "Aucun type de filtre n'est demandé";
                $opt['type'] = "";
            }
            switch ($opt['type']) {
                case 'email':
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->omis)) {
                        $this->valideEmail($var, $opt['requis']);
                    }
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->omis)) {
                        $this->nettoyerEmail($var);
                    }
                    break;
                case 'url':
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->omis)) {
                        $this->valideUrl($var, $opt['requis']);
                    }
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->omis)) {
                        $this->nettoyerUrl($var);
                    }
                    break;
                case 'numeric':
                    $opt['min'] = (!isset($opt['min'])) ? FALSE : $opt['min'];
                    $opt['max'] = (!isset($opt['max'])) ? FALSE : $opt['max'];
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->omis)) {
                        $this->valideNumeric($var, $opt['min'], $opt['max'], $opt['requis']);
                    }
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->omis)) {
                        $this->nettoyerNumeric($var);
                    }
                    break;
                case 'float':
                    $opt['min'] = (!isset($opt['min'])) ? FALSE : $opt['min'];
                    $opt['max'] = (!isset($opt['max'])) ? FALSE : $opt['max'];
                    $opt['separateur'] = (!isset($opt['separateur'])) ? "." : $opt['separateur'];
                    if (!array_key_exists($var, $this->omis) && $opt['separateur'] == "." && strpos($this->source[$var], ",") != FALSE) {
                        $this->source[$var] = str_replace(",", ".", $this->source[$var]);
                    }
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->omis)) {
                        $this->valideFloat($var, $opt['min'], $opt['max'], $opt['requis'], $opt['separateur']);
                    }
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->omis)) {
                        $this->nettoyerFloat($var, $opt['separateur']);
                    }
                    break;
                case 'string':
                    $opt['min'] = (!isset($opt['min'])) ? FALSE : $opt['min'];
                    $opt['max'] = (!isset($opt['max'])) ? FALSE : $opt['max'];
                    $opt['filtre'] = (!isset($opt['filtre'])) ? "simple" : $opt['filtre'];
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->omis)) {
                        $this->valideString($var, $opt['min'], $opt['max'], $opt['requis']);
                    }
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->omis)) {
                        $this->nettoyerString($var, $opt['filtre']);
                    }
                    break;
                case 'bool':
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->omis)) {
                        $this->valideBool($var, $opt['requis']);
                    }
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->omis)) {
                        $this->nettoyer[$var] = (bool) filter_var($this->source[$var], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
                    }
                    break;
                case 'chiffre':
                    $opt['min'] = (!isset($opt['min'])) ? FALSE : $opt['min'];
                    $opt['max'] = (!isset($opt['max'])) ? FALSE : $opt['max'];
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->omis)) {
                        $this->valideChiffre($var, $opt['min'], $opt['max'], $opt['requis']);
                    }
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->omis)) {
                        $this->nettoyerString($var, "simple");
                    }
                    break;
                case 'array':
                    $opt['tableau'] = (!isset($opt['requis'])) ? array() : $opt['tableau'];
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->omis)) {
                        $this->validearray($var, $opt["tableau"], $opt['requis']);
                    }
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->omis)) {
                        $this->nettoyer[$var] = $this->source[$var];
                    }
                    break;
                case 'validedate':
                    if (!isset($opt['formatEntrer'])) {
                        $this->erreurs[$var] = "Vous n'avez pas spécifier le format de la date (+heure) pour " . $var;
                        break;
                    }
                    $opt['formatSortie'] = (!isset($opt['formatSortie'])) ? $opt['formatEntrer'] : $opt['formatSortie'];
                    $opt['min'] = (!isset($opt['min'])) ? FALSE : $opt['min'];
                    $opt['max'] = (!isset($opt['max'])) ? FALSE : $opt['max'];
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->omis)) {
                        echo ' ici ' . $var;
                        $this->validateDate($var, $opt["requis"], $opt['formatEntrer'], $opt['min'], $opt['max']);
                    }
                    if (!array_key_exists($var, $this->erreurs) && !array_key_exists($var, $this->nettoyer) && !array_key_exists($var, $this->omis)) {
                        echo ' la ' . $var;
                        $this->nettoyervdate($var, $opt['formatEntrer'], $opt['formatSortie']);
                    }
                    break;
                default:
                    if (!array_key_exists($var, $this->erreurs)) {
                        $this->erreurs[$var] = $opt['type'] . " n'est pas un filtre valide";
                    }
            }
        }
    }

    /**
     *
     * @Check si la variable $var est déclarer
     *
     * @access private
     *
     * @param string $var le nom de la variable
     *
     */
    private function is_set($var) {
        if (!isset($this->source[$var])) {
            $this->erreurs[$var] = $var . " n'est pas déclaré";
        }
    }

    /**
     *
     * @validate valide une adresse email
     *
     * @access private
     *
     * @param string $var le nom de la variable
     *
     * @param bool $requis
     *
     */
    private function valideEmail($var, $requis = false) {
        if ($requis == false && strlen($this->source[$var]) == 0) {
            return true;
        }
        if (filter_var($this->source[$var], FILTER_VALIDATE_EMAIL) === FALSE) {
            $this->erreurs[$var] = $var . ' n\'est pas une adresse email';
        }
    }

    /**
     *
     * @santize email
     *
     * @access private
     *
     * @param string $var nom de la variable
     *
     * @return string
     *
     */
    private function nettoyerEmail($var) {
        $email = preg_replace('((?:\n|\r|\t|%0A|%0D|%08|%09)+)i', '', $this->source[$var]);
        $this->nettoyer[$var] = (string) filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    /**
     *
     * @validate une url
     *
     * @access private
     *
     * @param string $var le nom de la variable
     *
     * @param bool $requis
     *
     */
    private function valideUrl($var, $requis = false) {
        if ($requis == false && strlen($this->source[$var]) == 0) {
            return true;
        }
        if (filter_var($this->source[$var], FILTER_VALIDATE_URL) === FALSE) {
            $this->erreurs[$var] = $var . " n'est pas une url";
        }
    }

    /**
     *
     * @sanitize url
     *
     * @access private
     *
     * @param string $var la nom de la variable
     *
     */
    private function nettoyerUrl($var) {
        $this->nettoyer[$var] = (string) filter_var($this->source[$var], FILTER_SANITIZE_URL);
    }

    /**
     *
     * @validate d'un entier
     *
     * @access private
     *
     * @param string $var le nom de la variable
     *
     * @param int $min le nombre minimum
     *
     * @param int $max le nombre maximum
     *
     * @param bool $requis
     *
     */
    private function valideNumeric($var, $min = "", $max = "", $requis = false) {
        if ($requis == false && strlen($this->source[$var]) == 0) {
            return true;
        }
        if (!is_numeric($min) && !is_numeric($max)) {
            if (filter_var($this->source[$var], FILTER_VALIDATE_INT) === FALSE) {
                $this->erreurs[$var] = $var . ' n\'est pas valide';
            }
        } elseif (is_numeric($min) && !is_numeric($max)) {
            if (filter_var($this->source[$var], FILTER_VALIDATE_INT, array("options" => array("min_range" => $min))) === FALSE) {
                $this->erreurs[$var] = $var . ' n\'est pas valide';
            }
        } elseif (!is_numeric($min) && is_numeric($max)) {
            if (filter_var($this->source[$var], FILTER_VALIDATE_INT, array("options" => array("max_range" => $max))) === FALSE) {
                $this->erreurs[$var] = $var . ' n\'est pas valide';
            }
        } else {
            if (filter_var($this->source[$var], FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === FALSE) {
                $this->erreurs[$var] = $var . ' n\'est pas valide';
            }
        }
    }

    /**
     *
     * @sanitize valeur numeric
     *
     * @access private
     *
     * @param string $var le nom de la variable
     */
    private function nettoyerNumeric($var) {
        if (strlen($this->source[$var]) == 0) {
            $this->nettoyer[$var] = "";
        } else {
            $this->nettoyer[$var] = (int) filter_var($this->source[$var], FILTER_SANITIZE_NUMBER_INT);
        }
    }

    /**
     *
     * @validate un nombre flotant
     *
     * @access private
     *
     * @param $var le nom de la variable
     *
     * @param int $min le nombre minimum
     *
     * @param int $max le nombre maximum
     * 
     * @param string $separateur le caractere de separation
     * 
     * @param bool $requis
     */
    private function valideFloat($var, $min = false, $max = false, $requis = false, $separateur = ".") {
        if ($requis == false && strlen($this->source[$var]) == 0) {
            return true;
        }
        if (filter_var($this->source[$var], FILTER_VALIDATE_FLOAT, array('options' => array('decimal' => $separateur))) === false) {
            $this->erreurs[$var] = $var . ' n\'est pas un nombre flotant';
        } else {
            if (is_numeric($min) && !is_numeric($max) && $this->source[$var] < $min) {
                $this->erreurs[$var] = $var . ' n\'est pas valide';
            } elseif (!is_numeric($min) && is_numeric($max) && $this->source[$var] > $max) {
                $this->erreurs[$var] = $var . ' n\'est pas valide';
            } elseif (is_numeric($min) && is_numeric($max)) {
                if ($this->source[$var] > $max) {
                    $this->erreurs[$var] = $var . ' n\'est pas valide';
                } elseif ($this->source[$var] < $min) {
                    $this->erreurs[$var] = $var . ' n\'est pas valide';
                }
            }
        }
    }

    /**
     *
     * @sanitize une valeur float
     *
     * @access private
     *
     * @param string $var le nom de la variable
     * 
     * @param string $separateur le caractere de separation
     *
     */
    private function nettoyerFloat($var, $separateur = ".") {
        if (strlen($this->source[$var]) == 0) {
            $this->nettoyer[$var] = "";
        } else {
            if ($separateur == ".") {
                $this->nettoyer[$var] = (float) filter_var($this->source[$var], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            } else {
                $this->nettoyer[$var] = (float) filter_var($this->source[$var], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_THOUSAND);
            }
        }
    }

    /**
     *
     * @validate une chaine de caratere
     *
     * @access private
     *
     * @param string $var le nom de la variable
     *
     * @param int $min la longueur minimum de la chaine (hors html)
     *
     * @param int $max la longueur maximum de la chaine (hors html)
     *
     * @param bool $requis
     * 
     * @param string $filtre type de filtre à appliquer
     *
     */
    private function valideString($var, $min = "", $max = "", $requis = false) {
        if ($requis == false && strlen($this->source[$var]) == 0) {
            return true;
        }
        /** set de la variable sans html */
        $chaine_pour_test_strlen = (string) strip_tags($this->source[$var]);
        if (isset($this->source[$var])) {
            if (strlen($chaine_pour_test_strlen) < $min && is_numeric($min)) {
                $this->erreurs[$var] = $var . ' est trop court';
            } elseif (strlen($chaine_pour_test_strlen) > $max && is_numeric($max)) {
                $this->erreurs[$var] = $var . ' est trop long';
            } elseif (!is_string($this->source[$var])) {
                $this->erreurs[$var] = $var . ' est invalide';
            }
        }
    }

    /**
     *
     * @sanitize une chaine de caractere
     *
     * @access private
     *
     * @param string $var la nom de la variable
     *
     */
    private function nettoyerString($var, $filtre = "simple") {
        if ($filtre == "SdL") {
            $this->nettoyer[$var] = (string) filter_var($this->source[$var], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        } elseif ($filtre == "Html") {
            $this->nettoyer[$var] = (string) filter_var($this->source[$var], FILTER_UNSAFE_RAW);
        } elseif ($filtre == "url") {
            $separator = '-';
            $charset = 'utf-8';
            $text = mb_convert_encoding($this->source[$var], 'HTML-ENTITIES', $charset);
            $text = strtolower(trim($text));
            $text = preg_replace(array('/ß/', '/&(..)lig;/', '/&([aouAOU])uml;/', '/&(.)[^;]*;/'), array('ss', "$1", "$1" . 'e', "$1"), $text);
            $text_clear = mb_ereg_replace("[^a-z0-9_-]", ' ', trim($text));
            $array = explode(' ', $text_clear);
            $str = '';
            $i = 0;
            foreach ($array as $cle => $valeur) {
                if (trim($valeur) != '' AND trim($valeur) != $separator AND $i > 0)
                    $str .= $separator . $valeur;
                elseif (trim($valeur) != '' AND trim($valeur) != $separator AND $i == 0)
                    $str .= $valeur;
                $i++;
            }
            $this->nettoyer[$var] = (string) $str;
        } elseif ($filtre == "nom") {
            /** on vire le code html */
            $this->source[$var] = (string) filter_var($this->source[$var], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
            $tab_chaine = explode(" ", $this->source[$var]);
            $str = "";
            foreach ($tab_chaine as $value) {
                $str .= ($str != "") ? " " : "";
                $str .= trim(ucfirst(mb_strtolower($value)));
            }
            $this->nettoyer[$var] = (string) filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        } elseif ($filtre == "maj") {
            /** on vire le code html */
            $this->nettoyer[$var] = (string) mb_strtoupper(filter_var($this->source[$var], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES), 'UTF-8');
        } elseif ($filtre == "min") {
            /** on vire le code html */
            $this->nettoyer[$var] = (string) mb_strtolower(filter_var($this->source[$var], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES), 'UTF-8');
        } else {
            $this->nettoyer[$var] = (string) filter_var($this->source[$var], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        }
    }

    /**
     * @validate un boolean 
     *
     * @access private
     *
     * @param string $var le nom de la variable
     *
     * @param bool $required
     *
     */
    private function valideBool($var, $requis = false) {
        if ($requis == false && strlen($this->source[$var]) == 0) {
            return true;
        }
        if ($requis == true && strlen($this->source[$var]) == 0) {
            $this->erreurs[$var] = $var . ' est invalide';
        }
        if (filter_var($this->source[$var], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === NULL) {
            $this->erreurs[$var] = $var . ' est invalide';
        }
    }

    /**
     * @valide une chaine chiffre 
     *
     * @access private
     *
     * @param string $var le nom de la variable
     *
     * @param bool $required
     *
     */
    private function valideChiffre($var, $min = "", $max = "", $requis = false) {
        //netoyage de la chaine
        if (isset($this->source[$var]))
            $this->source[$var] = preg_replace("#[^0-9]#", "", $this->source[$var]);

        //echo strlen($this->source[$var]).$max;
        if ($requis == false && strlen($this->source[$var]) == 0) {
            return true;
        }
        if (isset($this->source[$var])) {
            if (strlen($this->source[$var]) < $min && is_numeric($min)) {
                $this->erreurs[$var] = $var . ' est trop court';
            } elseif (strlen($this->source[$var]) > $max && is_numeric($max)) {
                $this->erreurs[$var] = $var . ' est trop long';
            } elseif (!preg_match("(^[0-9]*$)", $this->source[$var])) {
                $this->erreurs[$var] = $var . ' est invalide';
            }
        }
    }

    /**
     * @valide si une valeur est dans un tableau
     *
     * @access private
     *
     * @param string $var le nom de la variable
     * @param array $array le tableau des valeurs 
     *
     * @param bool $required
     *
     */
    private function valideArray($var, $array = array(), $requis = false) {
        if ($array == NULL || count($array) == 0) {
            $this->erreurs[$var] = 'Pas de tableau pour la vérification';
        }
        if ($requis == false && strlen($this->source[$var]) == 0) {
            return true;
        }
        if (!in_array($this->source[$var], $array)) {
            $this->erreurs[$var] = $var . ' est invalide';
        }
    }

    /**
     *
     * @sanitize une date/heure
     *
     * @access private
     *
     * @param string $var la nom de la variable
     * @param string $formatEntrer le format de la date en entrer
     * @param string $formatSortie le format de la date en sortie
     */
    private function nettoyervdate($var, $formatEntrer, $formatSortie) {
        if ($formatEntrer == $formatSortie) {
            $this->nettoyer[$var] = (string) $this->source[$var];
            return true;
        }
        $a = DateTime::createFromFormat($formatEntrer, $this->source[$var]);
        $fsortie = $a->format($formatSortie);
        $b = DateTime::createFromFormat($formatSortie, $fsortie);
        if (!$b) {
            $this->erreurs[$var] = "Le format de sortie est invalide pour " . $var;
            return false;
        } else {
            $this->nettoyer[$var] = (string) $fsortie;
        }
    }

    /**
     * @valide si une date (heure) est valide
     *
     * @access private
     *
     * @param string $var le nom de la variable
     * @param string $min heure minimum
     * @param string $max heure maximum 
     * @param bool $requis
     *
     */
    private function validateDate($var, $requis, $formatEntrer, $min, $max) {
        if ($requis == false && strlen($this->source[$var]) == 0) {
            $this->nettoyer[$var] = (string) "";
            return true;
        }
        /** vérifie que la date et le format sont bon */
        $a = DateTime::createFromFormat($formatEntrer, $this->source[$var]);
        if (!$a) {
            $this->erreurs[$var] = "(1) Le format est invalide pour " . $var;
            return false;
        }
        if ($a->format($formatEntrer) != $this->source[$var]) {
            $this->erreurs[$var] = "(2) La date du champ " . $var . " n'existe pas.";
            return false;
        }
        if ($min != false) {
            $b = DateTime::createFromFormat($formatEntrer, $min);
            if (!$b) {
                $this->erreurs[$var] = "(3) Le format de min n'est pas le même que le format d'entrer de " . $var;
                return false;
            }
            if ($b->format($formatEntrer) != $min) {
                $this->erreurs[$var] = "(4) La date minimum de verification du champ " . $var . " n'existe pas.";
                return false;
            }
            if ($a < $b) {
                $this->erreurs[$var] = "(5) La date est trop petite pour le champ " . $var;
                return false;
            }
        }
        if ($max != false) {
            $c = DateTime::createFromFormat($formatEntrer, $max);
            if (!$c) {
                $this->erreurs[$var] = "(6) Le format de max n'est pas le même que le format d'entrer de " . $var;
                return false;
            }
            if ($c->format($formatEntrer) != $max) {
                $this->erreurs[$var] = "(7) La date maximum de verification du champ " . $var . " n'existe pas.";
                return false;
            }
            if ($a > $c) {
                $this->erreurs[$var] = "(8) La date est trop grande pour le champ " . $var;
                return false;
            }
        }
    }
}
