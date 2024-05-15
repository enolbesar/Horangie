<?php
include("connect.php");

$selectedOption = isset($_GET['option']) ? $_GET['option'] : 'Soil Moisture';

$sql = "";
$data = array();
$labels = array();

switch ($selectedOption) {
    case 'Soil Moisture':
        $sql = "SELECT DATE(timestamp) AS tanggal, AVG(soil) AS moisture
                FROM tb_logsensor
                WHERE timestamp >= CURDATE() - INTERVAL 5 DAY
                GROUP BY DATE(timestamp)
                ORDER BY DATE(timestamp) ASC";
        break;
    case 'Air Temperature':
        $sql = "SELECT DATE(timestamp) AS tanggal, AVG(temp) AS temperature
                FROM tb_logsensor
                WHERE timestamp >= CURDATE() - INTERVAL 5 DAY
                GROUP BY DATE(timestamp)
                ORDER BY DATE(timestamp) ASC";
        break;
    case 'Air Humidity':
        $sql = "SELECT DATE(timestamp) AS tanggal, AVG(hum) AS humidity
                FROM tb_logsensor
                WHERE timestamp >= CURDATE() - INTERVAL 5 DAY
                GROUP BY DATE(timestamp)
                ORDER BY DATE(timestamp) ASC";
        break;
    case 'Sunlight':
        $sql = "SELECT DATE(timestamp) AS tanggal, AVG(sun) AS sunlight
                FROM tb_logsensor
                WHERE timestamp >= CURDATE() - INTERVAL 5 DAY
                GROUP BY DATE(timestamp)
                ORDER BY DATE(timestamp) ASC";
        break;
    case 'Heat Index':
        $sql = "SELECT DATE(timestamp) AS tanggal, AVG(hindex) AS heatindex
                FROM tb_logsensor
                WHERE timestamp >= CURDATE() - INTERVAL 5 DAY
                GROUP BY DATE(timestamp)
                ORDER BY DATE(timestamp) ASC";
        break;
    case 'Rain Intensity':
        $sql = "SELECT DATE(timestamp) AS tanggal, AVG(rain) AS rain
                FROM tb_logsensor
                WHERE timestamp >= CURDATE() - INTERVAL 5 DAY
                GROUP BY DATE(timestamp)
                ORDER BY DATE(timestamp) ASC";
        break;
    default:
        http_response_code(400);
        echo json_encode(array('error' => 'Invalid option'));
        exit();
}

if (!empty($sql)) {
    $result = $koneksi->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $labels[] = date('l', strtotime($row['tanggal']));
            switch ($selectedOption) {
                case 'Soil Moisture':
                    $data[] = (float)$row['moisture'];
                    break;
                case 'Air Temperature':
                    $data[] = (float)$row['temperature'];
                    break;
                case 'Air Humidity':
                    $data[] = (float)$row['humidity'];
                    break;
                case 'Sunlight':
                    $data[] = (float)$row['sunlight'];
                    break;
                case 'Heat Index':
                    $data[] = (float)$row['heatindex'];
                    break;
                case 'Rain Intensity':
                    $data[] = (float)$row['rain'];
                    break;
                default:
                    break;
            }
        }
    }
}

header('Content-Type: application/json');
echo json_encode(array('data' => $data, 'labels' => $labels));
?>
