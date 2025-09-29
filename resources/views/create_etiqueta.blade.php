<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Categorías</title>
  @vite(['resources/css/create_etiqueta.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <div class="crud-container">
    
    <!-- Formulario -->
    <div class="form-section">
      <h2>Agregar Categoría</h2>
      <form>
        <input type="text" placeholder="Nombre de la categoría..." required>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-plus"></i> Guardar
        </button>
      </form>
    </div>

    <!-- Lista -->
    <div class="list-section">
      <h2>Lista de Categorías</h2>
      <div class="table-container">
        <table class="crud-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Práctica</td>
              <td class="actions">
                <button class="action-btn edit-btn"><i class="fas fa-edit"></i></button>
                <button class="action-btn delete-btn"><i class="fas fa-trash"></i></button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Actividad</td>
              <td class="actions">
                <button class="action-btn edit-btn"><i class="fas fa-edit"></i></button>
                <button class="action-btn delete-btn"><i class="fas fa-trash"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</body>
</html>
