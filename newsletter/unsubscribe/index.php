<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

$token   = trim($_GET['token'] ?? '');
$status  = null; // 'success' | 'invalid' | 'already'

if ($token === '') {
    $status = 'invalid';
} else {
    $stmt = $conn->prepare("SELECT id, email FROM subscribers WHERE unsubscribe_token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $sub = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$sub) {
        $status = 'invalid';
    } else {
        $stmt = $conn->prepare("DELETE FROM subscribers WHERE id = ?");
        $stmt->bind_param("i", $sub['id']);
        $stmt->execute();
        $stmt->close();
        $status = 'success';
    }
}

require_once ROOT_PATH . '/components/header.php';
?>

<section class="min-h-[60vh] flex items-center justify-center section-padding">
    <div class="max-w-md mx-auto text-center bg-white p-10 border">
        <?php if ($status === 'success'): ?>
            <div class="w-16 h-16 bg-green-100 flex items-center justify-center mx-auto mb-6">
                <i class="fi fi-rr-check text-green-600 text-2xl mt-2"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-3">Unsubscribed</h2>
            <p class="text-gray-500 text-sm mb-6">
                You have been successfully removed from our newsletter list. We're sorry to see you go.
            </p>
            <a href="<?= $url ?>"
                class="inline-block bg-accent text-white px-6 py-3 text-sm hover:bg-accent-dark transition-colors duration-300">
                Back to Home
            </a>

        <?php else: ?>
            <div class="w-16 h-16 bg-red-100 flex items-center justify-center mx-auto mb-6">
                <i class="fi fi-rr-cross text-red-500 text-2xl mt-2"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-3">Invalid Link</h2>
            <p class="text-gray-500 text-sm mb-6">
                This unsubscribe link is invalid or has already been used.
            </p>
            <a href="<?= $url ?>"
                class="inline-block bg-accent text-white px-6 py-3 text-sm hover:bg-accent-dark transition-colors duration-300">
                Back to Home
            </a>
        <?php endif; ?>
    </div>
</section>

<?php require_once ROOT_PATH . '/components/footer.php'; ?>
</body>

</html>