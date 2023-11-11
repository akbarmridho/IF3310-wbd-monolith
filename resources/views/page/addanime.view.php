<?php
/** @var array $meta */

$meta['title'] = 'Add Anime';
$meta['layout'] = 'withnavbar';
$meta['css'][] = 'page/editanime';

?>

<div class="animeeditor">
    <h1>Add Anime</h1>
    <form action="/admin/anime" method="post" enctype="multipart/form-data">
        <table>
            <tbody>
            <tr>
                <td>
                    <label for="title">Anime Title</label>
                </td>
                <td>
                    <input type="text" name="title" placeholder="Title" id="title" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="global_id">Global Id</label>
                </td>
                <td>
                    <input type="text" name="global_id" placeholder="Global Id" id="global_id" maxlength="255">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="studio">Studio</label>
                </td>
                <td>
                    <input type="text" name="studio" placeholder="Studio Name" id="studio">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="genre">Genre</label>
                </td>
                <td>
                    <select name="genre" id="genre" required>
                        <option selected disabled>Select Genre ...</option>
                        <?php foreach (\App\Model\Anime::$genres as $genre) : ?>
                            <option value="<?= $genre ?>"><?= $genre ?></option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="description">Summary</label>
                </td>
                <td>
                    <textarea name="description" id="description" placeholder="Description" rows="8"></textarea>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="episode_count">Episode Count</label>
                </td>
                <td>
                    <input type="number" name="episode_count" id="episode_count" min="1" step="1"
                           placeholder="Episode count">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="air_date_start">Air Date Start</label>
                </td>
                <td>
                    <input type="date" name="air_date_start" id="air_date_start">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="air_date_end">Air Date End</label>
                </td>
                <td>
                    <input type="date" name="air_date_end" id="air_date_end">
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
        <input type="submit" value="Add Anime">
    </form>
</div>