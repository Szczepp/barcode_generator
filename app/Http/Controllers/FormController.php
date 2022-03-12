<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorPNG;

class FormController
{
    public function displayForm()
    {
        return view('home');
    }

    public function handleForm(Request $request)
    {
        $text = htmlspecialchars($request->post('text'));
        $generator = new BarcodeGeneratorPNG();
        $barcode_image =  '<img src="data:image/webp;base64,' . base64_encode($generator->getBarcode($text, $generator::TYPE_CODE_128)) . '">';
        return view('barcode', ['barcode'=>$barcode_image, 'text'=>$text]);

    }
}
