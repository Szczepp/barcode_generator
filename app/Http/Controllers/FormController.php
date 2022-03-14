<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorPNG;
use App\Models\Barcode;

class FormController
{
    public function displayForm()
    {
        return view('home');
    }

    public function save($text, $barcode_image)
    {
        $barcode_record = new Barcode();
        $barcode_record->text = $text;
        $barcode_record->barcode = $barcode_image;
        $barcode_record->save();

        return $barcode_record->id;
    }

    public function show($id)
    {
        $barcode = new Barcode();

        return $barcode->find($id);
    }

    public function showCreated($id)
    {
        $barcode_record = $this->show($id);
        $barcode_image = $barcode_record->barcode;
        $barcode_text = $barcode_record->text;

        return view('barcode', ['barcode'=>$barcode_image, 'text'=>$barcode_text]);
    }

    public function handleForm(Request $request)
    {
        $text = htmlspecialchars($request->post('text'));
        $generator = new BarcodeGeneratorPNG();
        $barcode_image =  '<img src="data:image/webp;base64,' . base64_encode($generator->getBarcode($text, $generator::TYPE_CODE_128)) . '">';
        $id = $this->save($text, $barcode_image);

        return redirect()->route('barcode',['id' => $id]);
    }
}
