<?= $this->extend('/layouts/dashboardLayout') ?>
<?= $this->section('content') ?>
<div class="w-full px-6 py-6 mx-auto">
  <!-- table 1 -->

  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <div class="flex justify-between mx-[15%] items-center px-5 pt-0 pb-2">
            <h6 class="">Profile User</h6>
            <a type="button" class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-[1.5] text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 " href="<?= base_url('dashboard/profile/edit/') . $profile['id'] ?>" data-twe-ripple-init data-twe-ripple-color="light">
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
                      <td class="whitespace-nowrap px-8 py-6">Username</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $profile['username'] ?></td>
                    </tr>
                    <tr class="border-b border-neutral-200 bg-white ">
                      <td class="whitespace-nowrap px-8 py-6">Email</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $profile['email'] ?></td>
                    </tr>
                    <tr class="border-b border-neutral-200 bg-black/[0.02]">
                      <td class="whitespace-nowrap px-8 py-6">Role</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $profile['role'] == '1' ? 'admin' : 'user' ?></td>
                    </tr>
                    <tr class="border-b border-neutral-200 bg-white ">
                      <td class="whitespace-nowrap px-8 py-6">Tanggal Bergabung</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $profile['tanggal_bergabung'] ?></td>
                    </tr>
                    <tr class="border-b border-neutral-200 bg-black/[0.02]">
                      <td class="whitespace-nowrap px-8 py-6">No Telepon</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $profile['no_telepon'] ?></td>
                    </tr>
                    <tr class="border-b border-neutral-200 bg-white ">
                      <td class="whitespace-nowrap px-8 py-6">Alamat</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $profile['alamat'] ?></td>
                    </tr>
                    <tr class="border-b border-neutral-200 bg-black/[0.02]">
                      <td class="whitespace-nowrap px-8 py-6">Kota</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $profile['kota'] ?></td>
                    </tr>
                    <tr class="border-b border-neutral-200 bg-white ">
                      <td class="whitespace-nowrap px-8 py-6">Provinsi</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $profile['provinsi'] ?></td>
                    </tr>
                    <tr class="border-b border-neutral-200 bg-black/[0.02]">
                      <td class="whitespace-nowrap px-8 py-6">Negara</td>
                      <td class="whitespace-nowrap px-8 py-6"><?= $profile['negara'] ?></td>
                    </tr>
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