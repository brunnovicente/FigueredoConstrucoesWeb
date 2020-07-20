<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Produtos Controller
 *
 * @property \App\Model\Table\ProdutosTable $Produtos
 *
 * @method \App\Model\Entity\Produto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProdutosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $user = $this->Auth->user();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $produtos = TableRegistry::getTableLocator()->get('produtos')->find('all');

            $produtos->where(['OR' => [
                ['descricao LIKE' => '%'.$data['busca'].'%'],
                ['codigoBarra =' => $data['busca']]

            ]]);
            $produtos = $this->paginate($produtos);
            $this->set('user', $user);
            $this->set(compact('produtos'));
        }else {
            $produtos = $this->paginate($this->Produtos);
            $this->set('user', $user);
            $this->set(compact('produtos'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produto = $this->Produtos->get($id, [
            'contain' => ['Entradas', 'Itens'],
        ]);

        $user = $this->Auth->user();

        $this->set('user', $user);
        $this->set('produto', $produto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produto = $this->Produtos->newEmptyEntity();
        if ($this->request->is('post')) {
            $produto = $this->Produtos->patchEntity($produto, $this->request->getData());
            $produto->set('status', 1);
            if($produto->get('codigoBarra') == ""){
                $produto->set('codigoBarra', uniqid());
            }
            if($produto->get('estoque') == ""){
                $produto->set('estoque', 0);
            }
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('Produto cadastrado com sucesso!'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The produto could not be saved. Please, try again.'));
        }

        $user = $this->Auth->user();

        $this->set('user', $user);
        $this->set(compact('produto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produto = $this->Produtos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produto = $this->Produtos->patchEntity($produto, $this->request->getData());

            if($produto->get('codigoBarra') == ""){
                $produto->set('codigoBarra', uniqid());
            }

            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('Produto cadastrado com sucesso!.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao cadastrar o produto. Por favro, tente novamente!'));
        }

        $user = $this->Auth->user();

        $this->set('user', $user);
        $this->set(compact('produto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produto = $this->Produtos->get($id);
        if ($this->Produtos->delete($produto)) {
            $this->Flash->success(__('The produto has been deleted.'));
        } else {
            $this->Flash->error(__('The produto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
