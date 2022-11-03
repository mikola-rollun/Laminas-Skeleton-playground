<?php
/**
 * @copyright Copyright © 2014 Rollun LC (http://rollun.com/)
 * @license LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use rollun\datastore\DataStore\DbTable;
use rollun\dic\InsideConstruct;
use rollun\datastore\Rql\RqlQuery;

use App\DTO\OrderDto;

class OrderHandler implements RequestHandlerInterface
{
    private DbTable $dataStore;

    function __construct() 
    {
        InsideConstruct::init(['dataStore' => 'dataStore']);
    }
    
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $count = $request->getAttribute("count", 1);

        $items = [];
        for ($i = 0; $i < $count; $i++) {
            $items[] = [
                "id" => uniqid(),
                "status" => OrderDto::STATUS_INCOMPLETED
            ];
        }

        $this->dataStore->multiCreate($items);

        return new HtmlResponse('Ordered ' . $count . ' product' . ($count > 1 ? 's' : '') . '!');
    }
}
