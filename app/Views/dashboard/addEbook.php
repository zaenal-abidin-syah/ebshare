<?= $this->extend('/layouts/dashboardLayout') ?>
<?= $this->section('content') ?>
<div class="w-full px-6 py-6 mx-auto">
  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6 class="dark:text-white">My Ebooks</h6>
        </div>
        <form class="myform" action="<?= base_url('/dashboard/ebook/add') ?>" method="post" enctype="multipart/form-data">
          <div class="flex flex-col items-center px-0 pt-0 pb-2">
            <div class="mb-3">
              <label for="file" class="mb-2 inline-block text-neutral-500">Upload File</label>
              <input onchange="handleFile()" class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-secondary-500 bg-transparent bg-clip-padding px-3 py-[0.32rem] text-base font-normal leading-[2.15] text-surface transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3  file:py-[0.32rem] file:text-surface focus:border-primary focus:text-gray-700 focus:shadow-inset focus:outline-none" id="file" name="file" type="file" />
            </div>
            <div class="mb-4 w-8/12">
              <label for="judul" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Judul</label>
              <input type="text" id="judul" name="judul" class="focus:shadow-primary-outline dark:bg-slate-850 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
            </div>
            <div class="mb-4 w-8/12">
              <label for="penulis" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Penulis</label>
              <input type="text" id="penulis" name="penulis" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
            </div>
            <div class="mb-4 w-8/12">
              <label for="penerbit" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Penerbit</label>
              <input type="text" id="penerbit" name="penerbit" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
            </div>
            <div class="mb-4 w-8/12">
              <label for="tahun_terbit" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Tahun Terbit</label>
              <input type="text" id="tahun_terbit" name="tahun_terbit" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
            </div>
            <div class="mb-4 w-8/12">
              <label for="deskripsi" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Deskripsi</label>
              <input type="text" id="deskripsi" name="deskripsi" class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
            </div>

            <div class="mb-4 w-8/12">
              <label for="kategori" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Kategori</label>
              <select id="kategori" name="kategori" data-twe-select-init class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal">
                <?php foreach ($kategori as $a) { ?>
                  <option value=<?= $a['id'] ?>><?= $a['nama_kategori'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="mb-8 w-8/12">
              <label for="tags" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Tags</label>

              <!-- Tag Input -->
              <div class="data-tag w-full rounded-xl items-center" x-data="{ newTag: '', tags: [] }">
                <input id="triger-tag" x-model="newTag" @keydown.enter.prevent="
                if (newTag.trim() !== '') {
                    tags.push(newTag.trim());
                    newTag = '';
                }
            " class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" type="text" id="tags" name='tags' placeholder="Add tags (press Enter to add)">
                <div class="mt-4 flex gap-2 flex-wrap">
                  <template x-for="(tag, index) in tags" :key="index">
                    <div class="inline-flex items-center gap-x-0.5 rounded-md bg-orange-50 px-2 py-1 text-xs font-medium text-orange-700 ring-1 ring-inset ring-orange-700/10">
                      <span x-text="tag"></span>
                      <button type="button" @click="tags.splice(index, 1) ;removeTag(index)" class="ml-2">
                        <svg class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                      </button>
                    </div>
                  </template>
                  <!-- </div> -->
                </div>
              </div>
            </div>
            <div>
              <input type="hidden" name='type' id='type'>
              <input type="hidden" name='size' id='size'>
              <input type="hidden" name='tag' id='tag'>

            </div>
            <div class="mb-4 w-8/12">
              <button type="submit" class="submit inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-[1.5] text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong" data-twe-ripple-init data-twe-ripple-color="light">
                Submit
              </button>

            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script>
  const triger = document.getElementById('triger-tag');

  triger.addEventListener('keydown', function(event) {
    if (event.key === 'Enter' && triger.value.trim() !== '') {
      const tag = document.getElementById('tag');
      if (tag.value.length !== 0) {
        tag.value = tag.value + ',' + triger.value
      } else {
        tag.value = triger.value
      }
      console.log(tag.value);
    }
  });

  function removeTag(index) {
    const tag = document.getElementById('tag');

    tagArray = tag.value.split(',');
    tagArray.splice(index, 1);
    tag.value = tagArray.join(',')
  }

  async function handleFile() {
    const fileInput = document.getElementById('file');
    const file = fileInput.files[0];


    const judul = document.getElementById('judul');
    judul.value = file.name;
    const type = document.getElementById('type');
    type.value = file.type
    const size = document.getElementById('size');
    size.value = file.size
  }
</script>
<?= $this->endSection() ?>