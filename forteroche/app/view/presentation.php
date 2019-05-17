<?php

    error_reporting(E_ALL ^ E_NOTICE); 
    ini_set("display_errors", 1); 

$title = 'Présentation';
$h1 = 'Jean Forteroche';
$h2 = 'Un petit bout de moi...';
$style = '/forteroche/public/style.css';

ob_start(); ?>

<br><br>
<div>Je suis né près de Toulon un jour où le port de Dunkerque était pris par les glaces.

Le soir même, dans « Bonne nuit les petits », Nounours sautait de son nuage avec un parapluie ouvert pour aller s'écraser dans la chambre de Pimprenelle et Nicolas. Les Beatles envahissaient les ondes alors avec « Please please me » et la planète venait de frôler l'apocalypse nucléaire avec la crise des missiles de Cuba...

Nous étions des gens de peu, de terre et d'usine : Papa cultivateur, puis au trois-huit dans les chantiers navals, Maman à la serpillière et derrière le cul de ses mômes. Mais sur les étagères de mon frère ainé il y avait toujours des livres et, sur le bureau, des beaux cahiers d'écolier impeccablement tenus. Je savais déjà qu'une part essentielle de mon existence tiendrait entre ces deux pôles. J'aurai toujours le nez dans un bouquin et une plume dans l'encrier ou, plus tard, les doigts sur le clavier… Il faut vivre avec son temps.

 Une insatiable curiosité pour les êtres et les choses, d'ici et d'ailleurs, m'a toujours animé. Le passé comme trésor, l'avenir comme horizon, le présent pour apprendre, découvrir, agir et échanger, voilà mon humaine trinité, mon credo quotidien.

Mon parcours d'autodidacte est atypique : rétif à toute hiérarchie, j'ai toujours privilégié la liberté, l'indépendance, l'inattendu des rencontres, les petits défis à soi-même, les sentiers de traverse plutôt que les voies trop balisées, les plans de carrière. Des petits boulots de jeunesse dans l'imprimerie, la presse locale ou les bibliothèques, en passant par des travaux de secrétariat puis, plus tard, des responsabilités de rédacteur, de correcteur, de chroniqueur pour des agences de communication, des revues indépendantes ou dans l'édition, jusqu'à l'exercice actuel de mon activité en « freelance » depuis quelques années, je n'ai jamais cessé d'avoir l'écrit comme fil rouge.

Mes expériences professionnelles, mes créations personnelles dans le domaine de la chanson ou de la littérature, tous ces choix, ces chemins ou hasards de la vie m'ont amené à connaître des milieux sociaux très différents, à côtoyer des personnalités fort diverses. J'ai ainsi appris à écouter le murmure des vies « ordinaires », à cultiver mon goût des autres.

Quand j'ai perdu mes parents, j'ai regretté de ne pas en avoir su un peu plus sur leurs origines, sur les ressorts cachés et les méandres de leurs destins désormais accomplis. Ce manque a donné du sens à mes aventures de polygraphe. J'ai alors pris conscience de la fragilité des souvenirs : dès lors qu'une parole n'était pas recueillie, consignée noir sur blanc, elle risquait au mieux d'être trahie, au pire de se perdre. Je crois en la force des mots, propres à raviver la mémoire, à recréer du lien.

Il y a quelques années, lassé du tourbillon de la capitale, j'ai posé mes valises en Normandie, dans le charmant Pays d'Auge.

J’y demeure aujourd’hui en humble artisan de l'écriture, prêtant l'oreille et la main à tous ceux qui éprouvent le besoin de se souvenir, de se raconter, de partager leur mémoire.</div>

<?php $content = ob_get_clean(); ?>

<?php require(_ROOT_.'template.php'); ?>
 
