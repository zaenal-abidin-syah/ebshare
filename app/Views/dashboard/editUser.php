<?= $this->extend('/layouts/dashboardLayout') ?>
<?= $this->section('content') ?>
<div class="w-full px-6 py-6 mx-auto">
  <!-- table 1 -->

  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <div class="flex justify-between mx-[15%] items-center px-5 pt-0 pb-2">
            <h6 class="">Edit User</h6>

          </div>
        </div>
        <div class="flex flex-col mb-10">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
              <div class="overflow-hidden">
                <form action="<?= base_url('dashboard/user/update') ?>" method="post" class="max-w-[90%] flex flex-col justify-start items-center">
                  <div class="mb-4 w-8/12">
                    <label for="username" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Username</label>
                    <input type="text" value="<?= $detail['username'] ?>" id="username" name="username" class="focus:shadow-primary-outline dark:bg-slate-850 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
                  </div>
                  <div class="mb-4 w-8/12">
                    <label for="email" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Email</label>
                    <input type="email" value="<?= $detail['email'] ?>" id="email" name="email" class="focus:shadow-primary-outline dark:bg-slate-850 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
                  </div>
                  <div class="mb-4 w-8/12">
                    <label for="no_telepon" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">No telepon</label>
                    <input type="text" value="<?= $detail['no_telepon'] ?>" id="no_telepon" name="no_telepon" class="focus:shadow-primary-outline dark:bg-slate-850 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
                  </div>
                  <div class="mb-4 w-8/12">
                    <label for="alamat" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Alamat</label>
                    <input type="text" value="<?= $detail['alamat'] ?>" id="alamat" name="alamat" class="focus:shadow-primary-outline dark:bg-slate-850 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
                  </div>
                  <div class="mb-4 w-8/12">
                    <label for="kota" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Kota</label>
                    <input type="text" value="<?= $detail['kota'] ?>" id="kota" name="kota" class="focus:shadow-primary-outline dark:bg-slate-850 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
                  </div>
                  <div class="mb-4 w-8/12">
                    <label for="provinsi" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Provinsi</label>
                    <input type="text" value="<?= $detail['provinsi'] ?>" id="provinsi" name="provinsi" class="focus:shadow-primary-outline dark:bg-slate-850 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
                  </div>
                  <div class="mb-4 w-8/12">
                    <label for="negara" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Negara</label>
                    <input type="text" value="<?= $detail['negara'] ?>" id="negara" name="negara" class="focus:shadow-primary-outline dark:bg-slate-850 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
                  </div>
                  <input type="hidden" name="id_user" value="<?= $detail['id'] ?>">
                  <input type="hidden" name="id_detail" value="<?= $detail['id_detail'] ?>">
                  <div class="mb-4 w-8/12">
                    <button type="submit" class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-[1.5] text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 " data-twe-ripple-init data-twe-ripple-color="light">
                      Save
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>