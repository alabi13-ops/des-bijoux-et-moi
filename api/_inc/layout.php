<?php
$nav = [
    '/'               => tr('Accueil', 'Home'),
    '/collection'     => 'Collection',
    '/notre-histoire' => tr('Notre histoire', 'Our story'),
    '/avis'           => tr('Avis', 'Reviews'),
    '/contact'        => tr('Boutique', 'Shop'),
];
$statut = statut_ouverture();
$titreComplet = ($actif === '/' ? SITE['nom'] . ' — ' . $titre : $titre . ' — ' . SITE['nom']);
$autreLang = lang() === 'en' ? 'fr' : 'en';
$jsonLd = [
    '@context'  => 'https://schema.org',
    '@type'     => 'JewelryStore',
    'name'      => SITE['nom'],
    'url'       => SITE['url'],
    'telephone' => SITE['tel_href'],
    'image'     => SITE['url'] . IMG . 'facade-jour.jpg',
    'address'   => ['@type' => 'PostalAddress', 'streetAddress' => SITE['adresse'], 'addressLocality' => 'Cotonou', 'addressCountry' => 'BJ'],
    'geo'       => ['@type' => 'GeoCoordinates', 'latitude' => SITE['lat'], 'longitude' => SITE['lng']],
    'openingHours' => 'Tu-Su 10:00-20:00',
    'hasMap'    => SITE['maps_url'],
];
$i18n = [
    'added'      => tr('ajouté à votre sélection', 'added to your selection'),
    'emptyTitle' => tr('Votre sélection est vide', 'Your selection is empty'),
    'emptyText'  => tr('Ajoutez les bijoux qui vous plaisent, puis envoyez-les-nous en un clic sur WhatsApp.', 'Add the pieces you love, then send them to us on WhatsApp in one tap.'),
    'seeColl'    => tr('Voir la collection', 'Browse the collection'),
    'remove'     => tr('Retirer', 'Remove'),
    'less'       => tr('Moins', 'Less'),
    'more'       => tr('Plus', 'More'),
    'total'      => tr('Total estimé', 'Estimated total'),
    'items'      => tr('article', 'item'),
    'itemsPl'    => tr('articles', 'items'),
    'confirm'    => tr('Prix confirmés sur WhatsApp', 'Prices confirmed on WhatsApp'),
    'hello'      => tr('Bonjour Des Bijoux et Moi 👋', 'Hello Des Bijoux et Moi 👋'),
    'iAm'        => tr("Je m'appelle", 'My name is'),
    'iOrder'     => tr("et j'aimerais commander :", "and I'd like to order:"),
    'iWant'      => tr('Je souhaite commander :', "I'd like to order:"),
    'avail'      => tr('Est-il disponible ? Merci !', 'Is it available? Thank you!'),
    'confirmMsg' => tr('Merci de me confirmer la disponibilité 🙏', 'Please confirm availability 🙏'),
    'subject'    => tr('Objet', 'Subject'),
    'dark'       => tr('Activer le mode sombre', 'Switch to dark mode'),
    'light'      => tr('Activer le mode clair', 'Switch to light mode'),
];
?><!doctype html>
<html lang="<?= lang() ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title><?= e($titreComplet) ?></title>
<meta name="description" content="<?= e($description) ?>">
<meta name="theme-color" content="#FAF8F4" media="(prefers-color-scheme: light)">
<meta name="theme-color" content="#0B111C" media="(prefers-color-scheme: dark)">
<meta name="color-scheme" content="light dark">
<script>
  /* Thème : appliqué avant l'affichage pour éviter un flash */
  (function () { try { var t = localStorage.getItem('dbm_theme'); if (t === 'dark' || t === 'light') document.documentElement.setAttribute('data-theme', t); } catch (e) {} })();
</script>
<link rel="alternate" hreflang="fr" href="<?= e(SITE['url'] . url($actif ?: '/', 'fr')) ?>">
<link rel="alternate" hreflang="en" href="<?= e(SITE['url'] . url($actif ?: '/', 'en')) ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= e($titreComplet) ?>">
<meta property="og:description" content="<?= e($description) ?>">
<meta property="og:image" content="<?= e(SITE['url'] . IMG . 'facade-jour.jpg') ?>">
<meta property="og:locale" content="<?= tr('fr_FR', 'en_US') ?>">
<link rel="icon" href="/assets/img/favicon.svg" type="image/svg+xml">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;1,500&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/style.css?v=3">
<script type="application/ld+json"><?= json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>
</head>
<body>

