<?php

class Eintrag implements JsonSerializable
{
    private int $id;
    private string $createDate;
    private string $editDate;
    private string $content;

    /**
     * @param int $id
     * @param string $createDate
     * @param string $editDate
     * @param string $content
     */
    public function __construct(int $id, string $createDate, string $editDate, string $content)
    {
        $this->id = $id;
        $this->createDate = $createDate;
        $this->editDate = $editDate;
        $this->content = $content;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "createDate" => $this->createDate,
            "editDate" => $this->editDate,
            "content" => $this->content
        ];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCreateDate(): string
    {
        return $this->createDate;
    }

    /**
     * @return string
     */
    public function getEditDate(): string
    {
        return $this->editDate;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $editDate
     */
    public function setEditDate(string $editDate): void
    {
        $this->editDate = $editDate;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}