Files and Directory Structure
                                    Racecar Garage
                                    database name is racetracks
HTML Forms:
    add_customer.html: Form for adding a new customer.
    edit_customer.html: Form for editing an existing customer.
    delete_customer.html: Form for deleting a customer.


Processing PHP File:
    process.php: Handles form submissions and interacts with the database.
    Ensure you have a database named racetracks with the required tables: 'customer', 'orders', 'repairType', and 'vehicle'.

Usage:
    Ability to INSERT,UPDATE, and Delete from the 'customer' table.
    Deletes associated order number across tables on delete_customer.


Security:
    Prepared Statements:    used in queries to prevent SQL injection, prevents user input from being treated as data.
    Input Validation:   validates input before processing.
    Standard Error Handling: used error handling in a way that doesn't expose specific details within system.