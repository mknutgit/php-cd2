<?php
    class CD
    {
        private $Artist;
        private $Title;


        function __construct($artist, $title)
        {
            $this->artist = $artist;
            $this->title = $title;

        }

        // function findArtist($)
        // {
        //     return $this->artist  ($max_price + 100);
        // }
        //
        // function maxMileage($max_mileage)
        // {
        //     return $this->miles < $max_mileage;
        // }

        function setArtist($CD_artist)
        {
            $this->artist = $CD_artist;
        }

        function getArtist()
        {
            return $this->artist;
        }

        function setTitle($CD_title)
        {
            $this->title = $CD_title;
        }

        function getTitle()
        {
            return $this->title;
        }

        function save()
        {
            array_push($_SESSION['list_of_cds'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_cds'];
        }

        static function deleteAll()
        {
            return $_SESSION['list_of_cds'] = array();
        }

    }



    // $cars = array($porsche, $ford, $lexus, $mercedes);
    //
    // $cars_matching_search = array();
    // foreach ($cars as $car) {
    //     if ($car->worthBuying($_GET["price"]) && $car->maxMileage($_GET["mileage"])) {
    //         array_push($cars_matching_search, $car);
    //     }
    // }
?>
