<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;


class ArticlesTable extends Table
{
    public function initialize(array $config)
    {
    	$this->setTable('articles');
        $this->addBehavior('Timestamp');

    }
    public function beforeSave($event, $entity, $options)
	{
		if ($entity->isNew() && !$entity->slug) {
		$sluggedTitle = Text::slug($entity->title);
		// trim slug to maximum length defined in schema
		$entity->slug = substr($sluggedTitle, 0, 191);
		}
	}

	public function validationDefault(Validator $validator)
	{
		$validator
		->notEmpty('title', 'Please fill this field')
		->minLength('title', 10)
		->maxLength('title', 255)
		 
		->requirePresence('body')
		->notEmpty('body')
		->add('body', 'length', [
		'rule' => ['minLength', 10],
		'message' => 'Articles must have a substantial body.'
		]
		);
		return $validator;
	}
}