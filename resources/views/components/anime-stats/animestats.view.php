<?php
/** @var ?\App\Model\UserAnime $user_anime */
/** @var \App\Model\Anime $anime */
?>
<div class="status-container">
    <p id="status-text"><?= is_null($user_anime) ? 'Not yet added' : ucfirst(strtolower($user_anime->status)) ?></p>
    <button class="btn btn-primary btn-small" id="update-status-modal-button"
            data-modal="status-update"><?= is_null($user_anime) ? 'Add to list' : 'Update list' ?></button>
    <button id="status-delete-button" class="btn btn-danger btn-small <?= is_null($user_anime) ? 'hidden' : '' ?>"
            data-modal="status-delete">Delete
        from list
    </button>

    <?php if ($anime->global_id !== null && $anime->global_id !== "") : ?>
        <?php if (\Core\Session\Session::$user->isPremium()) : ?>
            <a href='<?= "/stream/" . $anime->id ?>' class='btn btn-primary btn-small'>Stream</a>
        <?php else : ?>
            <a href='/subscription/subscribe' class='btn btn-primary btn-small'>Subscribe to Watch</a>
        <?php endif ?>
    <?php endif ?>
</div>

<div class="modal" id="status-update">
    <div class="modal-bg modal-exit"></div>
    <div class="modal-container">
        <h1 class="modal-title">Update Status</h1>
        <div class="modal-body">
            <label for="watch-status">Status</label>
            <select name="status" id="watch-status">
                <?php foreach (array('WISHLIST', 'WATCHING', 'WATCHED') as $watchStatus) : ?>
                    <option class=''
                            value='<?= $watchStatus ?>' <?= $user_anime && $user_anime->status === $watchStatus ? 'selected' : '' ?>><?= ucfirst(strtolower($watchStatus)) ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="modal-action">
            <button class="btn modal-exit">Cancel</button>
            <button class="btn btn-primary" id="anime-update-status"
                    data-id="<?= $anime->id ?>">Update
            </button>
        </div>
        <button class="modal-close modal-exit">X</button>
    </div>
</div>

<div class="modal" id="status-delete">
    <div class="modal-bg modal-exit"></div>
    <div class="modal-container">
        <h1 class="modal-title">Are you sure?</h1>
        <div class="modal-body"><p>Are you sure want to remove this anime from your list?</p></div>
        <div class="modal-action">
            <button class="btn modal-exit">Cancel</button>
            <button class="btn btn-danger" id="status-delete-form"
                    data-id="<?= $anime->id ?>">Delete
            </button>
        </div>
        <button class="modal-close modal-exit">X</button>
    </div>
</div>

<div class="toast" id="toast-update">
    <div class="toast-body">
        Watch status updated
    </div>
</div>

<div class="toast" id="toast-delete">
    <div class="toast-body">
        Watch status deleted
    </div>
</div>