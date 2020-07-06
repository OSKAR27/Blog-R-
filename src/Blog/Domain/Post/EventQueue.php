<?php

namespace Blog\Domain\Post;


interface EventQueue
{

    public function publish(Event $event);

}