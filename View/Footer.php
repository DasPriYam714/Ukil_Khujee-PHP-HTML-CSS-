<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <title>Footer</title>
    </head>
    <body>

    <div id="about" style="text-align: center;">
    

<button type="button" class="btn btn-info" onclick="loadDoc()">About Us</button>
</div>

        <div style="text-align: center;">   
        
            <footer><i>Copyright &copy;<?php echo date('Y'); ?> Ukill Khujee!</i></footer>
            
        </div>

        <script>
function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("about").innerHTML =
    this.responseText;
  }
  xhttp.open("GET", "TnC.php");
  xhttp.send();
}
</script>

    </body>
</html>