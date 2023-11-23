<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="flex flex-items justify-between items-center gap-4">
            <?php foreach ($notes as $note) : ?>
                <a href="/note?id=<?= $note['id'] ?>" class="bg-neutral-50 p-6 basis-1/3 rounded-xl">
                    <h4 class="text-lg font-semibold text-neutral-600"><?= htmlspecialchars($note['body']) ?></h4>
                </a>
            <?php endforeach; ?>
        </div>

        <p class="mt-6">
            <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
        </p>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
