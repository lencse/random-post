<?php

namespace Lencse\Application;


class PostRepository
{

    /**
     * @var MongoDB
     */
    private $db;

    /**
     * @var MessageWriter
     */
    private $messaging;

    /**
     * @param DB $db
     * @param MessageWriter $messaging
     */
    public function __construct(DB $db, MessageWriter $messaging)
    {
        $this->db = $db;
        $this->messaging = $messaging;
    }

    /**
     * @return Post[]
     */
    public function getAll()
    {
        $posts = [];
        $queryOptions = [
            'projection' => ['_id' => 0],
            'sort' => ['date' => -1],
        ];
        foreach ($this->db->query($queryOptions) as $doc) {
            $date = new \DateTime();
            $date->setTimestamp($doc->date);
            $posts[] = new Post($doc->author, $doc->title, $date);
        }

        return $posts;
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
        $this->messaging->msg(sprintf('%s sikeresen mentett egy cikket.', $post->getAuthor()));
    }

}