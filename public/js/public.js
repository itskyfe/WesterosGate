if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.style.opacity = '1';
                e.target.style.transform = 'translateY(0)';
                io.unobserve(e.target);
            }
        });
    }, { threshold: 0.08 });
    document.querySelectorAll('.card').forEach((c, i) => {
        c.style.opacity = '0';
        c.style.transform = 'translateY(12px)';
        c.style.transition = `opacity .3s ease ${i*.05}s, transform .3s ease ${i*.05}s`;
        io.observe(c);
    });
}
