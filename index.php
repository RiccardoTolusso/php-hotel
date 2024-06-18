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
                foreach ($hotels as $key => $hotel) : ?>
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