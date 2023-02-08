<?php

$hotels = [

  [
    'name' => 'Hotel Belvedere',
    'description' => 'Hotel Belvedere Descrizione',
    'parking' => true,
    'vote' => 4,
    'distance' => 10.4
  ],
  [
    'name' => 'Hotel Futuro',
    'description' => 'Hotel Futuro Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance' => 2
  ],
  [
    'name' => 'Hotel Rivamare',
    'description' => 'Hotel Rivamare Descrizione',
    'parking' => false,
    'vote' => 1,
    'distance' => 1
  ],
  [
    'name' => 'Hotel Bellavista',
    'description' => 'Hotel Bellavista Descrizione',
    'parking' => false,
    'vote' => 5,
    'distance' => 5.5
  ],
  [
    'name' => 'Hotel Milano',
    'description' => 'Hotel Milano Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance' => 50
  ],

];
// Valori di partenza
$cheked = false;
$rating = $_GET['rating'] ?? null;


//Controllo se mi arriva il filtro per il parcheggio
if (isset($_GET['parking'])) {
  $checked = 'checked';

  $filtred_hotels = [];

  foreach ($hotels as $hotel) {
    if ($hotel['parking']) $filtred_hotels[] = $hotel;
  }
  $hotels = $filtred_hotels;
}





//Controllo se ho il filtro del voto
if ($rating) {
  $filtred_hotels = [];

  foreach ($hotels as $hotel) {
    if ($hotel['vote'] >= $rating) $filtred_hotels[] = $hotel;
  }
  $hotels = $filtred_hotels;
}



?>

<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body>


  <div class="container pt-3">
    <header>
      <h1>Hotels</h1>
    </header>
    <main>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Parcheggio</th>
            <th scope="col">Voto</th>
            <th scope="col">Distanza</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($hotels as $hotel) : ?>
            <tr>
              <th scope="row"><?= $hotel['name'] ?></th>
              <td><?= $hotel['description'] ?></td>
              <td>
                <i class="<?= $hotel['parking'] ? 'bi-check-circle-fill text-success' : 'bi-x-circle-fill text-danger' ?>"></i>
              </td>
              <td><?= $hotel['vote'] ?></td>
              <td><?= $hotel['distance'] ?> <span>km</span></td>

            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </main>
  </div>


</body>

</html>