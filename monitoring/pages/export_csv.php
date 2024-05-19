<?php
    // Include the database connection file
    include("connect.php");

    // Fetch user data from the database
    $sql = "SELECT timestamp, rain, temp, soil, hum, hindex, sun FROM tb_logsensor ORDER BY timestamp DESC LIMIT 15";
    $result = $koneksi->query($sql);

    if ($result === false) {
        die("Error executing query: " . $conn->error);
    }

    // Set the headers to indicate a CSV file
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=weather_data.csv');

    // Create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    // Output the column headings
    fputcsv($output, array('Timestamp', 'Rain Intensity', 'Air Temperature', 'Soil Moisture', 'Air Humidity', 'Heat Index', 'Sunlight'));

    // Output the rows of data
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            fputcsv($output, $row);
        }
    } else {
        fputcsv($output, array('No data available'));
    }

    // Close the connection after fetching data
    $koneksi->close();
?>
