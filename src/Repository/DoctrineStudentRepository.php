<?php

namespace Alura\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;

class DoctrineStudentRepository extends EntityRepository //transformando num repo do doctrine
{
    /**
     * @return Student[]
     */
    public function studentsAndCourses(): array
    {
        //DQL = Doctrine Query Language - para criar querys sem usar SQL, é bem parecido com SQL, mas ao invés de tabelas usamos entidades
        // $dql = "SELECT student, phone, course 
        // FROM Alura\\Doctrine\\Entity\\Student student
        // LEFT JOIN Alura\\Doctrine\\Entity\\Phone phone
        // LEFT JOIN Alura\\Doctrine\\Entity\\Course course"; //buscando todos os alunos do bd

        // return $this
        //     ->getEntityManager()
        //     ->createQuery($dql)
        //     ->getResult();

        //query builder = construtor de querys (facilita a escrita de dql) - interface para criar dql
            //tem que passar como parametro o alias que é student (é o FROM da query)
        return $this->createQueryBuilder('student')
        ->addSelect('phone')
        ->addSelect('course')
        ->leftJoin('student.phones', 'phone')
        ->leftJoin('student.courses', 'course')
        ->getQuery() //criar a query
        ->getResult(); //executar a query e pegar o resultado
    }
}
