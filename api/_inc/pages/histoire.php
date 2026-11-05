<section class="page-hero">
  <div class="container">
    <p class="eyebrow"><?= tr('Notre histoire', 'Our story') ?></p>
    <h1><?= tr('Des bijoux, <em>et vous.</em>', 'Jewellery, <em>and you.</em>') ?></h1>
    <p><?= tr("Derrière le nom, une idée simple : un bijou n'est jamais qu'un objet. C'est un souvenir, une confiance en soi, un cadeau qui dit ce qu'on n'ose pas toujours dire.",
              "Behind the name is a simple idea: a piece of jewellery is never just an object. It's a memory, a boost of confidence, a gift that says what we don't always dare to say.") ?></p>
  </div>
</section>

<section class="section">
  <div class="container story">
    <div class="story__img story__img--wide reveal">
      <img src="<?= e(IMG . 'affiche.jpg') ?>" alt="<?= tr('L’affiche Des Bijoux & Moi : « Des bijoux qui vous rendent unique ! »', 'The Des Bijoux & Moi poster: “Des bijoux qui vous rendent unique!”') ?>" loading="lazy" width="718" height="533">
    </div>
    <div class="story__txt reveal">
      <p class="eyebrow"><?= tr('Les débuts', 'The beginning') ?></p>
      <h2><?= tr('Six ans <em>en ligne</em>', 'Six years <em>online</em>') ?></h2>
      <p><?= tr("Tout a commencé sur les réseaux, il y a près de six ans. Des photos, des messages, des conseils échangés une personne à la fois. Petit à petit, la confiance s'est installée et la communauté a grandi.",
                'It all started on social media almost six years ago. Photos, messages and advice shared one person at a time. Little by little, trust grew and so did the community.') ?></p>
      <p><?= tr("Ce qui fait revenir notre clientèle ? Des pièces qui tiennent dans le temps, et la sensation d'être vraiment écouté(e)s.",
                'What keeps customers coming back? Pieces that stand the test of time, and the feeling of being truly listened to.') ?></p>
    </div>
  </div>
</section>

<section class="section section--sand">
  <div class="container story story--rev">
    <div class="story__img story__img--wide reveal">
      <img src="<?= e(IMG . 'facade-jour.jpg') ?>" alt="<?= tr('La façade le jour de l’inauguration, tapis rouge et arche fleurie', 'The shopfront on opening day, red carpet and flower arch') ?>" loading="lazy" width="718" height="478">
    </div>
    <div class="story__txt reveal">
      <p class="eyebrow"><?= tr('Une nouvelle étape', 'A new chapter') ?></p>
      <h2><?= tr('Le ' . e(SITE['ouverture']) . ', <em>la boutique</em>', e(SITE['ouverture_en']) . ', <em>the shop</em>') ?></h2>
      <p><?= tr("Le " . e(SITE['ouverture']) . ", Des Bijoux et Moi a ouvert les portes de sa toute première boutique à Akpakpa, près du Ciné Concorde. Tapis rouge, arche de fleurs blanches et musique live : une inauguration à l'image de la maison. Aujourd'hui, c'est un espace chaleureux pour découvrir bijoux, montres et parfums, essayer, comparer, et repartir avec la pièce qui fera la différence.",
                "On " . e(SITE['ouverture_en']) . ", Des Bijoux et Moi opened the doors of its very first shop in Akpakpa, near Ciné Concorde. Red carpet, white flower arch and live music: an opening that reflects the brand. Today it is a warm space to discover jewellery, watches and perfumes, try on, compare and leave with the piece that makes the difference.") ?></p>
      <a href="<?= url('/contact') ?>" class="link-arrow"><?= tr('Venir nous voir →', 'Come and visit →') ?></a>
    </div>
  </div>
</section>

<section class="photo-band" aria-hidden="true">
  <img src="<?= e(IMG . 'enseigne-angle.jpg') ?>" alt="" loading="lazy">
  <img src="<?= e(IMG . 'interieur.jpg') ?>" alt="" loading="lazy">
  <img src="<?= e(IMG . 'facade-nuit.jpg') ?>" alt="" loading="lazy">
</section>

<section class="section">
  <div class="container">
    <div class="section__head section__head--center">
      <p class="eyebrow"><?= tr('Ce qui nous tient à cœur', 'What matters to us') ?></p>
      <h2><?= tr('Nos <em>engagements</em>', 'Our <em>promises</em>') ?></h2>
    </div>
    <div class="values">
      <div class="value reveal"><span>✦</span><h3><?= tr("L'accueil", 'A warm welcome') ?></h3><p><?= tr("Chaque client(e) est reçu(e) avec chaleur, que vous veniez pour un petit bijou ou pour une grande occasion.", 'Every customer is welcomed warmly, whether you come for a small piece or a big occasion.') ?></p></div>
      <div class="value reveal"><span>◇</span><h3><?= tr('La qualité', 'Quality') ?></h3><p><?= tr("Une sélection rigoureuse de pièces élégantes et durables. Rien n'est laissé au hasard.", 'A careful selection of elegant, long-lasting pieces. Nothing is left to chance.') ?></p></div>
      <div class="value reveal"><span>♡</span><h3><?= tr('Le conseil', 'Advice') ?></h3><p><?= tr('On prend le temps de comprendre votre style et votre budget pour vous orienter au mieux.', 'We take the time to understand your style and budget to guide you well.') ?></p></div>
    </div>
  </div>
</section>
