<?php
/**
 * @var int $currentPage
 * @var int $totalPage
 */
?>


<div class="pagination">
    <a href="?<?= http_build_query(array_merge($_GET, ['page' => 1])) ?>" class="pagination-link">
        &lt;
    </a>
    <?php if ($totalPage < 5 || $currentPage < 3) : ?>
        <?php for ($i = 1; $i <= min($totalPage, 5); $i++): ?>
            <a href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>"
               class="pagination-link <?= $currentPage === $i ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor ?>
    <?php elseif ($totalPage - $currentPage <= 1): ?>
        <?php for ($i = $totalPage - 4; $i <= $totalPage; $i++): ?>
            <a href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>"
               class="pagination-link <?= $currentPage === $i ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor ?>
    <?php else : ?>
        <?php for ($i = -2; $i <= 2; $i++): ?>
            <a href="?<?= http_build_query(array_merge($_GET, ['page' => $currentPage + $i])) ?>"
               class="pagination-link <?= $currentPage === ($currentPage + $i) ? 'active' : '' ?>"><?= $currentPage + $i ?></a>
        <?php endfor ?>
    <?php endif ?>
    <a href="?<?= http_build_query(array_merge($_GET, ['page' => $totalPage])) ?>" class="pagination-link">
        &gt;
    </a>
</div>