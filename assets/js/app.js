/* Des Bijoux et Moi — interactions : thème, filtres, aperçu, sélection WhatsApp */
(() => {
  'use strict';
  document.documentElement.classList.add('js');

  const D = window.DBM || { produits: [], categories: {}, whatsapp: '', t: {}, lang: 'fr' };
  const T = D.t;
  const byId = Object.fromEntries(D.produits.map(p => [p.id, p]));
  const $ = (s, c = document) => c.querySelector(s);
  const $$ = (s, c = document) => [...c.querySelectorAll(s)];
  const esc = s => String(s).replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
  const waLink = msg => `https://wa.me/${D.whatsapp}?text=${encodeURIComponent(msg)}`;
  const openWa = msg => {
    const a = document.createElement('a');
    a.href = waLink(msg); a.target = '_blank'; a.rel = 'noopener';
    document.body.appendChild(a); a.click(); a.remove();
  };

  /* ---------- Mode sombre ---------- */
  const root = document.documentElement;
  const themeBtn = $('#themeToggle');
  const mq = window.matchMedia ? matchMedia('(prefers-color-scheme: dark)') : null;
  const isDark = () => root.dataset.theme ? root.dataset.theme === 'dark' : !!(mq && mq.matches);
  const syncThemeBtn = () => {
    if (!themeBtn) return;
    const dark = isDark();
    themeBtn.setAttribute('aria-label', dark ? T.light : T.dark);
    themeBtn.setAttribute('aria-pressed', String(dark));
  };
  themeBtn?.addEventListener('click', () => {
    const next = isDark() ? 'light' : 'dark';
    root.dataset.theme = next;
    try { localStorage.setItem('dbm_theme', next); } catch (_) {}
    syncThemeBtn();
  });
  mq?.addEventListener?.('change', syncThemeBtn);
  syncThemeBtn();

  /* ---------- Header au scroll ---------- */
  const header = $('#header');
  const onScroll = () => header?.classList.toggle('is-scrolled', scrollY > 10);
  addEventListener('scroll', onScroll, { passive: true }); onScroll();

  /* ---------- Apparition au scroll ---------- */
  const io = 'IntersectionObserver' in window && new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); } });
  }, { threshold: .12, rootMargin: '0px 0px -40px' });
  $$('.reveal').forEach((el, i) => {
    el.style.transitionDelay = `${(i % 4) * 70}ms`;
    io ? io.observe(el) : el.classList.add('is-in');
  });

  /* ---------- Toast ---------- */
  const toast = $('#toast'); let toastT;
  const notify = txt => {
    toast.textContent = txt; toast.classList.add('is-show');
    clearTimeout(toastT); toastT = setTimeout(() => toast.classList.remove('is-show'), 2400);
  };

  /* ---------- Sélection (panier) ---------- */
  const KEY = 'dbm_selection';
  let cart = {};
  try { cart = JSON.parse(localStorage.getItem(KEY)) || {}; } catch (_) { cart = {}; }
  Object.keys(cart).forEach(id => { if (!byId[id]) delete cart[id]; });
  const save = () => { try { localStorage.setItem(KEY, JSON.stringify(cart)); } catch (_) {} };

  const counts = $$('[data-cart-count]');
  const openers = $$('[data-cart-open]');
  const itemsEl = $('#cartItems'), totalEl = $('#cartTotal'), form = $('#orderForm');
  const fcfa = n => n.toLocaleString(D.lang === 'en' ? 'en-US' : 'fr-FR').replace(/ | /g, ' ') + ' FCFA';

  function renderCart() {
    const ids = Object.keys(cart);
    const n = ids.reduce((s, id) => s + cart[id], 0);
    counts.forEach(c => { c.textContent = n; c.classList.toggle('has-items', n > 0); });
    form.classList.toggle('is-empty', n === 0);

    if (!n) {
      itemsEl.innerHTML = `<div class="empty-cart"><strong>${esc(T.emptyTitle)}</strong>${esc(T.emptyText)}
        <div><a class="btn btn--dark" href="${esc(D.collection)}" data-close>${esc(T.seeColl)}</a></div></div>`;
      return;
    }
    itemsEl.innerHTML = ids.map(id => {
      const p = byId[id];
      return `<div class="line">
        <img src="${esc(p.thumb)}" alt="">
        <div><h4>${esc(p.nom)}</h4><p>${esc(D.categories[p.cat])} · ${esc(p.prixTxt)}</p></div>
        <div class="line__ctrl">
          <div class="qty"><button type="button" data-dec="${id}" aria-label="${esc(T.less)}">−</button><span>${cart[id]}</span><button type="button" data-inc="${id}" aria-label="${esc(T.more)}">+</button></div>
          <button type="button" class="line__remove" data-del="${id}">${esc(T.remove)}</button>
        </div></div>`;
    }).join('');

    const priced = ids.filter(id => byId[id].prix !== null);
    const total = priced.reduce((s, id) => s + byId[id].prix * cart[id], 0);
    totalEl.innerHTML = priced.length === ids.length
      ? `<span>${esc(T.total)}</span><span>${fcfa(total)}</span>`
      : `<span>${n} ${esc(n > 1 ? T.itemsPl : T.items)}</span><span style="font-weight:500;color:var(--muted)">${esc(T.confirm)}</span>`;
  }

  function add(id, qty = 1) {
    if (!byId[id]) return;
    cart[id] = (cart[id] || 0) + qty; save(); renderCart();
    openers.forEach(b => { b.classList.remove('bump'); void b.offsetWidth; b.classList.add('bump'); });
    notify(`✓ ${byId[id].nom} ${T.added}`);
  }

  itemsEl.addEventListener('click', e => {
    const t = e.target.closest('button'); if (!t) return;
    const { inc, dec, del } = t.dataset;
    if (!inc && !dec && !del) return;
    if (inc) cart[inc]++;
    if (dec) { cart[dec]--; if (cart[dec] < 1) delete cart[dec]; }
    if (del) delete cart[del];
    save(); renderCart();
  });

  /* ---------- Ouverture / fermeture des panneaux ---------- */
  const drawer = $('#drawer'), modal = $('#modal');
  let lastFocus;
  const openPanel = el => {
    lastFocus = document.activeElement; el.classList.add('is-open'); el.setAttribute('aria-hidden', 'false');
    document.body.classList.add('no-scroll'); setTimeout(() => $('.icon-btn[data-close]', el)?.focus(), 50);
  };
  const closePanel = el => {
    el.classList.remove('is-open'); el.setAttribute('aria-hidden', 'true');
    if (!$('.drawer.is-open, .modal.is-open')) document.body.classList.remove('no-scroll');
    lastFocus?.focus?.();
  };
  [drawer, modal].forEach(el => el.addEventListener('click', e => { if (e.target.closest('[data-close]')) closePanel(el); }));
  addEventListener('keydown', e => {
    if (e.key !== 'Escape') return;
    if (modal.classList.contains('is-open')) closePanel(modal);
    else if (drawer.classList.contains('is-open')) closePanel(drawer);
  });
  openers.forEach(b => b.addEventListener('click', () => openPanel(drawer)));

  /* ---------- Aperçu produit ---------- */
  let current = null, qty = 1;
  const mQty = $('#modalQty');
  const productMsg = (p, q) => `${T.hello}\n${T.iWant}\n• ${q} × *${p.nom}* (${D.categories[p.cat]})\n\n${T.avail}`;
  const syncModalWa = () => { $('#modalWa').href = waLink(productMsg(current, qty)); };

  function openProduct(id) {
    current = byId[id]; if (!current) return; qty = 1; mQty.textContent = qty;
    $('#modalImg').src = current.img; $('#modalImg').alt = current.nom;
    $('#modalCat').textContent = D.categories[current.cat];
    $('#modalTitle').textContent = current.nom;
    $('#modalPrice').textContent = current.prixTxt;
    $('#modalDesc').textContent = current.desc;
    syncModalWa(); openPanel(modal);
  }
  $$('[data-qty]', modal).forEach(b => b.addEventListener('click', () => {
    qty = Math.max(1, qty + Number(b.dataset.qty)); mQty.textContent = qty; syncModalWa();
  }));
  $('#modalAdd').addEventListener('click', () => { add(current.id, qty); closePanel(modal); });

  document.addEventListener('click', e => {
    const v = e.target.closest('[data-view]'); if (v) { openProduct(v.dataset.view); return; }
    const a = e.target.closest('[data-add]'); if (a) add(a.dataset.add);
  });

  /* ---------- Envoi de la commande ---------- */
  form.addEventListener('submit', e => {
    e.preventDefault();
    const f = new FormData(form);
    const lines = Object.keys(cart).map(id => `• ${cart[id]} × *${byId[id].nom}* (${D.categories[byId[id].cat]})${byId[id].prix !== null ? ' — ' + byId[id].prixTxt : ''}`);
    let msg = `${T.hello}\n${T.iAm} ${f.get('nom').trim()} ${T.iOrder}\n\n${lines.join('\n')}\n\n📦 ${f.get('mode')}`;
    const note = (f.get('note') || '').trim();
    if (note) msg += `\n📝 ${note}`;
    msg += `\n\n${T.confirmMsg}`;
    openWa(msg);
  });

  /* ---------- Formulaire de contact ---------- */
  const contact = $('#contactForm');
  contact?.addEventListener('submit', e => {
    e.preventDefault();
    const f = new FormData(contact);
    openWa(`${T.hello}\n${T.iAm} ${f.get('nom').trim()}.\n${T.subject} : ${f.get('sujet')}\n\n${f.get('message').trim()}`);
  });

  /* ---------- Filtres de la collection ---------- */
  const grid = $('#productGrid');
  if (grid) {
    const chips = $$('.chip'), search = $('#search'), empty = $('#empty');
    const norm = s => s.toLowerCase().normalize('NFD').replace(/[̀-ͯ]/g, '');
    let filter = 'all';
    const apply = () => {
      const q = norm(search.value.trim());
      let shown = 0;
      $$('.card', grid).forEach(c => {
        const ok = (filter === 'all' || c.dataset.cat === filter) && (!q || norm(c.dataset.name).includes(q));
        c.classList.toggle('is-hidden', !ok);
        if (ok) { shown++; c.classList.add('is-in'); }
      });
      empty.hidden = shown > 0;
    };
    const setFilter = f => {
      filter = chips.some(c => c.dataset.filter === f) ? f : 'all';
      chips.forEach(c => { const on = c.dataset.filter === filter; c.classList.toggle('is-active', on); c.setAttribute('aria-selected', String(on)); });
      apply();
    };
    chips.forEach(c => c.addEventListener('click', () => {
      setFilter(c.dataset.filter);
      if (!window.DBM_PREVIEW) history.replaceState(null, '', filter === 'all' ? location.pathname : '#' + filter);
    }));
    search.addEventListener('input', apply);
    setFilter(window.DBM_PREVIEW ? 'all' : (location.hash.slice(1) || 'all'));
  }

  /* ---------- Visionneuse photos (galerie) ---------- */
  const lb = $('#lightbox');
  const shots = $$('[data-lb]');
  if (lb && shots.length) {
    const lbImg = $('#lbImg'), lbCap = $('#lbCap');
    let cur = 0, lbFrom;
    const show = i => {
      cur = (i + shots.length) % shots.length;
      const im = $('img', shots[cur]);
      lbImg.src = im.currentSrc || im.src; lbImg.alt = im.alt; lbCap.textContent = im.alt;
    };
    const openLb = i => { lbFrom = document.activeElement; show(i); lb.classList.add('is-open'); lb.setAttribute('aria-hidden', 'false'); document.body.classList.add('no-scroll'); $('[data-lb-close]', lb).focus(); };
    const closeLb = () => { lb.classList.remove('is-open'); lb.setAttribute('aria-hidden', 'true'); document.body.classList.remove('no-scroll'); lbFrom?.focus?.(); };
    shots.forEach((b, i) => b.addEventListener('click', () => openLb(i)));
    $('[data-lb-close]', lb).addEventListener('click', closeLb);
    $$('[data-lb-step]', lb).forEach(b => b.addEventListener('click', () => show(cur + Number(b.dataset.lbStep))));
    lb.addEventListener('click', e => { if (e.target === lb) closeLb(); });
    addEventListener('keydown', e => {
      if (!lb.classList.contains('is-open')) return;
      if (e.key === 'Escape') closeLb();
      if (e.key === 'ArrowRight') show(cur + 1);
      if (e.key === 'ArrowLeft') show(cur - 1);
    });
    let x0 = null;
    lb.addEventListener('touchstart', e => { x0 = e.touches[0].clientX; }, { passive: true });
    lb.addEventListener('touchend', e => { if (x0 === null) return; const dx = e.changedTouches[0].clientX - x0; if (Math.abs(dx) > 40) show(cur + (dx < 0 ? 1 : -1)); x0 = null; });
  }

  renderCart();
})();
