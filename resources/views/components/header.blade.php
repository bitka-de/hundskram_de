<header class="hk-header">
    <div class="hk-header-container">

        <a href="#" class="hk-header-brand">
            <div class="w-8 h-8 rounded-full bg-primary"></div>
            MeineApp
        </a>

        <nav class="hk-header-nav" id="site-nav">
            <div class="hk-header-nav-inner">

                <a href="#" class="hk-header-link is-active">Startseite</a>

                <details class="hk-header-dropdown hk-header-dropdown-mega">
                    <summary class="hk-header-link hk-header-summary">Shop</summary>

                    <div class="hk-header-mega-menu">
                        <div class="hk-header-mega-grid">

                            <div class="hk-header-mega-col">
                                <span class="hk-header-mega-title">Produkte</span>
                                <a href="#" class="hk-header-sublink">Halsbänder</a>
                                <a href="#" class="hk-header-sublink">Leinen</a>
                                <a href="#" class="hk-header-sublink">Geschirre</a>
                                <a href="#" class="hk-header-sublink">Accessoires</a>
                            </div>

                            <div class="hk-header-mega-col">
                                <span class="hk-header-mega-title">Mehr entdecken</span>
                                <a href="#" class="hk-header-sublink">Decken</a>
                                <a href="#" class="hk-header-sublink">Spielzeug</a>
                                <a href="#" class="hk-header-sublink">Special Edition</a>
                                <a href="#" class="hk-header-sublink">Sale</a>
                            </div>

                            <div class="hk-header-mega-feature">
                                <span class="hk-header-mega-badge">Beliebt</span>
                                <h3 class="hk-header-mega-heading">Individuell für deinen Hund</h3>
                                <p class="hk-header-mega-text">
                                    Entdecke handgemachte Produkte mit Stil, Komfort und Persönlichkeit.
                                </p>
                                <a href="#" class="hk-header-mega-cta">Zum Shop</a>
                            </div>

                        </div>
                    </div>
                </details>

                <details class="hk-header-dropdown hk-header-highlight">
                    <summary class="hk-header-link hk-header-summary">Konfigurator</summary>
                    <div class="hk-header-dropdown-menu">
                        <a href="#" class="hk-header-sublink">Halsband konfigurieren</a>
                        <a href="#" class="hk-header-sublink">Leine konfigurieren</a>
                        <a href="#" class="hk-header-sublink">Geschirr konfigurieren</a>
                    </div>
                </details>

                <details class="hk-header-dropdown">
                    <summary class="hk-header-link hk-header-summary">Hilfe &amp; Beratung</summary>
                    <div class="hk-header-dropdown-menu">
                        <a href="#" class="hk-header-sublink">Messanleitung</a>
                        <a href="#" class="hk-header-sublink">Größentabellen</a>
                        <a href="#" class="hk-header-sublink">Material &amp; Stoffe</a>
                        <a href="#" class="hk-header-sublink">Pflegehinweise</a>
                        <a href="#" class="hk-header-sublink">FAQ</a>
                    </div>
                </details>

                <details class="hk-header-dropdown">
                    <summary class="hk-header-link hk-header-summary">Inspiration</summary>
                    <div class="hk-header-dropdown-menu">
                        <a href="#" class="hk-header-sublink">Galerie</a>
                        <a href="#" class="hk-header-sublink">Kundenbilder</a>
                        <a href="#" class="hk-header-sublink">Ideen &amp; Looks</a>
                    </div>
                </details>

                <a href="#" class="hk-header-link">Über uns</a>
                <a href="#" class="hk-header-link">Gutscheine</a>
                <a href="#" class="hk-header-link">Kontakt</a>

                <a href="#" class="hk-header-cta hk-header-cta-mobile">
                    Jetzt konfigurieren
                </a>
            </div>
        </nav>

        <div class="hk-header-actions">
            <a href="#" class="hk-header-cta hk-header-cta-desktop">
                Jetzt konfigurieren
            </a>

            <button class="hk-header-toggle" type="button" aria-expanded="false" aria-controls="site-nav" aria-label="Menü öffnen">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

    </div>
</header>

<script>
  class HKHeader {
    constructor() {
      this.nav = document.querySelector('.hk-header-nav');
      this.toggle = document.querySelector('.hk-header-toggle');
      this.details = document.querySelectorAll('.hk-header-dropdown');

      this.init();
    }

    init() {
      if (!this.nav || !this.toggle) return;

      this.bindToggle();
      this.bindOutsideClick();
      this.bindResize();
      this.bindAccordion();
    }

    bindToggle() {
      this.toggle.addEventListener('click', () => {
        const isOpen = this.nav.classList.toggle('is-open');

        this.toggle.classList.toggle('is-active', isOpen);
        this.toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');

        document.body.classList.toggle('overflow-hidden', isOpen);
      });
    }

    bindOutsideClick() {
      document.addEventListener('click', (event) => {
        const clickedInsideNav = this.nav.contains(event.target);
        const clickedToggle = this.toggle.contains(event.target);

        if (!clickedInsideNav && !clickedToggle && this.nav.classList.contains('is-open')) {
          this.closeMenu();
        }
      });
    }

    bindResize() {
      window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
          this.closeMenu();
          this.closeAllDropdowns();
        }
      });
    }

    bindAccordion() {
      this.details.forEach((detail) => {
        detail.addEventListener('toggle', () => {
          if (window.innerWidth < 768 && detail.open) {
            this.details.forEach((other) => {
              if (other !== detail) other.removeAttribute('open');
            });
          }
        });
      });
    }

    closeMenu() {
      this.nav.classList.remove('is-open');
      this.toggle.classList.remove('is-active');
      this.toggle.setAttribute('aria-expanded', 'false');
      document.body.classList.remove('overflow-hidden');
    }

    closeAllDropdowns() {
      this.details.forEach((item) => item.removeAttribute('open'));
    }
  }

  document.addEventListener('DOMContentLoaded', () => {
    new HKHeader();
  });
</script>