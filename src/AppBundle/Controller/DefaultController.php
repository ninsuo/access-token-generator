<?php

namespace AppBundle\Controller;

use BaseBundle\Base\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="home")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        if (!$this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('login');
        }

        return [
            'provider' => $this->getUser()->getResourceOwner(),
            'token' => $this->get('security.token_storage')->getToken()->getAccessToken(),
        ];
    }
}
