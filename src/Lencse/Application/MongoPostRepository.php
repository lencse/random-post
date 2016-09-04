<?php

namespace Lencse\Application;


class MongoPostRepository implements PostRepository
{

    /**
     * @var MongoDB
     */
    private $db;

    /**
     * @var Post[]
     */
    private $posts = [];

    /**
     * @param MongoDB $db
     */
    public function __construct(MongoDB $db)
    {
        $this->db = $db;
        $queryOptions = [
            'projection' => ['_id' => 0],
            'sort' => ['date' => -1],
        ];
        foreach ($this->db->query($queryOptions) as $doc) {
            $date = new \DateTime();
            $date->setTimestamp($doc->date);
            $this->posts[] = new Post($doc->author, $doc->title, $date);
        }
    }

    /**
     * @return Post[]
     */
    public function getAll()
    {
        return $this->posts;
    }

    /**
     * @param Post $post
     */
    public function save(Post $post)
    {
        $this->db->insert([
            'author' => $post->getAuthor(),
            'title' => $post->getTitle(),
            'date' => $post->getDate()->getTimestamp()
        ]);
    }

}