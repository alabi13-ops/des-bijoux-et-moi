<section class="page-hero">
  <div class="container">
    <p class="eyebrow"><?= tr('La collection', 'The collection') ?></p>
    <h1><?= tr('Tous nos <em>bijoux</em>', 'All our <em>jewellery</em>') ?></h1>
    <p><?= tr('Ajoutez vos coups de cœur à votre sélection, puis envoyez-la sur WhatsApp en un clic. Les prix et la disponibilité vous sont confirmés directement.',
              'Add your favourites to your selection, then send it on WhatsApp in one tap. We confirm prices and availability directly with you.') ?></p>
  </div>
</section>

<section class="section section--tight">
  <div class="container">
    <div class="toolbar">
      <div class="chips" role="tablist" aria-label="<?= tr('Filtrer par catégorie', 'Filter by category') ?>">
        <button class="chip is-active" data-filter="all" role="tab" aria-selected="true"><?= tr('Tout', 'All') ?> <span><?= count(PRODUITS) ?></span></button>
        <?php foreach (CATEGORIES as $slug => $c): ?>
          <button class="chip" data-filter="<?= e($slug) ?>" role="tab" aria-selected="false"><?= e(f($c, 'nom')) ?> <span><?= count(produits_par_cat($slug)) ?></span></button>
        <?php endforeach; ?>
      </div>
      <label class="search" for="search">
        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="M20 20l-4-4"/></svg>
        <input type="search" id="search" placeholder="<?= tr('Rechercher un bijou…', 'Search for a piece…') ?>" aria-label="<?= tr('Rechercher un bijou', 'Search for a piece') ?>">
      </label>
    </div>

    <div class="grid" id="productGrid">
      <?php foreach (PRODUITS as $p) include __DIR__ . '/../partials/produit.php'; ?>
    </div>

    <div class="empty" id="empty" hidden>
      <p><?= tr('Aucun bijou ne correspond à votre recherche.', 'No piece matches your search.') ?></p>
      <a class="btn btn--wa" target="_blank" rel="noopener" href="<?= e(wa(tr("Bonjour 👋 Je cherche un bijou précis, pouvez-vous m'aider ?", "Hello 👋 I'm looking for a specific piece, can you help me?"))) ?>"><?= tr('Demander sur WhatsApp', 'Ask on WhatsApp') ?></a>
    </div>

    <aside class="custom reveal">
      <div>
        <h2><?= tr('Vous ne trouvez pas <em>votre bonheur ?</em>', "Can't find <em>what you want?</em>") ?></h2>
        <p><?= tr("Toutes nos pièces ne sont pas en ligne. Envoyez-nous une photo ou une idée : on vous montre ce qu'on a en boutique.", "Not all our pieces are online. Send us a photo or an idea and we'll show you what we have in the shop.") ?></p>
      </div>
      <a class="btn btn--wa" target="_blank" rel="noopener" href="<?= e(wa(tr("Bonjour Des Bijoux et Moi 👋\nJe cherche un bijou en particulier, je vous envoie une photo / une idée :", "Hello Des Bijoux et Moi 👋\nI'm looking for a particular piece, here is a photo / an idea:"))) ?>"><?= tr('Envoyer une photo', 'Send a photo') ?></a>
    </aside>
  </div>
</section>
