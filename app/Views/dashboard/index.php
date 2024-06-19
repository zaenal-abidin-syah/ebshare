<?= $this->extend('/layouts/dashboardLayout') ?>
<?= $this->section('content') ?>


<!-- cards -->
<div class="w-full px-6 py-6 mx-auto">
  <!-- row 1 -->
  <div class="flex flex-wrap -mx-3">
    <!-- card1 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Ebooks Upload</p>
                <h5 class="mb-2 font-bold dark:text-white"><?= $statistik['ebooks'] ?></h5>
                <p class="mb-0 dark:text-white dark:opacity-60">
                  <span class="text-sm font-bold leading-normal text-emerald-500">Total ebook yang telah di upload</span>
                </p>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                <!-- <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i> -->
                <i class="fa fa-upload text-lg relative top-3 text-white" aria-hidden="true"></i>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- card2 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Total Jumlah Unduhan</p>
                <h5 class="mb-2 font-bold dark:text-white"><?= $statistik['jumlah_unduhan'] ?></h5>
                <p class="mb-0 dark:text-white dark:opacity-60">
                  <span class="text-sm font-bold leading-normal text-emerald-500">Jumlah total orang yang mengunduh ebook</span>
                </p>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                <!-- <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i> -->
                <i class="fa fa-download text-lg relative top-3 text-white" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- card3 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Total Komentar</p>
                <h5 class="mb-2 font-bold dark:text-white"><?= $statistik['jumlah_komentar'] ?></h5>
                <p class="mb-0 dark:text-white dark:opacity-60">
                  <span class="text-sm font-bold leading-normal text-emerald-500">Jumlah total komentar ebook</span>
                </p>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                <!-- <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i> -->
                <i class="fa fa-comments text-lg relative top-3 text-white" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- card4 -->
    <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Total Favorite</p>
                <h5 class="mb-2 font-bold dark:text-white"><?= $statistik['jumlah_favorite'] ?></h5>
                <p class="mb-0 dark:text-white dark:opacity-60">
                  <span class="text-sm font-bold leading-normal text-emerald-500">Jumlah ebook yang di favorite</span>
                </p>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                <!-- <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i> -->
                <i class="fa fa-heart text-lg relative top-3 text-white" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- cards row 2 -->
  <div class="flex lg:flex-nowrap xl:flex-nowrap md:flex-nowrap gap-4 flex-wrap sm:flex-wrap mt-6 -mx-3">
    <div class="w-full  md:w-4/12 max-w-full px-3 mt-0">
      <div class="border-black/12.5 shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
        <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
          <h6 class="capitalize ">Statistik</h6>
          <p class="mb-0 text-sm leading-normal">
            <!-- <i class="fa fa-arrow-up text-emerald-500"></i> -->
          </p>
        </div>
        <div class="flex-auto p-4">
          <div>
            <canvas id="canvas1" height="500"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="w-full md:w-8/12 max-w-full px-3 mt-0">
      <div class="border-black/12.5 shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
        <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
          <h6 class="capitalize">Statistik Per Month</h6>
          <p class="mb-0 text-sm leading-normal">
            <!-- <i class="fa fa-arrow-up text-emerald-500"></i> -->
            <!-- <span class="font-semibold">4% more</span> in 2021 -->
          </p>
        </div>
        <div class="flex-auto p-4">
          <div>
            <canvas id="canvas2" height="145"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- cards row 3 -->

  <script src="<?= base_url('/') ?>assets/js/plugins/chartjs.min.js"></script>

  <script>
    const unduhan = parseInt('<?= $statistik['jumlah_unduhan'] ?>')
    const favorite = parseInt('<?= $statistik['jumlah_favorite'] ?>')
    const komentar = parseInt('<?= $statistik['jumlah_komentar'] ?>')
    const data = {
      labels: [
        'Unduhan',
        'Favorite',
        'Komentar',
      ],
      datasets: [{
        label: 'My First Dataset',
        data: [unduhan, favorite, komentar],
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(75, 192, 192)',
          'rgb(255, 205, 86)'
        ]
      }]
    };
    const ctx = document.getElementById('canvas1');

    new Chart(ctx, {
      type: 'polarArea',
      data: data,
      options: {
        responsive: true,
      }
    });

    const komentarPerMonth = <?= $komentarPerMonth ?>;
    const unduhanPerMonth = <?= $unduhanPerMonth ?>;
    const favoritePerMonth = <?= $favoritePerMonth ?>;
    let bulanKomentar = []
    let totalKomentar = []
    komentarPerMonth.forEach(k => {
      bulanKomentar.push(k.bulan)
      totalKomentar.push(k.total)
    });
    let bulanUnduhan = []
    let totalUnduhan = []
    unduhanPerMonth.forEach(k => {
      bulanUnduhan.push(k.bulan)
      totalUnduhan.push(k.total)
    });

    let bulanFavorite = []
    let totalFavorite = []
    favoritePerMonth.forEach(k => {
      bulanFavorite.push(k.bulan)
      totalFavorite.push(k.total)
    });
    // Buat array untuk menyimpan nama bulan dalam format yang diinginkan
    let months = [];
    let dataBulanKomentar = [];
    let dataBulanUnduhan = [];
    let dataBulanFavorite = [];
    // Loop untuk mendapatkan bulan ini dan 5 bulan sebelumnya
    for (let i = 5; i >= 0; i--) {
      // Hitung tanggal untuk bulan yang akan diambil
      let date = new Date();
      date.setMonth(date.getMonth() - i);

      // Format nama bulan sesuai dengan preferensi Anda (misalnya 'January', 'February', dst.)
      let monthName = date.toLocaleString('default', {
        month: 'long'
      });

      months.push(monthName);
      if (!bulanKomentar.includes(monthName)) {
        dataBulanKomentar.push(0);
      } else {
        dataBulanKomentar.push(parseInt(totalKomentar[bulanKomentar.indexOf(monthName)]));
      }
      // for unduhan
      if (!bulanUnduhan.includes(monthName)) {
        dataBulanUnduhan.push(0);
      } else {
        dataBulanUnduhan.push(parseInt(totalUnduhan[bulanUnduhan.indexOf(monthName)]));
      }
      // for favorite
      if (!bulanFavorite.includes(monthName)) {
        dataBulanFavorite.push(0);
      } else {
        dataBulanFavorite.push(parseInt(totalFavorite[bulanFavorite.indexOf(monthName)]));
      }

    }


    const data2 = {
      // labels: labels,
      labels: months,
      datasets: [{
          label: 'Unduhan',
          data: dataBulanUnduhan,
          // data: [65, 59, 80, 81, 56, 55, 40],
          fill: false,
          borderColor: 'rgba(255, 99, 132, 0.5)',
          borderWidth: 5,
          tension: 0.1
        },
        {
          label: 'Favorite',
          data: dataBulanFavorite,
          // data: [65, 59, 80, 81, 56, 55, 40],
          fill: false,
          borderColor: 'rgba(75, 192, 192, 0.5)',
          borderWidth: 5,
          tension: 0.1
        },
        {
          label: 'Komentar',
          data: dataBulanKomentar,
          // data: [65, 59, 80, 81, 56, 55, 40],
          fill: false,
          borderColor: 'rgba(153, 102, 255, 0.5)',
          borderWidth: 5,
          tension: 0.1
        }

      ]
    };

    const ctx2 = document.getElementById('canvas2');
    new Chart(ctx2, {
      type: 'line',
      data: data2,
      options: {
        Response: true,
      }
    })
  </script>
  <?= $this->endSection() ?>