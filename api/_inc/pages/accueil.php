<!-- HERO -->
<section class="hero">
  <div class="container hero__grid">
    <div class="hero__text">
      <p class="eyebrow reveal"><?= tr('Une histoire qui dure · Akpakpa, Cotonou', 'A story that lasts · Akpakpa, Cotonou') ?></p>
      <h1 class="reveal"><?= tr('Des bijoux qui vous rendent <em>uniques.</em>', 'Jewellery that makes you <em>unique.</em>') ?></h1>
      <p class="hero__lead reveal"><?= tr("Bijoux, montres et accessoires pour elle et lui, alliances, bagues de fiançailles et parfums. Commandez en un message WhatsApp, ou venez essayer en boutique.",
                                          "Jewellery, watches and accessories for her and him, wedding bands, engagement rings and perfumes. Order in one WhatsApp message, or come and try them on in the shop.") ?></p>
      <div class="hero__cta reveal">
        <a href="<?= url('/collection') ?>" class="btn btn--dark"><?= tr('Découvrir la collection', 'Explore the collection') ?></a>
        <a href="<?= e(wa(tr("Bonjour Des Bijoux & Moi 👋\nJe cherche un bijou, pouvez-vous me conseiller ?", "Hello Des Bijoux & Moi 👋\nI'm looking for a piece of jewellery, could you advise me?"))) ?>" class="btn btn--wa" target="_blank" rel="noopener"><?= tr('Se faire conseiller', 'Get advice') ?></a>
      </div>
      <div class="hero__proof reveal">
        <a href="<?= url('/avis') ?>" class="proof">
          <span class="stars"><?= etoiles() ?></span>
          <span><strong><?= note() ?>/5</strong> · <?= SITE['nb_avis'] ?> <?= tr('avis Google', 'Google reviews') ?></span>
        </a>
        <span class="proof__sep"></span>
        <span class="proof"><?= tr('Mardi – dimanche, 10h – 20h', 'Tuesday – Sunday, 10 am – 8 pm') ?></span>
      </div>
    </div>

    <div class="hero__visual reveal">
      <figure class="hero__main">
        <img src="<?= e(IMG . 'conseillere.jpg') ?>" alt="<?= tr('Une conseillère Des Bijoux & Moi dans la boutique, devant le mur de colliers', 'A Des Bijoux & Moi advisor in the shop, in front of the necklace wall') ?>" width="718" height="1038" fetchpriority="high">
      </figure>
      <figure class="hero__small">
        <img src="<?= e(IMG . 'parure-zoom.jpg') ?>" alt="<?= tr('Parure émeraude en vitrine', 'Emerald set on display') ?>" width="450" height="478">
      </figure>
      <div class="hero__badge">
        <span><?= tr('Nouvelle boutique', 'New shop') ?></span>
        <strong><?= tr('Ouverte le ', 'Opened ') . e(f(SITE, 'ouverture')) ?></strong>
      </div>
    </div>
  </div>
</section>

<!-- PROMESSES -->
<section class="promises">
  <div class="container promises__grid">
    <div class="promise reveal"><span class="promise__ico">✦</span><div><h3><?= tr('Conseil personnalisé', 'Personal advice') ?></h3><p><?= tr("On vous aide à choisir selon votre style, l'occasion et votre budget.", 'We help you choose for your style, the occasion and your budget.') ?></p></div></div>
    <div class="promise reveal"><span class="promise__ico">✆</span><div><h3><?= tr('Commande en un message', 'Order in one message') ?></h3><p><?= tr('Choisissez vos pièces, on reçoit votre sélection sur WhatsApp.', 'Pick your pieces and we receive your selection on WhatsApp.') ?></p></div></div>
    <div class="promise reveal"><span class="promise__ico">◇</span><div><h3><?= tr('Pour elle et pour lui', 'For her and for him') ?></h3><p><?= tr('Bijoux, montres, alliances et parfums réunis au même endroit.', 'Jewellery, watches, wedding bands and perfumes in one place.') ?></p></div></div>
  </div>
</section>

<!-- CATÉGORIES -->
<section class="section">
  <div class="container">
    <div class="section__head section__head--row">
      <div>
        <p class="eyebrow"><?= tr('Nos univers', 'Our ranges') ?></p>
        <h2><?= tr('Trouvez votre <em>pièce</em>', 'Find your <em>piece</em>') ?></h2>
      </div>
      <a href="<?= url('/collection') ?>" class="link-arrow"><?= tr('Toute la collection →', 'Full collection →') ?></a>
    </div>
    <div class="cats">
      <?php foreach (CATEGORIES as $slug => $c): ?>
      <a href="<?= url('/collection') ?>#<?= e($slug) ?>" class="cat reveal">
        <img src="<?= e(img($c['image'])) ?>" alt="<?= e(f($c, 'nom')) ?>" loading="lazy" width="718" height="478">
        <div class="cat__txt">
          <h3><?= e(f($c, 'nom')) ?></h3>
          <p><?= e(f($c, 'texte')) ?></p>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- SÉLECTION -->
