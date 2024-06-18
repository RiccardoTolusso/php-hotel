<?php


$hotels_parameters = [
    'name' => 'nome',
    'description' => 'descrizione',
    'parking' => 'parcheggio',
    'vote' => 'punteggio',
    'distance_to_center' => 'dal centro'
];

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

$filtered_hotels = $hotels;
if ($_GET['parking'] || $_GET['stars']) {
    $filtered_hotels = [];
    foreach ($hotels as $key => $hotel) {
        // controlla se c'è il filtro parcheggio e nel caso controlla se l'hotel ha il parcheggio
        if (!$_GET['parking'] || $hotel['parking']) {
            // controlla se c'è il filtro stelle e nel caso controlla se l'hotel ha abbastanza stelle
            if (!$_GET['stars'] || $hotel['vote'] >= $_GET['stars']) {

                $filtered_hotels[] = $hotel;
            }
        }
    }
}


$stars = $_REQUEST['stars'] ?? 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- bootstrap -->

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/c3f6cda4b5.js" crossorigin="anonymous"></script>
    <!-- font awesome -->
</head>

<body class="py-5 bg-primary-subtle">
    <div class="container text-center">
        <!-- title -->
        <h1 class="display-1 text-uppercase fw-semibold mb-5">Booklando</h1>

        <!-- form -->
        <div class="mb-1">
            <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="GET">
                <div class="d-flex justify-content-center align-items-center">

                    <!-- PARKING SWITCH -->
                    <div class="px-3 flex-grow-0 rounded-2 mx-3">
                        <div class="form-check form-switch text-start d-flex align-items-center">
                            <input class="form-check-input" role="switch" type="checkbox" name="parking" id="parking" <?php echo  $_REQUEST['parking'] ? "checked" : "test" ?>>
                            <label for="parking" class="form-check-label fs-2 ps-2 text-primary"><i class="fa-solid fa-square-parking"></i></label>
                        </div>
                    </div>

                    <div class="me-4">
                        <select class="form-select bg-primary text-white form-select-sm" name="stars" value="<?php echo $_REQUEST['stars'] ?>">
                            <?php #FOR NUMBERS IN RANGE 5
                            for ($i = 1; $i <= 5; $i++) : ?>
                                <option value="<?php echo $i ?>" <?php echo $i == $stars ? 'selected' : '' ?>>
                                    <?php // CREATE STARS
                                    for ($n = 0; $n < $i; $n++) {
                                        echo "&star;";
                                    } ?>
                                </option>
                            <?php endfor ?>
                        </select>
                    </div>

                    <button class="btn btn-primary">Cerca</button>

                </div>
            </form>
        </div>

        <!-- table with hotels -->
        <table class="table table-light table-striped-columns table-hover">

            <!-- table head -->
            <thead class="table-dark">
                <tr class="text-uppercase">
                    <?php
                    foreach ($hotels_parameters as $key => $parameter) : ?>
                        <th scope="col"><?php echo $parameter ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>

            <!-- table body -->
            <tbody>
                <?php # FOR EACH HOTEL
                foreach ($filtered_hotels as $key => $hotel) : ?>
                    <tr>
                        <td class="fw-semibold"><?php echo $hotel['name'] ?></td>
                        <td class="fst-italic text-truncate"><?php echo $hotel['description'] ?></td>
                        <td>
                            <?php
                            if ($hotel['parking']) : ?>
                                <i class="fa-regular fa-circle-check text-primary"></i>
                            <?php else : ?>
                                <i class="fa-regular fa-circle-xmark text-warning"></i>
                            <?php endif ?>

                        </td>
                        <td>
                            <?php
                            for ($i = 1; $i <= $hotel['vote']; $i++) : ?>
                                <i class="fa-solid fa-star text-primary"></i>
                            <?php endfor ?>
                        </td>
                        <td><?php echo $hotel['distance_to_center'] . " Km" ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>


    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- bootstrap -->
</body>

</html>