<?php
declare(strict_types=1);

namespace App\Controller\Api;
use App\Controller\AppController;
use Cake\View\JsonView;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */
class PostsController extends AppController
{

    public function viewClasses(): array
    {
        return [JsonView::class];
    }

    public function index()
    {
        $posts = $this->Posts->find('all')->all();
        $this->set('posts', $posts);
        $this->viewBuilder()->setOption('serialize', ['posts']);
    }

    public function view($id)
    {
        $post = $this->Posts->get($id);
        $this->set('post', $post);
        $this->viewBuilder()->setOption('serialize', ['post']);
    }

    public function add()
    {
        $post = $this->Posts->newEmptyEntity();
        $isRequestMethodPost = $this->request->is('post');

        if ($isRequestMethodPost) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            $post->slug = strtolower(str_replace(' ', '-', $this->request->getData('title')));

            // Mock data
            $post->category_id = 1;
            $post->tags = '{"php", "cakephp", "programming", "web development"}';

            if ($this->Posts->save($post)) {
                $this->set('post', $post);
                $this->viewBuilder()->setOption('serialize', ['post']);
            }
        }
    }

    public function edit($id)
    {
        $post = $this->Posts->get($id);
        $isRequestMethodPutOrPatch = $this->request->is(['put', 'patch']);

        if ($isRequestMethodPutOrPatch) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());

            if ($this->Posts->save($post)) {
                $this->set('post', $post);
                $this->viewBuilder()->setOption('serialize', ['post']);
            }
        }
    }

    public function delete($id)
    {
        $post = $this->Posts->get($id);
        $isRequestMethodDelete = $this->request->is('delete');

        if ($isRequestMethodDelete) {
            if ($this->Posts->delete($post)) {
                $this->set('post', $post);
                $this->viewBuilder()->setOption('serialize', ['post']);
            }
        }
    }
}
