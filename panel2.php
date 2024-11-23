<?php
// Read registrations data
$filename = 'registrations.txt'; // फाइल का नाम

// Check if file exists and is not empty
$data = [];
if (file_exists($filename)) {
    $data = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel 2 - Registration Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            background: #2c2c2c;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #444;
        }
        th, td {
            padding: 15px;
            text-align: left;
            font-size: 16px;
        }
        th {
            background: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background: #2a2a2a;
        }
        tr:hover {
            background: #444;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            border: 1px solid #007bff;
            padding: 10px 15px;
            border-radius: 5px;
            transition: 0.3s ease;
        }
        .back-link:hover {
            background: #007bff;
            color: white;
        }
        .no-data {
            text-align: center;
            font-size: 18px;
            color: #aaa;
        }
    </style>
</head>
<body>

<header>
    Panel 2 - Registration Details
</header>

<div class="container">
    <h2 style="text-align: center; margin-top: 0;">Registered Participants</h2>
    <?php if (!empty($data)): ?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Real Name</th>
                    <th>In-Game Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Team Name</th>
                    <th>Members</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $index => $line): ?>
                    <?php 
                        $fields = explode("|", $line); // Split data by "|" separator
                    ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($fields[0]) ?></td>
                        <td><?= htmlspecialchars($fields[1]) ?></td>
                        <td><?= htmlspecialchars($fields[2]) ?></td>
                        <td><?= htmlspecialchars($fields[3]) ?></td>
                        <td><?= htmlspecialchars($fields[4]) ?></td>
                        <td><?= htmlspecialchars($fields[5]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-data">No registrations found!</p>
    <?php endif; ?>
    <a href="index.html" class="back-link">Back to Registration</a>
</div>

</body>
</html>
