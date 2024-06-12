<?= $this->extend('/layouts/layout') ?>
<?= $this->section('content') ?>
<div class="w-full px-6 mt-24 py-6 mx-auto">
  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-md rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <div class="flex justify-between mx-[15%] items-center px-5 pt-0 pb-2">
            <h6 class="font-bold text-gray-700 text-2xl">Detail Ebook</h6>
            <div class="flex gap-3">
              <a type="button" class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-[1.5] text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 " href="<?= base_url('ebook/download/') . $ebook['id'] ?>" data-twe-ripple-init data-twe-ripple-color="light">
                <i class="fa fa-download"></i>
              </a>
              <button type="button" class="favorite <?= $favorite ? 'text-pink-900' : 'text-white' ?> inline-block rounded bg-pink-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-[1.5]  transition duration-150 ease-in-out hover:bg-pink-300 hover:shadow-pink-200 focus:bg-pink-300 focus:shadow-pink-300 focus:outline-none focus:ring-0 active:bg-pink-600 active:shadow-pink-300 " data-favorite="<?= $ebook['id'] ?>" data-twe-ripple-init data-twe-ripple-color="light">
                <i class="fa fa-heart"></i>
              </button>
            </div>
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
                        <td class="whitespace-nowrap px-8 py-6"><?= $ebook['username'] ?></td>
                      </tr>
                      <tr class="border-b border-neutral-200 bg-black/[0.02]">
                        <td class="whitespace-nowrap px-8 py-6">Tanggal Upload</td>
                        <td class="whitespace-nowrap px-8 py-6"><?= $ebook['tanggal'] ?></td>
                      </tr>
                      <tr class="border-b border-neutral-200 bg-black/[0.02]">
                        <td class="whitespace-nowrap px-8 py-6">Kategori</td>
                        <td class="whitespace-nowrap px-8 py-6"><?= $ebook['nama_kategori'] ?></td>
                      </tr>
                      <tr class="border-b border-neutral-200 bg-white ">
                        <td class="whitespace-nowrap px-8 py-6">Tag</td>
                        <td class="whitespace-nowrap px-8 py-6">
                          <?php
                          $tags = $ebook['tag'] != '' ? explode(',', $ebook['tag']) : [];
                          foreach ($tags as $tag) { ?>
                            <span class="bg-gradient-to-tl from-purple-500 to-blue-400 px-2.5 text-xs rounded-md py-2 inline-block whitespace-nowrap text-center align-baseline mx-1 leading-none text-white"><?= $tag ?></span>
                          <?php } ?>
                        </td>
                      </tr>
                      <tr class="border-b border-neutral-200 bg-black/[0.02]">
                        <td class="whitespace-nowrap px-8 py-6">Rating</td>
                        <td class="whitespace-nowrap px-8 py-6">
                          <div id="ratingApp">
                            <div id="starsContainer" class="my-1 flex list-none w-[10%] gap-1 p-0">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                              </svg>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="border-b border-neutral-200 bg-black/[0.02]">
                        <td class="whitespace-nowrap px-8 py-6">Deskripsi</td>
                        <td class="px-8 py-6"><?= $ebook['deskripsi'] ?></td>
                      </tr>

                    </tbody>
                  </table>
                </div>
                <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
                  <div class="max-w-2xl mx-auto px-4">
                    <div class="flex justify-between items-center mb-6">
                      <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion (20)</h2>
                    </div>
                    <form class="mb-6 form-komentar">
                      <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="6" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Write a comment..." required></textarea>
                      </div>
                      <button type="submit" class="komentar inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Post comment
                      </button>
                    </form>
                    <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                      <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                          <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img class="mr-2 w-6 h-6 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Michael Gough">Michael Gough</p>
                          <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
                        </div>
                        <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                          </svg>
                          <span class="sr-only">Comment settings</span>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownComment1" class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                          <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                            </li>
                            <li>
                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                            </li>
                            <li>
                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                            </li>
                          </ul>
                        </div>
                      </footer>
                      <p class="text-gray-500 dark:text-gray-400">Very straight-to-point article. Really worth time reading. Thank you! But tools are just the
                        instruments for the UX designers. The knowledge of the design tools are as important as the
                        creation of the design strategy.</p>
                      <div class="flex items-center mt-4 space-x-4">
                        <button type="button" class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                          <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                          </svg>
                          Reply
                        </button>
                      </div>
                    </article>
                    <article class="p-6 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900">
                      <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                          <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img class="mr-2 w-6 h-6 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Jese Leos">Jese Leos</p>
                          <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-12" title="February 12th, 2022">Feb. 12, 2022</time></p>
                        </div>
                        <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-40 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                          </svg>
                          <span class="sr-only">Comment settings</span>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownComment2" class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                          <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                            </li>
                            <li>
                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                            </li>
                            <li>
                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                            </li>
                          </ul>
                        </div>
                      </footer>
                      <p class="text-gray-500 dark:text-gray-400">Much appreciated! Glad you liked it ☺️</p>
                      <div class="flex items-center mt-4 space-x-4">
                        <button type="button" class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                          <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                          </svg>
                          Reply
                        </button>
                      </div>
                    </article>
                    <article class="p-6 mb-3 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                      <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                          <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img class="mr-2 w-6 h-6 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="Bonnie Green">Bonnie Green</p>
                          <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-03-12" title="March 12th, 2022">Mar. 12, 2022</time></p>
                        </div>
                        <button id="dropdownComment3Button" data-dropdown-toggle="dropdownComment3" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-40 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                          </svg>
                          <span class="sr-only">Comment settings</span>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownComment3" class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                          <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                            </li>
                            <li>
                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                            </li>
                            <li>
                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                            </li>
                          </ul>
                        </div>
                      </footer>
                      <p class="text-gray-500 dark:text-gray-400">The article covers the essentials, challenges, myths and stages the UX designer should consider while creating the design strategy.</p>
                      <div class="flex items-center mt-4 space-x-4">
                        <button type="button" class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                          <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                          </svg>
                          Reply
                        </button>
                      </div>
                    </article>
                    <article class="p-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                      <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                          <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img class="mr-2 w-6 h-6 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-4.jpg" alt="Helene Engels">Helene Engels</p>
                          <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-06-23" title="June 23rd, 2022">Jun. 23, 2022</time></p>
                        </div>
                        <button id="dropdownComment4Button" data-dropdown-toggle="dropdownComment4" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-40 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                          </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownComment4" class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                          <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                            </li>
                            <li>
                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                            </li>
                            <li>
                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                            </li>
                          </ul>
                        </div>
                      </footer>
                      <p class="text-gray-500 dark:text-gray-400">Thanks for sharing this. I do came from the Backend development and explored some of the tools to design my Side Projects.</p>
                      <div class="flex items-center mt-4 space-x-4">
                        <button type="button" class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                          <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                          </svg>
                          Reply
                        </button>
                      </div>
                    </article>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  let csrf_token = '<?= csrf_token() ?>';
  let csrf_hash = '<?= csrf_hash() ?>';
  document.addEventListener("DOMContentLoaded", function() {
    const stars = document.querySelectorAll("#starsContainer svg");

    let rating = -1;

    const updateRatingDisplay = () => {
      stars.forEach((star, index) => {
        star.classList.toggle("text-orange-500", index <= rating);
        star.classList.toggle("text-gray-400", index > rating);
      });
    };

    stars.forEach((star, index) => {
      const getRating = <?= $rating ?>;
      if (index + 1 <= getRating) {
        star.classList.remove('text-gray-400');
        star.classList.add('text-orange-500');
      }

      star.addEventListener("click", () => {
        rating = rating === index ? -1 : index;
        $.ajax({
          url: '<?= base_url('ebook/rating') ?>',
          type: 'POST',
          data: {
            rating: rating + 1,
            id_ebook: <?= $ebook['id'] ?>,
            [csrf_token]: csrf_hash,
          },
          success: function(data) {
            csrf_hash = response.csrf_hash;
          }
        });
        updateRatingDisplay();
      });
    });

    // updateRatingDisplay();
  });
  $(document).ready(function() {

    $('.favorite').on('click', function() {
      let button = $(this);
      let favoriteId = button.data('favorite');

      $.ajax({
        url: '<?= base_url('ebook/favorite') ?>',
        type: 'POST',
        data: {
          [csrf_token]: csrf_hash,
          favoriteId
        },
        success: function(response) {
          console.log({
            response
          });
          csrf_hash = response.csrf_hash;
          if (response.favorite === 'add') {
            button.removeClass('text-white');
            button.addClass('text-slate-900');
          } else {
            button.addClass('text-white');
            button.removeClass('text-slate-900');
          }
        }
      });
    });
    $('.form-komentar').on('submit', function(e) {
      e.preventDefault();
      let komentar = $('#comment').val();
      $.ajax({
        url: '<?= base_url('ebook/komentar ') ?>',
        type: 'POST',
        data: {
          komentar,
          id_ebook: '<?= $ebook['id'] ?>',
          [csrf_token]: csrf_hash,
        },
        success: function(response) {
          csrf_hash = response.csrf_hash;
        }
      })

    })
  });
</script>
<?= $this->endSection() ?>