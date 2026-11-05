<?php
/**
 * Catalogue, catégories, galerie et avis (FR + EN).
 *
 * IMAGES : chemins vers /assets/img/boutique/ (photos de la fiche Google de la boutique, recadrées).
 * Pour ajouter un article : copier une ligne de PRODUITS, changer l'id, le nom, la photo.
 * PRIX : un nombre en FCFA (ex. 15000) ou null → « Prix sur demande »
 * Les champs *_en sont la version anglaise ; s'ils sont vides, le français est affiché.
 */

const IMG = '/assets/img/boutique/';

const CATEGORIES = [
    'colliers'  => ['nom' => 'Colliers & parures', 'nom_en' => 'Necklaces & sets', 'image' => IMG . 'parure-emeraude.jpg',
                    'texte' => 'Parures de cérémonie, chaînes et pendentifs', 'texte_en' => 'Ceremony sets, chains and pendants'],
    'bracelets' => ['nom' => 'Bracelets & joncs', 'nom_en' => 'Bracelets & bangles', 'image' => IMG . 'joncs-resine.jpg',
                    'texte' => 'Joncs dorés, manchettes et pierres de couleur', 'texte_en' => 'Gold bangles, cuffs and coloured stones'],
    'bagues'    => ['nom' => 'Bagues & alliances', 'nom_en' => 'Rings & wedding bands', 'image' => IMG . 'bagues.jpg',
                    'texte' => 'Bagues fantaisie, alliances et fiançailles', 'texte_en' => 'Fashion rings, wedding and engagement rings'],
    'montres'   => ['nom' => 'Montres', 'nom_en' => 'Watches', 'image' => IMG . 'montres-femme.jpg',
                    'texte' => 'Pour elle et pour lui', 'texte_en' => 'For her and for him'],
    'parfums'   => ['nom' => 'Des Senteurs & Moi', 'nom_en' => 'Des Senteurs & Moi', 'image' => IMG . 'senteurs.jpg',
                    'texte' => 'Extraits de parfum concentrés à 30 %', 'texte_en' => 'Perfume extracts, 30% concentration'],
];

