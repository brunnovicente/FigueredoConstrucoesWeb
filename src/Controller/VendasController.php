<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Vendas Controller
 *
 * @property \App\Model\Table\VendasTable $Vendas
 *
 * @method \App\Model\Entity\Venda[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clientes', 'Users'],
        ];
        $vendas = $this->paginate($this->Vendas);

        $user = $this->Auth->user();

        $this->set('user', $user);
        $this->set(compact('vendas'));
    }

    /**
     * View method
     *
     * @param string|null $id Venda id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venda = $this->Vendas->get($id, [
            'contain' => ['Clientes', 'Users', 'Itens'],
        ]);

        $user = $this->Auth->user();

        $this->set('user', $user);
        $this->set('venda', $venda);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $venda = $this->Vendas->newEmptyEntity();
        if ($this->request->is('post')) {
            $venda = $this->Vendas->patchEntity($venda, $this->request->getData());
            if ($this->Vendas->save($venda)) {
                $this->Flash->success(__('The venda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venda could not be saved. Please, try again.'));
        }
        $clientes = $this->Vendas->Clientes->find('list', ['limit' => 200]);
        $users = $this->Vendas->Users->find('list', ['limit' => 200]);

        $user = $this->Auth->user();

        $this->set('user', $user);
        $this->set(compact('venda', 'clientes', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Venda id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venda = $this->Vendas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venda = $this->Vendas->patchEntity($venda, $this->request->getData());
            if ($this->Vendas->save($venda)) {
                $this->Flash->success(__('The venda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venda could not be saved. Please, try again.'));
        }
        $clientes = $this->Vendas->Clientes->find('list', ['limit' => 200]);
        $users = $this->Vendas->Users->find('list', ['limit' => 200]);

        $user = $this->Auth->user();

        $this->set('user', $user);
        $this->set(compact('venda', 'clientes', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Venda id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venda = $this->Vendas->get($id);
        if ($this->Vendas->delete($venda)) {
            $this->Flash->success(__('The venda has been deleted.'));
        } else {
            $this->Flash->error(__('The venda could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Action da página do autocomplete
     */
    public function vender() {
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            //Criar Venda
            $venda = $this->Vendas->newEmptyEntity();
            $venda->set('total', $data['total']);
            $venda->set('status', 1);
            echo $data['buscaliente'];
            foreach ($data['item'] as $item) {
                // TODO: criar objetos itens
                echo "Id: ".$item['id']."|Quant: ".$item['quantidade']."<br>";
            }
        }
        $user = $this->Auth->user();

        $this->set('user', $user);
    }

    /**
     * Action do ajax do autocomplete
     */
    public function produtosAjax() {
        $this->viewBuilder()->setLayout('ajax');
        $query = TableRegistry::getTableLocator()->get('produtos')->find('all');
        if ($this->request->is('get')) {
            if(!empty($this->request->getQuery('q'))) {
                $query->where(['OR' => [
                    ['codigoBarra LIKE' => '%'.$this->request->getQuery('q').'%'],
                    ['descricao LIKE' => '%'.$this->request->getQuery('q').'%']
                ]]);
                $produtos = $this->paginate($query);
                $this->set(compact('produtos'));
                $this->viewBuilder()->setOption('serialize', ['produtos']);
            }

        }
    }

    public function clientesAjax() {
        $this->viewBuilder()->setLayout('ajax');
        $query = TableRegistry::getTableLocator()->get('clientes')->find('all');
        if ($this->request->is('get')) {
            if(!empty($this->request->getQuery('q'))) {
                $query->where(['OR' => [
                    ['nome LIKE' => '%'.$this->request->getQuery('q').'%'],
                    ['cpf =' => $this->request->getQuery('q')]
                ]]);
                $clientes = $this->paginate($query);
                $this->set(compact('clientes'));
                $this->viewBuilder()->setOption('serialize', ['clientes']);
            }

        }
    }

}//Fim da Classe
