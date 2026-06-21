<?php

use App\Controllers\BookController;
use App\Database;
use App\Repositories\BookRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

return function (App $app): void {
    $controller = new BookController(
        new BookRepository(Database::get())
    );

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write(json_encode([
            'name' => 'Books REST API with MySQL',
            'version' => '2.0.0',
        ], JSON_PRETTY_PRINT));

        return $response->withHeader('Content-Type', 'application/json; charset=utf-8');
    });

    $app->group('/api', function ($group) use ($controller) {
        $group->get('/books', [$controller, 'index']);
        $group->get('/books/{id}', [$controller, 'show']);
        $group->post('/books', [$controller, 'create']);
        $group->put('/books/{id}', [$controller, 'update']);
        $group->delete('/books/{id}', [$controller, 'delete']);
    });
};
