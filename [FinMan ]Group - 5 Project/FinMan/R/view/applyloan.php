<?php
require_once('../../N/view/header.php');
?>
<html>
<head>
    <title>Apply Loan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e8e7e3 0%, #7f7a86 100%);
            margin: 0;
            padding: 0;
        }
        fieldset {
            width: 40%;
            margin: 50px auto;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0,0,0,0.2);
            background-color: #a191b1;
            padding: 30px;
        }
        h1, h3 {
            color: #333;
        }
        table {
            width: 100%;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 80%;
            padding: 12px;
            margin-top: 10px;
            border: 1px solid #4f2a2a;
            border-radius: 8px;
            background-color: #babbd0;
        }
        input[type="submit"], button {
            background: linear-gradient(135deg, #2d193a 0%, #030633 100%);
            color: rgb(228, 212, 212);
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover, button:hover {
            background: linear-gradient(135deg, #111d23 0%, #092a15 100%);
        }
        input[type="checkbox"] {
            margin-top: 10px;
        }
        a {
            color: #060606;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        function updateInterestRate() {
            const duration = document.getElementById("loan_duration").value;
            const interestRateField = document.getElementById("interest_rate");

            let interestRate = 0;
            if (duration === "6") {
                interestRate = 2.0;
            } else if (duration === "12") {
                interestRate = 3.5;
            } else if (duration === "24") {
                interestRate = 4.0;
            } else if (duration === "36") {
                interestRate = 5.0;
            }

            interestRateField.value = interestRate;
        }

        function validateLoanForm() {
            const employmentStatus = document.querySelector('select[name="employment_status"]').value;
            const monthlyIncome = document.querySelector('input[name="monthly_income"]').value;
            const loanAmount = document.querySelector('input[name="loan_amount"]').value;
            const loanDuration = document.querySelector('select[name="loan_duration"]').value;
            const agreeTerms = document.querySelector('input[name="agree_terms"]').checked;

            if (employmentStatus === "") {
                alert("Please select your employment status.");
                return false;
            }
            if (monthlyIncome === "" || parseFloat(monthlyIncome) <= 0) {
                alert("Please enter a valid monthly income.");
                return false;
            }
            if (loanAmount === "" || parseFloat(loanAmount) < 1000) {
                alert("Loan amount must be at least $1000.");
                return false;
            }
            if (loanDuration === "") {
                alert("Please select a loan duration.");
                return false;
            }
            if (!agreeTerms) {
                alert("You must agree to the terms and conditions.");
                return false;
            }

            return true;
        }

        function submitLoanForm(event) {
            event.preventDefault(); 

            if (!validateLoanForm()) {
                return false;
            }

            let employmentStatus = document.querySelector('select[name="employment_status"]').value;
            let monthlyIncome = document.querySelector('input[name="monthly_income"]').value;
            let loanAmount = document.querySelector('input[name="loan_amount"]').value;
            let loanDuration = document.querySelector('select[name="loan_duration"]').value;
            let interestRate = document.querySelector('input[name="interest_rate"]').value;

            let loanData = {
                employment_status: employmentStatus,
                monthly_income: monthlyIncome,
                loan_amount: loanAmount,
                loan_duration: loanDuration,
                interest_rate: interestRate
            };

            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../controller/applyloan.php', true);
            xhttp.setRequestHeader('Content-Type', 'application/json');

            xhttp.onreadystatechange = function () {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        alert("Loan application submitted successfully: " + this.responseText);
                        window.location.href = "../../N/view/dashboard.php";
                    } else {
                        alert("Failed to submit loan application: " + this.responseText);
                    }
                }
            };

            xhttp.send(JSON.stringify(loanData));
        }
    </script>
</head>
<body>
    <fieldset>
        <form id="loanForm" onsubmit="submitLoanForm(event)">
            <table align="center" width="100%">
                <tr>
                    <td align="center">
                        <h1><b>Apply Loan</b></h1>
                    </td>
                </tr>
                <tr>
                    <td align="center">Employment Status:<br>
                        <select name="employment_status" required>
                            <option value="">Select</option>
                            <option value="Employed">Employed</option>
                            <option value="Unemployed">Unemployed</option>
                            <option value="Self-Employed">Self-Employed</option>
                            <option value="Student">Student</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="center">Monthly Income:<br>
                        <input type="number" name="monthly_income" min="0" required/>
                    </td>
                </tr>
                <tr>
                    <td align="center">Requesting Loan Amount:<br>
                        <input type="number" name="loan_amount" min="1000" required/>
                    </td>
                </tr>
                <tr>
                    <td align="center">Loan Duration (in months):<br>
                        <select name="loan_duration" id="loan_duration" onchange="updateInterestRate()" required>
                            <option value="">Select</option>
                            <option value="6">6 months</option>
                            <option value="12">12 months</option>
                            <option value="24">24 months</option>
                            <option value="36">36 months</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="center">Interest Rate (%):<br>
                        <input type="number" id="interest_rate" name="interest_rate" readonly required/>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="checkbox" name="agree_terms" required/> I agree to the terms and conditions
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <button type="submit">Apply Loan</button>
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>
