<?php /** @var array $p */ $pNom = f($p, 'nom'); $pCat = cat_nom($p['cat']); $pTag = f($p, 'tag'); ?>
<article class="card reveal" data-cat="<?= e($p['cat']) ?>" data-name="<?= e(mb_strtolower($pNom . ' ' . $pCat . ' ' . $p['nom'])) ?>">
  <button class="card__media" data-view="<?= e($p['id']) ?>" aria-label="<?= tr('Voir', 'View') ?> <?= e($pNom) ?>">
    <img src="<?= e(img($p['image'], 600)) ?>" alt="<?= e($pNom) ?>" loading="lazy" width="600" height="750">
    <?php if ($pTag): ?><span class="card__tag"><?= e($pTag) ?></span><?php endif; ?>
    <span class="card__zoom"><?= tr('Voir le bijou', 'View piece') ?></span>
  </button>
  <div class="card__body">
    <p class="card__cat"><?= e($pCat) ?></p>
    <h3 class="card__title"><?= e($pNom) ?></h3>
    <p class="card__price"><?= e(prix($p['prix'])) ?></p>
    <div class="card__actions">
      <button class="btn btn--outline btn--sm" data-add="<?= e($p['id']) ?>"><?= tr('+ Sélection', '+ Selection') ?></button>
      <a class="btn btn--wa btn--sm" target="_blank" rel="noopener"
         href="<?= e(wa(tr("Bonjour Des Bijoux et Moi 👋\nJe suis intéressé(e) par : *{$pNom}* ({$pCat}).\nEst-il disponible ? Merci !",
                          "Hello Des Bijoux et Moi 👋\nI'm interested in: *{$pNom}* ({$pCat}).\nIs it available? Thank you!"))) ?>"><?= tr('Commander', 'Order') ?></a>
    </div>
  </div>
</article>
