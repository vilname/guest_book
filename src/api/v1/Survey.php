<?php

namespace app\api\v1;

use app\lib\Repository\AnswerOptions\GuestBook;
use app\lib\Repository\AnswerUsers\AnswerUsers;
use app\lib\Repository\Question\Question;
use app\lib\Repository\User\User;
use app\lib\Services\AnswerUsers\AnswerUsersServices;
use Laminas\Diactoros\Response;
use app\lib\Repository\Main;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Survey extends Main
{
    public function getGuestBook(ServerRequestInterface $request): ResponseInterface
    {
        $params = $request->getQueryParams();

        $questBook = (new GuestBook())->getGuestBook();

        $response = new Response();
        $response->getBody()->write(json_encode([
            'guestBook' => $questBook,
        ]));
        return $response->withAddedHeader('content-type', 'application/json')->withStatus(200);

    }

    public function saveGuestBook(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response();
        $data = json_decode($request->getBody()->getContents(), true);

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        die();

        $id = (new GuestBook())->saveGuestBook($data);

        $response->getBody()->write(json_encode(['idNewGuestBook' => $id]));
        return $response->withAddedHeader('content-type', 'application/json')->withStatus(200);
    }
}