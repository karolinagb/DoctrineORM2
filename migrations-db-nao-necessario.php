<?php

//Esse arquivo tem que retornar em formato de array a informação de conexão com o bd para o componente de migrations
// return [
//     'driver' => 'pdo_sqlite',
//     'path' => __DIR__ . '/db.sqlite',
// ];

//O benefício de não conectar orm com o componente de migrations (por exemplo para usar o mesmo arquivo de conexão)
// é que podemos ter um projeto com os dois componentes apartados possibilitando usar ou não os dois.

//Esse arquivo acaba deixando de ser necessário pois lincamos a orm com o componente de migrations