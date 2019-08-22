<?php
namespace App\Controller;
use App\Controller\AppController;
class TagsController extends AppController
{
	public function index()
	{
		$tags = $this->paginate($this->Tags);
		// dd($tag);
		 
		$this->set(compact('tags'));
		}
	public function view($id = null)
	{	
		$query = $this->Tags->find();
		$data = $query->where(['id' => 1]);
		dd($data);
		$tag = $this->Tags->get($id, [
		'contain' => ['Articles']
		]);
		$this->set('tag', $tag);
	}
	public function add()
	{

		$tag = $this->Tags->newEntity();
		$value = $this->request->data('title');
		if ($data = $this->request->is('post')) {
		$tag = $this->Tags->patchEntity($tag, $this->request->getData());
		if ($this->Tags->save($tag)) {
		$this->Flash->success(__('The tag has been saved.'));
		return $this->redirect(['action' => 'index']);
		}
		$this->Flash->error(__('The tag could not be saved. Please, try again.'));
		}
		$articles = $this->Tags->Articles->find('list', ['limit' => 200]);
		$this->set(compact('tag', 'articles'));
	}
	public function edit($id = null)
	{
		$tag = $this->Tags->get($id, [
		'contain' => ['Articles']
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
		$tag = $this->Tags->patchEntity($tag, $this->request->getData());
		if ($this->Tags->save($tag)) {
		$this->Flash->success(__('The tag has been saved.'));
		 
		return $this->redirect(['action' => 'index']);
		}
		$this->Flash->error(__('The tag could not be saved. Please, try again.'));
		}
		$articles = $this->Tags->Articles->find('list', ['limit' => 200]);
		$this->set(compact('tag', 'articles'));
	}
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$tag = $this->Tags->get($id);
		if ($this->Tags->delete($tag)) {
		$this->Flash->success(__('The tag has been deleted.'));
		} else {
		$this->Flash->error(__('The tag could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
		}
		
}