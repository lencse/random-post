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
     * @param $author
     * @param $title
     * @param \DateTime $date
     */
    public function __construct($author, $title, \DateTime $date)
    {
        $this->author = $author;
        $this->title = $title;
        $this->date = $date;
    }

    /**
     * @var array
     */
    private static $fixtures = [
        ['Magyari Péter', 'Gyurta és Én'],
        ['Bede Márton', 'Tükörtojás'],
        ['Uj Péter', 'Kádárikum (Egy dinamikusan fejlődő tárház margójára)'],
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

        return new Post($fixture[0], $fixture[1], new \DateTime());
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