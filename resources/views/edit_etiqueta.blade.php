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

        <!-- Botón Volver -->
        <a href="/proyectos" class="btn btn-primary volver">Volver</a>

        <!-- Formulario -->
        <div class="form-section">
            <h2 class="section-title">Agregar Categoría</h2>
            <form action="{{ route('categorias.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" placeholder="Nombre de la categoría..." required name="name" value="{{ $category->name }}">
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check"></i> Actualizar
                </button>
            </form>
        </div>
    </div>
</body>

</html>
