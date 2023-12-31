<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form method="POST" action="/notes/create">
                    <div class="sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div>
                                <label
                                    for="title"
                                    class="block text-sm font-medium text-gray-700"
                                >Title</label>

                                <div class="mt-1">
                                    <input
                                        id="title"
                                        name="title"
                                        value="<?= $_POST['title'] ?? '' ?>"
                                        class="mt-1 block w-full rounded-md border-gray-300 focus:border-orange-300 focus:ring-orange-300 sm:text-sm"
                                        placeholder="Here's an idea for a note..."
                                    />

                                    <?php if (isset($errors['title'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['title'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div>
                                <label
                                    for="body"
                                    class="block text-sm font-medium text-gray-700"
                                >Body</label>

                                <div class="mt-1">
                                    <textarea
                                        id="body"
                                        name="body"
                                        rows="3"
                                        class="mt-1 block w-full rounded-md border-gray-300 focus:!border-orange-300 focus:!ring-orange-300 sm:text-sm"
                                        placeholder="Here's an idea for a note..."
                                    ><?= $_POST['body'] ?? '' ?></textarea>

                                    <?php if (isset($errors['body'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-3 flex gap-x-4 justify-end items-center sm:px-6">
                            <a href="/notes" class="text-neutral-700 text-sm">
                                Cancel
                            </a>
                            <button
                                type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-orange-300 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-black transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
