<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
// $studentRepository = $entityManager->getRepository(Student::class);

//DQL = Doctrine Query Language - para criar querys sem usar SQL, é bem parecido com SQL, mas ao invés de tabelas usamos entidades
$dql = "SELECT student FROM Alura\\Doctrine\\Entity\\Student student"; //buscando todos os alunos do bd
//createQuery() = retorna uma query
//getResult() = pega o resultado da query - transforma os dados em entidade
$studentList = $entityManager->createQuery($dql)->getResult(); 

/** @var Student[] $studentList */
// $studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
    echo "ID: $student->id\nNome: $student->name";

    if ($student->phones()->count() > 0) {
        echo PHP_EOL;
        echo "Telefones: ";

        echo implode(', ', $student->phones()
            ->map(fn(Phone $phone) => $phone->number)
            ->toArray());
    }

    if ($student->courses()->count() > 0) {
        echo PHP_EOL;
        echo "Cursos: ";

        echo implode(', ', $student->courses()
            ->map(fn(Course $course) => $course->nome)
            ->toArray());
    }

    echo PHP_EOL . PHP_EOL;
}

// echo $studentRepository->count([]) . PHP_EOL;
// echo count($studentList) . PHP_EOL;

//Pegando o nome completo da classe
$studentClass = Student::class;
//dql para contar os registros
$dql2 = "SELECT COUNT(student) FROM $studentClass student";
//getSingleResult = para o resultado vir mais amigável como array
//getSingleScalarResult= resultado escalar ou valor simples do php
var_dump($entityManager->createQuery($dql2)->getSingleScalarResult());

echo PHP_EOL;

// Pega a quantidade de alunos que possuem mais de 1 telefone
$dql3 = "SELECT COUNT(student) FROM $studentClass student WHERE SIZE(student.phones) > 1";
var_dump($entityManager->createQuery($dql3)->getSingleScalarResult());

echo PHP_EOL;

$dql4 = "SELECT COUNT(student) FROM $studentClass student WHERE student.phones IS EMPTY";
var_dump($entityManager->createQuery($dql4)->getSingleScalarResult());