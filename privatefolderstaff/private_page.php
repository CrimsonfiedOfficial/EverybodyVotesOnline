<!DOCTYPE html>
<html>
<head>
    <title>Private Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F5F5F5;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #FFFFFF;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Private Page!</h1>
        <?php
        // Read the last poll time from a file
        $file = 'last_poll_time.txt'; // Replace with the path to your last poll time file
        $lastPollTime = file_get_contents($file);

        if ($lastPollTime) {
            $lastPollTime = strtotime($lastPollTime);
            $currentDate = strtotime(date("Y-m-d H:i:s"));
            $timeDiff = $currentDate - $lastPollTime;
            $hoursPassed = floor($timeDiff / (60 * 60));

            if ($hoursPassed >= 24) {
                // Display the poll
                echo "<h2>Next Poll</h2>";
                // Display your poll form here

                // Update the last poll time file with the current time
                file_put_contents($file, date("Y-m-d H:i:s"));
            } else {
                // Display message indicating that the next poll will be available in X hours
                $remainingHours = 24 - $hoursPassed;
                echo "<p>The next poll will be available in $remainingHours hours.</p>";
            }
        } else {
            echo "<p>No last poll time found.</p>";
        }
        ?>
    </div>
</body>
</html>
