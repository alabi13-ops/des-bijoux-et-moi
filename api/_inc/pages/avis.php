<section class="page-hero">
  <div class="container">
    <p class="eyebrow"><?= tr('Avis clients', 'Customer reviews') ?></p>
    <h1><?= tr("Ce qu'on dit <em>de nous</em>", 'What people <em>say about us</em>') ?></h1>
    <div class="score">
      <strong><?= note() ?></strong>
      <div>
        <span class="stars stars--lg"><?= etoiles() ?></span>
        <p><?= SITE['nb_avis'] ?> <?= tr('avis vérifiables sur Google', 'reviews you can check on Google') ?></p>
      </div>
    </div>
  </div>
</section>

<section class="section section--tight">
  <div class="container">
    <div class="reviews reviews--masonry">
      <?php foreach (AVIS as $a): ?>
      <blockquote class="review reveal">
        <span class="stars"><?= etoiles() ?></span>
        <p><?= e(f($a, 'texte')) ?></p>
        <footer><?= tr('Avis Google', 'Google review') ?></footer>
      </blockquote>
      <?php endforeach; ?>
    </div>

    <aside class="custom reveal">
      <div>
        <h2><?= tr('Déjà passé(e) <em>chez nous ?</em>', 'Already <em>visited us?</em>') ?></h2>
        <p><?= tr("Votre avis aide d'autres personnes à nous découvrir. Ça prend une minute et ça nous fait très plaisir 🧡", 'Your review helps others discover us. It takes a minute and it means a lot to us 🧡') ?></p>
      </div>
      <div class="hero__cta">
        <a class="btn btn--dark" target="_blank" rel="noopener" href="<?= e(SITE['avis_url']) ?>"><?= tr('Laisser un avis', 'Leave a review') ?></a>
        <a class="btn btn--outline" target="_blank" rel="noopener" href="<?= e(SITE['maps_url']) ?>"><?= tr('Voir sur Google', 'See on Google') ?></a>
      </div>
    </aside>
  </div>
</section>
