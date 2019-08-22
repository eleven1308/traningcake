<h1>Edit Article</h1>
<p><?= $this->Html->link('Articles', ['action' => 'index']) ?></p>
<?php
echo $this->Form->create($article);
echo $this->Form->control('user_id', ['type' => 'hidden']);
echo $this->Form->control('title');
echo $this->Form->control('body', ['rows' => '3']);
echo $this->Form->button(__('Save Article'));
echo $this->Form->end();
?>