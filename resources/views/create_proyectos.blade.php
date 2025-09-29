<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Proyectos</title>
  @vite(['resources/css/create_proyectos.css', 'resources/js/app.js'])
</head>
<body>
  <div class="container">

    <!-- Botón volver -->
    <a href="proyectos" class="btn btn-primary volver">Volver</a>

    <h2 class="section-title">Agregar Proyecto</h2>

    <!-- Formulario -->
    <div class="form-card">
      <form action="#" method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <label for="title">Título</label>
          <input type="text" id="title" name="title" placeholder="Título del proyecto" required>
        </div>

        <div class="form-group">
          <label for="description">Descripción</label>
          <textarea id="description" name="description" rows="4" placeholder="Escribe una breve descripción"></textarea>
        </div>

        <div class="form-group">
          <label for="thumbnail">Miniatura</label>
          <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
        </div>

        <div class="form-group">
          <label for="route_proyect">Ruta Proyecto</label>
          <input type="text" id="route_proyect" name="route_proyect" placeholder="URL del proyecto">
        </div>

        <div class="form-group">
          <label for="route_github">Ruta GitHub</label>
          <input type="text" id="route_github" name="route_github" placeholder="URL del repositorio">
        </div>

        <div class="form-group">
          <label for="route_pdf">Archivo PDF</label>
          <input type="file" id="route_pdf" name="route_pdf" accept="application/pdf">
        </div>

        <div class="form-group">
          <label for="category_id">Categoría</label>
          <input type="number" id="category_id" name="category_id" placeholder="ID de la categoría">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
      </form>
    </div>

  </div>
</body>
</html>
