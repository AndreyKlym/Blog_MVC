<?php

namespace MyProject\Models\Articles;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;

class Article extends ActiveRecordEntity
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $text;

    /** @var int */
    protected $authorId;

    /** @var string */
    protected $createdAt;

    /** @var string */
    protected $setCreatedAt;


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }
    
    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return (int) $this->authorId;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @param string $text
     */
    public function setAuthorId(string $authorId): void
    {
        $this->authorId = $authorId;
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }

    /**
     * @param string $text
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public static function createFromArray(array $fields, User $author): Article
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $article = new Article();

        $article->setAuthor($author);
        $article->setName($fields['name']);
        $article->setText($fields['text']);

        $article->save();

        return $article;
    }

//      обновляем данными из POST-запроса
    public function updateFromArray(array $fields): Article
    {
        if(empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано новое название статьи');
//            throw new \http\Exception\InvalidArgumentException('Не передано новое название статьи');
        }
        if(empty($fields['text'])) {
            throw new InvalidArgumentException('Не передано новый текст статьи');
//            throw new \http\Exception\InvalidArgumentException('Не передано новый текст статьи');
        }

            $this->setName($fields['name']);
            $this->setText($fields['text']);

            $this->save();

            return $this;
    }

}