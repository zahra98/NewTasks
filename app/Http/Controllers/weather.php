<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class weather extends Controller
{
    //

    public function getforcast()
{
    $long = request('long');
    $lat = request('lat');
     function buildBaseString($baseURI, $method, $params) {
       $r = array();
       ksort($params);
        foreach($params as $key => $value) {
          $r[] = "$key=" . rawurlencode($value);
        }
          return $method . "&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
      }
       function buildAuthorizationHeader($oauth) {
          $r = 'Authorization: OAuth ';
          $values = array();
           foreach($oauth as $key=>$value) {
             $values[] = "$key=\"" . rawurlencode($value) . "\"";
            }
              $r .= implode(', ', $values);
                  return $r;
       }
          $url = 'https://weather-ydn-yql.media.yahoo.com/forecastrss';
          $app_id = 'L9DUUPFf';
          $consumer_key = 'dj0yJmk9TjI5UU9VcWZONjdtJmQ9WVdrOVREbEVWVlZRUm1ZbWNHbzlNQT09JnM9Y29uc3VtZXJzZWNyZXQmc3Y9MCZ4PWY4';
          $consumer_secret = '325b8fca6c79f5792bf6cc80d1848c22145823f5';
          $query = array(
          'lat' => $lat,
          'lon' => $long,
          'format' => 'json',
                      );
          $oauth = array(
          'oauth_consumer_key' => $consumer_key,
          'oauth_nonce' => uniqid(mt_rand(1, 1000)),
          'oauth_signature_method' => 'HMAC-SHA1',
          'oauth_timestamp' => time(),
          'oauth_version' => '1.0'
                );
                             
          $base_info = buildBaseString($url, 'GET', array_merge($query, $oauth));
          $composite_key = rawurlencode($consumer_secret) . '&';
          $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
          $oauth['oauth_signature'] = $oauth_signature;
          $header = array( buildAuthorizationHeader($oauth),'X-Yahoo-App-Id: ' . $app_id);
          $options = array(CURLOPT_HTTPHEADER => $header, CURLOPT_HEADER => false,CURLOPT_URL => $url . '?' . http_build_query($query),
          CURLOPT_RETURNTRANSFER => true,CURLOPT_SSL_VERIFYPEER => false );
          $ch = curl_init();
          curl_setopt_array($ch, $options);
          $response = curl_exec($ch);
          curl_close($ch);
          
          echo $response;
}
}
