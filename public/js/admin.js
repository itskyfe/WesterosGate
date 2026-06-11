// WesterosGate — Admin JS
document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('wg-sb') === '1') {
        const sb = document.getElementById('sidebar');
        const main = document.getElementById('adm-main');
        if (sb) { sb.classList.add('collapsed'); if (main) main.style.marginLeft = '54px'; }
    }
    setTimeout(() => {
        document.querySelectorAll('.flash').forEach(el => {
            el.style.transition = 'opacity 0.3s';
            el.style.opacity = '0';
            setTimeout(() => el.remove(), 300);
        });
    }, 4000);
});
