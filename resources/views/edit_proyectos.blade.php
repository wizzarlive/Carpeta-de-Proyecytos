<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Proyecto</title>
  @vite(['resources/css/create_proyectos.css', 'resources/js/app.js'])
</head>
<body>
  @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif
  <div class="container">

    <!-- Botón volver -->
    <a href="{{ route('proyectos') }}" class="btn btn-primary volver">Volver</a>

    <h2 class="section-title">Editar Proyecto</h2>

    <!-- Formulario -->
    <div class="form-card">
      <form action="{{ route('proyectos.update', $proyect->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Importante para usar update -->

        <div class="form-group">
          <label for="title">Título</label>
          <input type="text" id="title" name="title" value="{{ old('title', $proyect->title) }}" required>
        </div>

        <div class="form-group">
          <label for="description">Descripción</label>
          <textarea id="description" name="description" rows="4">{{ old('description', $proyect->description) }}</textarea>
        </div>

        <div class="form-group">
          <label for="thumbnail">Miniatura</label>
          <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
          @if($proyect->thumbnail)
              <p>Miniatura actual:</p>
              <img src="data:image/jpeg;base64,{{ $proyect->thumbnail }}" alt="Miniatura" style="max-width: 150px;">
          @endif
        </div>

        <div class="form-group">
          <label for="route_proyect">Ruta Proyecto</label>
          <input type="text" id="route_proyect" name="route_proyect" value="{{ old('route_proyect', $proyect->route_proyect) }}">
        </div>

        <div class="form-group">
          <label for="route_github">Ruta GitHub</label>
          <input type="text" id="route_github" name="route_github" value="{{ old('route_github', $proyect->route_github) }}">
        </div>

        <div class="form-group">
          <label for="route_pdf">Archivo PDF</label>
          <input type="file" id="route_pdf" name="route_pdf" accept="application/pdf">
          @if($proyect->route_pdf)
              <p>PDF actual: <a href="{{ asset('storage/'.$proyect->route_pdf) }}" target="_blank">Ver PDF</a></p>
          @endif
        </div>

        <div class="form-group">
          <label for="category_id">Categoría</label>
          <select id="category_id" name="category_id">
              @foreach ( $categories as $category )
                  <option value="{{ $category->id }}" {{ $category->id == $proyect->category_id ? 'selected' : '' }}>
                      {{ $category->name }}
                  </option>
              @endforeach
          </select> 
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Proyecto</button>
      </form>
    </div>

  </div>
</body>
</html>
