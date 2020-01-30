<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Exams Controller
 *
 * @property \App\Model\Table\ExamsTable $Exams
 *
 * @method \App\Model\Entity\Exam[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExamsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Courses']
        ];
        $exams = $this->paginate($this->Exams);

        $this->set(compact('exams'));
    }

    /**
     * View method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exam = $this->Exams->get($id, [
            'contain' => ['Courses', 'Levels', 'Results']
        ]);

        $this->set('exam', $exam);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exam = $this->Exams->newEntity();
        if ($this->request->is('post')) {
            $exam = $this->Exams->patchEntity($exam, $this->request->getData());
            if ($this->Exams->save($exam)) {
                $this->Flash->success(__('The {0} has been saved.', 'Exam'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Exam'));
        }
        $courses = $this->Exams->Courses->find('list', ['limit' => 200]);
        $levels = $this->Exams->Levels->find('list', ['limit' => 200]);
        $this->set(compact('exam', 'courses', 'levels'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exam = $this->Exams->get($id, [
            'contain' => ['Levels']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exam = $this->Exams->patchEntity($exam, $this->request->getData());
            if ($this->Exams->save($exam)) {
                $this->Flash->success(__('The {0} has been saved.', 'Exam'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Exam'));
        }
        $courses = $this->Exams->Courses->find('list', ['limit' => 200]);
        $levels = $this->Exams->Levels->find('list', ['limit' => 200]);
        $this->set(compact('exam', 'courses', 'levels'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exam = $this->Exams->get($id);
        if ($this->Exams->delete($exam)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Exam'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Exam'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
