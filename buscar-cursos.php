<?php

require 'vendor/autoload.php';
require 'src/Buscador.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

use Luis\BuscadorDeCursos\Buscador;

$client = new Client(['base_uri' => 'https://www.devmedia.com.br/', 'verify' => false]);

$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar("/cursos/", 'h3.curso-titulo');

foreach ($cursos as $curso) {
    echo "<p>". $curso ."</p>";
}