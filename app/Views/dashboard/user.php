<?= $this->extend('/layouts/dashboardLayout') ?>
<?= $this->section('content') ?>

      <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <div class="flex flex-wrap -mx-3">
          <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
              <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6 class="dark:text-white">My Ebooks</h6>

                <a type="button"
                  href="<?= base_url('/dashboard/ebook/add') ?>"
                  class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 cursor-pointer"
                  >
                  Add
                </a>

              </div>
              <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                  <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                    <thead class="align-bottom">
                      <tr>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Role</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tahun Terbit</th>
                        <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($users as $user) { ?>
                        <tr>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                          <div class="flex px-2 py-1">
                            <div>
                              <img src="../assets/img/team-2.jpg" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl" alt="user1" />
                            </div>
                            <div class="flex flex-col justify-center">
                              <h6 class="mb-0 text-sm leading-normal dark:text-white"><?= $user['username'] ?></h6>
                              <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400"><?= $user['email'] ?></p>
                            </div>
                          </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                          <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"><?= $user['role'] == '1' ? 'Admin' : 'User' ?></p>
                          <!-- <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">Organization</p> -->
                        </td>

                        <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                          <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400"><?= $user['tanggal_bergabung'] ?></span>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                          <a href="<?= base_url('/dashboard/user/edit/'.$user['id']) ?>" class="text-xs mx-1 text-white bg-gradient-to-tl from-lime-500 to-cyan-400 inline-block whitespace-nowrap rounded-full px-[0.7em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold"> Edit </a>
                          <a href="<?= base_url('/dashboard/user/delete/'.$user['id']) ?>" class="text-xs mx-1 text-white bg-gradient-to-tl from-red-500 to-yellow-400 inline-block whitespace-nowrap rounded-full px-[0.7em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold"> Delete </a>
                        </td>
                      </tr>
                        <?php } ?>
                      
                    </tbody>
                  </table>
                  <div class="mr-36 mt-5 flex justify-end mb-20">
                    <?= $pager->links('default', 'tailwind_full') ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Button trigger modal -->


<?= $this->endSection() ?>