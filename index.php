<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Bid Calculator</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
    body {
        margin: 15px;
        width: 100%;
        max-width: 700px;
    }
    .result {
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    .result div {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
    form {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }
    body * {
        font-size: 28px;
        font-family: 'Segoe UI', sans-serif;
    }
    input[type="text"] {
        width: 200px;
    }
    </style>
</head>
<body>    
    <h1>Bid Calculator</h1>
    <br>
    <div class="form">
        <form action="private/bid.php" method="post">
        <div>Budget: <input type="text" name="budget" value="<?=$_GET["budget"] ?? 0.00?>"/></div>
        <div><input type="submit" value="Calculate" /></div>
        </form>
    </div>
    <br>
    <?php if (isset($_GET["error"]) && $_GET["error"] != "") : ?>
        <div class="error"><?=$_GET["error"]?></div>
    <?php else : ?>
        <div class="result">
            <div>Budget: <div>$<?=$_GET["budget"] ?? "0.00"?></div></div>
            <div>Maximum vehicle amount: <div>$<?=$_GET["vehicleAmount"] ?? "0.00"?></div></div>
            <div>Basic fee: <div>$<?=$_GET["basicFee"] ?? "0.00"?></div></div>
            <div>Special fee: <div>$<?=$_GET["specialFee"] ?? "0.00"?></div></div>
            <div>Association fee: <div>$<?=$_GET["associationFee"] ?? "0.00"?></div></div>
            <div>Storage fee: <div>$<?=$_GET["storageFee"] ?? "0.00"?></div></div>
        </div>
    <?php endif; ?>
</body>
</html>


