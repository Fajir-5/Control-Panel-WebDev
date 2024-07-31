# Control Panel WebDev

This project provides a simple web-based control panel for managing a robot's movements using HTML, PHP, and MySQL. It allows users to send commands to the robot, which are then recorded in a MySQL database.

## Demo

Check out the [demo video](https://github.com/Fajir-5/Control-Panel-WebDev/blob/main/IMG_1846.MP4) to see the control panel in action.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Database Schema](#database-schema)
- [Contributing](#contributing)
- [License](#license)

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/Fajir-5/Control-Panel-WebDev.git
   Navigate to the project directory:

bash
نسخ الكود
cd Control-Panel-WebDev
3. Set up the database:

Create a MySQL database named robot.
Import the database.sql file into the robot database.
4. Configure the database connection in conn.php:
```bash
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robot";
```
5. Upload the files to your web server.
  ## Usage
1. Open index.html in your web browser.
2. Use the buttons to send commands to the robot (e.g., forward, left, stop, right, backward).
3. Commands will be recorded in the directions table of the robot database.
## HTMl Code 
```bash
   <!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التحكم في حركة الروبوت</title>
    <style>
        body { text-align: center; margin-top: 50px; }
        button { width: 100px; height: 50px; margin: 10px; }
    </style>
</head>
<body>
    <h1>تحكم بحركة الروبوت</h1>
    <div>
        <form action="" method="POST">
            <button type="submit" name="direction" value="forward" formaction="conn.php">forward</button><br>
            <button type="submit" name="direction" value="left" formaction="conn.php">left</button>
            <button type="submit" name="direction" value="stop" formaction="conn.php">stop</button>
            <button type="submit" name="direction" value="right" formaction="conn.php">right</button><br>
            <button type="submit" name="direction" value="backward" formaction="conn.php">backward</button>
        </form>
    </div>
</body>
</html>
```
## PHP Code
```bash
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robot"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get direction from request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $direction = $_POST['direction'];

    // Insert direction into database
    $sql = "INSERT INTO directions (directions) VALUES ('$direction')";

    if ($conn->query($sql) === TRUE) {
        echo "Command sent: $direction";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
```
## Database Schema
The project uses a MySQL database with the following table structure:

```bash
CREATE TABLE `directions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `directions` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
Sample data:
```
```bash
INSERT INTO `directions` (`directions`) VALUES
('forward'),
('right'),
('stop'),
('left'),
('backward');
```
## Contributing
1. Fork the repository.
2. Create a new branch (git checkout -b feature-branch).
3. Commit your changes (git commit -am 'Add new feature').
4. Push to the branch (git push origin feature-branch).
5. Create a new Pull Request.
