<?php /** @var \Lencse\Application\ResponseData $data */ ?>
<h1>Posztok</h1>

<?php if ($data->getMessage()) : ?>
    <p class="msg <?php self::esc($data->getMessage()->getType()); ?>">
        <?php self::esc($data->getMessage()->getMessage()); ?>
    </p>
<?php endif ?>

<form action="/new" method="post">
    <input type="submit" value="Új bejegyzés">
</form>

<table>
    <tr>
        <th>Dátum</th>
        <th>Szerző</th>
        <th>Cím</th>
    </tr>
    <?php foreach ($data->getPosts() as $post) : ?>
        <tr>
            <td><?php self::esc($post->getDate()->format('Y.m.d H:i')); ?></td>
            <td><?php self::esc($post->getAuthor()); ?></td>
            <td><?php self::esc($post->getTitle()); ?></td>
        </tr>
    <?php endforeach ?>
</table>