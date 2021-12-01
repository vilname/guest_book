<?php


namespace app\lib\Repository\AnswerOptions\Model;


class GuestBookModel implements \JsonSerializable
{
    /** @var integer */
    private $id;

    /** @var string */
    private $dtime;

    /** @var string */
    private $name;

    /** @var string */
    private $body;

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDtime(): string
    {
        return $this->dtime;
    }

    /**
     * @param string $dtime
     */
    public function setDtime(string $dtime): void
    {
        $this->dtime = $dtime;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function setMap(array $data): self
    {
        $o = new self;
        $o->setId($data['id']);
        $o->setDtime($data['dtime']);
        $o->setName($data['name']);
        $o->setBody($data['body']);

        return $o;
    }
}