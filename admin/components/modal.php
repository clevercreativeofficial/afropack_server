<!-- Modal Container -->
<?php function modal(string $id, callable $children): void { ?>
<div id="<?= $id ?>" class="fixed inset-0 bg-black bg-opacity-30 hidden flex items-center justify-center z-50">
    <div class="bg-white shadow-lg w-full max-w-md md:p-6 p-3 m-3 relative">
        <button id="close<?= $id ?>" class="absolute top-3 right-3 h-10 w-10 flex items-center justify-center bg-gray-100 text-gray-500 hover:text-gray-700">
            <i class="fi fi-rr-cross translate-y-0.5 hover:text-accent"></i>
        </button>
        <div class="overflow-y-auto max-h-[80vh]">
            <?php $children() ?>
        </div>
    </div>
</div>
<?php } ?>