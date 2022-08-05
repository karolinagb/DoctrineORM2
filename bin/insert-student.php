<?php

use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$student = new Student($argv[1]);
//argc = faz um count no argv retornando quantos parametros foram passados (incluído o próprio script php)
for ($i = 2; $i < $argc; $i++) {
    $student->addPhone(new Phone($argv[$i]));
}

$student->addPhone(new Phone('(21) 99999 - 9999'));
$student->addPhone(new Phone('(21) 2222 - 2222'));

$entityManager->persist($student);
$entityManager->flush();
