<?php


namespace app\lib\Repository\AnswerOptions;

use app\lib\Repository\AnswerOptions\Model\GuestBookModel;
use app\lib\Repository\Main;

class GuestBook extends Main
{
    /**
     * @return GuestBookModel[]
     */
    public function getGuestBook(): array
    {
        $result = [];

        $sth = $this->db->prepare(
            "SELECT * FROM `guest_book`
                    ORDER BY id DESC 
                    LIMIT 5"
        );
        $sth->execute();
        while ($field = $sth->fetch(\PDO::FETCH_ASSOC)) {
            $result[] = GuestBookModel::setMap($field);
        }

        return $result;
    }

    /**
     * @param array $field
     * @return int
     * @throws \Exception
     */
    public function saveGuestBook(array $field): int
    {
        try {
            $sth = $this->db->prepare(
                "INSERT INTO `guest_book` SET `dtime` = NOW(), `name` = :name, `body` = :body;"
            );

            $sth->execute([
                'name' => $field['name'],
                'body' => $field['body']
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        return $this->db->lastInsertId();

    }
}