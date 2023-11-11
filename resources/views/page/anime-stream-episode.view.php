<?php
/** @var array $meta */

/** @var \App\Model\Anime $anime */
/** @var \App\Model\AnimeStream $animeStream */
/** @var \App\Model\Episode $episode */

$meta['title'] = $anime->title;
$meta['layout'] = 'withnavbar';
$meta['css'][] = 'page/animedetail';
$meta['js'][] = 'page/anime-detail';

?>

<div class="anime">
    <table class="full-content">
        <thead>
        <tr class="content-header">
            <h1 class="h1 font-bold">
                <?= $anime->title ?>
            </h1>
        </tr>
        </thead>
        <tbody>
        <tr class="content-body">
            <td>
                <h2 class="font-bold"><?= $episode->title ?></h2>
                <div>
                    <video style="height:100%;width:100%" controls id="video">
                        <source src="<?= $episode->getStreamUrl() ?>" type="video/mp4" id='video_player'>
                    </video>
                </div>
                <h2 class="font-bold">Episodes</h2>
                <div class="episodes-list">
                    <?php if (!is_null($animeStream->airedEpisodes)) : ?>
                        <?php for ($i = 1; $i <= $animeStream->airedEpisodes; $i++) : ?>
                            <div class="episode-item">
                                <a href="<?= "/episode/" . $anime->id . "?episode=" . $i ?>"><?= $i ?></a>
                            </div>
                        <?php endfor ?>
                    <?php else: ?>
                        <p>No episodes</p>
                    <?php endif ?>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>