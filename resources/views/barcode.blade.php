<head>
    <title> Barcode Generator </title>
    <link rel="stylesheet" type="text/css" href="{{  asset('css/app.css') }}"/>
</head>
<body>
<div class="container">
     <?= $barcode; ?> <br>
     Encoded text: <?=  $text ?> <br>

    <a href="{{ url()->previous() }}"> <button> Go back </button></a>
</div>
</body>

