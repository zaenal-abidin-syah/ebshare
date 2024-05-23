<?php

// foreach ($data as $d) {
//   esc($data);
// }

// print_r($data);
print_r($test);

if(session('username')){
  print_r(session('username'));
}

?>
<?php if (! empty($errors)): ?>
  <div class="alert alert-danger">
  <?php foreach ($errors as $field => $error): ?>
    <div class="w3-panel w3-pale-red w3-border">
      <p><?= esc($error) ?></p>
    </div>
  <?php endforeach ?>
  </div>
<?php endif ?>

