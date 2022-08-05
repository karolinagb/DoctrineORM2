<?php

//Esse arquivo tem que retornar em formato de array a informação de conexão com o bd para o componente de migrations
return [
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
];