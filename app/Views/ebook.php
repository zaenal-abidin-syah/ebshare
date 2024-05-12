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
            data-ripple-light="true"
            data-twe-toggle="modal"
            data-twe-target="#exampleModal">
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
    <!-- Button trigger modal -->
<button
  type="button"
  class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
  data-twe-toggle="modal"
  data-twe-target="#exampleModal"
  data-twe-ripple-init
  data-twe-ripple-color="light">
  Launch demo modal
</button>

<!-- Modal -->
<div
  data-twe-modal-init
  class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
  id="exampleModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div
    data-twe-modal-dialog-ref
    class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
    <div
      class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
      <div
        class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 p-4 dark:border-white/10">
        <h5
          class="text-xl font-medium leading-normal text-surface dark:text-white"
          id="exampleModalLabel">
          Modal title
        </h5>
        <button
          type="button"
          class="box-content rounded-none border-none text-neutral-500 hover:text-neutral-800 hover:no-underline focus:text-neutral-800 focus:opacity-100 focus:shadow-none focus:outline-none dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-neutral-300"
          data-twe-modal-dismiss
          aria-label="Close">
          <span class="[&>svg]:h-6 [&>svg]:w-6">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M6 18L18 6M6 6l12 12" />
            </svg>
          </span>
        </button>
      </div>

      <!-- Modal body -->
      <div class="relative flex-auto p-4" data-twe-modal-body-ref>
        Modal body text goes here.
      </div>

      <!-- Modal footer -->
      <div
        class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 p-4 dark:border-white/10">
        <button
          type="button"
          class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-200 focus:bg-primary-accent-200 focus:outline-none focus:ring-0 active:bg-primary-accent-200 dark:bg-primary-300 dark:hover:bg-primary-400 dark:focus:bg-primary-400 dark:active:bg-primary-400"
          data-twe-modal-dismiss
          data-twe-ripple-init
          data-twe-ripple-color="light">
          Close
        </button>
        <button
          type="button"
          class="ms-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
          data-twe-ripple-init
          data-twe-ripple-color="light">
          Save changes
        </button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
