<?php
    $isSuccess = true;
    $message = '';
    if (isset($_GET['messages'])){
        $message = $_GET['messages'];
    } elseif (isset($_GET['errorMessages'])){
        $message = $_GET['errorMessages'];
        $isSuccess = false;
    }
    $messages = \src\lib\util\Format::formatResponseMessage($message);
?>


<section class="alert-list">
    <?php foreach ($messages as $index => $message): ?>
        <article style="
                animation: fadeOut <?= ($index + 1) * 5 ?>s ease-in-out forwards <?= ($index + 1) * 5 ?>s;
                background-color: <?= $isSuccess ? 'green' : 'red' ?>;
                ">
            <?php if ($isSuccess): ?>
                <img src="static/image/icon/checked.svg" alt="success">
            <?php else: ?>
                <img src="static/image/icon/warning.svg" alt="failure">
            <?php endif; ?>
            <p><?= $message ?></p>
        </article>
    <?php endforeach; ?>
</section>