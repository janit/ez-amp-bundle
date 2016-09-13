<?php

namespace Janit\EzAmpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/ez-amp/{objectId}")
     * @Template("EzAmpBundle:amp:default.html.twig")
     */
    public function viewObjectAction($objectId)
    {

        $this->get('twig')->addGlobal('is_ez_amp', true);

        $contentService = $this->get('ezpublish.api.service.content');
        $contentObject = $contentService->loadContent($objectId);

        $params = array(
            'content' => $contentObject
        );

        return $params;

    }

}
