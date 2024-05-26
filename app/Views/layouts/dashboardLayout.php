<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png" />
    <!-- <link rel="icon" type="image/png" href="/assets/img/favicon.png" /> -->
    
    <title>Ebshare Dashboard</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link rel="stylesheet" href="/style/style.css">
    <!-- <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/tw-elements/css/tw-elements.min.css" /> -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script src="<?= base_url('/') ?>/script/script.js"></script>
    <link href="<?= base_url('/') ?>/assets/css/dashboard.css" rel="stylesheet" />
  </head>
  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-[1.6] bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-gradient-to-t from-purple-300 to-purple-500 min-h-[20rem]"></div>
    <!-- sidenav  -->
    <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl max-w-64 z-[990] xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
      <div class="h-20">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="<?= base_url('/dashboard') ?>" target="_blank">
          <!-- <img src="/assets/img/logo-ct-dark.png" class="inline h-full max-w-full transition-all duration-200 dark:hidden max-h-8" alt="main_logo" />
          <img src="/assets/img/logo-ct.png" class="hidden h-full max-w-full transition-all duration-200 dark:inline max-h-8" alt="main_logo" /> -->
          <span class="[&>svg]:w-7">
            <svg xmlns="http://www.w3.org/2000/svg" fill="blue" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M249.6 471.5c10.8 3.8 22.4-4.1 22.4-15.5V78.6c0-4.2-1.6-8.4-5-11C247.4 52 202.4 32 144 32C93.5 32 46.3 45.3 18.1 56.1C6.8 60.5 0 71.7 0 83.8V454.1c0 11.9 12.8 20.2 24.1 16.5C55.6 460.1 105.5 448 144 448c33.9 0 79 14 105.6 23.5zm76.8 0C353 462 398.1 448 432 448c38.5 0 88.4 12.1 119.9 22.6c11.3 3.8 24.1-4.6 24.1-16.5V83.8c0-12.1-6.8-23.3-18.1-27.6C529.7 45.3 482.5 32 432 32c-58.4 0-103.4 20-123 35.6c-3.3 2.6-5 6.8-5 11V456c0 11.4 11.7 19.3 22.4 15.5z"/></svg>
          </span>
          <span class="ml-1 font-semibold transition-all duration-200">Ebshare Dashboard</span>
        </a>
      </div>

      <hr class="h-[1px] mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

      <div class="items-center block w-auto max-h-screen overflow-auto grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
          <li class="mt-0.5 w-full">
            <a class="py-[0.675rem] bg-purple-50 text-sm my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="<?= base_url('/dashboard') ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-[1.5] text-purple-500 ni ni-tv-2"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none">Dashboard</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-[0.675rem] text-sm my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="<?= base_url('/dashboard/table') ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-[1.5] text-orange-500 ni ni-calendar-grid-58"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none">Tables</span>
            </a>
          </li>

          <li class="w-full mt-4">
            <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Account pages</h6>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-[0.675rem] text-sm my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="<?= base_url() ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-[1.5]  text-slate-700 fa fa-home"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none">Landing Page</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-[0.675rem] text-sm my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="<?= base_url('/dashboard/profile') ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-[1.5] text-slate-700 ni ni-single-02"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ">My Profile</span>
            </a>
          </li>

          <?php if(session('login') && session()->get('role')  == '0' ) {?>
          <li class="mt-0.5 w-full">
            <a class="py-[0.675rem] text-sm my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="<?= base_url('/dashboard/ebook') ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-[1.5] text-slate-700 fa fa-book"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ">My Ebooks</span>
            </a>
          </li>
          <?php } ?>
          <?php if(session()->get('login') && session()->get('role')  == '1' ) {?>
          <li class="mt-0.5 w-full">
            <a class="py-[0.675rem] text-sm my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="<?= base_url('/dashboard/user') ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-[1.5] text-slate-700 ni ni-single-02"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ">Users</span>
            </a>
          </li>
          <li class="mt-0.5 w-full">
            <a class="py-[0.675rem] text-sm my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="<?= base_url('/dashboard/ebook') ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-[1.5] text-slate-700 fa fa-book"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ">Ebooks</span>
            </a>
          </li>
          <?php } ?>


          <li class="mt-0.5 w-full">
            <a class="py-[0.675rem] text-sm my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="<?= base_url('/logout') ?>">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-[1.5] text-cyan-500 ni ni-collection"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none">Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>

    <!-- end sidenav -->





    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
      <!-- Navbar -->
      <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
          <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
              <li class="text-sm leading-[1.5]">
                <a class="text-white opacity-50" href="javascript:;">Pages</a>
              </li>
              <li class="text-sm pl-2 capitalize leading-[1.5] text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">Dashboard</h6>
          </nav>

          <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
              <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg">
                <span class="text-sm leading-5.6 absolute z-50 -ml-[1px] flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                  <i class="fas fa-search"></i>
                </span>
                <input type="text" class="pl-9 text-sm focus:shadow-primary-outline w-1/100 leading-5.6 relative -ml-[1px] block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none focus:transition-shadow" placeholder="Type here..." />
              </div>
            </div>
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
              <li class="flex items-center">
                <a href="../pages/sign-in.html" class="block px-0 py-2 text-sm font-semibold text-white transition-all">
                  <i class="fa fa-user sm:mr-1"></i>
                  <span class="hidden sm:inline">Sign In</span>
                </a>
              </li>
              <li class="flex items-center pl-4 xl:hidden">
                <a href="javascript:;" class="block p-0 text-sm text-white transition-all" sidenav-trigger>
                  <div class="w-4.5 overflow-hidden">
                    <i class="mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                    <i class="mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                    <i class="relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  </div>
                </a>
              </li>
              <li class="flex items-center px-4">
                <a href="javascript:;" class="p-0 text-sm text-white transition-all">
                  <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
                  <!-- fixed-plugin-button-nav  -->
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="w-full px-6 py-6 mx-auto">

        <!-- end Navbar -->
        
        <?= $this->renderSection('content') ?>
        
      <footer class="pt-4">
          <div class="w-full px-6 mx-auto">
            <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
              <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                <div class="text-sm leading-[1.5] text-center text-slate-500 lg:text-left">
                  ©
                  <script>
                    document.write(new Date().getFullYear() + ",");
                  </script>
                  made with <i class="fa fa-heart"></i> by
                  <a href="<?= base_url('/') ?>" class="font-semibold text-slate-700 dark:text-white" target="_blank">Ebshare</a>
                  for a better web.
                </div>
              </div>
              <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                  <li class="nav-item">
                    <a href="<?= base_url('/') ?>" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">Ebshare</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('/about') ?>" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('/ebook') ?>" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">Ebook</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('/kategori') ?>" class="block px-4 pt-0 pb-1 pr-0 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">Categories</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
      </footer>
      </div>
      <!-- end cards -->
    </main>
  

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="<?= base_url('/') ?>assets/js/plugins/chartjs.min.js"></script>
<!-- plugin for scrollbar  -->
<script src="<?= base_url('/') ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
<!-- main script file  -->
<!-- <script src="/assets/js/argon-dashboard-tailwind.js?v=1.0.1'>"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js" integrity="sha512-z8IYLHO8bTgFqj+yrPyIJnzBDf7DDhWwiEsk4sY+Oe6J2M+WQequeGS7qioI5vT6rXgVRb4K1UVQC5ER7MKzKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/pdf-lib/dist/pdf-lib.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/tw-elements/js/tw-elements.umd.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>

  </body>
  <!-- plugin for charts  -->
</html>