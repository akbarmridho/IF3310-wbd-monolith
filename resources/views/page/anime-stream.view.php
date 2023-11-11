<?php
/** @var array $meta */

/** @var \App\Model\Anime $anime */

$meta['title'] = $anime->title;
$meta['layout'] = 'withnavbar';
$meta['css'][] = 'page/animedetail';
$meta['js'][] = 'page/anime-detail';

?>

<div class="anime">
    <table>
        <thead>
        <tr class="content-header">
            <h1 class="h1 font-bold">
                <?= $anime->title ?>
            </h1>
        </tr>
        </thead>
        <tbody>
        <tr class="content-body">
            <td class="left-content">
                <img src="<?= $anime->poster ? storage($anime->poster) : assets('default-poster.jpg') ?>"
                     alt="<?= $anime->title ?>">
                <h2 class="font-bold">Information</h2>
                <div class="anime-info"><span class="font-semibold">Title:</span> <?= $anime->title ?></div>
                <div class="anime-info"><span class="font-semibold">Studio:</span> <?= $anime->studio ?? '?' ?></div>
                <div class="anime-info"><span class="font-semibold">Genre:</span> <?= $anime->genre ?? '?' ?></div>
                <div class="anime-info"><span
                        class="font-semibold">Episode Count:</span> <?= $anime->episode_count ?? '?' ?></div>
                <div class="anime-info"><span
                        class="font-semibold">Air Date Start:</span> <?= !is_null($anime->air_date_start) ? date_format($anime->air_date_start, 'Y-m-d') : '?' ?>
                </div>
                <div class="anime-info"><span
                        class="font-semibold">Air Date End:</span> <?= !is_null($anime->air_date_end) ? date_format($anime->air_date_end, 'Y-m-d') : '?' ?>
                </div>
            </td>
            <td class="right-content">
                <h2 class="font-bold">Description</h2>
                <div><p><?= $anime->description ?? 'No summary available' ?></p></div>
            </td>
        </tr>
        </tbody>
    </table>
</div>