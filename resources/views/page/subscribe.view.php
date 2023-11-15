<?php
/** @var array $meta */

use App\Model\User;

$meta['title'] = 'Subscribe';
$meta['layout'] = 'withnavbar';
$meta['css'][] = 'page/register';

?>
<?php $user = User::findById($id); ?>

<div class="register">
    <h1 class="font-semibold">Start Subscription</h1>
    <form action="/subscription/subscribe" method="post">
        <input type="text" name="id" placeholder="id" id="id" required hidden
                   value="<?= $user->id ?>"/>

        <div class="form-control">
            <label for="name">Email</label>
            <input type="text" name="email" placeholder="Email" id="email" required/>
        </div>
        <input type="submit" value="Subscribe">
    </form>
</div>
