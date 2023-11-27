<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="flex justify-start items-stretch flex-wrap">
            <div class="p-2 basis-1/3">
                <a href="/notes/create" class="bg-neutral-100 block w-full h-full p-6 flex justify-center items-center rounded-xl group hover:bg-orange-300 transition-colors duration-300">
                    <h4 class="text-lg font-medium text-neutral-600 group-hover:text-white transition-colors duration-300">Create Note +</h4>
                </a>
            </div>
            <?php foreach ($notes as $note) : ?>
                <div class="p-2 basis-1/3">
                    <a href="/note?id=<?= $note['id'] ?>" class="bg-neutral-100 block p-6 w-full h-full rounded-xl group hover:bg-orange-300 transition-colors duration-300">
                        <h4 class="text-lg font-medium text-neutral-600 group-hover:text-white transition-colors duration-300"><?= htmlspecialchars($note['title']) ?></h4>
                        <p class="font-light mt-3 text-neutral-400 group-hover:text-neutral-100 transition-colors duration-300"><?= htmlspecialchars($note['body']) ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
