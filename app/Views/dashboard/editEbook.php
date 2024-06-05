<?= $this->extend('/layouts/dashboardLayout') ?>
<?= $this->section('content') ?>
<div class="w-full px-6 py-6 mx-auto">
  <!-- table 1 -->

  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6 class="dark:text-white">Edit Ebook</h6>
        </div>
        <?= form_open(
          '/dashboard/ebook/update',
          [
            'class' => 'myform'
          ],
          [
            'tag' => $ebook['tag'],
            'id_ebook' => $ebook['id']
          ]
        ) ?>
        <?= csrf_field() ?>
        <!-- <form class="myform" action="<= base_url('/dashboard/myebook/update') ?>" method="post"> -->
        <div class="flex flex-col items-center px-0 pt-0 pb-2">
          <div class="mb-4 w-8/12">
            <label for="judul" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">
              Judul
            </label>
            <?= form_input(
              [
                'type' => 'text',
                'value' => $ebook['judul'],
                'id' => 'judul',
                'name' => 'judul',
                'class' => 'focus:shadow-primary-outline dark:bg-slate-850 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none'
              ]
            ) ?>
          </div>
          <div class="mb-4 w-8/12">
            <label for="penulis" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Penulis</label>
            <?= form_input(
              [
                'type' => 'text',
                'value' => $ebook['penulis'],
                'id' => 'penulis',
                'name' => 'penulis',
                'class' => 'focus:shadow-primary-outline dark:bg-slate-850 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none'
              ]
            ) ?>
            <!-- <input type="text" value="<= $ebook['penulis'] ?>" id="penulis" name="penulis" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" /> -->
          </div>
          <div class="mb-4 w-8/12">
            <label for="penerbit" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Penerbit</label>
            <?= form_input(
              [
                'type' => 'text',
                'value' => $ebook['penerbit'],
                'id' => 'penerbit',
                'name' => 'penerbit',
                'class' => 'focus:shadow-primary-outline dark:bg-slate-850 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none'
              ]
            ) ?>
            <!-- <input type="text" value="<= $ebook['penerbit'] ?>" id="penerbit" name="penerbit" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" /> -->
          </div>
          <div class="mb-4 w-8/12">
            <label for="tahun_terbit" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Tahun Terbit</label>
            <?= form_input(
              [
                'type' => 'text',
                'value' => $ebook['tahun_terbit'],
                'id' => 'tahun_terbit',
                'name' => 'tahun_terbit',
                'class' => 'focus:shadow-primary-outline dark:bg-slate-850 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none'
              ]
            ) ?>

          </div>
          <div class="mb-4 w-8/12">
            <label for="deskripsi" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Deskripsi</label>
            <?= form_textarea(
              [
                'value' => $ebook['deskripsi'],
                'id' => 'deskripsi',
                'name' => 'deskripsi',
                'class' => 'focus:shadow-primary-outline dark:bg-slate-850 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none'
              ]
            ) ?>
            <!-- <input type="textarea" value="<= $ebook['deskripsi'] ?>" id="deskripsi" name="deskripsi" class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" /> -->
          </div>

          <div class="mb-4 w-8/12">
            <label for="kategori" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Kategori</label>
            <?php
            $options = [];
            foreach ($kategori as $k) {
              $options[$k['id']] = $k['nama_kategori'];
              // if($k['id_kategori'])
            }  ?>
            <?= form_dropdown(
              'kategori',
              $options,
              $ebook['id_kategori'],
              [
                'id' => 'kategori',
                'name' => 'kategori',
                'class' => 'focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal',
                'data-twe-select-init' => ''
              ]
            ) ?>
          </div>
          <div class="mb-8 w-8/12">
            <label for="tags" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Tags</label>

            <!-- Tag Input -->
            <div class="data-tag w-full rounded-xl items-center" x-data='{ newTag: "", tags: <?= $ebook['tag'] != '' ? json_encode(explode(',', $ebook['tag'])) : "[]"  ?>  }'>
              <input id="triger-tag" x-model="newTag" @keydown.enter.prevent="
              
                if (newTag.trim() !== '') {
                    tags.push(newTag.trim());
                    newTag = '';
                };
            " class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" type="text" id="tags" name='tags' placeholder="Add tags (press Enter to add)">
              <div class="mt-4 flex gap-2 flex-wrap">
                <template x-for="(tag, index) in tags" :key="index">
                  <div class="inline-flex items-center gap-x-0.5 rounded-md bg-orange-50 px-2 py-1 text-xs font-medium text-orange-700 ring-1 ring-inset ring-orange-700/10">
                    <span x-text="tag"></span>
                    <button type="button" class="removeTag" @click="tags.splice(index, 1); removeTag(index)" class="ml-2">
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
          <div class="mb-4 w-8/12">
            <?= form_submit(
              'submit',
              'Submit',
              [
                'class' => "submit inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-[1.5] text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
              ]
            ) ?>
          </div>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>


  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <!-- JSON.Parse('<= json_encode(explode(',', $ebook['tag'])) ?>' -->
  <script>
    const triger = document.getElementById('triger-tag');
    const tag = document.getElementById('tag');

    function removeTag(index) {
      const tag = document.getElementById('tag');
      // console.log({ old: tag.value})
      tagArray = tag.value.split(',');
      tagArray.splice(index, 1);
      // console.log({ new: tag.value})
      tag.value = tagArray.join(',')
    }

    triger.addEventListener('keydown', function(event) {
      // console.log({ datatag : dataTag});
      if (event.key === 'Enter' && triger.value.trim() !== '') {
        if (tag.value.length !== 0) {
          tag.value = tag.value + ',' + triger.value
        } else {
          tag.value = triger.value
        }
      }
    });
  </script>
  <?= $this->endSection() ?>