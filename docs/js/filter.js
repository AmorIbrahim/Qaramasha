document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('[data-filter="shops"]');
    if (!searchInput) return;

    const cards = Array.from(document.querySelectorAll('[data-shop-card]'));
    const emptyState = document.querySelector('[data-empty-state]');

    const toggleEmptyState = () => {
        if (!emptyState) return;
        const hasVisible = cards.some((card) => card.style.display !== 'none');
        emptyState.hidden = hasVisible;
    };

    searchInput.addEventListener('input', function () {
        const term = this.value.trim().toLowerCase();

        cards.forEach((card) => {
            const name = card.getAttribute('data-shop-name') || '';
            const match = name.includes(term);
            card.style.display = match ? '' : 'none';
        });

        toggleEmptyState();
    });
});
