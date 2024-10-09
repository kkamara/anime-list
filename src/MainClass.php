<?php

namespace App;

require_once(__DIR__.'/../vendor/autoload.php');

use stdClass;

class MainClass extends stdClass
{
    protected string $file = __DIR__ . "/../tmp/anime-list.txt";

    protected string $delimiter = "- ";

    protected array $animeList = [
        "Akira (movie) (1988) (dubbed)",
        "Berserk (series) (1997) (dubbed)",
        "Berserk: The Golden Age Arc trilogy (movies) (2012 - 13) (dubbed)",
        "Pokémon: The First Movie Mewtwo Strikes Back (movie) (2000) (dubbed)",
        "Monster (series) (2004) (dubbed)",
        "Naruto (series) (2002) (dubbed)",
        "Death Note (series) (2006) (dubbed)",
        "Death Note Light Up the New World (movie) (2016) (only subtitles, no dubbed exists)",
        "Death Note: The Last Name (movie) (2006) (dubbed)",
        "Claymore (series) (2007) (dubbed)",
        "Highschool of the Dead (series) (2010) (dubbed)",
        "Phantom: Requiem for the Phantom (series) (2009) (dubbed)",
    ];

    public function run(): void {
        sort($this->animeList);
        file_put_contents($this->file, "");
        $fileResource = fopen($this->file, "w+");
        for($i = 0; $i < sizeof($this->animeList); $i++) {
            $listItem = $this->animeList[$i];
            echo $listItem . PHP_EOL;
            if ($i !== sizeof($this->animeList) - 1) {
                fwrite($fileResource, $this->delimiter . $listItem . PHP_EOL);
            } else {
                fwrite($fileResource, $this->delimiter . $listItem . "." . PHP_EOL);
            }
        }
        fclose($fileResource);
    }
}

(new MainClass())->run();
