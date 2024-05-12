<?= $this->extend('/layouts/layout'); ?>
<!-- hero section -->
    <!-- Section: Design Block -->
<?= $this->section('content'); ?>
    <div class="sm:flex sm:flex-wrap justify-center sm:gap-10 mt-40 mx-5">

    <?php foreach ($ebooks as $ebook) { ?>
      <div
        class="flex flex-col rounded-lg basis-[30%] bg-white text-surface shadow-purple-50 dark:bg-surface-dark dark:text-white lg:basis-[15%] md:basis-[20%] sm:rounded-s-none"
      >
        <a href="#!">
          <img
            class="rounded-t-lg sm:rounded-tl-none"
            src="https://tecdn.b-cdn.net/img/new/standard/city/043.webp"
            alt="Los Angeles Skyscrapers"
          />
        </a>
        <div class="p-6">
          <h5 class="mb-2 text-xl font-medium leading-tight"><?= $ebook['judul'] ?></h5>
          <p><?= $ebook['penulis'] ?></p>
          <p class="mb-4 text-base">
          <?= $ebook['deskripsi'] ?>
          </p>
          <button
            type="button"
            class="inline-block rounded bg-purple-700 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-700 transition duration-150 ease-in-out hover:bg-purple-600 hover:shadow-purple-400 focus:bg-purple-500 focus:shadow-purple-400 focus:outline-none focus:ring-0 active:bg-purple-700 active:shadow-purple-500 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
            data-ripple-light="true">
            More
          </button>
        </div>
        <div
          class="mt-auto border-t-2 border-neutral-100 px-6 py-3 text-center text-surface/75 dark:border-white/10 dark:text-neutral-300"
        >
          <small>Last updated 3 mins ago</small>
        </div>
      </div>
    <?php } ?>
    </div>

<?= $this->endSection(); ?>
