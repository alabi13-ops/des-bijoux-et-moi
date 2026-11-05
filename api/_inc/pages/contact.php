<?php $aujourdhui = (int) date('N'); $statut = statut_ouverture(); ?>
<section class="page-hero">
  <div class="container">
    <p class="eyebrow"><?= tr('La boutique', 'The shop') ?></p>
    <h1><?= tr('Venez <em>nous voir</em>', 'Come <em>and see us</em>') ?></h1>
    <p><?= tr('Essayer, comparer, demander conseil : on vous accueille avec plaisir à Akpakpa.', 'Try on, compare, ask for advice: we look forward to welcoming you in Akpakpa.') ?></p>
  </div>
</section>

<section class="section section--tight">
  <div class="container contact">
    <div class="contact__info">
      <figure class="contact__photo reveal">
        <img src="<?= e(IMG . 'enseigne.jpg') ?>" alt="<?= tr("L'enseigne Des Bijoux & Moi au-dessus de l'entrée", 'The Des Bijoux & Moi sign above the entrance') ?>" loading="lazy" width="718" height="478">
        <figcaption><?= tr("Repérez l'enseigne bleu nuit et or", 'Look for the navy and gold sign') ?></figcaption>
      </figure>
      <div class="info-card reveal">
        <h3><?= tr('Adresse', 'Address') ?></h3>
        <p><?= e(f(SITE, 'adresse')) ?><br><?= e(f(SITE, 'ville')) ?></p>
        <a href="<?= e(SITE['maps_url']) ?>" target="_blank" rel="noopener" class="link-arrow"><?= tr("Ouvrir l'itinéraire →", 'Get directions →') ?></a>
      </div>

      <div class="info-card reveal">
        <h3><?= tr('Horaires', 'Opening hours') ?> <span class="badge <?= $statut['ouvert'] ? 'badge--open' : '' ?>"><?= $statut['ouvert'] ? tr('Ouvert', 'Open') : tr('Fermé', 'Closed') ?></span></h3>
        <table class="hours">
          <?php foreach (array_keys(JOURS) as $n): $h = HORAIRES[$n]; ?>
          <tr class="<?= $n === $aujourdhui ? 'is-today' : '' ?>">
            <td><?= e(jour($n)) ?><?php if ($n === $aujourdhui): ?> <small><?= tr("· aujourd'hui", '· today') ?></small><?php endif; ?></td>
            <td><?= $h ? heure($h[0]) . ' – ' . heure($h[1]) : tr('Fermé', 'Closed') ?></td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>

      <div class="info-card reveal">
        <h3><?= tr('Téléphone & WhatsApp', 'Phone & WhatsApp') ?></h3>
        <p><a href="tel:<?= e(SITE['tel_href']) ?>"><?= e(SITE['telephone']) ?></a></p>
        <div class="hero__cta">
          <a href="tel:<?= e(SITE['tel_href']) ?>" class="btn btn--outline btn--sm"><?= tr('Appeler', 'Call') ?></a>
          <a href="<?= e(wa()) ?>" class="btn btn--wa btn--sm" target="_blank" rel="noopener">WhatsApp</a>
        </div>
      </div>
    </div>

    <div class="contact__side">
      <form class="form reveal" id="contactForm">
        <h2><?= tr('Écrivez-<em>nous</em>', 'Write <em>to us</em>') ?></h2>
        <p><?= tr("Votre message s'ouvre directement dans WhatsApp, prêt à être envoyé.", 'Your message opens directly in WhatsApp, ready to send.') ?></p>
        <label for="cName"><?= tr('Votre prénom', 'Your first name') ?><input id="cName" name="nom" required autocomplete="given-name" placeholder="<?= tr('Ex. Fifamè', 'e.g. Fifamè') ?>"></label>
        <label for="cSubject"><?= tr('Vous souhaitez', 'You would like') ?>
          <select id="cSubject" name="sujet">
            <option><?= tr('Un conseil pour choisir un bijou', 'Advice on choosing a piece') ?></option>
            <option><?= tr('Une idée cadeau', 'A gift idea') ?></option>
            <option><?= tr('Un bijou pour une cérémonie (mariage, dot…)', 'A piece for a ceremony (wedding, traditional engagement…)') ?></option>
            <option><?= tr("Connaître la disponibilité d'un article", 'To check if an item is available') ?></option>
            <option><?= tr('Autre chose', 'Something else') ?></option>
          </select>
        </label>
        <label for="cMessage"><?= tr('Votre message', 'Your message') ?><textarea id="cMessage" name="message" rows="4" required placeholder="<?= tr("Dites-nous ce que vous cherchez, votre budget, l'occasion…", "Tell us what you're looking for, your budget, the occasion…") ?>"></textarea></label>
        <button class="btn btn--wa btn--block" type="submit"><?= tr('Envoyer sur WhatsApp', 'Send on WhatsApp') ?></button>
      </form>

      <div class="contact__map reveal">
        <iframe title="<?= tr('Carte', 'Map') ?> : Des Bijoux et Moi, Akpakpa" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
          src="https://www.google.com/maps?q=<?= SITE['lat'] ?>,<?= SITE['lng'] ?>&z=16&hl=<?= lang() ?>&output=embed"></iframe>
      </div>
    </div>
  </div>
</section>
