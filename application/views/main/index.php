<p>Main page</p>

<p>News from database</p>

<?php foreach ($news as $val): ?>
<h3><?= $val['title']?></h3>
<p><?= $val['description']?></p>
<hr>
<?php endforeach ?>