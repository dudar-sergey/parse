<?php


namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\getPage\Page;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\parse\Parse;
use App\Entity\Product;

class MainController extends AbstractController
{
    /**
     * @Route("/save", name="saveFile")
     */
    public function indexController(Page $page, Parse $parse, Request $request)
    {
        $forRender['title'] = 'title';
        /*$em = $this->getDoctrine()->getManager();
        foreach($forRender['Result'] as $prod)
        {
            foreach ($prod as $pr)
            {
                $product = new Product();
                $product->setText($pr['text']);
                $product->setPrice($pr['price']);
                $product->setPart($pr['part']);
                $em->persist($product);
                $em->flush();
            }
        }*/


        return $this->render('gl.html.twig', $forRender);
    }

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $forRender['title'] = 'Home';
        return $this->render('base.html.twig', $forRender);
    }

}
