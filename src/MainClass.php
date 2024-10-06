<?php

namespace App;

require_once(__DIR__.'/../vendor/autoload.php');

use stdClass;

class MainClass extends stdClass
{
    protected string $file = __DIR__ . "/../tmp/anime-list.txt";

    protected string $delimiter = "- ";

    protected array $animeList = [
        "Akira (1988) (dubbed)",
        "Berserk (1997) (dubbed)",
        "Bersek Movies (2012 - 2013) (dubbed)",
        "Pokémon: The First Movie Mewtwo Strikes Back (2000)",
        "Monster (2004) (dubbed)",
        "Naruto (2002) (dubbed)",
        "Death Note (2006) (dubbed)",
        "Death Note Light Up The New World (2016) (only subtitles, no dubbed exists)",
        "Death Note: The Last Name (2006) (dubbed)",
        "Claymore (2007) (dubbed)",
        "Highschool of the dead (2010) (dubbed)",
        "Phantom: Requiem for the Phantom (2009) (dubbed)",
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
