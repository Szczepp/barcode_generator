<form action="barcode" method="POST">
    @csrf
    <label for="text"> Insert your text to generate a barcode:  </label>
    <input type="text" name="text" required/>
    <input type="submit" value="Generate">
</form>
