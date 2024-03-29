<h1>Articles</h1>
<?= $this->Html->link('Add Article', ['action' => 'add']) ?>
<table>
<tr>
<th>Title</th>
<th>Created</th>
</tr>
<?php foreach ($articles as $article): ?>
<tr>
<td>
<?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
</td>
<td>
<?= $article->created->format('Y-m-d H:i:s') ?>
</td>
<td>
<?= $this->Html->link('Edit', ['action' => 'edit', $article->slug]) ?>
<?= $this->Form->postLink(
'Delete',
['action' => 'delete', $article->slug],
['confirm' => 'Are you sure?'])
?>
</td>
</tr>
<?php endforeach; ?>
</table>