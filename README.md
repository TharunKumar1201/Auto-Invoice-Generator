# Invoice Auto Generator

## Objective
Create a web application using PHP for generating recurring invoices and managing their payment status.

## Requirements
1. Define a class Invoice with the following attributes:
   - Invoice Number (auto-generated unique invoice number)
   - Client Name
   - Amount
   - Recurring Periods like daily / weekly / monthly / yearly
   - Payment Date
   - Status (initially set to "Pending" upon auto-generation)

2. Implement an automated mechanism to generate invoices for specific clients at predefined intervals and display them on the web page.

3. Develop a clear and intuitive display for the invoice status. The status should be updated as follows:
   - Pending: Upon auto-generation until further action is taken.
   - Paid: When payment is completed.
   - Late: When payment is overdue.

4. Provide a button or input field for administrators/higher officials to update the payment status.

## Project Guidelines
- Implement all functionalities within a single PHP file for simplicity and streamlined user experience.
- Ensure the user interface is intuitive and user-friendly, promoting easy navigation for both administrators and users.
- Maintain clean, modular, and well-documented code to facilitate future enhancements and maintenance.
- Prioritize security measures to protect sensitive information and prevent unauthorized access.

## Technologies Used
- PHP for server-side processing.
- HTML and CSS for the front-end.

## Installation and Setup
1. Clone the repository to your local machine.
2. Ensure you have PHP installed on your system.
3. Run the PHP built-in server.
4. Open a web browser and navigate to http://localhost:8000 to access the application.

## Usage
- To generate invoices, fill out the "Generate Invoice" form with the client's name, amount, and recurring period, then click "Generate Invoice."
- To update the payment status, fill out the "Update Payment Status" form with the invoice number and select the new status from the dropdown menu, then click "Update Status."

## Credits
This project was developed by
Tharun Kumar.