<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pokémon</title>
    <style>
        /* Puedes mantener el mismo estilo de antes */
         /* Estilo básico para la web */
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
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            background-color: #f9f9f9;
            margin: 10px 0;
            padding: 10px;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        ul li a {
            color: #333;
            text-decoration: none;
            font-size: 18px;
        }

        ul li:hover {
            background-color: #b2ebf2;
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
        <h2>Lista de Pokémon</h2>
        <?php
       
         /**
         * Bloque de código para obtener y mostrar la lista de Pokémon.
         * 
         * Este bloque realiza una solicitud a la API de Pokémon para obtener
         * la lista de Pokémon disponibles. Luego, muestra los nombres de los Pokémon
         * como enlaces a una página de detalles.
         * 
         * @return void No devuelve ningún valor, pero genera HTML para mostrar la lista.
         */
        // URL de la API para obtener la lista de Pokémon
        $url = "https://pokeapi.co/api/v2/pokemon";

        // Realizamos la solicitud a la API
        $json_data = file_get_contents($url);

        // Verificamos si la solicitud fue exitosa
        if ($json_data === FALSE) {
            echo "<p>Error al obtener los datos de la API.</p>";
        } else {
            // Decodificamos el JSON obtenido a un arreglo PHP
            $data = json_decode($json_data, true);
            //mostramos los datos en json
            echo json_encode($data);

            // Verificamos si los datos se han recibido correctamente
            if ($data) {
                echo "<ul>";
                
                // Iteramos sobre los primeros 20 Pokémon
                foreach ($data['results'] as $pokemon) {
                    // Mostramos el nombre y creamos un enlace a la página de detalles
                    echo "<li>";
                    echo "<a href='pokemon_detail.php?name=" . $pokemon['name'] . "'>" . ucfirst($pokemon['name']) . "</a>";
                    echo "</li>";
                }

                echo "</ul>";
            } else {
                echo "<p>No se pudieron obtener los datos.</p>";
            }
        }
        ?>
    </div>

    <footer>
        <p>Aplicación Pokémon. Tarea 9 DWES.</p>
    </footer>

</body>
</html>