const PRODUITS = [
    ['id' => 'c01', 'cat' => 'colliers', 'prix' => null, 'image' => IMG . 'parure-zoom.jpg',
     'nom' => 'Parure Émeraude', 'nom_en' => 'Emerald Set', 'tag' => "Pièce d'exception", 'tag_en' => 'Statement piece',
     'desc' => "Collier plastron, bracelet et boucles assortis, sertis de pierres vertes. La parure qui fait sensation à un mariage ou une dot.",
     'desc_en' => "Bib necklace with matching bracelet and earrings set with green stones. The set that turns heads at a wedding or traditional ceremony."],
    ['id' => 'c02', 'cat' => 'colliers', 'prix' => null, 'image' => IMG . 'chaines-couleur.jpg',
     'nom' => 'Chaînes Cubaines Pastel', 'nom_en' => 'Pastel Cuban Chains', 'tag' => 'Tendance', 'tag_en' => 'Trending',
     'desc' => "Grosses mailles cubaines en rose et vert d'eau, à porter seules ou superposées. Le style streetwear chic.",
     'desc_en' => "Chunky Cuban links in pink and mint, worn alone or layered. Chic streetwear style."],
    ['id' => 'c03', 'cat' => 'colliers', 'prix' => null, 'image' => IMG . 'colliers-vitrine.jpg',
     'nom' => 'Colliers dorés du quotidien', 'nom_en' => 'Everyday Gold Necklaces', 'tag' => '', 'tag_en' => '',
     'desc' => "Chaînes fines, pendentifs et perles : un mur entier de colliers à essayer en boutique pour trouver le vôtre.",
     'desc_en' => "Fine chains, pendants and pearls: a whole wall of necklaces to try on in the shop until you find yours."],
    ['id' => 'b01', 'cat' => 'bracelets', 'prix' => null, 'image' => IMG . 'joncs-resine.jpg',
     'nom' => 'Joncs Résine & Cristal', 'nom_en' => 'Resin & Crystal Bangles', 'tag' => 'Best-seller', 'tag_en' => 'Best-seller',
     'desc' => "Joncs larges en résine écaille, bleu nuit ou émeraude, ornés d'un cristal facetté. À accumuler avec des joncs dorés.",
     'desc_en' => "Wide resin bangles in tortoiseshell, navy or emerald, set with a faceted crystal. Stack them with gold bangles."],
    ['id' => 'b02', 'cat' => 'bracelets', 'prix' => null, 'image' => IMG . 'joncs-plateau.jpg',
     'nom' => 'Joncs & manchettes dorés', 'nom_en' => 'Gold Bangles & Cuffs', 'tag' => 'Nouveau', 'tag_en' => 'New',
     'desc' => "Manchettes torsadées, joncs fins et larges, dorés ou argentés : de quoi composer un poignet unique.",
     'desc_en' => "Twisted cuffs, slim and wide bangles in gold or silver tones: build a wrist that's all yours."],
    ['id' => 'g01', 'cat' => 'bagues', 'prix' => null, 'image' => IMG . 'bagues.jpg',
     'nom' => 'Bagues dorées fantaisie', 'nom_en' => 'Gold Fashion Rings', 'tag' => 'Best-seller', 'tag_en' => 'Best-seller',
     'desc' => "Un plateau entier de bagues sculptées, à pierre ou ajourées. On vous aide à trouver la bonne taille.",
     'desc_en' => "A whole tray of sculpted, stone-set and open rings. We help you find the right size."],
    ['id' => 'g02', 'cat' => 'bagues', 'prix' => null, 'image' => IMG . 'bagues-main.jpg',
     'nom' => 'Bagues statement', 'nom_en' => 'Statement Rings', 'tag' => '', 'tag_en' => '',
     'desc' => "Spirales, perles et pierres fines : des bagues qui se remarquent et se portent à plusieurs.",
     'desc_en' => "Spirals, pearls and fine stones: rings that get noticed and look great stacked."],
    ['id' => 'g03', 'cat' => 'bagues', 'prix' => null, 'image' => IMG . 'bagues-zoom.jpg',
     'nom' => 'Alliances & fiançailles', 'nom_en' => 'Wedding & Engagement Rings', 'tag' => 'Sur conseil', 'tag_en' => 'With advice',
     'desc' => "Le grand jour approche ? Venez choisir vos alliances ou votre bague de fiançailles avec nos conseils.",
     'desc_en' => "Big day coming up? Come and choose your wedding bands or engagement ring with our advice."],
    ['id' => 'm01', 'cat' => 'montres', 'prix' => null, 'image' => IMG . 'montres-femme.jpg',
     'nom' => 'Montres Femme', 'nom_en' => "Women's Watches", 'tag' => 'Pour elle', 'tag_en' => 'For her',
     'desc' => "Cadrans nacrés, verts ou bleu ciel, bracelets dorés ou rosés, certaines serties de strass.",
     'desc_en' => "Pearly, green or sky-blue dials on gold or rose-gold straps, some set with rhinestones."],
    ['id' => 'm02', 'cat' => 'montres', 'prix' => null, 'image' => IMG . 'montres-homme.jpg',
     'nom' => 'Montres Homme Chrono', 'nom_en' => "Men's Chronographs", 'tag' => 'Pour lui', 'tag_en' => 'For him',
     'desc' => "Chronographes sport et élégants, bracelet acier, cuir ou silicone. L'idée cadeau qui ne déçoit pas.",
     'desc_en' => "Sporty, elegant chronographs on steel, leather or silicone straps. A gift idea that never disappoints."],
    ['id' => 'm03', 'cat' => 'montres', 'prix' => null, 'image' => IMG . 'montres-pastel.jpg',
     'nom' => 'Montres couleurs pastel', 'nom_en' => 'Pastel Watches', 'tag' => '', 'tag_en' => '',
     'desc' => "Des cadrans menthe, turquoise et nacre pour une touche de couleur au poignet.",
     'desc_en' => "Mint, turquoise and mother-of-pearl dials for a touch of colour on your wrist."],
    ['id' => 'p01', 'cat' => 'parfums', 'prix' => null, 'image' => IMG . 'parfums.jpg',
     'nom' => 'Extraits de parfum 30 %', 'nom_en' => '30% Perfume Extracts', 'tag' => 'Des Senteurs & Moi', 'tag_en' => 'Des Senteurs & Moi',
     'desc' => "Notre coin parfums : des extraits concentrés à 30 % qui tiennent toute la journée. Venez les sentir en boutique.",
     'desc_en' => "Our perfume corner: extracts at 30% concentration that last all day. Come and smell them in the shop."],
];

