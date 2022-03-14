<head>
    <title> Barcode Generator </title>
    <link rel="stylesheet" type="text/css" href="{{  asset('css/app.css') }}"/>
</head>
<body>
<div class="container">
    <form action="handleForm" method="POST">
        @csrf
        <label for="text"> Insert your text to generate a barcode:  </label>
        <input type="text" name="text" required/>
        <input type="submit" value="Generate">
    </form>
</div>
</body>



