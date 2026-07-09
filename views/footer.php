</main>

<footer class="site-footer">
    <div class="container">
        <p>&copy; <?= date('Y') ?> Canopée</p>
    </div>
</footer>

<script>
document.querySelector('.nav-toggle')?.addEventListener('click', function () {
    const nav = document.querySelector('.nav');
    const ouvert = this.getAttribute('aria-expanded') === 'true';
    this.setAttribute('aria-expanded', String(!ouvert));
    nav.classList.toggle('is-open');
    this.classList.toggle('is-open');
});
</script>

</body>
</html>
