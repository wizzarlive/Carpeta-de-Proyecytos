<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repositorio de Proyectos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">Medder</div>
            <div>Repositorio de Proyectos</div>
        </header>

        <div class="filters">
            <div class="filter-row">
                <div class="filter-item">
                    <select id="category-select">
                        <option value="">Seleccionar categoría</option>
                        <option value="actividad">Actividad</option>
                        <option value="practica">Práctica</option>
                    </select>
                </div>
                <div class="filter-item">
                    <input type="text" id="search-input" placeholder="Buscar proyectos...">
                </div>
                <div>
                    <button class="btn btn-danger" id="crud-btn">
                        <i class="fas fa-cog"></i> CRUD Categorías
                    </button>
                </div>
                <div>
                    <button class="btn btn-primary" id="add-btn">
                        <i class="fas fa-plus"></i> Agregar
                    </button>
                </div>
            </div>
        </div>

        <h2 class="section-title">Proyectos</h2>

        <div class="projects-grid" id="projects-grid">
            <!-- Los proyectos se cargarán dinámicamente con JavaScript -->
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/proyectos.js') }}"></script>
</body>
</html>