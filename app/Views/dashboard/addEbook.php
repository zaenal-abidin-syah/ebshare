<?= $this->extend('/layouts/dashboardLayout') ?>
<?= $this->section('content') ?>
<div class="w-full px-6 py-6 mx-auto">
  <!-- table 1 -->

  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6 class="dark:text-white">My Ebooks</h6>
          </div>
          <div class="flex flex-col items-center px-0 pt-0 pb-2">
            <div class="mb-3">
              <label
                for="file"
                class="mb-2 inline-block text-neutral-500 dark:text-neutral-400"
                >Upload File</label
              >
              <input
                class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-secondary-500 bg-transparent bg-clip-padding px-3 py-[0.32rem] text-base font-normal leading-[2.15] text-surface transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3  file:py-[0.32rem] file:text-surface focus:border-primary focus:text-gray-700 focus:shadow-inset focus:outline-none dark:border-white/70 dark:text-white  file:dark:text-white"
                id="file"
                type="file" />
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
              <label for="deskripsi" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Deskripsi</label>
              <input type="text" id="deskripsi" name="deskripsi" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
            </div>
            
            <div class="mb-4 w-8/12">
              <label for="kategori" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Kategori</label>
              <input type="text" id="kategori" name="kategori" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
            </div>
            <div class="mb-4 w-8/12">
              <label for="tags" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Tags</label> 
              <div class="w-full mx-auto" x-data="{
                tags: [],
                addTag(tag) {
                  if (tag.trim() !== '') {
                    this.tags.puspx-3 py-2h(tag.trim());
                  }
                },
                removeTag(index) {
                  this.tags.splice(index, 1);
                }
              }">
              <!-- Tag Input -->
              <div class="w-full rounded-xl items-center" x-data="{ newTag: '', tags: [] }">
              <input x-model="newTag" @keydown.enter.prevent="
                if (newTag.trim() !== '') {
                    tags.push(newTag.trim());
                    newTag = '';
                }
            " class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" 
            type="text" id="tags" name='tags' placeholder="Add tags (press Enter to add)">
                <div class="mt-4 flex gap-2 flex-wrap"> 
                  <template x-for="(tag, index) in tags" :key="index">
                    <div class="inline-flex items-center gap-x-0.5 rounded-md bg-orange-50 px-2 py-1 text-xs font-medium text-orange-700 ring-1 ring-inset ring-orange-700/10"> 
                      <span x-text="tag"></span> 
                      <button @click="tags.splice(index, 1)" class="ml-2"> 
                        <svg class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg> 
                      </button> 
                    </div>
                  </template> 
                </div>
                </div>
              </div> 
            </div>
          </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<?= $this->endSection() ?>