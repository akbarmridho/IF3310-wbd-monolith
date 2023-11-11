<?php
/** @var array $meta */

/** @var \App\Model\Anime $anime */

/** @var ?\App\Model\UserAnime $user_anime */

/** @var ?\App\Model\Review[] $reviews */

/** @var ?\App\Model\Review $user_review */

use Core\Session\Session;

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
                <div class="anime-stats">
                    <div>
                        <span class="font-bold stats-category">Score</span>
                        <span
                            class="stats-value"><?= $anime->rating ? number_format($anime->rating, 2, '.', '') : 'N/A' ?></span>
                        <span class="font-bold stats-category">Members</span>
                        <span class="stats-value"><?= $anime->members ?? 'N/A' ?></span>
                        <?php if (Session::isAuthenticated() && Session::$user->role == 'ADMIN') : ?>
                            <a class="btn btn-primary btn-small" href="/admin/anime/<?= $anime->id ?>">Edit
                                Anime</a>
                            <button class="btn btn-danger btn-small" data-modal="anime-delete">Delete Anime</button>
                            <div class="modal" id="anime-delete">
                                <div class="modal-bg modal-exit"></div>
                                <div class="modal-container">
                                    <h1 class="modal-title">Are you sure?</h1>
                                    <div class="modal-body"><p>Are you sure want to delete this anime?</p></div>
                                    <div class="modal-action">
                                        <button class="btn modal-exit">Cancel</button>
                                        <button class="btn btn-danger" id="anime-delete-form"
                                                data-id="<?= $anime->id ?>">Delete
                                        </button>
                                    </div>
                                    <button class="modal-close modal-exit">X</button>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <div class="anime-manage">
                    <?php if (Session::isAuthenticated()): render_component(
                        'anime-stats/animestats', [
                        'user_anime' => $user_anime,
                        'anime' => $anime
                    ]) ?>
                    <?php else: ?>
                        <a href='/login' class='btn btn-primary btn-small'>Login to add</a>
                    <?php endif ?>
                </div>
                <h2 class="font-bold">Description</h2>
                <div><p><?= $anime->description ?? 'No summary available' ?></p></div>
                <h2 class="font-bold">Trailer</h2>
                <?php if (!is_null($anime->trailer)) : ?>
                    <video style="height:100%;width:100%;max-width:400px" controls id="video">
                        <source src="<?= storage($anime->trailer) ?>" type="video/mp4" id='video_player'>
                    </video>
                <?php else: ?>
                    No trailer found
                <?php endif ?>

                <h2 class="font-bold">Reviews</h2>
                <?php if (Session::isAuthenticated() && is_null($user_review)) : ?>
                    Write your review
                    <a href='/review/add/<?= $anime->id ?>' class='btn btn-primary btn-small'>Add review</a>
                    <br><br>
                <?php endif ?>

                <?php
                if (is_null($reviews)) {
                    echo "No reviews found";
                } else {
                    if (Session::isAuthenticated()) {
                        render_component('reviews/reviewlist', ['data' => $reviews, 'user_id' => Session::$user->id]);
                    } else {
                        render_component('reviews/reviewlist', ['data' => $reviews]);
                    }
                }
                ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>