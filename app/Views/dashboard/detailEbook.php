<?= $this->extend('/layouts/dashboardLayout') ?>
<?= $this->section('content') ?>
<div class="w-full px-6 py-6 mx-auto">
  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <div class="flex justify-between mx-[15%] items-center px-5 pt-0 pb-2">
            <h6 class="">Detail Ebook</h6>
            <a type="button" class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-[1.5] text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 " href="<?= base_url('dashboard/ebook/edit/') . $ebook['id'] ?>" data-twe-ripple-init data-twe-ripple-color="light">
              Edit
            </a>
          </div>
          <?php if (session()->get('message')) { ?>
            <div class="w-full my-4 items-center rounded-lg bg-success-100 px-6 py-5 text-base text-success-700 dark:bg-green-950 dark:text-success-500/80" role="alert" id="alert-static-success" data-twe-alert-init>
              <?= session()->get('message') ?>
            </div>
          <?php } ?>
        </div>
        <div class="flex flex-col mb-10">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
              <div class="overflow-hidden">
                <table class="min-w-[90%] mx-auto text-left text-sm font-light text-surface">
                  <thead class="border-b border-neutral-200 bg-white font-medium">
                    <tr>
                      <th scope="col" class="px-8 w-[20%] py-6"></th>
                      <th scope="col" class="px-8 py-6"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="border-b border-neutral-200 bg-black/[0.02]">
                      <td class="whitespace-nowrap px-8 py-6">Judul</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $ebook['judul'] ?></td>
                    </tr>
                    <tr class="border-b border-neutral-200 bg-white ">
                      <td class="whitespace-nowrap px-8 py-6">Penulis</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $ebook['penulis'] ?></td>
                    </tr>
                    <tr class="border-b border-neutral-200 bg-black/[0.02]">
                      <td class="whitespace-nowrap px-8 py-6">Penerbit</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $ebook['penerbit'] ?></td>
                    </tr>
                    <tr class="border-b border-neutral-200 bg-white ">
                      <td class="whitespace-nowrap px-8 py-6">Size</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $ebook['ukuran'] ?></td>
                    </tr>
                    <tr class="border-b border-neutral-200 bg-white ">
                      <td class="whitespace-nowrap px-8 py-6">Type</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $ebook['type'] ?></td>
                    </tr>
                    <tr class="border-b border-neutral-200 bg-black/[0.02]">
                      <td class="whitespace-nowrap px-8 py-6">Tahun Terbit</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $ebook['tahun_terbit'] ?></td>
                    </tr>
                    <tr class="border-b border-neutral-200 bg-white ">
                      <td class="whitespace-nowrap px-8 py-6">Uploader</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $ebook['id_user'] ?></td>
                    </tr>
                    <tr class="border-b border-neutral-200 bg-black/[0.02]">
                      <td class="whitespace-nowrap px-8 py-6">Kategori</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $ebook['nama_kategori'] ?></td>
                    </tr>
                    <tr class="border-b border-neutral-200 bg-white ">
                      <td class="whitespace-nowrap px-8 py-6">Tag</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $ebook['tag'] ?></td>
                    </tr>
                    <!-- <tr
                      class="border-b border-neutral-200 bg-black/[0.02]">
                      <td class="whitespace-nowrap px-8 py-6">Negara</td>
                      <td class="whitespace-nowrap px-8 py-6">< $ebook['negara'] ?></td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>