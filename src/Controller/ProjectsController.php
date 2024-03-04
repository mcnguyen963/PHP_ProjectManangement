<?php
declare(strict_types=1);

namespace App\Controller;

use function PHPUnit\Framework\exactly;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {   # variable hold for search data
        $sem_code=$this->request->getQuery('semCode');
        $status=$this->request->getQuery('status');
        $necessity=$this->request->getQuery('necessity');
        $isAttend=$this->request->getQuery('isAttend');
        $query=$this->Projects->find();
        $query->orderBy(['Projects.id' => 'ASC']);
        $query = $query->contain(['Clients','Questionnaires']);

        # if any variable temp is defined add it to condition
        if ($sem_code){
            $query->where(['semester LIKE'=>'%'.$sem_code.'%']);
        }
        if ($status) {
            $query->where(['status' => $status]);
        }
        if ($necessity) {
            $query->where(['level_of_necessity' => $necessity]);
        }
        if ($isAttend) {
            $query->where(['attend_meet_and_greet' => $isAttend]);
        }
        $projects = $this->paginate($query);
        $this->set(compact('projects'));

    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, contain: ['Clients', 'Questionnaires']);
        $this->set(compact('project'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $project = $this->Projects->newEmptyEntity();

        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }

        // Sorting dropdown list
        $clients = $this->Projects->Clients->find('list')->orderBy(['first_name' => 'ASC']);
        $this->set(compact('project', 'clients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $clients = $this->Projects->Clients->find('list', limit: 200)->all();
        $this->set(compact('project', 'clients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