<div class="topbar">
  <div class="container topbar__in">
    <span class="topbar__status <?= $statut['ouvert'] ? 'is-open' : '' ?>"><i></i><?= e($statut['texte']) ?></span>
    <span class="topbar__addr">Akpakpa, Ciné Concorde · Cotonou</span>
    <a href="tel:<?= e(SITE['tel_href']) ?>" class="topbar__tel"><?= e(SITE['telephone']) ?></a>
  </div>
</div>

<header class="header" id="header">
  <div class="container header__in">
    <a href="<?= url('/') ?>" class="logo" aria-label="<?= e(SITE['nom']) ?> — <?= tr('accueil', 'home') ?>">
      <?= logo() ?>
    </a>

    <nav class="nav" aria-label="<?= tr('Navigation principale', 'Main navigation') ?>">
      <?php foreach ($nav as $href => $label): ?>
        <a href="<?= url($href) ?>" class="<?= $actif === $href ? 'is-active' : '' ?>"<?= $actif === $href ? ' aria-current="page"' : '' ?>><?= e($label) ?></a>
      <?php endforeach; ?>
    </nav>

    <div class="header__actions">
      <a class="lang-switch" href="<?= url($actif ?: '/', $autreLang) ?>" hreflang="<?= $autreLang ?>"
         aria-label="<?= tr('Voir le site en anglais', 'View the site in French') ?>">
        <span class="<?= lang() === 'fr' ? 'is-on' : '' ?>">FR</span><span class="<?= lang() === 'en' ? 'is-on' : '' ?>">EN</span>
      </a>
      <button class="icon-toggle" id="themeToggle" type="button" aria-label="<?= e($i18n['dark']) ?>">
        <span class="when-light"><?= icon('moon') ?></span><span class="when-dark"><?= icon('sun') ?></span>
      </button>
      <button class="cart-btn" data-cart-open aria-label="<?= tr('Voir ma sélection', 'View my selection') ?>">
        <?= icon('bag') ?>
        <span class="cart-count" data-cart-count>0</span>
      </button>
      <a href="<?= e(wa(tr("Bonjour Des Bijoux et Moi 👋, j'aimerais avoir des informations.", "Hello Des Bijoux et Moi 👋, I'd like some information."))) ?>" class="btn btn--wa header__wa" target="_blank" rel="noopener">WhatsApp</a>
    </div>
  </div>
</header>

<main id="main">
<?= $content ?>
</main>

<footer class="footer">
  <div class="container footer__grid">
    <div>
      <a href="<?= url('/') ?>" class="logo logo--light"><?= logo() ?></a>
      <p class="footer__txt"><?= tr("Des bijoux choisis avec cœur pour votre quotidien et vos grands moments. Six ans en ligne, et désormais une boutique à Akpakpa.", "Jewellery chosen with care for your everyday life and your big moments. Six years online, and now a shop in Akpakpa.") ?></p>
      <?php if (SITE['instagram'] || SITE['facebook'] || SITE['tiktok']): ?>
      <div class="footer__social">
        <?php if (SITE['instagram']): ?><a href="<?= e(SITE['instagram']) ?>" target="_blank" rel="noopener">Instagram</a><?php endif; ?>
        <?php if (SITE['facebook']): ?><a href="<?= e(SITE['facebook']) ?>" target="_blank" rel="noopener">Facebook</a><?php endif; ?>
        <?php if (SITE['tiktok']): ?><a href="<?= e(SITE['tiktok']) ?>" target="_blank" rel="noopener">TikTok</a><?php endif; ?>
      </div>
      <?php endif; ?>
    </div>
    <div>
      <h4><?= tr('Explorer', 'Explore') ?></h4>
      <?php foreach ($nav as $href => $label): ?><a href="<?= url($href) ?>"><?= e($label) ?></a><?php endforeach; ?>
    </div>
    <div>
      <h4><?= tr('La boutique', 'The shop') ?></h4>
      <p><?= e(f(SITE, 'adresse')) ?><br><?= e(f(SITE, 'ville')) ?></p>
      <p><?= tr('Mardi – dimanche : 10h – 20h<br>Lundi : fermé', 'Tuesday – Sunday: 10 am – 8 pm<br>Monday: closed') ?></p>
      <a href="<?= e(SITE['maps_url']) ?>" target="_blank" rel="noopener"><?= tr('Itinéraire Google Maps →', 'Directions on Google Maps →') ?></a>
    </div>
    <div>
      <h4><?= tr('Nous joindre', 'Get in touch') ?></h4>
      <a href="tel:<?= e(SITE['tel_href']) ?>"><?= e(SITE['telephone']) ?></a>
      <a href="<?= e(wa()) ?>" target="_blank" rel="noopener">WhatsApp</a>
      <p class="footer__rating"><span class="stars"><?= etoiles() ?></span> <?= note() ?>/5 · <?= SITE['nb_avis'] ?> <?= tr('avis Google', 'Google reviews') ?></p>
    </div>
  </div>
  <div class="container footer__bottom">
    <span>© <?= date('Y') ?> <?= e(SITE['nom']) ?> · <?= e(f(SITE, 'ville')) ?></span>
    <span><?= tr('Site réalisé par', 'Website by') ?> <a href="https://hyass-dev.vercel.app" target="_blank" rel="noopener">Hyass</a></span>
  </div>
