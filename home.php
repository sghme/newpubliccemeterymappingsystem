<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ormoc City Public Cemetery</title>
  <style>
    body {
      background-color:#2a6496;
      color: #ffffff;
      font-family: 'Arial', 'Helvetica', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    h1 {
      color: #ffffff;
      letter-spacing: 2px;
      font-size: 2.5em;
      text-align: center;
      font-weight: bold;
      margin: 25px;
    }

    p {
      font-size: 1.4em;
      line-height: 1.8em;
      padding: 20px;
      margin: 30px;
      text-align: justify;
      animation: fadeIn 2s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    .image-gallery {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 10px;
      margin: 20px;
    }

    .image-gallery img {
      width: 100%;
      height: auto;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s ease-in-out;
    }

    .image-gallery img:hover {
      transform: scale(1.1);
    }
  </style>
</head>

<body>

  <h1>New Ormoc City <br> Public Cemetery</h1>
  <p>Officially known as the <b>New Ormoc City Public Cemetery and Memorial Park</b>, it has a rich history rooted in the community's need for a centralized burial ground. Established in response to the growing population and the need for organized burial spaces, the cemetery was conceived to address practical and cultural considerations. The city's existing burial sites were becoming insufficient to accommodate the increasing number of deceased residents. Recognizing this challenge, local authorities decided to establish a dedicated public cemetery to provide a dignified and regulated space for burials. The Ormoc City Public Cemetery was designed to meet the community's growing demand for burial plots and serve as a communal space for remembering and honoring the departed. Over the years, the cemetery has likely evolved to incorporate cultural and religious elements, creating a meaningful and respectful environment for families to commemorate their loved ones. It stands as a testament to the city's commitment to meeting the needs of its residents and ensuring a proper resting place for the departed.</p>

  <div class="image-gallery">
    <img src="img/cemeterypic1.jpg" alt="Cemetery Image 1">
    <img src="img/cemeterypic2.jpg" alt="Cemetery Image 2">
    <img src="img/cemeterypic1.jpg" alt="Cemetery Image 3">
    <img src="img/cemeterypic4.jpg" alt="Cemetery Image 4">
    <img src="img/cemeterypic6.jpg" alt="Cemetery Image 5">
  </div>

</body>

</html>