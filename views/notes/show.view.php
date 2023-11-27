<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p><?= htmlspecialchars($note['body']) ?></p>

        
        <div class="py-3 flex gap-x-4 justify-end items-center">
            <a href="/notes" class="text-neutral-700 text-sm mr-auto">
                ← Back
            </a>
            <form method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="text-sm text-red-500">Delete</button>
            </form>
            <a href="/note/edit?id=<?= $note['id'] ?>">
                <button
                    type="submit"
                    class="inline-flex justify-center rounded-md border border-transparent bg-orange-300 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-black transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Edit
                </button>
            </a>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
