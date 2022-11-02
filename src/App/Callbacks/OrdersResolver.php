<?php
namespace App\Callbacks;

use rollun\datastore\DataStore\DbTable;
use rollun\datastore\Rql\RqlQuery;
use Xiag\Rql\Parser\Node as XiagNode;
use App\Dto\OrderDto;
use rollun\dic\InsideConstruct;

class OrdersResolver {
    private DbTable $dataStore;

    function __construct(DbTable $dataStore) 
    {
        $this->dataStore = $dataStore;
    }

    function __sleep()
    {
        return [];
    }

    function __wakeup()
    {
        InsideConstruct::initWakeup(['dataStore' => 'dataStore']);
    }

    function resolve5Orders()
    {
        $rql = new RqlQuery();
        $rql->setQuery(new XiagNode\Query\ScalarOperator\EqNode('status', OrderDto::STATUS_INCOMPLETED));
        $rql->setLimit(new XiagNode\LimitNode(5));
        $result = $this->dataStore->query($rql);

        foreach($result as $item) {
            $item['status'] = OrderDto::STATUS_COMPLETED;
            $this->dataStore->update($item);
        }

    }
}