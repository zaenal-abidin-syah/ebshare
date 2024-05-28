<?php
$pager->setSurroundCount(1);
?>


<nav class="ml-10" aria-label="<?= lang('Pager.pageNavigation') ?>">
  <ul class="list-style-none flex pagination">
    <?php if ($pager->hasPrevious()) : ?>
      <li>
        <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>" class="relative block rounded bg-transparent px-5 py-3 text-lg text-surface transition duration-300 hover:bg-neutral-100 focus:bg-neutral-100 focus:text-purple-700 focus:outline-none active:bg-neutral-100 active:text-purple-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 dark:focus:text-purple-500 dark:active:bg-neutral-700 dark:active:text-purple-500">
          <span">
            <?= lang('Pager.previous') ?>
            </span>
        </a>
      </li>
    <?php endif ?>
    <?php foreach ($pager->links() as $link) : ?>
      <li <?= $link['active'] ? 'class="active"' : '' ?>>
        <a href="<?= $link['uri'] ?>" class="relative block rounded bg-purple-100 px-5 py-3 text-lg font-medium text-purple-700 transition duration-300 focus:outline-none dark:bg-slate-900 dark:text-purple-500"><?= $link['title'] ?>
          <span class="absolute -m-px h-px w-px overflow-hidden whitespace-nowrap border-0 p-0 [clip:rect(0,0,0,0)]">(current)
          </span>
        </a>
      </li>
    <?php endforeach ?>
    <?php if ($pager->hasNext()) : ?>
      <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>" class="relative block rounded bg-transparent px-5 py-3 text-lg text-surface transition duration-300 hover:bg-neutral-100 focus:bg-neutral-100 focus:text-purple-700 focus:outline-none active:bg-neutral-100 active:text-purple-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 dark:focus:text-purple-500 dark:active:bg-neutral-700 dark:active:text-purple-500" href="#!">
        <span>
          <?= lang('Pager.next') ?>
        </span>
      </a>
      </li>
    <?php endif ?>
  </ul>
</nav>