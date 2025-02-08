<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Aplicación Pokémon</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #80deea;
            padding: 20px;
            text-align: center;
            color: black;
        }

        header h1 {
            margin: 0;
        }

        nav {
            background-color: #333;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        nav a:hover {
            color: #b2ebf2;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        .pokemon-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .pokemon-item {
            background-color: #80deea;
            padding: 10px;
            border-radius: 10px;
            width: 150px;
            text-align: center;
        }

        .pokemon-item img {
            width: 100px;
            height: 100px;
        }

        footer {
            text-align: center;
            background-color: #333;
            color: white;
            padding: 10px 0;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Aplicación Pokémon</h1>
    </header>

    <nav>
        <a href="index.php">Inicio</a>
        <a href="about.php">Acerca de</a>
    </nav>

    <div class="container">

        <?php
        // API de Pokémon para obtener una lista de Pokémon
        $url = "https://pokeapi.co/api/v2/pokemon?limit=20"; // Limitamos a 20 Pokémon para hacer la página más ligera

        // Realizamos la solicitud a la API
        $json_data = file_get_contents($url);

        // Verificamos si la solicitud fue exitosa
        if ($json_data === FALSE) {
            echo "<p>Error al obtener los datos de los Pokémon.</p>";
        } else {
            // Decodificamos el JSON obtenido a un arreglo PHP
            $data = json_decode($json_data, true);

            // Verificamos que los datos sean correctos
            if (isset($data['results'])) {
                echo "<h2>Lista de Pokémon</h2>";

                // Mostramos los Pokémon en una lista
                echo "<div class='pokemon-list'>";

                foreach ($data['results'] as $pokemon) {
                    // Mostramos cada Pokémon con un enlace hacia su página de detalles
                    echo "<div class='pokemon-item'>";
                    echo "<h3>" . ucfirst($pokemon['name']) . "</h3>";

                    // Generamos el enlace para ver los detalles de cada Pokémon
                    $pokemon_url = "pokemon_detail.php?name=" . $pokemon['name'];
                    echo "<a href='" . $pokemon_url . "'>Ver detalles</a>";
                    echo "</div>";
                }

                echo "</div>";
            } else {
                echo "<p>No se pudieron obtener los Pokémon.</p>";
            }
        }
        ?>

    </div>

    <footer>
        <p>Aplicación Pokémon. Tarea 9 DWES.</p>
    </footer>

</body>
</html>
