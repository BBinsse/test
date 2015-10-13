<?php

namespace Mw\Bundle\GeoipBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $clientIP = $request->getClientIp();
        $clientIP = "74.125.45.100";

        // On récupère le service
        $locate = $this->container->get('mw_geoip.locate');

        var_dump($locate->locateIP($clientIP));

        return $this->render('MwGeoipBundle:Default:index.html.twig');
    }
}
