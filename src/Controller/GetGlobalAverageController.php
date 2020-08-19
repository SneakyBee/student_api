<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Grade;
use App\Repository\GradeRepository;

class GetGlobalAverageController
{
    /**
     * @Route( 
     *      name="get_global_average",
     *      path="/grades/global_average",
     *      methods={"GET"}
     * )
     */
    public function getGlobalAverage(GradeRepository $repo)
    {
        // faut récupérer toute les notes et faire une moyenne 
        $globalAverage = $repo->getGlobalAverage();

        return new JsonResponse($globalAverage);
        
    }

    /**
     * @Route( 
     *      name="get_student_average",
     *      path="/get_student_average/{id}",
     *      methods={"GET"}
     * )
     */
    public function getStudentAverage($id, GradeRepository $repo)
    {
        $studentAverage = $repo->getStudentAverage($id);

        return new JsonResponse($studentAverage);
        
    }
}