<section class="section section--sand">
  <div class="container">
    <div class="section__head section__head--row">
      <div>
        <p class="eyebrow"><?= tr('Coups de cœur', 'Favourites') ?></p>
        <h2><?= tr('La sélection <em>du moment</em>', 'Our <em>current picks</em>') ?></h2>
      </div>
      <a href="<?= url('/collection') ?>" class="link-arrow"><?= tr('Toute la collection →', 'Full collection →') ?></a>
    </div>
    <div class="grid">
      <?php foreach (array_slice(array_filter(PRODUITS, fn ($p) => $p['tag'] !== '' && $p['cat'] !== 'parfums'), 0, 8) as $p) include __DIR__ . '/../partials/produit.php'; ?>
    </div>
  </div>
</section>

<!-- DES SENTEURS & MOI -->
<section class="scent">
  <div class="container scent__grid">
    <figure class="scent__img reveal">
      <img src="<?= e(IMG . 'senteurs.jpg') ?>" alt="<?= tr('Le coin parfums Des Senteurs & Moi, étagère en arche dorée', 'The Des Senteurs & Moi perfume corner with its golden arch shelf') ?>" loading="lazy" width="718" height="432">
    </figure>
    <div class="scent__txt reveal">
      <p class="eyebrow eyebrow--gold"><?= tr('Nouveau en boutique', 'New in store') ?></p>
      <h2>Des Senteurs <em>&amp; Moi</em></h2>
      <p><?= tr("Notre coin parfums : des extraits concentrés à 30 %, pour un sillage qui tient toute la journée. Le complément idéal d'un bijou offert.",
                "Our perfume corner: extracts at 30% concentration for a scent that lasts all day. The perfect companion to a jewellery gift.") ?></p>
      <div class="scent__fact"><strong>30 %</strong><span><?= tr("de concentration en extrait de parfum", 'perfume extract concentration') ?></span></div>
      <a href="<?= url('/collection') ?>#parfums" class="btn btn--gold"><?= tr('Découvrir les parfums', 'Discover the perfumes') ?></a>
    </div>
  </div>
</section>

<!-- HISTOIRE -->
<section class="section">
  <div class="container story">
    <div class="story__img story__img--wide reveal">
      <img src="<?= e(IMG . 'interieur.jpg') ?>" alt="<?= tr("L'intérieur de la boutique Des Bijoux & Moi Deluxe, vitrines en arche", 'Inside the Des Bijoux & Moi Deluxe shop, arched display niches') ?>" loading="lazy" width="718" height="478">
    </div>
    <div class="story__txt reveal">
      <p class="eyebrow"><?= tr('Notre histoire', 'Our story') ?></p>
      <h2><?= tr("Six ans en ligne,<br><em>une boutique aujourd'hui.</em>", 'Six years online,<br><em>a shop today.</em>') ?></h2>
      <p><?= tr("Pendant près de six ans, Des Bijoux & Moi a accompagné sa clientèle en ligne, message après message, bijou après bijou. Le " . e(SITE['ouverture']) . ", la maison a ouvert sa toute première boutique à Akpakpa pour vous faire vivre l'expérience en vrai : toucher, essayer, prendre le temps de choisir.",
                "For almost six years, Des Bijoux & Moi served its customers online, one message and one piece at a time. On " . e(SITE['ouverture_en']) . ", the brand opened its very first shop in Akpakpa so you can enjoy the experience in person: touch, try on and take your time to choose.") ?></p>
      <p><?= tr("La même attention qu'avant, avec en plus un lieu chaleureux où l'on est accueilli comme un proche.", 'The same care as always, now with a warm place where you are welcomed like family.') ?></p>
      <a href="<?= url('/notre-histoire') ?>" class="link-arrow"><?= tr('Lire notre histoire →', 'Read our story →') ?></a>
    </div>
  </div>
</section>

<!-- GALERIE -->
<section class="section section--sand">
  <div class="container">
    <div class="section__head section__head--row">
      <div>
        <p class="eyebrow"><?= tr('La boutique en images', 'The shop in pictures') ?></p>
        <h2><?= tr('Bienvenue <em>chez nous</em>', 'Welcome <em>to our shop</em>') ?></h2>
      </div>
      <a href="<?= e(SITE['maps_url']) ?>" target="_blank" rel="noopener" class="link-arrow"><?= tr('Plus de photos sur Google →', 'More photos on Google →') ?></a>
    </div>
    <div class="gallery">
      <?php foreach (GALERIE as $i => $g): ?>
      <button type="button" class="gallery__item <?= $g['size'] ? 'gallery__item--' . e($g['size']) : '' ?> reveal" data-lb="<?= $i ?>" aria-label="<?= tr('Agrandir', 'Enlarge') ?> : <?= e(f($g, 'alt')) ?>">
        <img src="<?= e($g['src']) ?>" alt="<?= e(f($g, 'alt')) ?>" loading="lazy">
      </button>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- COMMENT COMMANDER -->
