<?php
/** @var array $meta */

use App\Model\Subscriber;
use App\Model\User;

$meta['title'] = 'Subscribe';
$meta['layout'] = 'withnavbar';
$meta['css'][] = 'page/register';

?>
<?php 
    $user = User::findById($id); 
    $sub = Subscriber::findById($id);
?>

<div class="register">
    <h1 class="font-semibold">Renew Subscription</h1>
    <form action="/subscription/renew" method="post">
        <input type="text" name="id" placeholder="id" id="id" required hidden
                   value="<?= $user->id ?>"/>

        <div class="form-control">
            <label for="name">Email</label>
            <input type="text" name="email" placeholder="Email" id="email" required disabled
            value="<?= $sub->email ?>"/>
            <p class="text-small">Email cannot be changed</p>
        </div>
        <input type="submit" value="Renew Subscription by 1 month">
    </form>
</div>
