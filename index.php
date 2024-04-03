<?php
const API_URL = "https://www.themealdb.com/api/json/v1/1/lookup.php?i=52765";

// Initialize cURL session
$ch = curl_init(API_URL);

// Indicate I want the response without showing it to display
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$result = curl_exec($ch);

// Conversion of the JSON response to an associative array
$data = json_decode($result, true);

// Close the cURL session
curl_close($ch);

$recipeData = $data["meals"][0];
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fetching API de TheMealDB.com with PHP 🐘</title>
</head>

<body>
  <section class="container">
    <article class="recipe-card">
      <figure class="recipe-card__head">
        <img class="recipe-card__image" src="<?= $recipeData["strMealThumb"] ?>" alt="<?= $recipeData["strMeal"] ?>">
        <figcaption class="recipe-card__title"><?= $recipeData["strMeal"] ?></figcaption>
        <a href="<?= $recipeData["strYoutube"] ?>" class="link">
          <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 180">
            <path fill="red" d="M250.346 28.075A32.18 32.18 0 0 0 227.69 5.418C207.824 0 127.87 0 127.87 0S47.912.164 28.046 5.582A32.18 32.18 0 0 0 5.39 28.24c-6.009 35.298-8.34 89.084.165 122.97a32.18 32.18 0 0 0 22.656 22.657c19.866 5.418 99.822 5.418 99.822 5.418s79.955 0 99.82-5.418a32.18 32.18 0 0 0 22.657-22.657c6.338-35.348 8.291-89.1-.164-123.134Z" />
            <path fill="#FFF" d="m102.421 128.06l66.328-38.418l-66.328-38.418z" />
          </svg>
          </span>
          YouTube
        </a>
      </figure>
      <div class="recipe-card__instructions">
        <p><?= $recipeData["strInstructions"] ?></p>
      </div>
    </article>
  </section>
</body>

</html>

<style>
  * {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
  }

  :root {
    color-scheme: dark light;
  }

  body {
    font-family: system-ui;
    display: grid;
    place-items: center;
    height: 100dvh;
  }

  img {
    max-width: 100%;
  }

  .recipe-card {
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 2rem;
    width: 560px;
    height: auto;
  }

  .recipe-card__head {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
    text-align: center;
  }

  .recipe-card__image {
    border-radius: 8px;
    object-fit: cover;
    width: 200px;
    height: 200px;
  }

  .recipe-card__title {
    font-size: 1.5rem;
    font-weight: bold;
  }

  .recipe-card__instructions {
    font-size: 1rem;
    line-height: 1.5;
    text-align: center;
    text-wrap: balance;
  }

  .link {
    display: inline-flex;
    text-decoration: none;
    color: inherit;
    gap: 0.5rem;
    font-weight: 700;
    align-items: center;
  }

  .icon {
    width: 24px;
    height: 24px;
  }
</style>