(() => {
  const nav = document.querySelector('nav');
  if (!nav) return;
  if (document.getElementById('mobileMenuToggle') || document.getElementById('mobileMenu') || document.getElementById('globalMobileMenu')) {
    return; // page already has a mobile menu
  }

  const rightContainer =
    nav.querySelector('.flex.items-center.gap-3.text-white') ||
    nav.querySelector('.flex.items-center.gap-3') ||
    nav.querySelector('div:last-child');
  if (!rightContainer) return;

  // Inject minimal mobile styles
  if (!document.getElementById('globalMobileNavStyles')) {
    const style = document.createElement('style');
    style.id = 'globalMobileNavStyles';
    style.textContent = `
      @media (max-width: 768px) {
        #authButtons { display: none; }
      }
      #globalMobileMenu { z-index: 60; }
      #globalMobileMenu .drawer {
        width: 72vw;
        max-width: 320px;
        min-width: 260px;
      }
    `;
    document.head.appendChild(style);
  }

  // Create toggle button
  const toggle = document.createElement('button');
  toggle.id = 'mobileMenuToggle';
  toggle.setAttribute('aria-label', 'Menu');
  toggle.className = 'md:hidden p-2 rounded-full hover:bg-white/10 focus:outline-none';
  toggle.innerHTML = `
    <div class="space-y-1.5">
      <span class="block w-6 h-0.5 bg-white"></span>
      <span class="block w-6 h-0.5 bg-white"></span>
      <span class="block w-6 h-0.5 bg-white"></span>
    </div>
  `;
  rightContainer.appendChild(toggle);

  // Build drawer
  const overlay = document.createElement('div');
  overlay.id = 'globalMobileMenu';
  overlay.className = 'fixed inset-0 bg-black/70 backdrop-blur-sm hidden';
  overlay.innerHTML = `
    <div class="drawer absolute inset-y-0 right-0 bg-[#0b1220] border-l border-white/10 shadow-2xl p-6 flex flex-col gap-4">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <div class="relative w-32 h-10 overflow-hidden">
            <img src="/logo-dark.png" alt="Logo" class="w-full h-full object-contain logo-dark">
            <img src="/logo-light.png" alt="Logo" class="w-full h-full object-contain hidden logo-light">
          </div>
        </div>
        <button id="globalMobileMenuClose" class="p-2 rounded-full hover:bg-white/10" aria-label="Tutup menu">
          ✕
        </button>
      </div>
      <div class="flex flex-col gap-2 text-sm font-semibold" id="globalMobileLinks"></div>
      <div class="mt-auto pt-2 border-t border-white/10" id="globalMobileAuth"></div>
    </div>
  `;
  document.body.appendChild(overlay);

  const linksEl = overlay.querySelector('#globalMobileLinks');
  const authEl = overlay.querySelector('#globalMobileAuth');
  const closeBtn = overlay.querySelector('#globalMobileMenuClose');

  const LINKS = [
    { href: '/', label: 'Beranda' },
    { href: '/produk', label: 'Produk' },
    { href: '/orders', label: 'Riwayat' },
  ];

  function renderLinks() {
    if (!linksEl) return;
    linksEl.innerHTML = LINKS.map(link => `
      <a href="${link.href}" class="nav-link block px-3 py-2 rounded-lg hover:bg-white/5">${link.label}</a>
    `).join('');
  }

  function renderAuth() {
    if (!authEl) return;
    const tokenRaw = localStorage.getItem('token');
    const bearerRaw = localStorage.getItem('bearerToken');
    const hasAuth = !!(tokenRaw || bearerRaw || localStorage.getItem('isLogin') === 'true');
    const isAdmin = localStorage.getItem('isAdmin') === '1';

    if (hasAuth) {
      authEl.innerHTML = `
        <div class="flex flex-col gap-2 text-sm font-semibold">
          ${isAdmin ? '<a href="/dashboard" class="block px-3 py-2 rounded-lg bg-cyan-500 text-black text-center font-semibold">Dashboard</a>' : ''}
          <button id="globalMobileLogout" class="w-full px-4 py-2 rounded-lg border border-white/20 hover:border-red-400 text-sm font-semibold text-left">
            Logout
          </button>
        </div>
      `;
      authEl.querySelector('#globalMobileLogout')?.addEventListener('click', () => {
        doLogout();
        closeMenu();
      });
    } else {
      authEl.innerHTML = `
        <div class="flex flex-col gap-2 text-sm font-semibold">
          <a href="/login" class="block px-3 py-2 rounded-lg bg-cyan-500 text-black text-center font-semibold">Login</a>
          <a href="/register" class="block px-3 py-2 rounded-lg border border-white/20 text-center font-semibold hover:border-cyan-400">Register</a>
        </div>
      `;
    }
  }

  function doLogout() {
    if (typeof window.logout === 'function') {
      window.logout();
      return;
    }
    localStorage.removeItem('token');
    localStorage.removeItem('bearerToken');
    localStorage.removeItem('isAdmin');
    localStorage.removeItem('userEmail');
    localStorage.removeItem('userName');
    window.location.href = '/login';
  }

  function openMenu() {
    overlay.classList.remove('hidden');
  }
  function closeMenu() {
    overlay.classList.add('hidden');
  }

  toggle.addEventListener('click', openMenu);
  closeBtn?.addEventListener('click', closeMenu);
  overlay.addEventListener('click', (e) => {
    if (e.target === overlay) closeMenu();
  });

  renderLinks();
  renderAuth();
})();
