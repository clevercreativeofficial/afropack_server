<?php

/**
 * Renders a header section with title and description
 */
function render_header_section($subTitle, $title, $titleAccent, $description)
{
    // Escape all output for security
    $escapedSubTitle = htmlspecialchars($subTitle, ENT_QUOTES, 'UTF-8');
    $escapedTitle = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $escapedTitleAccent = htmlspecialchars($titleAccent, ENT_QUOTES, 'UTF-8');
    $escapedDescription = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
?>

    <!-- Header Section -->
    <div class="text-center mb-16 md:mb-20">
        <span class="inline-block px-6 py-2 bg-accent-light text-accent-dark text-sm uppercase rounded-full font-medium mb-4 tracking-wider">
            <?= $escapedSubTitle ?>
        </span>
        <h1 class="text-3xl md:text-5xl font-bold text-gray-900 mb-6 max-w-3xl mx-auto leading-tight">
            <?= $escapedTitle ?>
            <?php if (!empty($escapedTitleAccent)): ?>
                <span class="text-accent-dark"> <?= $escapedTitleAccent ?></span>
            <?php endif; ?>
        </h1>
        <p class="md:text-xl max-w-2xl mx-auto leading-relaxed">
            <?= $escapedDescription ?>
        </p>
    </div>

<?php
}
?>