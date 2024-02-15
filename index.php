<?php
class Invoice {
    private $invoiceNumber;
    private $clientName;
    private $amount;
    private $recurringPeriod;
    private $paymentDate;
    private $status;

    public static function getAllInvoices()
    {
        return
        [
            ['invoiceNumber' => uniqid(), 'clientName' => 'Client A', 'amount' => 100, 'recurringPeriod' => 'Monthly', 'paymentDate' => '2024-02-10', 'status' => 'Pending'],
            ['invoiceNumber' => uniqid(), 'clientName' => 'Client B', 'amount' => 200, 'recurringPeriod' => 'Weekly', 'paymentDate' => '2024-01-05', 'status' => 'Paid'],
            ['invoiceNumber' => uniqid(), 'clientName' => 'Client C', 'amount' => 300, 'recurringPeriod' => 'Yearly', 'paymentDate' => '2023-12-15', 'status' => 'Late']
        ];
    }

    public function save()
    {

    }

    public static function updateStatus($invoiceNumber, $newStatus)
    {
        
    }
}

if (isset($_POST['generateInvoice']))
{
    $clientName = $_POST['clientName'];
    $amount = $_POST['amount'];
    $recurringPeriod = $_POST['recurringPeriod'];

    $invoice = new Invoice($clientName, $amount, $recurringPeriod);
    $invoice->save();
}

if (isset($_POST['updateStatus']))
{
    $invoiceNumber = $_POST['invoiceNumber'];
    $newStatus = $_POST['paymentStatus'];

    Invoice::updateStatus($invoiceNumber, $newStatus);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Auto Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border: none;
            border-radius: 8px;
        }
        button:hover {
            background-color: #45a049;
        }
        .invoice {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .invoice p {
            margin: 5px 0;
        }
        .pending {
            background-color: #ffc107;
        }
        .paid {
            background-color: #28a745;
        }
        .late {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Invoice Auto Generator</h1>

        <div id="invoiceList">
            <?php 
            $invoices = Invoice::getAllInvoices();
            foreach ($invoices as $invoice)
            {
                echo "<div class='invoice " . strtolower($invoice['status']) . "'>";
                echo "<p>Invoice Number: " . $invoice['invoiceNumber'] . "</p>";
                echo "<p>Client Name: " . $invoice['clientName'] . "</p>";
                echo "<p>Amount: $" . $invoice['amount'] . "</p>";
                echo "<p>Recurring Period: " . $invoice['recurringPeriod'] . "</p>";
                echo "<p>Payment Date: " . $invoice['paymentDate'] . "</p>";
                echo "<p>Status: " . $invoice['status'] . "</p>";
                echo "</div>";
            }
            ?>
        </div>

        <div class="form-container">
            <h2>Generate Invoice</h2>
            <form method="post" action="">
                <label for="clientName">Client Name:</label>
                <input type="text" id="clientName" name="clientName" required><br>

                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" required><br>

                <label for="recurringPeriod">Recurring Period:</label>
                <select id="recurringPeriod" name="recurringPeriod">
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                    <option value="yearly">Yearly</option>
                </select><br>

                <button type="submit" name="generateInvoice">Generate Invoice</button>
            </form>
        </div>

        <div class="form-container">
        <div class="form-container">
            <h2>Update Payment Status</h2>
            <form method="post" action="">
                <label for="invoicenumber">Invoice Number:</label>
                <input type="text" id="invoicenumber" name="invoicenumber" required><br>
                <label for="paymentstatus">Payment Status:</label>
                <select id="paymentstatus" name="paymentstatus">
                    <option value="Paid">Paid</option>
                    <option value="Pending">Pending</option>
                    <option value="Late">Late</option>
                </select><br>

                <button type="submit" name="updatepaymentstatus">Update Payment Status</button>
            </form>
        </div>   