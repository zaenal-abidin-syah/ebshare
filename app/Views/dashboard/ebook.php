<?= $this->extend('/layouts/dashboardLayout') ?>
<?= $this->section('content') ?>

      <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <div class="flex flex-wrap -mx-3">
          <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
              <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6>My Ebooks</h6>

                <a type="button"
                  href="<?= base_url('/dashboard/ebook/add') ?>"
                  class="inline-block my-5 rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 cursor-pointer"
                  >
                  Add
                </a>
                <?php if(session()->get('message')) { ?>
                  <div
                    class="w-full my-4 items-center rounded-lg bg-success-100 px-6 py-5 text-base text-success-700 dark:bg-green-950 dark:text-success-500/80"
                    role="alert"
                    id="alert-static-success"
                    data-twe-alert-init>
                    <?= session()->get('message') ?>
                  </div>
                <?php }?>
                
                
              </div>
              <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                  <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                    <thead class="align-bottom">
                      <tr>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul</th>
                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Kategori</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tag</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Ukuran</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tahun Terbit</th>
                        <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($ebooks as $ebook) { ?>
                        <tr>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                          <div class="flex px-2 py-1">
                            <div>
                              <img src="../assets/img/team-2.jpg" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200-in-out h-9 w-9 rounded-xl" alt="user1" />
                            </div>
                            <div class="flex flex-col justify-center">
                              <h6 class="mb-0 text-sm leading-normal dark:text-white"><?= $ebook['judul'] ?></h6>
                              <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400"><?= $ebook['penulis'] ?></p>
                            </div>
                          </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                          <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"><?= $ebook['nama_kategori'] ?></p>
                          <!-- <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">Organization</p> -->
                        </td>
                        <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                          <?php 
                          $tags = explode(',', $ebook['tag']);
                          foreach ($tags as $tag) { ?>
                            <span class="bg-gradient-to-tl from-purple-500 to-blue-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white"><?= $tag ?></span>
                            <?php } ?>
                        </td>
                        <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                          <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400"><?= $ebook['ukuran'] ?></span>
                        </td>
                        <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                          <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400"><?= $ebook['tahun_terbit'] ?></span>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                          <a href="<?= base_url('/dashboard/ebook/edit/'.$ebook['id']) ?>" class="text-xs mx-1 text-white bg-gradient-to-tl from-lime-500 to-cyan-400 inline-block whitespace-nowrap rounded-full px-[0.7em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold"> Edit </a>
                          <button
                            type="button"
                            onclick="openModal('modelConfirm', '<?= $ebook['id'] ?>')"
                            class="text-xs mx-1 text-white bg-gradient-to-tl from-red-500 to-yellow-400 inline-block whitespace-nowrap rounded-full px-[0.7em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold"> 
                            Delete 
                          </button>
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

        
<div id="modelConfirm" class="fixed hidden z-[1000] inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
  <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">

    <div class="flex justify-end p-2">
      <button onclick="closeModal('modelConfirm')" type="button"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>

    <div class="p-6 pt-0 text-center">
      <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this Ebook?</h3>
      <a href="#"  onclick="closeModal('modelConfirm')"
        class="deleteHref text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
        Yes, I'm sure
      </a>
      <a href="#" onclick="closeModal('modelConfirm')"
        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
        data-modal-toggle="delete-user-modal">
        No, cancel
      </a>
    </div>
  </div>
</div>

<script type="text/javascript">
  window.openModal = function(modalId, id_ebook) {
    console.log(modalId);
    document.getElementById(modalId).style.display = 'block'
    document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
    deleteButton = document.querySelector('.deleteHref');
    base_url = "<?= base_url('') ?>" ;
    deleteButton.href = base_url + 'dashboard/ebook/delete/' + id_ebook    
  }

  window.closeModal = function(modalId) {
    document.getElementById(modalId).style.display = 'none'
    document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
  }

  // Close all modals when press ESC
  document.onkeydown = function(event) {
    event = event || window.event;
    if (event.keyCode === 27) {
      document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
      let modals = document.getElementsByClassName('modal');
      Array.prototype.slice.call(modals).forEach(i => {
        i.style.display = 'none'
      })
    }
  };
</script>


<?= $this->endSection() ?>