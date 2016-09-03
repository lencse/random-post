<?php

namespace Lencse\Application;


class Post
{

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $title;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @param string $author
     * @param string $title
     */
    public function __construct($author, $title)
    {
        $this->author = $author;
        $this->title = $title;
        $this->date = new \DateTime();
    }

    /**
     * @var array
     */
    private static $fixtures = [
        ['Magyari Péter', 'Gyurta és Én'],
        ['Bede Márton', 'Tükörtojás'],
        ['Vajda Gábor', 'Akarok egy sast'],
        ['Szily László', 'Állatos szex a zánkai strandon'],
        ['Herczeg Márk', 'Egy 40 éves törpe vezetés közben hugyozott, miközben 2000 km-t utazott, hogy megdughasson egy 14 éves lányt'],
        ['Orbán Ráhel', 'Hogyan öltözzünk mignonnak – divattippek saját lábon'],
    ];

    /**
     * @return Post
     */
    public static function createRandom()
    {
        $idx = array_rand(self::$fixtures);
        $fixture = self::$fixtures[$idx];

        return new Post($fixture[0], $fixture[1]);
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

}