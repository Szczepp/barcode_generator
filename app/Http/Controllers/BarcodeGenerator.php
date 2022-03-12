<?php

namespace App\Http\Controllers;
use Picqer\Barcode\BarcodeGeneratorHTML;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Picqer\Barcode\BarcodeGeneratorJPG;
use Symfony\Component\HttpFoundation\Response;

class BarcodeGenerator
{
    public function makeBarcode()
    {

        $generatorPNG = new BarcodeGeneratorPNG();

        $barcode_webp =  '<img src="data:image/webp;base64,' . base64_encode($generatorPNG->getBarcode('081sd23897', $generatorPNG::TYPE_CODE_128)) . '">';
        return view('barcode', ['barcode'=> $barcode_webp]);


    }
}
