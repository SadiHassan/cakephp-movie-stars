<?php
declare(strict_types=1);

namespace App\Controller;

class ActorsController extends AppController
{
    /**
     * List all actors with their movies.
     *
     * @return \Cake\Http\Response|null Renders view
     */
    public function index()
    {
        $actors = $this->Actors->find('all', [
            'contain' => ['Movies'],
        ]);

        $this->set(compact('actors'));
    }
}