</footer>

<!-- Barre d'onglets mobile (style application) -->
<nav class="tabbar" aria-label="<?= tr('Navigation mobile', 'Mobile navigation') ?>">
  <a href="<?= url('/') ?>" class="tab <?= $actif === '/' ? 'is-active' : '' ?>"><?= icon('home') ?><span><?= tr('Accueil', 'Home') ?></span></a>
  <a href="<?= url('/collection') ?>" class="tab <?= $actif === '/collection' ? 'is-active' : '' ?>"><?= icon('grid') ?><span>Collection</span></a>
  <button type="button" class="tab tab--main" data-cart-open aria-label="<?= tr('Voir ma sélection', 'View my selection') ?>">
    <span class="tab__bubble"><?= icon('bag') ?><span class="cart-count" data-cart-count>0</span></span>
    <span><?= tr('Sélection', 'Selection') ?></span>
  </button>
  <a href="<?= url('/notre-histoire') ?>" class="tab <?= $actif === '/notre-histoire' ? 'is-active' : '' ?>"><?= icon('book') ?><span><?= tr('Histoire', 'Story') ?></span></a>
  <a href="<?= url('/contact') ?>" class="tab <?= $actif === '/contact' ? 'is-active' : '' ?>"><?= icon('pin') ?><span><?= tr('Boutique', 'Shop') ?></span></a>
</nav>

<!-- Bouton WhatsApp flottant -->
<a class="wa-float" href="<?= e(wa($i18n['hello'])) ?>" target="_blank" rel="noopener" aria-label="<?= tr('Discuter sur WhatsApp', 'Chat on WhatsApp') ?>">
  <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16 3a13 13 0 0 0-11.2 19.6L3 29l6.6-1.7A13 13 0 1 0 16 3zm0 23.6c-2 0-4-.5-5.7-1.6l-.4-.2-3.9 1 1-3.8-.3-.4A10.6 10.6 0 1 1 16 26.6zm5.8-7.9c-.3-.2-1.9-.9-2.2-1-.3-.1-.5-.2-.7.2l-1 1.2c-.2.2-.4.2-.7.1a8.7 8.7 0 0 1-4.3-3.8c-.3-.5.3-.5.9-1.6.1-.2 0-.4 0-.6l-1-2.4c-.3-.6-.5-.5-.7-.5h-.6c-.2 0-.6.1-.9.4-.3.3-1.2 1.1-1.2 2.8s1.2 3.2 1.4 3.5c.2.2 2.4 3.6 5.7 5 2.1.9 3 1 4 .8.7-.1 1.9-.8 2.2-1.5.3-.8.3-1.4.2-1.5-.1-.2-.3-.2-.6-.4z"/></svg>
</a>

