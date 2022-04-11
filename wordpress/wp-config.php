<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'starter_db' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '!qM{/]yR~EKfBy+2ea|io*]X&@| Y/!oPeIT9x1%?*bbBSH`-UvR*_ItT1OlS7$J' );
define( 'SECURE_AUTH_KEY',  '<!@/?f]fy((^ 6W@F~nnedOMg~|F`He=3,l3w,l30ZD! fb(n%GdC]B,agtR}~/}' );
define( 'LOGGED_IN_KEY',    'KZVB[nRadkme)ai`adzBZCQLnkQycV&o9,]eHAYB|%R%PXA>y_,Y*cf+5N3jHlyB' );
define( 'NONCE_KEY',        '<+oFH{y?M rm>*$j+RzkRcN,,VW;Er+=iwIg*kt7<N.>Yb4$<)whyqOi<)K FXhY' );
define( 'AUTH_SALT',        'F6,*<]2:XO!2SY#{;z]Q7&lOJI+b%)As0~NJE}GIg<&`K*_gb$6B6uG5nFuXENo(' );
define( 'SECURE_AUTH_SALT', 'z>sElIX|I^v*c}y$PaE,0EpdPyW_V1:>CaPDBYlj!bR4XrKjtK~PYzuis9:P^wYL' );
define( 'LOGGED_IN_SALT',   'A8{7zoW#=y[?E#m!~_w]z|CA[U.)>TI[QCpD7T!+N}SK/wI#=-wS_JTAT*o%:asv' );
define( 'NONCE_SALT',       '-?alt$:U71U~eDhmn>6kznJP%:Xm< z@~H;<qfdKi{vtozS0gJV8vW|iOAi_Divk' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_starter_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
