<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/customers/b/9/3/infos-ping.be/httpd.www/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'infos_ping_be');


/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'infos_ping_be');


/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'brazil6969');


/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'infos-ping.be.mysql');


/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'a>5HU`fsLUDx<F!7,NUC!4R 1:gEIUr@wL_J.Wj}xc+h*-p`CJA`bj?-G<6f`hi-');

define('SECURE_AUTH_KEY',  'c+$_MDPHxnNn)$nRm4,+ .01I^-!+Zcl]e8]=&JKhT/!ufbm)r|q4Q$+3He*isP%');

define('LOGGED_IN_KEY',    'F<4[4q$zCx)>u(r3YP`5l-;vX]z+qal}7oZf*k-[Wu?SfFE!=~fK?P(+&;- $&]+');

define('NONCE_KEY',        '>yQFtpT<7ldwURw[%qtk[v<q[}d|H7{u7AN.{%mXq-e.MGd=EF#m[4-vHPbVgEK8');

define('AUTH_SALT',        'v/=~Q:=bZz`JN q=[5*3Mc%Slp|Y);*4x%A&:=u3]nI([%h$5_vH-hu_`}xH[5Hw');

define('SECURE_AUTH_SALT', 'N0s lJ%UWh9k*-N&V$bpr)3S}-((XdnLhxh)S@|H{GbH+0-lq3, Nd]BHeE!{)0C');

define('LOGGED_IN_SALT',   '$B*-=2Qiw+%N)v>I.c2R|M[kI}*sevj46QU3t1?G>;?U_a/LQ ,q0*THc{s-ZqkE');

define('NONCE_SALT',       '|0-a`Z|_l3)YE469N}[boIPo+v*N+3vC^[CA/<8yS@bIr/,zk,Ti+TxyI?)NJ|3b');

/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'infosping_';


/**
 * Langue de localisation de WordPress, par défaut en Anglais.
 *
 * Modifiez cette valeur pour localiser WordPress. Un fichier MO correspondant
 * au langage choisi doit être installé dans le dossier wp-content/languages.
 * Par exemple, pour mettre en place une traduction française, mettez le fichier
 * fr_FR.mo dans wp-content/languages, et réglez l'option ci-dessous à "fr_FR".
 */
define('WPLANG', 'fr_FR');

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');