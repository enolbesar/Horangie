<?php
include("connect.php");

$selectedOption = isset($_GET['option']) ? $_GET['option'] : 'Soil Moisture';

$sql = "";
$data = array();
$labels = array();

switch ($selectedOption) {
    case 'Soil Moisture':
        $sql = "SELECT HOUR(timestamp) AS jam, AVG(hum) AS moisture
                FROM tb_logsensor
                WHERE DATE(timestamp) = CURDATE() AND HOUR(timestamp) >= (HOUR(CURTIME()) - 12)
                GROUP BY HOUR(timestamp)
                ORDER BY HOUR(timestamp) ASC;";
        break;
    case 'Air Temperature':
        $sql = "SELECT HOUR(timestamp) AS jam, AVG(temp) AS temperature
                FROM tb_logsensor
                WHERE DATE(timestamp) = CURDATE() AND HOUR(timestamp) >= (HOUR(CURTIME()) - 12)
                GROUP BY HOUR(timestamp)
                ORDER BY HOUR(timestamp) ASC";
        break;
    case 'Air Humidity':
        $sql = "SELECT HOUR(timestamp) AS jam, AVG(hum) AS humidity
                FROM tb_logsensor
                WHERE DATE(timestamp) = CURDATE() AND HOUR(timestamp) >= (HOUR(CURTIME()) - 12)
                GROUP BY HOUR(timestamp)
                ORDER BY HOUR(timestamp) ASC";
        break;
    case 'Sunlight':
        $sql = "SELECT HOUR(timestamp) AS jam, AVG(sun) AS sunlight
                FROM tb_logsensor
                WHERE DATE(timestamp) = CURDATE() AND HOUR(timestamp) >= (HOUR(CURTIME()) - 12)
                GROUP BY HOUR(timestamp)
                ORDER BY HOUR(timestamp) ASC";
        break;
    case 'Heat Index':
        $sql = "SELECT HOUR(timestamp) AS jam, AVG(hindex) AS heatindex
                FROM tb_logsensor
                WHERE DATE(timestamp) = CURDATE() AND HOUR(timestamp) >= (HOUR(CURTIME()) - 12)
                GROUP BY HOUR(timestamp)
                ORDER BY HOUR(timestamp) ASC";
        break;
    case 'Rain Intensity':
        $sql = "SELECT HOUR(timestamp) AS jam, AVG(rain) AS rain
                FROM tb_logsensor
                WHERE DATE(timestamp) = CURDATE() AND HOUR(timestamp) >= (HOUR(CURTIME()) - 12)
                GROUP BY HOUR(timestamp)
                ORDER BY HOUR(timestamp) ASC";
        break;
    default:
        break;
}

if (!empty($sql)) {
    $result = $koneksi->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $labels[] = date('g A', strtotime($row['jam'] . ':00:00'));
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
