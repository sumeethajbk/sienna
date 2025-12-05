class TabHandler {
  constructor(tabSelector, tabTextSelector, tabArrowSelector) {
    this.tabSelector = tabSelector || '.tab-text';
    this.tabTextSelector = tabTextSelector || '.tab-text';
    this.tabArrowSelector = tabArrowSelector || '.tab-arrow';

    this.tabTexts = document.querySelectorAll(this.tabSelector);
    this.init();
  }

  init() {
    if (this.tabTexts.length === 0) return;
    this.updateHeights();
    this.bindEvents();
  }

  updateHeights() {
    this.tabTexts.forEach((tabText) => {
      const initialHeight =
        tabText.querySelector('.tab-head').offsetHeight + 56;
      tabText.style.height = `${initialHeight}px`;
      tabText.dataset.initialHeight = initialHeight;

      if (tabText.dataset.tab === 'true') {
        const desc = tabText.querySelector('.tab-desc');
        if (desc) {
          desc.style.maxHeight = `${desc.scrollHeight}px`;
        }
      }
    });
  }

  bindEvents() {
    this.tabTexts.forEach((tabText) => {
      const tabHead = tabText.querySelector('.tab-head');
      const tabArrow = tabHead.querySelector(this.tabArrowSelector);

      tabText.addEventListener('click', (e) => this.onTabClick(e, tabText));
      if (tabArrow) {
        tabArrow.addEventListener('click', (e) =>
          this.onArrowClick(e, tabText)
        );
      }
    });

    document.addEventListener('click', (e) => this.onDocumentClick(e));
    window.addEventListener('resize', () => this.updateHeights());
    window.addEventListener('orientationchange', () => this.updateHeights());
  }

  onTabClick(e, tabText) {
    if (!e.target.closest('a')) {
      e.preventDefault();
      e.stopPropagation();

      if (tabText.dataset.tab !== 'true') {
        this.tabTexts.forEach((tabel) => {
          if (tabText !== tabel) {
            tabel.dataset.tab = 'false';
            tabel.classList.remove('tab-open');
            const desc = tabel.querySelector('.tab-desc');
            if (desc) {
              desc.style.maxHeight = '';
            }
            tabel.style.height = `${tabel.dataset.initialHeight}px`;
          }
        });

        tabText.dataset.tab = 'true';
        tabText.classList.add('tab-open');
        tabText.style.height = `100%`;
        const desc = tabText.querySelector('.tab-desc');
        if (desc) {
          desc.style.maxHeight = `${desc.scrollHeight}px`;
        }
      }
    }
  }

  onArrowClick(e, tabText) {
    e.stopPropagation();
    e.preventDefault();

    if (tabText.dataset.tab === 'true') {
      tabText.dataset.tab = 'false';
      tabText.classList.remove('tab-open');
      const desc = tabText.querySelector('.tab-desc');
      tabText.style.height = `${tabText.dataset.initialHeight}px`;
      if (desc) {
        desc.style.maxHeight = '';
      }
    }
  }

  onDocumentClick(e) {
    if (!e.target.closest(this.tabSelector)) {
      this.tabTexts.forEach((tabel) => {
        tabel.dataset.tab = 'false';
        tabel.classList.remove('tab-open');
        const desc = tabel.querySelector('.tab-desc');
        if (desc) {
          desc.style.maxHeight = '';
        }
        tabel.style.height = `${tabel.dataset.initialHeight}px`;
      });
    }
  }

  onTabLinkClick(e) {
    e.preventDefault();
    let $this = e.target;
    $this.classList.toggle('active');
    let tabattr = $this.getAttribute('data-name');
    const tabRow = document.querySelectorAll('.data-tab-row');
    tabRow.forEach((tabitem) => {
      $(tabitem).fadeOut(100);
      tabitem.classList.remove('open');
    });
    $(`.data-tab-row[data-tab='${tabattr}']`).fadeIn(500);
    document
      .querySelector(`.data-tab-row[data-tab='${tabattr}']`)
      .classList.add('open');
  }
}
 const tabHandler = new TabHandler();
tabHandler.init();
