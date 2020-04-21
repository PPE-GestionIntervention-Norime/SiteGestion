<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use App\Repository\InterventionRepository;
use Dompdf\Frame\FrameTree;
use Dompdf\Options;
use PHPUnit\Framework\TestCase;
use Dompdf\Css\Stylesheet;
use DOMDocument;
use Symfony\Component\DomCrawler\Crawler;



class PdfController extends AbstractController
{
    /**
     * @Route("/{id}/pdf", name="pdf")
     */

    public function generate_pdf($id, InterventionRepository $InterventionRepository ) 
    {
        
        $intervention = $InterventionRepository->findOneBy(['id' => $id]);     

        $html =  $this->renderView(
                    'pdf/index.html.twig', 
                    ['interventions' => $intervention]
                );
        

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream();

    }
    
}




