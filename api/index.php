<?php
/**
 * Des Bijoux et Moi — point d'entrée unique (routeur).
 * Français : /, /collection…   Anglais : /en, /en/collection…
 * Local : php -S localhost:8000 api/index.php  (depuis la racine du projet)
 */

require __DIR__ . '/_inc/config.php';
require __DIR__ . '/_inc/data.php';
require __DIR__ . '/_inc/functions.php';

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$path = '/' . trim(rawurldecode($path), '/');

// Serveur PHP local : laisser passer les fichiers statiques (css, js, images…)
if (PHP_SAPI === 'cli-server' && $path !== '/' && is_file(dirname(__DIR__) . $path)) {
    return false;
}

// Langue : préfixe /en
if ($path === '/en' || str_starts_with($path, '/en/')) {
    set_lang('en');
    $path = '/' . trim(substr($path, 3), '/');
}

$routes = [
    '/'               => ['accueil',    ['Bijouterie à Cotonou · Colliers, bracelets, bagues', 'Jewellery shop in Cotonou · Necklaces, bracelets, rings'],
                          ["Des Bijoux et Moi, bijouterie à Akpakpa (Cotonou) : colliers, bracelets, bagues, boucles d'oreilles et coffrets cadeaux. Commande simple sur WhatsApp. Noté 4,9/5 sur Google.",
                           "Des Bijoux et Moi, jewellery shop in Akpakpa (Cotonou): necklaces, bracelets, rings, earrings and gift sets. Easy ordering on WhatsApp. Rated 4.9/5 on Google."]],
    '/collection'     => ['collection', ['La collection', 'The collection'],
                          ["Découvrez tous les bijoux Des Bijoux et Moi et commandez-les en un message WhatsApp.", "Browse all Des Bijoux et Moi jewellery and order in a single WhatsApp message."]],
    '/notre-histoire' => ['histoire',   ['Notre histoire', 'Our story'],
                          ["Six ans en ligne, puis une première boutique à Akpakpa : l'histoire de Des Bijoux et Moi.", "Six years online, then a first shop in Akpakpa: the Des Bijoux et Moi story."]],
    '/avis'           => ['avis',       ['Avis clients', 'Reviews'],
                          ["Ce que notre clientèle dit de Des Bijoux et Moi : 4,9/5 sur Google.", "What customers say about Des Bijoux et Moi: 4.9/5 on Google."]],
    '/contact'        => ['contact',    ['Boutique & contact', 'Shop & contact'],
                          ["Adresse, horaires et contact de Des Bijoux et Moi à Akpakpa, Cotonou.", "Address, opening hours and contact for Des Bijoux et Moi in Akpakpa, Cotonou."]],
];

if ($path === '/robots.txt') {
    header('Content-Type: text/plain; charset=utf-8');
    echo "User-agent: *\nAllow: /\nSitemap: " . SITE['url'] . "/sitemap.xml\n";
    exit;
}

if ($path === '/sitemap.xml') {
    header('Content-Type: application/xml; charset=utf-8');
    echo '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    foreach (array_keys($routes) as $r) {
        foreach (['fr', 'en'] as $l) {
            echo '<url><loc>' . e(SITE['url'] . url($r, $l)) . '</loc></url>';
        }
    }
    echo '</urlset>';
    exit;
}

if (isset($routes[$path])) {
    [$page, $titres, $descs] = $routes[$path];
    render($page, ['titre' => tr(...$titres), 'description' => tr(...$descs), 'actif' => $path]);
} else {
    http_response_code(404);
    render('404', ['titre' => tr('Page introuvable', 'Page not found'), 'description' => '', 'actif' => $path]);
}
