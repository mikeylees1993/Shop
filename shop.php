<!--Lauren Smith -->
<?php
echo"<h1>Shopping Cart</h1>";
    function GetInfoForm()
    {
        echo "<form method=\"post\" action=\"?\">";
        echo "<div> <label for=\"cust_type\">Customer Type: </label>";
        echo "<select name=\"cust_type\">";
        echo "<option value=\"regular\">Regular</option>";
        echo "<option value=\"corporate\">Corporate </option>";
        echo "<option value=\"government\">Government </option>";
        echo "</select></div>";
        echo "<div><label for'\"noCopies\">Number of Copies</label>";
        echo "<input type=\"number\" name = \"noCopies\"/> </div>";
        echo "<div><button type=\"submit\" name=\"subButton\">Submit</button></div>";
        echo "</form>";
    }
    function CalculateandShowResultsForm():void
    {
        $custType = $_POST['cust_type'];
        $numberOfCopies = (int)$_POST['noCopies'];
        $unit_price = GetCostOfPage($custType);
        $subtotal = 0.0;
        $tax =0.0;
        $total = 0.0;
        CalculateTotal($numberOfCopies,$unit_price,$subtotal,$tax,$total);
        echo "<form>";
        echo "<div> <h3>Customer Type : ".$custType."</h3></div>";
        echo "<div> <h3>Number of Copies: ".$numberOfCopies." copies</h3></div>";
        echo "<div> <h3>Subtotal : $".number_format($subtotal,2)."</h3></div>";
        echo "<div> <h3>Tax : $".number_format($tax,2)."</h3></div>";
        echo "<div> <h3>Total :$".number_format($total,2)."</h3></div>";
        echo "</form>";
    }
    function GetCostOfPage(string $custType=""):float
    {
        $cost =0.00;
        switch($custType)
        {
            case "regular":
                $cost = 0.20;
                break;
            case "corporate":
                $cost = 0.15;
                break;
            case "government":
                $cost = 0.10;
                break;
        }
        return $cost;
    }
    function CalculateTotal(int &$numCopies,float &$unit_price,float &$subtotal,float &$tax,float &$total):void
    {
        $subtotal = $numCopies * $unit_price;
        $tax = $subtotal *0.13;
        $total = $subtotal + $tax;
    }
    if(isset($_POST['subButton']))
    {
        CalculateandShowResultsForm();
    }else{
        GetInfoForm();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Handout</title>
</head>
<body>
    
</body>
</html>