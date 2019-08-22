<?php
namespace App\Model\Table;
use Cake\ORM\Query;
use Cake\ORM\Table;
class TagsTable extends Table
{
	public function initialize(array $config)
	{
		parent::initialize($config);
		$this->setTable('tags');
		$this->setDisplayField('title');
		$this->setPrimaryKey('id');
		
		$this->addBehavior('Timestamp');
		$this->belongsToMany('Articles', [
		'foreignKey' => 'tag_id',
		'targetForeignKey' => 'article_id',
		'joinTable' => 'articles_tags'
		]);
	}

	
}