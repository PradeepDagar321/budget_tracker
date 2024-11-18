<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Budget Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #007BFF;
            text-align: center;
        }
        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Personal Budget Tracker</h1>
    <form action="process.php" method="POST">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required>
        
         <label for="category">Category:</label>
         <select id="category" name="category" required>
             <option value="Food">Food</option>
             <option value="Travel">Travel</option>
             <option value="Utilities">Utilities</option>
             <option value="Other">Other</option>
    </select>

        <label for="amount">Amount:</label>
        <input type="number" step="0.01" id="amount" name="amount" required>

        <button type="submit">Add Expense</button>
    </form>
    <hr>
    <h2>Expense List</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
        
            $conn = new mysqli("localhost", "root", "", "budget_tracker");


            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

    
            $sql = "SELECT date, description, amount FROM expenses ORDER BY date DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>{$row['date']}</td><td>{$row['description']}</td><td>\${$row['amount']}</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No expenses found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
