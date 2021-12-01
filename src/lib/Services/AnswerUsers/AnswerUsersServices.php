<?php

namespace app\lib\Services\AnswerUsers;

use app\lib\Repository\AnswerOptions\GuestBook;
use app\lib\Repository\AnswerOptions\Model\GuestBookModel;
use app\lib\Repository\AnswerUsers\AnswerUsers;

class AnswerUsersServices
{
    public function getResultTest(): array
    {
        $answerUsers = (new AnswerUsers())->getAnswerUsers();
        $question = (new GuestBook())->getAllAnswerAndQuestion();

        $answerRes = [
            'answer' => [],
            'countAnswer' => []
        ];
        foreach ($answerUsers as $answer) {
            $answerRes['answer'][$answer->getQuestionId()][$answer->getAnswerOptionsId()] += 1;
            $answerRes['countAnswer'][$answer->getQuestionId()] += 1;
        }

        $questionRes = [];
        foreach ($question as $key => $item) {
            $questionRes[]['name'] = $item->getName();

            /** @var GuestBookModel $answer */
            foreach ($item->getAnswer() as $k => $answer) {
                $questionRes[] = [
                    'name' => $answer->getText(),
                    'count' => $answerRes['answer'][$key][$k],
                    'share' => round($answerRes['answer'][$key][$k] * 100 / $answerRes['countAnswer'][$key]) . '%',
                ];
            }
        }

        return $questionRes;
    }
}