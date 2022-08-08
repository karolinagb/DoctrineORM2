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
echo count($studentList) . PHP_EOL;


