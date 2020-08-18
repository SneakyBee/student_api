<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Grade;

class GetGlobalAverageController
{
    /**
     * @Route( 
     *      name="get_global_average",
     *      path="/grades/global_average",
     *      methods={"GET"}
     * )
     */
    public function getGlobalAverage(EntityManagerInterface $em)
    {
        // faut récupérer toute les notes et faire une moyenne 
        $globalAverage = $em->getRepository(Grade::class)->getGlobalAverage();

        return new JsonResponse($globalAverage);
        
    }

    /**
     * @Route( 
     *      name="get_student_average",
     *      path="/get_student_average/{id}",
     *      methods={"GET"}
     * )
     */
    public function getStudentAverage($id, EntityManagerInterface $em)
    {
        $studentAverage = $em->getRepository(Grade::class)->getStudentAverage($id);

        return new JsonResponse($studentAverage);
        
    }
}
