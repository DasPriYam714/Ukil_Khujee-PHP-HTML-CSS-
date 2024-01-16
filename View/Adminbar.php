<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 8px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 10px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }
        .button1 {
            
            background-color: white;
            color: black;
            border: 2px solid #21a814;
            border-radius: 10px;
        }

        </style>
</head>
<body>
    <fieldset style="width: 98%;">
        <?php include('../View/Header.php'); ?>
        
        <br>
        
    </fieldset>
    <br>
    <div style="width: 30%; float: left;">
        <ul>
            <li><a href="/ProjectDH/View/Dashboard.php"><b>🪡 Dashboard</b></a><br><br></li>
            <li><a href="/ProjectDH/View/Ukill.php"><b>🪡 Profile</b></a><br><br></li>
            <li><a href="/ProjectDH/View/Client.php"><b> 🪡Client </b></a><br><br></li>
            <li><a href="/ProjectDH/View/Assistant.php"><b> 🪡Assistant </b></a><br><br></li>
            <li><a href="/ProjectDH/View/CaseList.php"><b>🪡CaseList</b></a><br><br></li>
            
        </ul>
    </div>
</body>
</html>