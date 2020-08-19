<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Grade;
use App\Entity\Student;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 students with 5 grades each ! Magic

        for ($i = 1; $i <= 20; $i++) {
            $student = new Student();
            $student->setFirstName('Michel'.$i);
            $student->setName('Ubi'.$i);
            $student->setBirthDate(\DateTime::createFromFormat('Y-m-d', "1986-09-".$i));
            for ($j = 1; $j <= 5; $j++) {
                $grade = new Grade();
                $grade->setValue(mt_rand(0, 20));
                $grade->setSubject('Sujet'.$j); 
                $grade->setStudent($student);
                $manager->persist($grade);
            }
            $manager->persist($student);
        }

        // $manager->persist($product);

        $manager->flush();
    }
}
