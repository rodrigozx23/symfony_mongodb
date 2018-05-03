<?php
/**
 * Creacion de DataController.
 * User: Rodrigo Bejar
 * Date: 02/05/2018
 * Time: 20:40
 */

namespace App\Controller;

use App\Document\dataForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use MongoDB;

class DataController extends Controller
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response ('Welcome to the index');
    }

    /**
     * @Route("/formulario")
     */
    public function formulario()
    {
        $data = new dataForm();
        $data->setNombre("Rodrio Bejar");
        $data->setCorreo("rodrigo@gmail.com");
        $data->setTel("982325896");
        $data->setMsg("xxxxxxxxxxxxxxxxxxxxxxxx");

        $dm = $this->get('doctrine_mongodb')->getManager();

        $dm->persist($data);
        $dm->flush();

        return $this-> render('views/formulario.html.twig',[
            'title' => 'INGRESE DATOS:'.$data->getId(),
        ]);

    }
}