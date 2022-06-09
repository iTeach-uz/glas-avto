<?php
/**
 * @author Dostonbek Otajonov
 * Date: 06/05/21
 * Time: 17:06
 */


namespace restapi\Settings;


class Cors
{
    public static function settings(): array
    {
        return [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                // restrict access to
                'Origin' => self::allowedDomains(),
                'Access-Control-Request-Method' => ['GET', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                // Allow only headers 'X-Wsse'
                'Access-Control-Request-Headers' => ['*'],
                // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                'Access-Control-Allow-Credentials' => false,
                // Allow OPTIONS caching
                'Access-Control-Max-Age' => 3600,
                // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
            ],
        ];
    }

    private static function allowedDomains(): array
    {
        return [
            "*"
        ];
    }
}