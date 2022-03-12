<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorPNG;
use App\Models\Barcode;

class FormController
{
    public function displayForm()
    {;
        return view('home', ['barcode'=> $this->show(1)]);
    }

    public function save($text, $barcode_image)
    {
        $barcode = new Barcode();
        $barcode->text = $text;
        $barcode->barcode = $barcode_image;
        $barcode->save();
    }

    public function show($id)
    {
        $barcode= new Barcode();
        $barcode_record = $barcode->find($id);
        return $barcode_record->barcode;
    }

    public function handleForm(Request $request)
    {
        $text = htmlspecialchars($request->post('text'));
        $generator = new BarcodeGeneratorPNG();
        $barcode_image =  '<img src="data:image/webp;base64,' . base64_encode($generator->getBarcode($text, $generator::TYPE_CODE_128)) . '">';

        $this->save($text, $barcode_image);


        //return view('barcode', ['barcode'=>$barcode_image, 'text'=>$text]);

    }
}
