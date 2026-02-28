<!-- <script>
    // Modal Toggle Logic
    const addSlideModal = document.getElementById('addSlideModal');
    const openAddSlideBtn = document.getElementById('add_btn');
    const openEditBtn = document.querySelectorAll('.edit_btn');
    const closeAddSlideBtn = document.getElementById('closeAddSlideModal');

    openAddSlideBtn.addEventListener('click', () => {
        addSlideModal.classList.remove('hidden');
    });

    openEditBtn.forEach(btn => {
        btn.addEventListener('click', () => {
            addSlideModal.classList.remove('hidden');
        })
    });

    closeAddSlideBtn.addEventListener('click', () => {
        addSlideModal.classList.add('hidden');
    });
</script> -->



<!-- Theme -->
<script src="<?= $url ?>admin/assets/js/theme.js"></script>
<!-- Modal -->
<script src="<?= $url ?>admin/assets/js/modal_scripts.js"></script>
<!-- Sidebar -->
<script src="<?= $url ?>admin/assets/js/sidebar_scripts.js"></script>

</body>

</html>