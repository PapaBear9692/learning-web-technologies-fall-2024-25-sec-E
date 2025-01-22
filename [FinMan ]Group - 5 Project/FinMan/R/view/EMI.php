<?php
require_once('../../N/view/header.php');
?>
<html>
<head>
    <title>Loan EMI Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #91758f 0%, #a1a1d6 100%);
            margin: 0;
            padding: 0;
        }
        fieldset {
            width: 40%;
            margin: 50px auto;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0,0,0,0.2);
            background-color: #8d7c7c;
            padding: 30px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
        }
        input[type="number"] {
            width: 80%;
            padding: 12px;
            margin-top: 10px;
            border: 1px solid #4a4e69;
            border-radius: 8px;
            background-color: #e0e0e0;
        }
        input[type="submit"] {
            background: linear-gradient(135deg, #4a4e69 0%, #22223b 100%);
            color: rgb(129, 126, 126);
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background: linear-gradient(135deg, #33374a 0%, #111122 100%);
        }
    </style>
</head>
<body>
    <fieldset>
        <form method="post" action="../controller/EMIcheck.php">
            <table align="center" width="100%">
                <tr>
                    <td align="center">
                        <h1><b>Loan EMI Calculator</b></h1>
                    </td>
                </tr>
                <tr>
                    <td align="center">Loan Amount:<br>
                        <input type="number" name="loan_amount" required/>
                    </td>
                </tr>
                <tr>
                    <td align="center">Interest Rate (%):<br>
                        <input type="number" step="0.01" name="interest_rate" required/>
                    </td>
                </tr>
                <tr>
                    <td align="center">Loan Tenure (Months):<br>
                        <input type="number" name="loan_tenure" required/>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <br>
                        <input type="submit" name="submit" value="Calculate"/>
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>
