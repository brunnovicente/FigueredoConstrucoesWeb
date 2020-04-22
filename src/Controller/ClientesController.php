<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Clientes Controller
 *
 * @property \App\Model\Table\ClientesTable $Clientes
 *
 * @method \App\Model\Entity\Cliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        //Buscando Produtos
        if($this->request->is('post')){
            $clientes = $this->paginate($this->Clientes->find('all', ['conditions' => ['Clientes.nome LIKE' => '%'.$_POST['busca'].'%']]));
        }else{
            $clientes = $this->paginate($this->Clientes->find('all', ['conditions' => ['Clientes.status =' => 1]]));
        }

        $user = $this->Auth->user();

        $this->set('user', $user);
        $this->set(compact('clientes'));

    }


    /**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => ['Vendas'],
        ]);

        $user = $this->Auth->user();

        $this->set('user', $user);
        $this->set('cliente', $cliente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cliente = $this->Clientes->newEmptyEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            $cliente->set('status', 1);
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('Cliente cadastrado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao cadastrar o cliente.'));
        }

        $user = $this->Auth->user();

        $this->set('user', $user);
        $this->set(compact('cliente'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('Cliente editado com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao editar os dados do cliente.'));
        }

        $user = $this->Auth->user();

        $this->set('user', $user);
        $this->set(compact('cliente'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Clientes->get($id);
        if ($this->Clientes->delete($cliente)) {
            $this->Flash->success(__('Cliente excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o cliente.'));
        }

        $user = $this->Auth->user();

        $this->set('user', $user);
        return $this->redirect(['action' => 'index']);
    }
}
