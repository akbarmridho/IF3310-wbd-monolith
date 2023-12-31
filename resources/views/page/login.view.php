<?php
/** @var array $meta */

$meta['title'] = 'Login';
$meta['layout'] = 'withnavbar';
$meta['css'][] = 'page/login';

?>

<div class="login">
    <h1 class="font-semibold">Login</h1>
    <form action="/login" method="post">
        <label for="username">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path fill="white"
                      d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
            </svg>
        </label>
        <input type="text" name="username" placeholder="Username" id="username" required>
        <label for="password">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path fill="white"
                      d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/>
            </svg>
        </label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <?php if (isset($error)): ?>
            <p class="text-danger"><?= $error ?></p>
        <?php endif ?>
        <p class="register-cta">Don't have an account? <a href="/register">Register here</a></p>
        <input type="submit" value="Login">
    </form>
</div>