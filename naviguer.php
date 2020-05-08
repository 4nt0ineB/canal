<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Site web - Canal du Midi</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/language.css">
    <link rel="stylesheet" href="css/slideshow.css">

    <style>
        .button-survey {
            width: 200px;
            height: 15px;
        }
    </style>
</head>

<body>
    <div id="container">

        <?php
        include('includes/header.php');
        include('includes/menu.php');
        //ON RECUP LA TRAD DE LA PAGE
        $contenuIndex = $db->query("SELECT * FROM p_accueil");
        $txt = $contenuIndex->fetchAll();
        ?>



        <div class="left">
            <div class="box_left">
                <div class="box_title">Naviguer</div>
                <h2 class="page-title">Règles de navigation</h2>
                <ul>
                    <div class="button-survey" style="width:446px;">
                        <li class="rubrique-drop"><a href="#DISPOSITIONS-REGLEMENTAIRES">DISPOSITIONS REGLEMENTAIRES</a>
                            <div class="dropdown-content">
                                <a href="#reglesroute">Règles de routes</a>
                                <a href="#reglesnavigation">Règles de naviguation</a>
                                <a href="#vitessenavigation">Vitesse de naviguation</a>
                                <a href="#passagesretrecis">Passages rétrécis, ponts de faible ouverture, voies à sens unique</a>
                                <a href="#stationnementbateaux">Stationnement des bateaux</a>
                                <a href="#stationnementproximite">Stationnement à proximité des écluses automatisées</a>
                                <a href="#stationnementnui">Stationnement de nuit dans les biefs courts</a>
                                <a href="#stationnementlong">Stationnement de longue durée</a>
                            </div>

                        </li>
                    </div>
                    <div class="button-survey" style="width:446px;">
                        <li class="rubrique-drop"><a href="#conseilnavigation">CONSEILS DE NAVIGATION : QUELQUES INFOS IMPORTANTES</a>
                            <div class="dropdown-content">
                                <a href="#audepart">Au départ… Précautions à observer</a>
                                <a href="#encoursderoute">En cours de route…</a>
                                <a href="#cohabitation">Cohabitation générale</a>
                            </div>

                        </li>
                    </div>
                    <div class="button-survey" style="width:446px;">
                        <li class="rubrique-drop"><a href="passageecluse">PASSAGE AUX ÉCLUSES</a>
                            <div class="dropdown-content">
                                <a href="#prioritepassage">Priorité de passage aux écluses</a>
                                <a href="#eclusesautomatisees">Ecluses automatisées</a>
                            </div>

                        </li>
                    </div>
                    <div class="button-survey" style="width:550px;">
                        <li class="rubrique-drop"><a href="#permisetpeages">PERMIS ET PÉAGES</a>
                        </li>
                    </div>
                    <div class="button-survey" style="width:550px;">
                        <li class="rubrique-drop"><a href="#renseignementspratiques">RENSEIGNEMENTS PRATIQUES SUR LA NAVIGATION DU CANAL</a>
                        </li>
                    </div>
                </ul>
                <div></div>
                <h1 id="DISPOSITIONS-REGLEMENTAIRES">DISPOSITIONS RÉGLEMENTAIRES</h1>
                <div id="reglesroute"></div>
                <p><strong>LES RÈGLES DE ROUTE</strong><br />
                    Il est conseillé d'avoir à bord les cartes ou guides des voies navigables sur lesquelles vous souhaitez naviguer.<br />
                    Les REGLES DE ROUTE sont énoncées dans le Règlement Général de Police appel « Code Fluvial » et dans le Règlement Particulier de Police.</p>
                <p>Dautres informations importantes peuvent être affichées aux écluses : ce sont les AVIS A LA BATELLERIE.<br />
                    Ces avis indiquent par exemple les interruptions momentanées du<br />
                    fonctionnement des écluses ou de la navigation. N'hésitez pas à les consulter aux écluses ou dans les subdivisions.</p>
                <div id="reglesnavigation"></div>
                <p><strong>LES RÈGLES DE NAVIGATION</strong><br />
                    Sens conventionnel de la navigation<br />
                    Sur le Canal du Midi, le bief de partage est situé au Col de Naurouze, entre les écluses de l'Océan et la Méditerranée. Au débouché de la rigole d'alimentation, le sens de la descente est à l' Est vers la Méditerranée et à l'Ouest vers l'Atlantique. Sur le Canal Latéral à la Garonne, le sens de la descente est celui de Toulouse vers l'Océan.</p>
                <div id="vitessenavigation"></div>
                <p><strong>Vitesse de navigation</strong><br />
                    La vitesse de marche des bateaux est limitée à 8 km/h afin d'éviter la détérioration des berges. Les agents du Service de la Navigation sont habilités à dresser procès-verbal aux conducteurs qui dépasseraient cette limite.<br />
                    La vitesse doit être réduite à 3 km/h à l'approche et au franchissement d';ouvrages (ponts, ponts canaux, ports, halte,...) ainsi qu'en cas de croisement ou de dépassement avec un autre bateau.<br />
                    Les règles de courtoisie obligent la réduction de la vitesse en présence de petites embarcations (barques, canoës,...) ainsi que des pêcheurs en bord de rive. Nous vous recommandons d'utiliser vos avertisseurs sonores à l'approche d'ouvrages offrant une visibilité réduite.</p>
                <div id="passagesretrecis"></div>
                <p><strong>Passages rétrécis, ponts de faible ouverture, voies à sens unique</strong><br />
                    Si deux bateaux se trouvent engagés en même temps dans une partie de la voie<br />
                    navigable qui n'a pas une largeur suffisante pour leur croisement, l'un des deux bateaux doit reculer. Le bateau devant céder le passage est le bateau montant.</p>
                <div id="stationnementbateaux"></div>
                <p><strong>Stationnement des bateaux</strong><br />
                    Il s'effectue de préférence dans les haltes et quais prévus à cet effet. Les lieux<br />
                    d'interdiction sont indiqués par panneaux ou délimités par une bande jaune discontinue peinte sur le mur de quai (« réservé aux péniches »). Le stationnement est interdit dans les biefs courts, ainsi qu'à 100 m des ouvrages, pour des raisons de sécurité.<br />
                    Il est conseillé d'avertir le dernier éclusier rencontré de votre intention de vous arrêter en route. En aucun cas, le stationnement ne devra gêner la navigation ni la circulation sur les chemins de halage. Il est interdit de s'amarrer aux arbres en raison des accidents graves que peuvent occasionner les cordages aux cyclistes ou piétons. Utiliser un piquet solidement planté dans la berge. L'amarrage doit permettre au bateau de suivre les variations du niveau d'eau. Le stationnement à couple des petites embarcations est strictement interdit.<br />
                    Il est interdit de stationner sous les ponts ou dans le chenal navigable, ainsi que sur les Ponts Canal de Baïse, d'Agen, Moissac et de Béziers.<br />
                    Les haltes de plaisance offrent des équipements souvent modestes. Dans la plupart des<br />
                    cas, vous y trouverez les ressources et équipements nécessaires à la vie quotidienne : vivres, téléphone, eau, ramassage des ordures ménagères (pour l'agrément de tous, n'abandonnez pas celles-ci sur les berges).</p>
                <div id="stationnementproximite"></div>
                <p><strong>Stationnement à proximité des écluses automatisées</strong><br />
                    Les bateaux se présentant à proximité des écluses automatisées après la fermeture de la navigation ne devront pas stationner au-delà des portiques avancés supportant les perches de commande.</p>
                <div id="stationnementnui"></div>
                <p><strong>Stationnement de nuit dans les biefs courts</strong><br />
                    Les biefs dont la longueur est inférieure à 1 km étant très vulnérables en cas d'avarie à une porte d'écluse, le stationnement de nuit des bateaux s'effectue aux risques et périls du conducteur. Il est interdit dans la traversée de l'Aude.</p>
                <div id="stationnementlong"></div>
                <p><strong>Stationnement de longue durée</strong><br />
                    Le stationnement de longue durée sur le Domaine Public Fluvial est soumis à<br />
                    autorisation. Cette autorisation est délivrée par le Chef de la Subdivision de navigation<br />
                    concerné (adresses et téléphones en annexe).</p>
                <p>
                    <h1 id="conseilnavigation">CONSEILS DE NAVIGATION : QUELQUES INFOS IMPORTANTES</h1>
                    <br />
                </p>
                <p>
                    <div id="audepart"></div>
                    <strong>· au départ... Précautions à observer</strong><br />
                    - Verrouiller le moteur s’il s’agit d’un hors bord.<br />
                    - Effectuer le ravitaillement en carburant moteur stoppé.<br />
                    - Aérer le compartiment moteur.<br />
                    - Contrôler que l’hélice n’est pas entravée par un cordage ou plastique flottant.<br />
                    - N’enrouler pas les amarres autour du bras, lovez et rangez-les de manière à ne pas gêner les déplacements sur le pont.
                    </>
                    <div id="encoursderoute"></div>
                    <p><strong>· en cours de route...</strong><br />
                        En général, la navigation s’effectue en tenant sa droite comme sur la route, sauf indication contraire. Le croisement et le dépassement ne s’accomplissent que si les manœuvres ne présentent pas de danger.<br />
                        - Respecter la signalisation et les vitesses imposées.<br />
                        - Ne pas trop s’approcher des berges.<br />
                        - La navigation à la dérive est interdite.<br />
                        - Les personnes à bord ne doivent pas gêner la visibilité du pilote.<br />
                        - Pour votre sécurité, chaque personne à bord doit disposer d’une brassière de sauvetage facilement accessible.<br />
                        Attention : aux manœuvres de certaines écluses, des remous très violents tentent d’écarter le bateau et de le mettre en travers. A bord, tenir très fortement les amarres.</p>
                    <div id="cohabitation"></div>
                    <p><strong>COHABITATION GÉNÉRALE</strong><br />
                        - Respecter les règles de courtoisie envers les autres usagers pêcheurs, bateliers, riverains, éclusiers, promeneurs,...<br />
                        - Pour les ordures ménagères et les huiles usagées, utiliser des sacs poubelles et des bidons. Les déposer aux emplacements prévus à cet effet. Tout rejet d’eaux usées ou déchets de toute nature est strictement interdit.<br />
                        - Ne pas dégrader les berges.<br />
                        - Respecter les propriétés riveraines y compris les logements des éclusiers qui, comme tous, ont droit à une vie privée.<br />
                        - Préserver la faune et la flore.</p>
                    <p>
                        <h1 id="passageecluse">LE PASSAGE AUX ÉCLUSES</h1><br />
                    </p>
                    <p>
                        Les éclusiers sont des agents de l’Etat affectés au Service de la Navigation du Sud-Ouest ; ils sont chargés de la Police de la Navigation et de la gestion de la voie d’eau. Ils dirigent les manœuvres de sassement et font respecter les ordres de passage (certains bateaux bénéficient d’une priorité).<br />
                        Le maniement du bateau et notamment son amarrage reste sous votre responsabilité. En cas d’incident, prévenez immédiatement l’éclusier. Le bateau doit obligatoirement être amarré et le moteur doit être au point mort. En outre l’amarrage doit tenir compte des variations de niveaux dues au sassement.<br />
                        A chaque fois que cela est possible, afin d’économiser l’eau, nous demandons aux plaisanciers de passer les écluses groupés. En période de pénurie, un avis à batellerie fixe le délai d’attente et le mode de groupage. En période normale, un délai d’attente de 20 minutes peut vous être demandé.<br />
                        En attente d’éclusage, n’approchez pas à moins de 50 m de l’écluse, et n’avancez pas avant que seuls les feux verts soient allumés, ou que l’éclusier vous l’ait demandé. Dans le sas, n’avancez pas plus loin que la marque rouge peinte sur le bajoyer.<br />
                        Enfin, aux abords des écluses, nous vous recommandons la plus grande prudence, et notamment une surveillance accrue des enfants qui ne doivent pas participer aux manœuvres.<br />
                        Le sassement ne doit pas être l’occasion de faire une halte dans l’écluse.
                    </p>
                    <div id="prioritepassage"></div>
                    <p><strong>PRIORITÉ DE PASSAGE AUX </strong><b>ÉCLUSES</b><br />
                        La priorité de passage aux écluses est donnée :<br />
                        1°/ aux bateaux ou engins flottants appartenant aux Services de la Navigation,<br />
                        d’incendie, de police et de douane se déplaçant pour des raisons urgentes de service,<br />
                        2°/ aux bateaux de transport de marchandises ou à passagers assurant un service régulier ou programmé, et pourvus d’une autorisation du Chef du Service de la Navigation,<br />
                        3°/ aux autres bateaux à passagers ; toutefois la priorité de passage aux écluses qui leur est accordée ne s’exercera qu’au moment de leur arrivée à l’écluse. Le franchissement des écluses de Fonserannes est soumis à des dispositions particulières.<br />
                        4°/ aux autres catégories de bateaux, y compris ceux de location et selon l’ordre<br />
                        d’arrivée.</p>
                    <div id="eclusesautomatisees"></div>
                    <p><strong>ÉCLUSES AUTOMATISÉES</strong><br />
                        Certaines écluses sont automatiques, notamment entre Agen et Castets en Dorthe. Les manoeuvres de l’écluse sont commandées par une perche pendue dans l’axe du Canal.<br />
                        Feux avancés : = feu éteint = feu rouge = feu vert<br />
                        1° Attendre et maintenir le bateau dans l’axe de la perche.<br />
                        2° Avancer très doucement. Faire tourner 1/4 de tour la perche blanche et rouge qui pend audessus du canal.<br />
                        3° Avancer et entrer dans l’écluse (sauf si le feu de l’écluse est rouge : attendre dans ce cas, qu’il devienne vert pour entrer dans l’écluse.).<br />
                        4° Après l’amarrage, tirer le levier placé sur le terre-plein à côté de la cabine pour mettre l’écluse en marche.<br />
                        5° Pour faire ouvrir les portes de sortie, tirer à nouveau sur le même levier. Lorsqu’il y a égalité des niveaux, les portes s’ouvrent. Attention : elles se referment 3 minutes plus tard. Il convient donc de sortir immédiatement.<br />
                        NOTA : Quand les feux sont rouges, il est inutile d’actionner la perche. La manœuvre reste sans effet.</p>
                    <p>
                        <h1 id="permisetpeages">PERMIS ET PÉAGES</h1><br />
                    </p>
                    <p>
                        Pour les bateaux de plaisance privée, n’oubliez pas de vous munir :<br />
                        <strong>· de votre certificat de capacité différent selon le type de bateau que vous conduisez</strong><br />
                        S : Sport<br />
                        C : Coche de Plaisance<br />
                        PP : Péniche de Plaisance<br />
                        L’examen du certificat “Coche de Plaisance” ne comporte qu’une épreuve théorique. Sont dispensés de ce certificat, les pilotes des bateaux loués à des sociétés ou groupements (voir Document N°2 Bateaux de location).<br />
                        Le permis de conduire en mer les navires de plaisance à moteur n’est pas admis sur les eaux intérieures.<br />
                        <strong>· du permis de navigation pour les bateaux équipés d’un moteur de plus de 10 CV.</strong><br />
                        Le titre de navigation délivré par les Services des Affaires Maritimes pour la navigation en mer tient lieu de permis de navigation sur les eaux intérieures. Les conducteurs étrangers en transit doivent se conformer à la réglementation en vigueur dans leur pays.<br />
                        Se renseigner sur les permis auprès des Commissions de Surveillance des Services de la Navigation.<br />
                        <strong>· de votre “Carte de Péage”.</strong><br />
                        Depuis le 1er Janvier 1992, la navigation de plaisance est soumise à péage. Cette contribution permet d’assurer à Voies Navigables de France qui gère les 8 500 km de voie d’eau en France, des moyens financiers pour entretenir les ouvrages et favoriser la navigation.<br />
                        Le péage est fonction de la surface du bateau (Longueur x largeur hors tout) et de la durée de navigation.</p>
                    <p>Quatre forfaits vous sont proposés :<br />
                        - Forfait “journée” valable pour une date,<br />
                        - Forfait “vacances” de 16 jours consécutifs avec possibilité de cumul,<br />
                        - Forfait “loisirs” pour 30 jours de navigation non consécutifs au choix du plaisancier,<br />
                        - Forfait annuel.</p>
                    <p>Se renseigner sur les tarifs auprès de Voies Navigables de France. En échange de votre règlement établi à l’ordre de Voies Navigables de France, une “Carte de Péage” vous sera délivrée. Elle devra être apposée de façon visible sur le pare-brise ou sur la coque de votre bateau.</p>
                    <p><strong>Pour les bateaux de location</strong><br />
                        Si vous pilotez un bateau que vous avez loué à une société de location de bateaux, vous êtes dispensés du permis de conduire.<br />
                        A la signature de votre contrat de location, une carte de plaisance vous sera délivrée par le loueur attestant que le bateau est assuré, qu’il est en bon état de fonctionnement, suffisamment motorisé et contrôlé périodiquement par la Commission de Surveillance et enfin, qu’un enseignement concernant la conduite du bateau vous a été dispensé.<br />
                        Le bateau doit être également muni de la Carte de Péage attestant le paiement des péages appliqués à la navigation de plaisance.</p>
                    <p>
                        <h1 id="renseignementspratiques">RENSEIGNEMENTS PRATIQUES SUR LA NAVIGATION DU CANAL
                            DES DEUX MERS</h1><br />
                    </p>
                    <p>
                        <strong>GABARIT DES ECLUSES, TIRANT D’AIR DES PONTS</strong></p>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>Voies concernées</td>
                                <td>Longueurutile desécluses</td>
                                <td>Largeurutile desécluses</td>
                                <td>Tirant d’airdans l’axedenavigation</td>
                                <td>Tirantd’air à2.50m del’axe de
                </p>
                <p>navigation
                    </td>
                    </tr>
                    <tr>
                        <td>Canal du MidiAttention : écluse de Saint-Martin</td>
                        <td>30.00 m</td>
                        <td>5 . 60 m5.45 m</td>
                        <td>3.30 m</td>
                        <td>2.40 m</td>
                    </tr>
                    <tr>
                        <td>Canal de Jonction et Canal de La Robine</td>
                        <td>40.00 m</td>
                        <td>5.85 m</td>
                        <td>3.30 m</td>
                        <td>2.60 m</td>
                    </tr>
                    <tr>
                        <td>Canal latéral à la Garonne</td>
                        <td>40.00 m</td>
                        <td>6.00 m</td>
                        <td>3.60 m</td>
                        <td>3.00 m</td>
                    </tr>
                    <tr>
                        <td>Traversée de l’Hérault et Hérault deBessan à Agde</td>
                        <td>40.00 m</td>
                        <td>5.60 m</td>
                        <td>4.10 m</td>
                        <td>2.60 m</td>
                    </tr>
                    <tr>
                        <td>Descentes en Tarn à Moissac et en Baïseà Buzet</td>
                        <td>30.50 m</td>
                        <td>6.00 m</td>
                        <td>3.70 m</td>
                        <td>3.20 m</td>
                    </tr>
                    </tbody>
                    </table>
                    <p><strong>TIRANT D’EAU DES CANAUX</strong><br />
                        Le tirant d’eau théorique du canal du Midi est fixé à 1.60 m, celui du latéral à la Garonne à 1.80 m, dans l’axe de navigation. Le tirant d’eau réel est fixé au minimum à 1.50 m dans l’axe de navigation. Attention aux risques d’échouage à l’approche de cette limite.</p>
                    <p><strong>TIRANT D’AIR</strong><br />
                        Veuillez consulter les pages Secteurs de Navigation du site des <a href="https://www.vnf.fr/vnf/"> voies naviguables de France.</a></p>
                    <p><strong>LONGUEUR UTILE DES </strong><b>ÉCLUSES<br />
                        </b><br />
                        <strong>Canal du Midi</strong><br />
                        - 40m50 de l’étang de Thau à l’écluse d’Argens, sauf les écluses de Fonserannes à Béziers = 30m.<br />
                        - 30m d’Argens à l’écluse du Sanglier (Haute Garonne ).<br />
                        - 40m50 pour l’embranchement de Port La Nouvelle</p>
                    <p><strong>Canal de Garonne</strong><br />
                        - 40m50, sauf pour l’écluse de descente en Tarn à Moissac et de descente en Baïse à Buzet ainsi que les écluses successives de Pommies, Escudiès, Pellaborie, Peyrets et Montech en Tarn et Garonne.</p>
                    <p><strong>LARGEUR UTILE DES ECLUSES<br />
                        </strong><br />
                        <strong>Canal du Midi</strong><br />
                        - 6m de l’étang de Thau à l’écluse d’Argens.<br />
                        - 5m60 d’Argens à l’écluse du Sanglier (Haute Garonne) avec 5m55 pour l’écluse de Saint Martin.<br />
                        - 5m85 pour l’embranchement de Port La Nouvelle Canal de Garonne<br />
                        - 6m sur l’ensemble du Canal de Garonne.</p>
                    <p><strong>LES HORAIRES DE NAVIGATION</strong><br />
                        Les écluses des canaux du Midi et latéral à la Garonne fonctionnent pendant le jour entre les heures ci-après :<br />
                        JANVIER 8H00 17H30 JUILLET 8H00 19H30<br />
                        FEVRIER 8H00 17H30 AOUT 8H00 19H30<br />
                        MARS 8H00 17H30 SEPTEMBRE 8H00 18H30<br />
                        AVRIL 8H00 18H30 OCTOBRE 8H00 18H00<br />
                        MAI 8H00 19H00 NOVEMBRE 8H00 17H30<br />
                        JUIN 8H00 19H30 DECEMBRE 8H00 17H30<br />
                        ARRET DE 12H30 à 13H30</p>
                    <p><strong>LES PÉRIODES DE NAVIGATION</strong><br />
                        Au cours de l’année, la navigation sur les Canaux du Midi est soumise à deux régimes. Un avis à la batellerie précise chaque année les dates de chaque période. Pendant la période saisonnière (Mars-Octobre), la navigation est assurée tous les jours de la semaine à l’exception des jours fériés (voir plus bas).<br />
                        En dehors de cette période, soit pendant les mois de Janvier, Février, Novembre, Décembre, la navigation s’effectue à la demande.<br />
                        Les bateaux de plaisance et de location peuvent naviguer du lundi au vendredi inclus sous réserve d’en avoir averti la veille avant 11H00, la Subdivision de Navigation en précisant leur programme de route. Ils pourront naviguer le samedi sous réserve que la demande en soit formulée le VENDREDI PRECEDENT AVANT 11H00 auprès de la Subdivision mais également auprès des Conducteurs de travaux et des éclusiers.<br />
                        Pendant la période hivernale aucune dérogation ne sera accordée aux bateaux de plaisance et de location pour naviguer le dimanche même s’ils sont en transit entre Atlantique et Méditerranée.</p>
                    <p>Le service des écluses n’est pas assuré les jours fériés suivants :<br />
                        - le 1er Janvier (Jour de l’An)<br />
                        - le 14 juillet (Fête Nationale)<br />
                        - le 1er Mai (Fête du Travail)<br />
                        - le 1er Novembre (Toussaint)<br />
                        - le 11 Novembre (Fête de l’Armistice)<br />
                        - le 25 Décembre (Noël)</p>
                    <p><strong>LES CHOMAGES</strong><br />
                        Afin d’effectuer les travaux nécessaires, la navigation est interrompue pendant une période de plusieurs semaines sur chaque canal. Ce sont les CHOMAGES. Ils sont en principe fixés au mois de Novembre et Décembre.<br />
                        Consultez les AVIS A LA BATELLERIE ou renseignez-vous auprès des Subdivisions de navigation(N° de téléphone en annexe) pour connaître les dates précises et les secteurs concernés. En effet, certains biefs sont vidangés à cette occasion et peuvent contraindre le stationnement des bateaux.</p>
                    <p><strong>LES LIEUX DE RÈGLEMENT DE LA VIGNETTE<br />
                        </strong><br />
                        <strong>FONTET</strong><br />
                        Ecluse 49 de Fontet<br />
                        33190 Fontet<br />
                        05.56.61.28.74</p>
                    <p><strong>AGDE</strong><br />
                        Ecluse Ronde d’Agde<br />
                        34304 AGDE<br />
                        04.67.94.10.99 / 04.67.94.23.09</p>
                    <p><strong>VOTRE VOYAGE</strong><br />
                        Informations Pratiques et Touristiques sur les différents secteurs de navigation du Canal des Deux Mers.</p>
                    <p><strong>SECTEUR AQUITAINE - INFORMATIONS PRATIQUES FLUVIALES<br />
                        </strong><br />
                        <strong>CONDITIONS DE NAVIGATION</strong><br />
                        Tirant d'air : minimum de 2.38 mètres à 2 mètres de l'axe de navigation<br />
                        Tirant d'eau : 1.60 mètres<br />
                        Vitesse : 8 km/h et 3 km/h dans les ports, haltes nautiques et zones de stationnement</p>
                    <p><strong>SYSTEME D'ECLUSAGE (section courante)</strong><br />
                        Les écluses 32 à 52 sont automatiques.</p>
                    <p><strong>SITUATION/NOMBRE DE SAS/SYSTEME.CONTRAINTES DE NAVIGATION</strong></p>
                    <p>Attention :<br />
                        Bien vérifier les horaires de marée(guide des marées) pour passer l'écluse 53.<br />
                        Cette écluse est à franchir à marée haute.<br />
                        De même les bateaux nolisés* n'ont pas le droit de franchir l'écluse 52.<br />
                        Pour plus de sécurité et d'information contacter :<br />
                        l'écluse 53 au 05 56 62 83 07 ou l'animateur de tourisme au 06 84 81 96 25</p>
                    <p>Attention :<br />
                        Les écluses 34 à 37 et 39 à 40 sont synchronisés :<br />
                        Une fois le bateau engagé ce dernier ne peut stationner dans les biefs.<br />
                        Les éclusettes d'Agen ferment ½ heure avant l'horaire de fermeture.<br />
                        Compter 45 minutes d'éclusage pour les quatre éclusettes.</p>
                    <p>Attention :<br />
                        Ecluse de descente en Baïse et jonction avec le Lot.<br />
                        La gestion de la Baïse et du Lot est assurée par le Conseil Général<br />
                        Pour plus d'informations contacter :<br />
                        Unité départementale des routes du confluent et de la navigation<br />
                        Coteau de Romas (écluse de descente en Baïse)<br />
                        47130 Port Sainte Marie<br />
                        Tél : 05 53 77 29 00 ou 05 53 79 10 85 Fax : 05 53 67 44 35</p>
                    <p><strong>SITES TERRESTRES REMARQUABLES</strong><br />
                        <strong>Le Mas d &lsquo;Agenais</strong> : ancien site romain qui a conservé sa porte romane et ses remparts, le lavoir.<br />
                        <strong>Collégiale St Vincent (XIIème)</strong> : à l'intérieur se trouve une peinture originale de Rembrandt.<br />
                        <strong>Meilhan/Garonne</strong> : depuis le Tertre des Anglais, vue panoramique.<br />
                        <strong>Marmande</strong> : le cloître, la vieille ville.<br />
                        <strong>Lagruère</strong> : les fontaines.<br />
                        <strong>Damazan</strong> : la place des cornières.<br />
                        <strong>Buzet/Baïse</strong> : vignobles de grande renommée, château de Buzet (privé), château XIII/XV/XVI, église gothique.<br />
                        <strong>Feugarolles</strong> : château de Gueyzes et de Trenquelléon, église de Brazalem, pont préroman, site de Limon, vestiges du Prieuré.<br />
                        <strong>Bruch</strong> : les remparts, la tour du XIIIème, église gothique, maisons à pans de bois.<br />
                        <strong>Sérignac/Garonne</strong> : bastide, église romane avec son clocher hélicoïdal(XVI), maison à colombage.<br />
                        <strong>Agen</strong> : quartier Beauville et les Jacobins, le musée, la place des cornières, la cathédrale, la rue de la grande horloge, la maison du Sénéchal...</p>
                    <p><strong>CONTRAINTES DE NAVIGATION</strong><br />
                        Attention :<br />
                        Fonctionnement spécifique de l’écluse de descente en Tarn à Moissac du 15 juin au 15 septembre.<br />
                        Les horaires de fonctionnement en été sont :<br />
                        Matin : 9H à 10H - Après Midi : 13H à 15H - Soir : 18H à 19H.<br />
                        En dehors de cette période, veuillez en aviser la subdivision 24 heures à l’avance. La navigation sur le Tarn à partir de cette écluse est gérée par la DDE du Tarn et Garonne.</p>
                    <p>Attention :<br />
                        Fonctionnement de la Pente d’Eau de Montech :<br />
                        Passage obligatoire par la pente d’eau pour les péniches de gabarit “Freycinet” ‘30m à 38m).<br />
                        Exonération des frais de passage pour ce type de péniche.<br />
                        Pour les péniches de moins de 28,5m, les frais de passage s’élève à 300Frs soit 45,73 Euros.<br />
                        Pour emprunter la Pente d’Eau, veuillez aviser le Centre d’Exploitation de Montech en<br />
                        contactant le 05 63 64 73 04 ou le 06 87 84 47 57 :<br />
                        - 24H à l’avance en semaine,<br />
                        Avant 16H le vendredi pour un passage en week-end.</p>
                    <p>Attention :<br />
                        Horaires de passage particuliers en fin de journée aux écluses suivantes :<br />
                        - En montée ou en descente l’horaire d’arrêt de navigation est avancé de 30 minutes : Ecluse de Moissac en montée et Ecluse de Cacor en descente.<br />
                        - En montée ou en descente l’horaire d’arrêt est avancé de 45 minutes :<br />
                        Ecluse de Montech et de Castelsarasin en descente.<br />
                        Ecluse de Pommiès et d’Artel en montée.</p>
                    <p>Attention :<br />
                        L’embranchement de Montech-Montauban est fermé à la navigation. Des travaux pour sa réouverture sont en cours.</p>
                    <p><strong>PORTS ET HALTES NAUTIQUES</strong><br />
                        <strong> MOISSAC</strong><br />
                        <strong>La pierre</strong><br />
                        Haut lieu de l’art roman de renommée mondiale, son cloître est célèbre pour ses<br />
                        chapiteaux du 12ème siècle et son abbatiale pour le tympan évoquant l’Apocalypse de Saint-Jean.<br />
                        <strong>L’eau</strong><br />
                        Le Canal Latéral et son remarquable pont-canal. Les rives du Tarn.<br />
                        <strong>Le fruit</strong><br />
                        Capitale des fruits, Moissac, station uvale, cultive sa tradition autour du Chasselas (raisin de<br />
                        table AOC).<br />
                        <strong>VALENCE D’AGEN</strong>, bastide du 13ème siècle aux 3 lavoirs dont 2 inscrits aux monuments historiques et son pigeonnier remarquable. A ne pas manquer, le spectacle “Au Fil de l’Eau” organisé en été.<br />
                        <strong>MONTECH</strong> : la forêt domaniale d’Agre pour des randonnées privilégiées à partir du Canal<br />
                        PK 41.</p>
                    <p><strong>CONDITIONS DE NAVIGATION</strong><br />
                        Tirants d'air dans l’axe de navigation :<br />
                        Canal du Midi de Toulouse à Ayguevives : minimum de 3m30<br />
                        Canal du Midi de l’écluse du Sanglier à Emborel : minimum 3m55 Canal de Garonne : 3m60</p>
                    <p>Tirant d'eau :<br />
                        Canal du Midi : 1m60.<br />
                        Canal de Garonne : 1m80.<br />
                        Vitesse : 8 km/h et 3 km/h dans les ports, haltes nautiques et zones de stationnement</p>
                    <p><strong>CONTRAINTES DE NAVIGATION</strong><br />
                        Attention :<br />
                        L’écluse de descente en Garonne sur le Canal de Brienne est réservée aux bateaux à passagers.</p>
                    <p>Attention :<br />
                        Les écluses du canal de Garonne ont un fort courant traversié.</p>
                    <p><strong>Vignobles AOC Côtes du Frontonnais</strong><br />
                        Ce vignoble datant du XIIIème siècle offre un vin léger aux arômes particulier que lui confère le cépage » Négrette « . Parmi les 54 chais particuliers et de 3 caves coopératives, certaines structures offrent la possibilité de visite de chais ou de dégustation. Pour tous renseignements,veuillez contacter :<br />
                        Syndicat des Vignerons des Côtes du Frontonnais<br />
                        51, av Adrien Escudier<br />
                        31620 Fronton<br />
                        Tel 05 61 82 46 33</p>
                    <p><strong>Toulouse</strong><br />
                        La capitale Occitane est un patrimoine historique et culturel exceptionnel. Parmi ses sites remarquables à visiter, nous noterons le Capitole, La Basilique Saint Sernin, le Couvent des Jacobins, le Musée des Augustins, la Fondation Bemberg, l'Aérospatiale.<br />
                        Pour tous renseignements, veuillez contacter :<br />
                        Office de Tourisme<br />
                        Donjon du Capitole<br />
                        Tel : 05 61 11 02 22</p>
                    <p><strong>Le Lauragais</strong><br />
                        Ancienne terre du Pastel, le Lauragais est aujourd'hui une région agricole jalonnée de très belles bastides du XIIIème et XIVème siècles ainsi que de clochers mûrs, châteaux, pigeonniers et moulins à vent à découvrir.<br />
                        A retenir sur votre parcours, les sites historiques de Villefranche de Lauragais et Avignonet Lauragais.</p>
                    <p><strong>CONDITIONS DE NAVIGATION</strong><br />
                        Tirants d'air : minimum de 2m50 dans l’axe de navigation au Pont Marengo à Carcassonne.<br />
                        2m90 dans les autres cas.</p>
                    <p>Tirant d'eau : 1m60.</p>
                    <p><strong>Castelnaudary</strong> : Centre historique du Canal du Midi et capitale du cassoulet.<br />
                        A visiter, son moulin de Cugarel, sa collégiale, et son présidial.<br />
                        <strong>Bram</strong> : Village circulaire au centre duquel se trouve une église du XIIIe siècle.<br />
                        <strong>Carcassonne</strong> : Carcassonne célèbre pour sa cité classée au patrimoine de l'humanité.<br />
                        A voir aussi, les chapelles, les églises et le musée des beaux-arts de la ville basse.<br />
                        <strong>Trèbes</strong> : A voir, l'église Saint-Etienne et les 320 corbeaux peints.</p>
                    <p><strong>CONDITIONS DE NAVIGATION<br />
                        </strong><br />
                        Tirants d'air dans l’axe de la navigation :<br />
                        De l’étang de Thau à l’aval de l’écluse d’Argens : 3m40<br />
                        D’Argens à Marseillette : 3m30<br />
                        Embranchement de Port La Nouvelle : 3m30</p>
                    <p>Tirant d'eau : 1m60.</p>
                    <p><strong>Agde</strong> :<br />
                        Ancienne colonie grecque, Agde est l’une des plus ancienne ville de France. Prenez le temps<br />
                        d’une promenade dans ses vieux quartier qui ne manquent pas de charme.<br />
                        A voir également, la cathédrale Saint-Etienne du XIIème siècle et le musée de la ville qui<br />
                        présente d’intéressantes expositions.<br />
                        <strong>Béziers</strong> :<br />
                        Berceau de Pierre Paul RIQUET, Béziers est une ville de culture avec sa cathédrale Saint-Nazaire, ses arènes, son musée des Beaux Arts mais aussi une ville festive à l’heure des Férias.<br />
                        <strong>Oppidum d'Ensérune</strong> :<br />
                        Situé au-dessus du Tunnel du Malpas, ce site fut occupé par l’Homme depuis l’an 800 avant JC. Le musée vous présente des vestiges des différentes civilisations grecque, celtique et romaine.<br />
                        Le lac de Jouarres près de Homps est le lieu idéal pour profiter d’un lieu de baignade et d’activités nautiques.<br />
                        <strong>Narbonne</strong> :<br />
                        Cette ancienne colonie romaine offre de nombreux trésors architecturaux : la cathédrale Saint-Just, le palais des Archevêques, le musée de l’Art et de l’Histoire, la basilique Saint-Paul.<br />
                        Les étangs et l'île de Sainte Lucie au sud de Narbonne sont des lieux sauvages et protégés où la faune et la flore ne manque pas d’intérêt.</p>
                    <p><strong>SYSTEME D’ALIMENTATION EN EAU</strong><br />
                        L’idée de construire un canal reliant l’Atlantique à la Méditerranée remonte à l’Antiquité.<br />
                        Mais si tous les projets, qui émergèrent au fil des siècles ne purent se réaliser, c’était à cause d’un problème quasi insoluble : le manque d’eau pour alimenter le canal. Ce problème, c’est Pierre Paul Riquet qui parvint à le résoudre, en ayant l’ingénieuse idée de capter les eaux de la Montagne Noire et de faire parvenir celles-ci jusqu’à Naurouze. En 1662, commencent les premiers travaux d’aménagement d’un système alimentaire, qui pourvoit encore de nos jours<br />
                        aux besoins en eaux du Canal du Midi.<br />
                        Parcourant près de 76 kms, le Système Alimentaire de la Montagne Noire est composé de deux rigoles (rigoles de la Montagne et de la Plaine), qui détournent les eaux de petites rivières et torrents, tels que l’Alzeau, la Bernassonne, le Rieutort, le Lampy, le Laudot ou le Sor. A des endroits stratégiques, furent construits des réservoirs d’eau, qui régulent<br />
                        l'alimentation du canal. Ces barrages, au nombre de quatre sur la Montagne Noire, sont la Galaube, le Lampy, les Cammazes, et le célèbre barrage de Saint-Ferréol. Ce dernier,construit dans un site remarquable, constitue un merveilleux plan d’eau autorisé à la baignade et aux sports nautiques.</p>
                    <p>Renseignements : Point Accueil Fluvial de Carcassonne.<br />
                        06.84.81.96.23 ou 06.84.81.95.76</p>

            </div>
        </div>

        <div class="right">
            <div class="box_right">
                <div class="box_title black"><?php echo $txt[6][$_SESSION["lang"]]; ?></div>
                <?php
                $json = file_get_contents('https://www.prevision-meteo.ch/services/json/toulouse');
                $json = json_decode($json);
                ?>
                <center>
                    <h3><?php echo $txt[7][$_SESSION["lang"]]; ?><u><?php echo $json->city_info->name; ?></u></h3>
                    <ul style="list-style: none;margin-block-start: 0;padding-inline-start: 0;">
                        <li><span><?php echo $json->fcst_day_0->day_short; ?> (<FONT color="blue"><?php echo $json->fcst_day_0->tmin; ?>°C</FONT> / <FONT color="red"><?php echo $json->fcst_day_0->tmax; ?>°C</FONT>)</span><br><small style="vertical-align: 10px;"><?php echo $json->fcst_day_0->condition; ?> </small><img src="<?php echo $json->fcst_day_0->icon; ?>" width="32" height="32" /></li>
                        <hr>
                        <li><span><?php echo $json->fcst_day_1->day_short; ?> (<FONT color="blue"><?php echo $json->fcst_day_1->tmin; ?>°C</FONT> / <FONT color="red"><?php echo $json->fcst_day_1->tmax; ?>°C</FONT>)</span><br><small style="vertical-align: 10px;"><?php echo $json->fcst_day_1->condition; ?> </small><img src="<?php echo $json->fcst_day_1->icon; ?>" width="32" height="32" /></li>
                        <hr>
                        <li><span><?php echo $json->fcst_day_2->day_short; ?> (<FONT color="blue"><?php echo $json->fcst_day_2->tmin; ?>°C</FONT> / <FONT color="red"><?php echo $json->fcst_day_2->tmax; ?>°C</FONT>)</span><br><small style="vertical-align: 10px;"><?php echo $json->fcst_day_2->condition; ?> </small><img src="<?php echo $json->fcst_day_2->icon; ?>" width="32" height="32" /></li>
                    </ul>
                </center>
            </div>
        </div>
        <div class="right">
            <div class="box_right">
                <div class="box_title black">Calculer un itinéraire fluvial </div>

                <center>
                    <div class="button-survey" style="width:150px;"><a href="http://www.vnf.fr/calculitinerairefluvial/app/Main.html" style="text-decoration: none;color:inherit;" target="_blank">Y aller</a></div>

                </center>
            </div>
        </div>
        <div class="right">
            <div class="box_right">
                <div class="box_title black">Source</div>

                <center>
                    <p>Toutes ses informations sont issues de ce document </p>
                    <div class="button-survey" style="width:150px;"><a href="http://plaisancefluviale.fr/document/vnf/guide_canal_2mers.pdf" style="text-decoration: none;color:inherit;" target="_blank">Guide du Plaisancier</a></div>

                </center>
            </div>
        </div>


        <div class="clear"></div>


        <?php include("includes/footer.php"); ?>