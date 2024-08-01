<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */
class PostsController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $posts = $this->Posts->find('all');
        $this->set([
            'posts' => $posts,
            '_serialize' => ['posts']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id);
        $this->set([
            'post' => $post,
            '_serialize' => ['post']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEntity($this->request->getData());
        $addPost = $this->Posts->save($post);

        $this->set([
            'message' => $addPost? "Post was added successfully" : "Error adding post",
            'recipe' => $post,
            '_serialize' => ['message', 'post']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $preUpdatePost = $this->Posts->get($id);

        if ($this->request->is(['post', 'put'])) {
            $updatedPost = $this->Posts->patchEntity($preUpdatePost, $this->request->getData());
            $isPostSaved = $this->Posts->save($updatedPost);
        }
        $this->set([
            'message' => $isPostSaved? "Post was updated successfully" : "Error updating post",
            '_serialize' => ['message']
        ]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $post = $this->Posts->get($id);
        $isPostDeleted = $this->Posts->delete($post);

        $this->set([
            'message' => $isPostDeleted? "Post was deleted successfully" : "Error deleting post",
            '_serialize' => ['message']
        ]);
    }
}
