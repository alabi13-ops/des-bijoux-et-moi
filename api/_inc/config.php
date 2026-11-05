<?php
/**
 * Des Bijoux et Moi — configuration générale du site.
 * Toutes les infos de la boutique se modifient ici.
 */

const SITE = [
    'nom'         => 'Des Bijoux & Moi',
    'slogan'      => 'Une histoire qui dure',
    'slogan_en'   => 'A story that lasts',
    'url'         => 'https://desbijouxetmoi.vercel.app', // à remplacer par le domaine final
    'telephone'   => '+229 01 67 62 64 64',
    'tel_href'    => '+2290167626464',
    'whatsapp'    => '2290167626464',                     // format wa.me : indicatif + numéro, sans espaces ni +
    'adresse'     => 'Akpakpa, Ciné Concorde, 2ᵉ rue après la station ORYX',
    'adresse_en'  => 'Akpakpa, Ciné Concorde, 2nd street after the ORYX station',
    'ville'       => 'Cotonou, Bénin',
    'ville_en'    => 'Cotonou, Benin',
    'lat'         => 6.371509,
    'lng'         => 2.4501835,
    'maps_url'    => 'https://maps.app.goo.gl/i2a7t8iLGn6Y8Yo99',
    'avis_url'    => 'https://search.google.com/local/writereview?placeid=ChIJk-706MFVIxARDQcEs0yWvBY',
    'note'        => '4,9',
    'nb_avis'     => 43,
    'ouverture'   => '26 septembre 2026',
    'ouverture_en'=> 'September 26, 2026',
    // Réseaux sociaux : laisser vide pour masquer
    // Comptes « desbijouxetmoi » affichés sur l'affiche de la boutique — à vérifier avec la cliente
    'instagram'   => 'https://www.instagram.com/desbijouxetmoi',
    'facebook'    => 'https://www.facebook.com/desbijouxetmoi',
    'tiktok'      => 'https://www.tiktok.com/@desbijouxetmoi',
];

/** Horaires : index 1 = lundi … 7 = dimanche (format ISO, comme date('N')) */
const HORAIRES = [
    1 => null,
    2 => ['10:00', '20:00'],
    3 => ['10:00', '20:00'],
    4 => ['10:00', '20:00'],
    5 => ['10:00', '20:00'],
    6 => ['10:00', '20:00'],
    7 => ['10:00', '20:00'],
];

const JOURS = [1 => 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
const JOURS_EN = [1 => 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

date_default_timezone_set('Africa/Porto-Novo');
