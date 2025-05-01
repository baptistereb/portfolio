<?php
// Fonction Haversine
function haversine($lat1, $lon1, $lat2, $lon2) {
    $R = 6371000;  // Rayon de la Terre en mètres
    $phi1 = deg2rad($lat1);
    $phi2 = deg2rad($lat2);
    $delta_phi = deg2rad($lat2 - $lat1);
    $delta_lambda = deg2rad($lon2 - $lon1);

    $a = sin($delta_phi / 2) ** 2 + cos($phi1) * cos($phi2) * sin($delta_lambda / 2) ** 2;
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    return $R * $c;
}

// Tableau des coordonnées correctes et des flags
$correctValues = [
    [43.6956874550532, 7.269899815255486],
    [41.23515575795018, 9.16847759472148],
    [43.07936205983258, 5.902303129369102],
    [43.29510861507541, 5.390136525002163],
    [41.69902392541046, 8.840379595494596],
    [39.887020777062645, 8.436540037328086]
];

$flags = [
    "THC{Gl4dos_1s_Un1mpr3ss3d}",
    "THC{Hum4n5_4r3_5l0w}",
    "THC{U_L0s3_Gl4d05_W1nz}",
    "THC{Y0u_Shur3_W3_4re_St1ll_l00king_4_Gunn3r?}",
    "THC{M3h_1_Gu355_u_f1nd_stuff_3v3ntu411y}",
    "THC{1_4m_4lm0st_1mpr3ss3d..._jk_Hum4ns_4r3_P4th3t1c}"
];

$marge_erreur = 20; // Marge d'erreur en mètres

// Récupérer l'ID du challenge, la latitude et la longitude depuis les paramètres GET
$challId = isset($_GET['challId']) ? (int)$_GET['challId'] : null;
$lat = isset($_GET['lat']) ? (float)$_GET['lat'] : null;
$lon = isset($_GET['lon']) ? (float)$_GET['lon'] : null;

// Vérifier la validité de l'ID
if ($challId === null || $challId < 1 || $challId > 6) {
    header("Content-Type: application/json");
    echo json_encode(["error" => "Wrong request"]);
    exit();
}

// Vérifier que les paramètres lat et lon sont présents
if ($lat === null || $lon === null) {
    header("Content-Type: application/json");
    echo json_encode(["error" => "Missing parameters"]);
    exit();
}

// Obtenir les coordonnées correctes pour le challenge spécifié
$lat_expected = $correctValues[$challId - 1][0];
$lon_expected = $correctValues[$challId - 1][1];

// Calculer la distance avec la fonction Haversine
if (haversine($lat, $lon, $lat_expected, $lon_expected) < $marge_erreur) {
    echo $flags[$challId - 1];
} else {
    echo "Essaye encore !";
}
?>