<!-- Tiroir « Ma sélection » -->
<div class="drawer" id="drawer" aria-hidden="true">
  <div class="drawer__overlay" data-close></div>
  <aside class="drawer__panel" role="dialog" aria-modal="true" aria-labelledby="drawerTitle">
    <div class="drawer__head">
      <h3 id="drawerTitle"><?= tr('Ma sélection', 'My selection') ?></h3>
      <button class="icon-btn" data-close aria-label="<?= tr('Fermer', 'Close') ?>">✕</button>
    </div>
    <div class="drawer__body" id="cartItems"></div>
    <form class="drawer__foot" id="orderForm">
      <p class="drawer__total" id="cartTotal"></p>
      <label for="orderName"><?= tr('Votre prénom', 'Your first name') ?><input id="orderName" type="text" name="nom" required autocomplete="given-name" placeholder="<?= tr('Ex. Aïcha', 'e.g. Aïcha') ?>"></label>
      <label for="orderMode"><?= tr('Je préfère', 'I prefer to') ?>
        <select id="orderMode" name="mode">
          <option><?= tr('Passer récupérer en boutique', 'Pick up at the shop') ?></option>
          <option><?= tr('Être livré(e) — on en discute', 'Get it delivered (to discuss)') ?></option>
        </select>
      </label>
      <label for="orderNote"><?= tr('Une précision ?', 'Anything to add?') ?> <span>(<?= tr('facultatif', 'optional') ?>)</span><textarea id="orderNote" name="note" rows="2" placeholder="<?= tr('Taille, couleur, occasion, budget…', 'Size, colour, occasion, budget…') ?>"></textarea></label>
      <button type="submit" class="btn btn--wa btn--block"><?= tr('Envoyer ma commande sur WhatsApp', 'Send my order on WhatsApp') ?></button>
      <p class="drawer__hint"><?= tr("Votre message s'ouvre dans WhatsApp, prêt à envoyer. On vous répond pour confirmer disponibilité et prix.", 'Your message opens in WhatsApp, ready to send. We reply to confirm availability and price.') ?></p>
    </form>
  </aside>
</div>

<!-- Aperçu produit -->
<div class="modal" id="modal" aria-hidden="true">
  <div class="modal__overlay" data-close></div>
  <div class="modal__box" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
    <button class="icon-btn modal__close" data-close aria-label="<?= tr('Fermer', 'Close') ?>">✕</button>
    <div class="modal__img"><img id="modalImg" alt=""></div>
    <div class="modal__info">
      <p class="eyebrow" id="modalCat"></p>
      <h3 id="modalTitle"></h3>
      <p class="modal__price" id="modalPrice"></p>
      <p id="modalDesc"></p>
      <div class="qty">
        <button type="button" data-qty="-1" aria-label="<?= e($i18n['less']) ?>">−</button>
        <span id="modalQty">1</span>
        <button type="button" data-qty="1" aria-label="<?= e($i18n['more']) ?>">+</button>
      </div>
      <div class="modal__actions">
        <button class="btn btn--dark" id="modalAdd"><?= tr('Ajouter à ma sélection', 'Add to my selection') ?></button>
        <a class="btn btn--wa" id="modalWa" target="_blank" rel="noopener"><?= tr('Commander directement', 'Order directly') ?></a>
      </div>
    </div>
  </div>
</div>

<!-- Visionneuse photos -->
<div class="lightbox" id="lightbox" aria-hidden="true" role="dialog" aria-modal="true" aria-label="<?= tr('Photo agrandie', 'Enlarged photo') ?>">
  <button class="lightbox__close icon-btn" data-lb-close aria-label="<?= tr('Fermer', 'Close') ?>">✕</button>
  <button class="lightbox__nav lightbox__prev" data-lb-step="-1" aria-label="<?= tr('Photo précédente', 'Previous photo') ?>">‹</button>
  <figure><img id="lbImg" alt=""><figcaption id="lbCap"></figcaption></figure>
  <button class="lightbox__nav lightbox__next" data-lb-step="1" aria-label="<?= tr('Photo suivante', 'Next photo') ?>">›</button>
</div>

<div class="toast" id="toast" role="status" aria-live="polite"></div>

<script>
  window.DBM = <?= json_encode([
      'lang'       => lang(),
      'whatsapp'   => SITE['whatsapp'],
      'collection' => url('/collection'),
      't'          => $i18n,
      'categories' => array_map(fn ($c) => f($c, 'nom'), CATEGORIES),
      'produits'   => array_map(fn ($p) => [
          'id' => $p['id'], 'cat' => $p['cat'], 'prix' => $p['prix'],
          'nom' => f($p, 'nom'), 'desc' => f($p, 'desc'),
          'img' => img($p['image'], 900), 'thumb' => img($p['image'], 200), 'prixTxt' => prix($p['prix']),
      ], PRODUITS),
  ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
</script>
<script src="/assets/js/app.js?v=3" defer></script>
</body>
</html>
