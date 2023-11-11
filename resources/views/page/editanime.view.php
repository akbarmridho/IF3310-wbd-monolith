<?php
/** @var array $meta */
/** @var \App\Model\Anime $anime */

$meta['title'] = 'Edit animetitle';
$meta['layout'] = 'withnavbar';
$meta['css'][] = 'page/editanime';

?>

<div class="animeeditor">
    <h1>Edit Anime</h1>
    <form action="/admin/anime/<?= $anime->id ?>" method="post" enctype="multipart/form-data">
        <input type="text" value="PUT" name="_method" hidden />
        <table>
            <tbody>
            <tr>
                <td>
                    <label for="title">Edit Anime</label>
                </td>
                <td>
                    <input type="text" name="title" placeholder="Title" id="title" required
                           value='<?= $anime->title ?>'>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="global_id">Global Id</label>
                </td>
                <td>
                    <input type="text" name="global_id" placeholder="Global Id" id="global_id"
                           value='<?= $anime->global_id ?? "" ?>' maxlength="255">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="studio">Studio</label>
                </td>
                <td>
                    <input type="text" name="studio" placeholder="Studio Name" id="studio"
                           value='<?= $anime->studio ?>'>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="genre">Genre</label>
                </td>
                <td>
                    <select name="genre" id="genre" required>
                        <?php foreach (\App\Model\Anime::$genres as $genre) : ?>
                            <option
                                value="<?= $genre ?>" <?= $anime->genre === $genre ? 'selected' : '' ?>><?= $genre ?></option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="description">Summary</label>
                </td>
                <td>
                    <textarea name="description" id="description" placeholder="Description"
                              rows="8"><?= $anime->description ?></textarea>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="episode_count">Episode Count</label>
                </td>
                <td>
                    <input type="number" name="episode_count" id="episode_count" min="1" step="1"
                           value='<?= $anime->episode_count ?>'>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="air_date_start">Air Date Start</label>
                </td>
                <td>
                    <input type="date" name="air_date_start" id="air_date_start"
                           value='<?= !is_null($anime->air_date_start) ? date_format($anime->air_date_start, 'Y-m-d') : "" ?>'>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="air_date_end">Air Date End</label>
                </td>
                <td>
                    <input type="date" name="air_date_end" id="air_date_end"
                           value='<?= !is_null($anime->air_date_end) ? date_format($anime->air_date_end, 'Y-m-d') : '' ?>'>
                </td>
            </tr>


            <tr>
                <td>
                    <label for="poster">Poster</label>
                </td>
                <td>
                    <input type="file" name="poster" id="poster" accept="image/*">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="trailer">Trailer</label>
                </td>
                <td>
                    <input type="file" name="trailer" id="trailer" accept="video/*">
                </td>
            </tr>
            </tbody>
        </table>

        <?php if (isset($error)): ?>
            <p class="text-danger"><?= $error ?></p>
        <?php endif ?>
        <input type="submit" value="Save Changes">
    </form>
</div>