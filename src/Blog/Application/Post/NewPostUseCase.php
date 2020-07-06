<?php

namespace Blog\Application\Post;

use Blog\Domain\Post\EventQueue;
use Blog\Domain\Post\Post;
use Blog\Domain\Post\PostEvent;
use Blog\Domain\Post\PostRepository;

class NewPostUseCase
{

    private $postRepository;

    private $eventQueue;

    public function __construct(PostRepository $postRepository,  EventQueue $eventQueue)
    {
        $this->postRepository = $postRepository;
        $this->eventQueue = $eventQueue;
    }

    public function execute(Post $post, $publish = true)
    {
        $exists = $this->postRepository->exists($post);
        if ($exists == true) return;
        $this->postRepository->save($post);
        if ($publish == false) return;
        $this->eventQueue->publish(new PostEvent($post));
    }

}