<?php

/* ---------- Langue ---------- */

$GLOBALS['LANG'] = 'fr';

function lang(): string
{
    return $GLOBALS['LANG'];
}

function set_lang(string $l): void
{
    $GLOBALS['LANG'] = in_array($l, ['fr', 'en'], true) ? $l : 'fr';
}

/** Texte bilingue : tr('Bonjour', 'Hello') */
function tr(string $fr, string $en): string
{
    return lang() === 'en' ? $en : $fr;
}

/** Champ traduit d'un tableau de données : f($produit, 'nom') */
function f(array $row, string $key): string
{
    if (lang() === 'en' && !empty($row[$key . '_en'])) {
        return (string) $row[$key . '_en'];
    }
    return (string) ($row[$key] ?? '');
}

/** URL interne dans la langue courante (ou une autre) */
function url(string $path = '/', ?string $l = null): string
{
    $l ??= lang();
    $path = '/' . ltrim($path, '/');
    if ($l === 'en') {
        return $path === '/' ? '/en' : '/en' . $path;
    }
    return $path;
}

/* ---------- Utilitaires ---------- */

function e($v): string
{
    return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
}

/** Lien WhatsApp avec message pré-rempli */
function wa(string $message = ''): string
{
    $base = 'https://wa.me/' . SITE['whatsapp'];
    return $message === '' ? $base : $base . '?text=' . rawurlencode($message);
}

/** Image : identifiant Unsplash ou chemin local */
function img(string $src, int $w = 800): string
{
    if (str_starts_with($src, '/') || str_starts_with($src, 'http')) {
        return $src;
    }
    return "https://images.unsplash.com/photo-{$src}?auto=format&fit=crop&w={$w}&q=75";
}

function prix(?int $p): string
{
    if ($p === null) {
        return tr('Prix sur demande', 'Price on request');
    }
    return number_format($p, 0, lang() === 'en' ? '.' : ',', lang() === 'en' ? ',' : ' ') . ' FCFA';
}

/** Note Google formatée selon la langue (4,9 / 4.9) */
function note(): string
{
    return lang() === 'en' ? str_replace(',', '.', SITE['note']) : SITE['note'];
}

function cat_nom(string $slug): string
{
    return f(CATEGORIES[$slug], 'nom');
}

function produits_par_cat(?string $cat = null): array
{
    return array_values(array_filter(PRODUITS, fn ($p) => $cat === null || $p['cat'] === $cat));
}

function heure(string $h): string
{
    if (lang() === 'en') {
        $t = DateTime::createFromFormat('H:i', $h);
        return str_replace(':00', '', $t->format('g:i a'));
    }
    return str_replace(':', 'h', $h);
}

function jour(int $n): string
{
    return lang() === 'en' ? JOURS_EN[$n] : JOURS[$n];
}

/** Statut d'ouverture en temps réel (heure du Bénin) */
function statut_ouverture(): array
{
    $jour = (int) date('N');
    $now  = date('H:i');
    $h    = HORAIRES[$jour];

    if ($h && $now >= $h[0] && $now < $h[1]) {
        return ['ouvert' => true, 'texte' => tr('Ouvert maintenant · jusqu\'à ', 'Open now · until ') . heure($h[1])];
    }
    for ($i = 0; $i < 8; $i++) {
        $j  = (($jour - 1 + $i) % 7) + 1;
        $hj = HORAIRES[$j];
        if (!$hj) continue;
        if ($i === 0 && $now >= $hj[0]) continue;
        $quand = $i === 0 ? tr("aujourd'hui", 'today') : ($i === 1 ? tr('demain', 'tomorrow') : (lang() === 'en' ? jour($j) : strtolower(jour($j))));
        return ['ouvert' => false, 'texte' => tr('Fermé · ouvre ', 'Closed · opens ') . $quand . tr(' à ', ' at ') . heure($hj[0])];
    }
    return ['ouvert' => false, 'texte' => tr('Fermé', 'Closed')];
}

/** Rendu d'une page dans le layout */
function render(string $page, array $vars = []): void
{
    extract($vars);
    ob_start();
    include __DIR__ . "/pages/{$page}.php";
    $content = ob_get_clean();
    include __DIR__ . '/layout.php';
}

function etoiles(int $n = 5): string
{
    return str_repeat('<svg viewBox="0 0 20 20" aria-hidden="true"><path d="M10 1.5l2.6 5.6 6.1.7-4.5 4.2 1.2 6L10 15l-5.4 3 1.2-6L1.3 7.8l6.1-.7z"/></svg>', $n);
}

/** Logo : diamant facetté inspiré de l'enseigne + nom + signature */
function logo(): string
{
    return '<span class="logo__mark" aria-hidden="true"><svg viewBox="0 0 48 34">'
        . '<path d="M9 2h30l8 10-23 20L1 12z" fill="var(--gold)"/>'
        . '<path d="M24 2h15l8 10H24z" fill="var(--gold-2)"/><path d="M24 12h23L24 32z" fill="var(--gold-light)"/>'
        . '<path d="M1 12h46M9 2l7 10 8-10 8 10 7-10M16 12l8 20 8-20" fill="none" stroke="var(--logo-line)" stroke-width="1.2" stroke-linejoin="round"/>'
        . '</svg></span>'
        . '<span class="logo__txt"><span class="logo__name">Des Bijoux <em>&amp;</em> Moi</span>'
        . '<span class="logo__tag">' . tr('Une histoire qui dure', 'A story that lasts') . '</span></span>';
}

/** Petites icônes en ligne pour la barre de navigation et les boutons */
function icon(string $name): string
{
    $paths = [
        'home'  => '<path d="M4 11l8-7 8 7"/><path d="M6 9.5V20h12V9.5"/><path d="M10 20v-5h4v5"/>',
        'grid'  => '<rect x="4" y="4" width="7" height="7" rx="1.5"/><rect x="13" y="4" width="7" height="7" rx="1.5"/><rect x="4" y="13" width="7" height="7" rx="1.5"/><rect x="13" y="13" width="7" height="7" rx="1.5"/>',
        'bag'   => '<path d="M6 7h12l-1 13H7L6 7z"/><path d="M9 7V5a3 3 0 0 1 6 0v2"/>',
        'star'  => '<path d="M12 3.5l2.6 5.4 5.9.8-4.3 4.1 1 5.8L12 16.8l-5.2 2.8 1-5.8-4.3-4.1 5.9-.8z"/>',
        'pin'   => '<path d="M12 21s-6.5-5.8-6.5-11a6.5 6.5 0 0 1 13 0c0 5.2-6.5 11-6.5 11z"/><circle cx="12" cy="10" r="2.4"/>',
        'book'  => '<path d="M5 4.5h5.5a2.5 2.5 0 0 1 2.5 2.5v13a2 2 0 0 0-2-2H5z"/><path d="M19 4.5h-5.5A2.5 2.5 0 0 0 11 7v13a2 2 0 0 1 2-2h6z"/>',
        'moon'  => '<path d="M20 14.5A8 8 0 1 1 9.5 4a6.5 6.5 0 0 0 10.5 10.5z"/>',
        'sun'   => '<circle cx="12" cy="12" r="4"/><path d="M12 2.5v2M12 19.5v2M4.6 4.6 6 6M18 18l1.4 1.4M2.5 12h2M19.5 12h2M4.6 19.4 6 18M18 6l1.4-1.4"/>',
    ];
    return '<svg class="ico" viewBox="0 0 24 24" aria-hidden="true">' . ($paths[$name] ?? '') . '</svg>';
}
