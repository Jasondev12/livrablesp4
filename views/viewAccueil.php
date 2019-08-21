<?php $this->_t = 'Mon blog';
foreach($posts as $post): ?>
<h2><?= $post->title() ?></h2>
<time><?= $post->date() ?></time>


 <?php endforeach; ?>
