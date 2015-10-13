<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 13/10/2015
 * Time: 11:35
 */

namespace Mw\Bundle\GeoipBundle\Services;

class Geoip {

    public function locateIP($ip) {

        // Création d'une nouvelle ressource cURL
        $ch = curl_init();

        // Configuration de l'URL et d'autres options
        curl_setopt($ch, CURLOPT_URL, "http://api.ipinfodb.com/v3/ip-city/?format=json&key=0b019cf7b5529a6ceb1970bbc0d75e1502d5d49d70a8e362b92b1e97cd6edef1&ip=" . $ip);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Récupération de l'URL et affichage sur le navigateur
        $output = curl_exec($ch);

        // Fermeture de la session cURL
        curl_close($ch);

        return json_decode($output);
    }
}
