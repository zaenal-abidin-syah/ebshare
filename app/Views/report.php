<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report | Laporan Ebshare</title>
  <link rel="stylesheet" href="/style/datatables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.tailwindcss.css"> -->

</head>
<body>
  <nav class="navbar navbar-expand-lg bg-primary mb-5 py-2">
    <div class="container">
      <a class="navbar-brand  text-white" href="#">Ebshare</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Pricing</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<?php 
// foreach ($dataByKategori as $key ) { 
//     print_r($key['jumlah_unduhan']);
//     // print_r(json_encode($key['jumlah_unduhan']));
//  }; 
?>
  <div class="container mb-4">
    <h2>Laporan Jumlah Unduhan, Komenter dan Favorite setiap Buku</h2>
  </div>

  <div class="container">
  <table id="allEbookReport" class="table table-striped" style="width:100%">
    <thead>
      <tr>
          <th>Judul</th>
          <th>Penulis</th>
          <th>Penerbit</th>
          <th>Kategori</th>
          <th>Jumlah Unduhan</th>
          <th>Jumlah Favorite</th>
          <th>Jumlah Komentar</th>
          <th>Rata-rata Rating</th>
      </tr>
    </thead>
    
    <?php foreach ($coba as $key ) { ?>
      <tr>
        <td><?php echo $key['judul']; ?></td>
        <td><?php echo $key['penulis']; ?></td>
        <td><?php echo $key['penerbit']; ?></td>
        <td><?php echo $key['nama_kategori']; ?></td>
        <td><?php echo $key['jumlah_unduhan']; ?></td>
        <td><?php echo $key['jumlah_favorite']; ?></td>
        <td><?php echo $key['jumlah_komentar']; ?></td>
        <td><?php echo $key['rating_rata_rata']; ?></td>
      </tr>
    <?php } ?>
  </table>
  </div>
  <div class="container my-4">
    <h2>Grafik Jumlah Unduhan, Komentar dan Favorite setiap Buku</h2>
  </div>
  <div class="container">
    <canvas id="grafik1"></canvas>
  </div>


  <div class="container my-4">
    <h2>Laporan Jumlah Unduhan, Komentar dan Favorite setiap Kategori Buku</h2>
  </div>

  <div class="container">
  <table id="reportByKategoriReport" class="table table-striped" style="width:100%">
    <thead>
      <tr>
          <th>Kategori</th>
          <th>Jumlah Unduhan</th>
          <th>Jumlah Favorite</th>
          <th>Jumlah Komentar</th>
      </tr>
    </thead>
    
    <?php foreach ($dataByKategori as $key ) { ?>
      <tr>
        <td><?php echo $key['nama_kategori']; ?></td>
        <td><?php echo $key['jumlah_unduhan']; ?></td>
        <td><?php echo $key['jumlah_favorite']; ?></td>
        <td><?php echo $key['jumlah_komentar']; ?></td>
      </tr>
    <?php } ?>
  </table>
  </div>
  <div class="container my-4">
    <h2>Grafik Jumlah Unduhan, Komentar dan Favorite setiap Kategori Buku</h2>
  </div>
  <div class="container mb-5">
    <canvas id="grafik2"></canvas>
  </div>

  <script src="/script/datatables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    new DataTable('#allEbookReport');
    new DataTable('#reportByKategoriReport');
    

    const ctx = document.getElementById('grafik1');
    const dataLabel = []
    const dataContentUnduhan = []
    const dataContentFavorite = []
    const dataContentKomentar = []
    <?php foreach ($coba as $key ) { ?>
        dataLabel.push(<?= json_encode($key['judul']) ?>);
        dataContentUnduhan.push(<?= json_encode($key['jumlah_unduhan']) ?>);
        dataContentFavorite.push(<?= json_encode($key['jumlah_favorite']) ?>);
        dataContentKomentar.push(<?= json_encode($key['jumlah_komentar']) ?>);
    <?php }?> 
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: dataLabel,
        datasets: [{
          label: 'Jumlah Unduhan',
          data: dataContentUnduhan,
          borderWidth: 1
        },
        {
          label: 'Jumlah Favorite',
          data: dataContentFavorite,
          borderWidth: 1
        },
        {
          label: 'Jumlah Komentar',
          data: dataContentKomentar,
          borderWidth: 1
        }
      ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    const ctx2 = document.getElementById('grafik2');
    const dataLabel2 = []
    const dataContentUnduhan2 = []
    const dataContentFavorite2 = []
    const dataContentKomentar2 = []
    <?php foreach ($dataByKategori as $key ) { ?>
        dataLabel2.push(<?= json_encode($key['nama_kategori']) ?>);
        dataContentUnduhan2.push(<?= json_encode($key['jumlah_unduhan']) ?>);
        dataContentFavorite2.push(<?= json_encode($key['jumlah_favorite']) ?>);
        dataContentKomentar2.push(<?= json_encode($key['jumlah_komentar']) ?>);
    <?php }?> 
    new Chart(ctx2, {
      type: 'bar',
      data: {
        labels: dataLabel2,
        datasets: [{
          label: 'Jumlah Unduhan',
          data: dataContentUnduhan2,
          borderWidth: 1
        },
        {
          label: 'Jumlah Favorite',
          data: dataContentFavorite2,
          borderWidth: 1
        },
        {
          label: 'Jumlah Komentar',
          data: dataContentKomentar,
          borderWidth: 1
        }
      ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</body>
</html>