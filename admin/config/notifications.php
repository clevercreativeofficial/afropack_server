<?php

$flashMessages = [];
$sessionKeys = [
    'login', 'login-success',
    'subscribe', 'subscribe-success',
    'unsubscribe', 'unsubscribe-success',
    'contact', 'contact-success',
    'donate', 'donate-success',
];

foreach ($sessionKeys as $key) {
    if (!empty($_SESSION[$key])) {
        $flashMessages[] = [
            'type' => (str_contains($key, 'success')) ? 'success' : 'error',
            'message' => $_SESSION[$key]
        ];
        unset($_SESSION[$key]); // clear AFTER reading
    }
}
?>

<?php if (!empty($flashMessages)): ?>
<script>
document.addEventListener("DOMContentLoaded", () => {

    const notyf = new Notyf({
        duration: 6000,
        position: { x: 'right', y: 'top' },
        dismissible: true,
        ripple: true,
    });

    <?php foreach ($flashMessages as $msg): ?>
        let type = "<?= $msg['type'] ?>";
        let message = "<?= addslashes($msg['message']) ?>";

        // Handle lockout messages using SweetAlert
        if (
            message.toLowerCase().includes("verrouillé") ||
            message.toLowerCase().includes("minutes") ||
            message.toLowerCase().includes("locked")
        ) {
            Swal.fire({
                icon: 'error',
                title: 'Compte Verrouillé',
                text: message,
                confirmButtonColor: '#d33'
            });
        } else {
            if (type === "error") {
                notyf.error(message);
            } else {
                notyf.success(message);
            }
        }
    <?php endforeach; ?>

});
</script>
<?php endif; ?>