<section class="section section--dark">
  <div class="container">
    <div class="section__head section__head--center">
      <p class="eyebrow eyebrow--gold"><?= tr('Simple comme un message', 'As simple as a message') ?></p>
      <h2><?= tr('Comment <em>commander ?</em>', 'How to <em>order</em>') ?></h2>
    </div>
    <ol class="steps">
      <li class="reveal"><span>01</span><h3><?= tr('Choisissez', 'Choose') ?></h3><p><?= tr('Parcourez la collection et ajoutez vos coups de cœur à votre sélection.', 'Browse the collection and add your favourites to your selection.') ?></p></li>
      <li class="reveal"><span>02</span><h3><?= tr('Envoyez', 'Send') ?></h3><p><?= tr('Un clic : votre sélection part sur notre WhatsApp, déjà rédigée.', 'One tap and your selection goes to our WhatsApp, already written.') ?></p></li>
      <li class="reveal"><span>03</span><h3><?= tr('Recevez', 'Receive') ?></h3><p><?= tr("On confirme disponibilité et prix, puis retrait en boutique ou livraison selon ce qu'on convient ensemble.", 'We confirm availability and price, then you pick up at the shop or we arrange delivery together.') ?></p></li>
    </ol>
    <div class="center"><a href="<?= url('/collection') ?>" class="btn btn--gold"><?= tr('Commencer ma sélection', 'Start my selection') ?></a></div>
  </div>
</section>

<!-- AVIS -->
<section class="section">
  <div class="container">
    <div class="section__head section__head--row">
      <div>
        <p class="eyebrow"><?= tr('Vos avis', 'Your reviews') ?></p>
        <h2><?= note() ?>/5 <?= tr('sur', 'on') ?> <em>Google</em></h2>
      </div>
      <a href="<?= url('/avis') ?>" class="link-arrow"><?= tr('Tous les avis →', 'All reviews →') ?></a>
    </div>
    <div class="reviews reviews--photo">
      <figure class="reviews__photo reveal">
        <img src="<?= e(IMG . 'conseil-clients.jpg') ?>" alt="<?= tr('Des clients conseillés au comptoir', 'Customers getting advice at the counter') ?>" loading="lazy" width="718" height="478">
        <figcaption><?= tr('Un accueil chaleureux, de vrais conseils.', 'A warm welcome and genuine advice.') ?></figcaption>
      </figure>
      <?php foreach (array_slice(AVIS, 1, 2) as $a): ?>
      <blockquote class="review reveal">
        <span class="stars"><?= etoiles() ?></span>
        <p><?= e(f($a, 'texte')) ?></p>
        <footer><?= tr('Avis Google', 'Google review') ?></footer>
      </blockquote>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- VISITE -->
<section class="section section--sand">
  <div class="container visit">
    <div class="visit__txt reveal">
      <p class="eyebrow"><?= tr('Venez nous voir', 'Come and see us') ?></p>
      <h2><?= tr('Passez en <em>boutique</em>', 'Visit the <em>shop</em>') ?></h2>
      <p class="visit__addr"><?= e(f(SITE, 'adresse')) ?>, <?= e(f(SITE, 'ville')) ?></p>
      <p><?= tr("Repérez l'enseigne bleu nuit et or, juste à côté du Ciné Concorde. Mardi – dimanche : 10h – 20h · Lundi : fermé.", 'Look for the navy and gold sign, right by Ciné Concorde. Tuesday – Sunday: 10 am – 8 pm · Monday: closed.') ?></p>
      <div class="hero__cta">
        <a href="<?= e(SITE['maps_url']) ?>" class="btn btn--dark" target="_blank" rel="noopener"><?= tr('Itinéraire', 'Directions') ?></a>
        <a href="tel:<?= e(SITE['tel_href']) ?>" class="btn btn--outline"><?= tr('Appeler', 'Call') ?></a>
      </div>
    </div>
    <figure class="visit__photo reveal">
      <img src="<?= e(IMG . 'facade-nuit.jpg') ?>" alt="<?= tr('La façade Des Bijoux & Moi illuminée le soir', 'The Des Bijoux & Moi shopfront lit up in the evening') ?>" loading="lazy" width="718" height="478">
    </figure>
  </div>
</section>
