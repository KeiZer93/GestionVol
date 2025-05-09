<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Vol</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1>Détails du Vol</h1>

<?php
// Exemple de données (remplacez-les par des données réelles)
$volData = [
    'id_vol' => 101,
    'destinations' => 'Paris -> New York',
    'heure_depart' => '2025-05-01 14:30',
    'heure_arrivee' => '2025-05-01 17:45',
    'ville_arrivee' => 'New York',
    'ref_pilotes' => 'PILOT123',
    'ref_avions' => 'AVION456',
    'ref_reservation' => 'RES789'
];

// Création de l'objet Vol avec les données
$vol = new Vol($volData);
?>

<table>
    <tr>
        <th>ID Vol</th>
        <td><?php echo $vol->getIdVol(); ?></td>
    </tr>
    <tr>
        <th>Destinations</th>
        <td><?php echo $vol->getDestinations(); ?></td>
    </tr>
    <tr>
        <th>Heure de départ</th>
        <td><?php echo $vol->getHeureDepart(); ?></td>
    </tr>
    <tr>
        <th>Heure d'arrivée</th>
        <td><?php echo $vol->getHeureArrivee(); ?></td>
    </tr>
    <tr>
        <th>Ville d'arrivée</th>
        <td><?php echo $vol->getVilleArrivee(); ?></td>
    </tr>
    <tr>
        <th>Référence Pilote</th>
        <td><?php echo $vol->getRefPilotes(); ?></td>
    </tr>
    <tr>
        <th>Référence Avion</th>
        <td><?php echo $vol->getRefAvions(); ?></td>
    </tr>
    <tr>
        <th>Référence Réservation</th>
        <td><?php echo $vol->getRefReservation(); ?></td>
    </tr>
</table>
</body>
</html>