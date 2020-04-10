<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fornecedores Model
 *
 * @property \App\Model\Table\EntradasTable&\Cake\ORM\Association\HasMany $Entradas
 *
 * @method \App\Model\Entity\Fornecedore newEmptyEntity()
 * @method \App\Model\Entity\Fornecedore newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fornecedore findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Fornecedore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedore[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fornecedore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fornecedore[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fornecedore[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fornecedore[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fornecedore[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FornecedoresTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('fornecedores');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Entradas', [
            'foreignKey' => 'fornecedore_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('cnpj')
            ->maxLength('cnpj', 45)
            ->allowEmptyString('cnpj');

        $validator
            ->scalar('razao')
            ->maxLength('razao', 100)
            ->allowEmptyString('razao');

        $validator
            ->scalar('telefone1')
            ->maxLength('telefone1', 20)
            ->allowEmptyString('telefone1');

        $validator
            ->scalar('telefone2')
            ->maxLength('telefone2', 20)
            ->allowEmptyString('telefone2');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 255)
            ->allowEmptyString('endereco');

        return $validator;
    }
}
