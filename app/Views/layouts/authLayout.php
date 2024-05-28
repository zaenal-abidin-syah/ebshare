<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="./style/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/css/tw-elements.min.css" />
</head>

<body>
  <div class="flex justify-center items-center w-full h-screen bg-purple-50">
    <?= $this->renderSection('content'); ?>
  </div>
  <script src="./script/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/tw-elements/js/tw-elements.umd.min.js"></script>
</body>

</html>