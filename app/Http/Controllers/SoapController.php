<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use SoapFault;

class SoapController extends Controller
{
    public static function soapTest(Request $request)
    {
        $wsdl = dirname(dirname(__FILE__)) . '/Wsdl/' . 'test.xml';
        // 'http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL'; // Replace with the WSDL URL of the web service you want to call

        $client = new SoapClient($wsdl, [
            'trace' => 1, // Enable request/response tracing for debugging (optional)
            'exceptions' => true, // Throw exceptions on SOAP errors (optional)
        ]);

        try {
            $result = $client->__soapCall('ListOfContinentsByName', [$request->getContent()]);
            return $result;
        } catch (SoapFault $fault) {
            return $fault;
        }
    }
}
