<?php

require_once 'SypexGeo.php';

class User
{
   public $ip;
   public $browser;
   public $country;
   public $unique;


   public function GetUserCountry()
   {
       $SxGeo = new SypexGeo('SxGeoCity.dat', SXGEO_BATCH | SXGEO_MEMORY);

       $country = $SxGeo->getCountry($_SERVER['REMOTE_ADDR']);
       if($country == "")
       {
           //default
           return 'RU';
       }
       else
       {
           return $country;
       }
   }

   public function GetUserBrowser()
   {
       return get_browser(null, true);
   }

   public function CheckUnique()
   {
       if(isset($_COOKIE["unique"]))
       {
           return "no";
       }
       else
       {
           setcookie("unique", true, time() + 3600);
           return "yes";
       }
   }

   public function GetUrl($browser, $version, $alias, $unique)
   {
       $connect = new PDO("mysql:host=localhost; dbname=redirect; charset=utf8", 'root', '');

       $sql = "SELECT 
                   url 
               FROM redirect.rule r
               JOIN country c on 
                   c.id = r.country
               JOIN browser b on 
                       b.id = r.browser
               WHERE
                   (b.name = '$browser' or b.name = 'all')
                   AND
                   (b.version = '$version' or b.version = 'all')
                   AND
                   (c.alias = '$alias' or c.alias = 'all')
                    AND
                   (r.uniqueness = '$unique' or r.uniqueness = 'all')";


       $result = $connect->query($sql);
       $result = $result->fetchAll(PDO::FETCH_ASSOC);

       return $result[0]['url'];


   }
}