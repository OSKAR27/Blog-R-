<?php

namespace Blog\Domain\Post;


interface PostRepository
{

    /**
     * @param Post $post
     * @return true if exists, false if not
     */
    public function exists(Post $post);

    public function save(Post $post);

}