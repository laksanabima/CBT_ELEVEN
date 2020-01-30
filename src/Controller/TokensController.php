<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tokens Controller
 *
 * @property \App\Model\Table\TokensTable $Tokens
 *
 * @method \App\Model\Entity\Token[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TokensController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $tokens = $this->paginate($this->Tokens);

        $this->set(compact('tokens'));
    }

    /**
     * View method
     *
     * @param string|null $id Token id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $token = $this->Tokens->get($id, [
            'contain' => []
        ]);

        $this->set('token', $token);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $token = $this->Tokens->newEntity();
        if ($this->request->is('post')) {
            $token = $this->Tokens->patchEntity($token, $this->request->getData());
            if ($this->Tokens->save($token)) {
                $this->Flash->success(__('The {0} has been saved.', 'Token'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Token'));
        }
        $this->set(compact('token'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Token id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $token = $this->Tokens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $token = $this->Tokens->patchEntity($token, $this->request->getData());
            if ($this->Tokens->save($token)) {
                $this->Flash->success(__('The {0} has been saved.', 'Token'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Token'));
        }
        $this->set(compact('token'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Token id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $token = $this->Tokens->get($id);
        if ($this->Tokens->delete($token)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Token'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Token'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
