<?php

namespace Blog\Domain\Post;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

final class Post
{

    private $title;

    private $body;

    public function __construct(string $title,string  $body)
    {
        if (strlen($title)>50) {
            throw new InvalidArgumentException("$title exceeds the maximum");
        }

        if (strlen($body)>2000) {
            throw new InvalidArgumentException("$body exceeds the maximum");
        }
        $this->title = $title;
        $this->body = $body;
    }

}