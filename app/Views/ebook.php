<?= $this->extend('/layouts/layout'); ?>
<!-- hero section -->
<!-- Section: Design Block -->
<?= $this->section('content'); ?>

<div class="mb-10">
  <form action="<?= base_url('ebook') ?>" method="get">
    <div class="relative flex mt-28 gap-5 mb-3 container w-1/2 mx-auto" data-twe-input-wrapper-init data-twe-input-group-ref>
      <input name="search" type="search" class="peer block min-h-[auto] h-full w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none  [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" placeholder="Search" aria-label="Search" id="exampleFormControlInput" aria-describedby="basic-addon1" />
      <label for="exampleFormControlInput" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none">Search
      </label>
      <button type="submit" class="relative z-[2] -ms-0.5 flex items-center rounded-e bg-primary px-5 py-3 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2" data-twe-ripple-init data-twe-ripple-color="light">
        <span class="[&>svg]:h-5 [&>svg]:w-5">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
          </svg>
        </span>
      </button>
    </div>
    <div class="flex justify-center">
      <div class="flex items-center gap-3 justify-center">
        <label for="kategori" class="text-sm font-medium text-stone-600">Kategori</label>
        <select id="kategori" name="kategori" class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          <option value=""></option>
          <?php
          foreach ($kategori as $k) { ?>
            <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
  </form>
</div>


<div class="sm:flex sm:flex-wrap justify-center sm:gap-10 mx-5">


  <?php if ($ebooks) {
    foreach ($ebooks as $key => $ebook) { ?>
      <div class="flex flex-col justify-between rounded-lg basis-[30%] shadow-2xl bg-white text-surface shadow-purple-700 lg:basis-[15%] md:basis-[20%] sm:rounded-s-none">
        <a href="#!">
          <img class="rounded-t-lg" src="<?= $ebook['img'] != '' ? base_url($ebook['img']) : base_url('img/ebook/default-pdf.png')  ?>" alt="Los Angeles Skyscrapers" />
        </a>
        <div class="p-6 min-h-[10%]">
          <h5 id="judul-<?= $key ?>" class=" text-xl font-medium leading-tight">
            <?= $ebook['judul'] ?>
          </h5>
          <p class="text-lg italic text-slate-600" id="penulis-<?= $key ?>">
            <?= $ebook['penulis'] ?>
          </p>
          <p id="tag-<?= $key ?>" class="my-4 text-base">
            <!-- <= $ebook['deskripsi'] ?> -->
            <?php
            $tags = $ebook['tag'] != '' ? explode(',', $ebook['tag']) : [];
            foreach ($tags as $tag) { ?>
              <span class="bg-gradient-to-tl from-purple-500 to-blue-400 px-2.5 text-xs rounded-md py-2 inline-block whitespace-nowrap text-center align-baseline leading-none text-white"><?= $tag ?></span>
            <?php } ?>

          </p>

          <div class="mt-auto border-t-2 border-neutral-100 px-6 py-3 text-center text-surface/75 dark:border-white/10 dark:text-neutral-300">
            <a href="<?= base_url('ebook/detail/' . $ebook['id']) ?>" class="button-modal inline-block rounded bg-purple-700 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-700 transition duration-150 ease-in-out hover:bg-purple-600 hover:shadow-purple-400 focus:bg-purple-500 focus:shadow-purple-400 focus:outline-none focus:ring-0 active:bg-purple-700 active:shadow-purple-500 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
              Details
            </a>
          </div>
        </div>
      </div>
    <?php }
  } else { ?>
    <div class="w-full flex items-center flex-wrap justify-center">
      <div class="grid w-60 mt-32">
        <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="308" height="322" viewBox="0 0 154 161" fill="none">
          <path d="M0.0616455 84.4268C0.0616455 42.0213 34.435 7.83765 76.6507 7.83765C118.803 7.83765 153.224 42.0055 153.224 84.4268C153.224 102.42 147.026 118.974 136.622 132.034C122.282 150.138 100.367 161 76.6507 161C52.7759 161 30.9882 150.059 16.6633 132.034C6.25961 118.974 0.0616455 102.42 0.0616455 84.4268Z" fill="#EEF2FF" />
          <path d="M96.8189 0.632498L96.8189 0.632384L96.8083 0.630954C96.2034 0.549581 95.5931 0.5 94.9787 0.5H29.338C22.7112 0.5 17.3394 5.84455 17.3394 12.4473V142.715C17.3394 149.318 22.7112 154.662 29.338 154.662H123.948C130.591 154.662 135.946 149.317 135.946 142.715V38.9309C135.946 38.0244 135.847 37.1334 135.648 36.2586L135.648 36.2584C135.117 33.9309 133.874 31.7686 132.066 30.1333C132.066 30.1331 132.065 30.1329 132.065 30.1327L103.068 3.65203C103.068 3.6519 103.067 3.65177 103.067 3.65164C101.311 2.03526 99.1396 0.995552 96.8189 0.632498Z" fill="white" stroke="#E5E7EB" />
          <ellipse cx="80.0618" cy="81" rx="28.0342" ry="28.0342" fill="#EEF2FF" />
          <path d="M99.2393 61.3061L99.2391 61.3058C88.498 50.5808 71.1092 50.5804 60.3835 61.3061C49.6423 72.0316 49.6422 89.4361 60.3832 100.162C71.109 110.903 88.4982 110.903 99.2393 100.162C109.965 89.4363 109.965 72.0317 99.2393 61.3061ZM105.863 54.6832C120.249 69.0695 120.249 92.3985 105.863 106.785C91.4605 121.171 68.1468 121.171 53.7446 106.785C39.3582 92.3987 39.3582 69.0693 53.7446 54.683C68.1468 40.2965 91.4605 40.2966 105.863 54.6832Z" stroke="#E5E7EB" />
          <path d="M110.782 119.267L102.016 110.492C104.888 108.267 107.476 105.651 109.564 102.955L118.329 111.729L110.782 119.267Z" stroke="#E5E7EB" />
          <path d="M139.122 125.781L139.122 125.78L123.313 109.988C123.313 109.987 123.313 109.987 123.312 109.986C121.996 108.653 119.849 108.657 118.521 109.985L118.871 110.335L118.521 109.985L109.047 119.459C107.731 120.775 107.735 122.918 109.044 124.247L109.047 124.249L124.858 140.06C128.789 143.992 135.191 143.992 139.122 140.06C143.069 136.113 143.069 129.728 139.122 125.781Z" fill="#A5B4FC" stroke="#818CF8" />
          <path d="M83.185 87.2285C82.5387 87.2285 82.0027 86.6926 82.0027 86.0305C82.0027 83.3821 77.9987 83.3821 77.9987 86.0305C77.9987 86.6926 77.4627 87.2285 76.8006 87.2285C76.1543 87.2285 75.6183 86.6926 75.6183 86.0305C75.6183 80.2294 84.3831 80.2451 84.3831 86.0305C84.3831 86.6926 83.8471 87.2285 83.185 87.2285Z" fill="#4F46E5" />
          <path d="M93.3528 77.0926H88.403C87.7409 77.0926 87.2049 76.5567 87.2049 75.8946C87.2049 75.2483 87.7409 74.7123 88.403 74.7123H93.3528C94.0149 74.7123 94.5509 75.2483 94.5509 75.8946C94.5509 76.5567 94.0149 77.0926 93.3528 77.0926Z" fill="#4F46E5" />
          <path d="M71.5987 77.0925H66.6488C65.9867 77.0925 65.4507 76.5565 65.4507 75.8945C65.4507 75.2481 65.9867 74.7122 66.6488 74.7122H71.5987C72.245 74.7122 72.781 75.2481 72.781 75.8945C72.781 76.5565 72.245 77.0925 71.5987 77.0925Z" fill="#4F46E5" />
          <rect x="38.3522" y="21.5128" width="41.0256" height="2.73504" rx="1.36752" fill="#4F46E5" />
          <rect x="38.3522" y="133.65" width="54.7009" height="5.47009" rx="2.73504" fill="#A5B4FC" />
          <rect x="38.3522" y="29.7179" width="13.6752" height="2.73504" rx="1.36752" fill="#4F46E5" />
          <circle cx="56.13" cy="31.0854" r="1.36752" fill="#4F46E5" />
          <circle cx="61.6001" cy="31.0854" r="1.36752" fill="#4F46E5" />
          <circle cx="67.0702" cy="31.0854" r="1.36752" fill="#4F46E5" />
        </svg>
        <div>
          <h2 class="text-center text-black text-xl font-semibold leading-loose pb-2">There’s no Ebook here</h2>
          <p class="text-center text-black text-base font-normal leading-relaxed pb-4">Try changing your filters to <br />see appointments </p>
        </div>
      </div>
    </div>
  <?php } ?>
</div>



<div data-twe-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div data-twe-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[50%]">
    <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
      <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 p-4 dark:border-white/10">
        <h5 class="title-modal text-2xl md:text-3xl font-medium leading-normal text-surface dark:text-white" id="exampleModalLabel">
          Ebook Detail
        </h5>
        <button type="button" class="box-content rounded-none border-none text-neutral-500 hover:text-neutral-800 hover:no-underline focus:text-neutral-800 focus:opacity-100 focus:shadow-none focus:outline-none dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-neutral-300" data-twe-modal-dismiss aria-label="Close">
          <span class="[&>svg]:h-6 [&>svg]:w-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </span>
        </button>
      </div>

      <!-- Modal body -->
      <div class="body-modal relative flex gap-8 my-4 flex-row flex-auto p-4" data-twe-modal-body-ref>
        <div class="basis-[50%]">
          <img class="rounded-lg" src="https://tecdn.b-cdn.net/img/new/standard/city/043.webp" alt="Los Angeles Skyscrapers" />
        </div>
        <div class="basis-[50%]">
          <p id="modalJudul" class="text-xl md:text-2xl text-neutral-800 border-b-2 shadow-sm iniline"></p>
          <p id="modalPenulis" class="text-xl md:text-2xl text-neutral-800 border-b-2 shadow-sm iniline"></p>
          <p id="modalPenerbit" class="text-xl md:text-2xl text-neutral-800 border-b-2 shadow-sm iniline"></p>
          <p id="modalUkuran" class="text-xl md:text-2xl text-neutral-800 border-b-2 shadow-sm iniline"></p>
          <p id="modalDeskripsi" class="text-xl md:text-2xl text-neutral-800 border-b-2 shadow-sm iniline"></p>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 p-4 dark:border-white/10">
        <button type="button" class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-200 focus:bg-primary-accent-200 focus:outline-none focus:ring-0 active:bg-primary-accent-200 dark:bg-primary-300 dark:hover:bg-primary-400 dark:focus:bg-primary-400 dark:active:bg-primary-400" data-twe-modal-dismiss data-twe-ripple-init data-twe-ripple-color="light">
          Close
        </button>
        <button type="button" class="ms-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong" data-twe-ripple-init data-twe-ripple-color="light">
          Save changes
        </button>
      </div>
    </div>
  </div>
</div>
<!-- <div style="float: right"> -->
<div class="ml-10 mt-5 mb-20">
  <?= $pager->links('default', 'tailwind_full') ?>
</div>



<?= $this->endSection(); ?>