/** Galerie « La boutique en images » */
const GALERIE = [
    ['src' => IMG . 'facade-jour.jpg',     'alt' => "La façade le jour de l'inauguration, tapis rouge et arche fleurie", 'alt_en' => 'The shopfront on opening day, red carpet and flower arch', 'size' => 'wide'],
    ['src' => IMG . 'conseillere.jpg',     'alt' => 'Une conseillère présente les montres en boutique', 'alt_en' => 'A sales advisor presenting watches in the shop', 'size' => 'tall'],
    ['src' => IMG . 'interieur.jpg',       'alt' => "L'intérieur de la boutique et ses vitrines en arche", 'alt_en' => 'Inside the shop with its arched display niches', 'size' => ''],
    ['src' => IMG . 'conseil-clients.jpg', 'alt' => 'Conseil personnalisé au comptoir', 'alt_en' => 'Personal advice at the counter', 'size' => ''],
    ['src' => IMG . 'cliente-boutique.jpg','alt' => 'Une cliente devant le mur de colliers', 'alt_en' => 'A customer in front of the necklace wall', 'size' => 'wide'],
    ['src' => IMG . 'enseigne-angle.jpg',  'alt' => "L'enseigne lumineuse « Une histoire qui dure »", 'alt_en' => 'The illuminated sign "Une histoire qui dure"', 'size' => ''],
    ['src' => IMG . 'affiche.jpg',         'alt' => "L'affiche « Des bijoux qui vous rendent unique »", 'alt_en' => 'The "Des bijoux qui vous rendent unique" poster', 'size' => ''],
    ['src' => IMG . 'facade-nuit.jpg',     'alt' => 'La boutique illuminée le soir', 'alt_en' => 'The shop lit up in the evening', 'size' => 'wide'],
];

/** Avis Google (fiche « DES BIJOUX ET MOI »), en français et en anglais. */
const AVIS = [
    ['texte' => "Franchement, une superbe découverte ! Des bijoux magnifiques, un beau choix, et tout ce qu'il faut pour trouver la pièce parfaite qui sublime votre style. Si vous aimez les bijoux qui apportent cette touche d'élégance en plus, je vous recommande vivement cette boutique. Vous ne serez pas déçu(e) ! 💎",
     'texte_en' => "Honestly, a wonderful discovery! Gorgeous jewelry, a great selection, and everything you need to find the perfect piece to enhance your style. If you love jewelry that adds that extra touch of elegance, I highly recommend checking out this boutique. You won't be disappointed! 💎"],
    ['texte' => "Je recommande vivement cette bijouterie ! L'accueil est chaleureux et très professionnel. Les bijoux sont d'une qualité exceptionnelle, avec des modèles élégants, modernes et raffinés. On ressent tout de suite le savoir-faire et la passion derrière chaque pièce. Une vraie pépite à Cotonou, allez-y sans hésiter ! ✨",
     'texte_en' => "I highly recommend this jewelry store! The welcome is warm and very professional. The jewelry is of exceptional quality, with designs that are elegant, modern, and refined. You can immediately feel the craftsmanship and passion behind each piece. A true gem in Cotonou, go without hesitation! ✨"],
    ['texte' => "Des Bijoux et Moi, c'est l'expérience à vivre si vous voulez des bijoux qui durent. Rien n'est laissé au hasard. Que ce soit pour une petite pièce du quotidien ou pour vos moments spéciaux, l'expérience client est toujours chaleureuse et accueillante 🧡",
     'texte_en' => "Des Bijoux et Moi is the experience to have if you want jewelry that lasts. Nothing is left to chance. Whether it's a small everyday piece or the perfect one for your special moments, the customer experience is always warm and welcoming 🧡"],
    ['texte' => "Une très belle bijouterie ! Les bijoux sont magnifiques, élégants et de très grande qualité. Le choix est varié, les modèles raffinés et ils conviennent à tous les styles. Je recommande cette boutique à tous ceux qui aiment les beaux bijoux. Vous ne serez pas déçus ! 🥰",
     'texte_en' => "A truly beautiful jewelry boutique! The jewelry is gorgeous, elegant, and of very high quality. The selection is varied, the designs are refined, and they perfectly suit all styles. I highly recommend this boutique to anyone who loves beautiful jewelry. You won't be disappointed! 🥰"],
    ['texte' => "J'aime beaucoup leur nouvelle boutique à Cotonou, très cosy. Les trois gammes de produits sont incroyables.",
     'texte_en' => "I really like their new cozy boutique in Cotonou. All three product lines are amazing."],
];
