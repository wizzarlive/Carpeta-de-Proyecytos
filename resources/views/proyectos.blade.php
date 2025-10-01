

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repositorio de Proyectos</title>
    
    <!-- Enlaces por defecto de Laravel -->
    @vite(['resources/css/proyectos.css', 'resources/js/app.js'])
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                    <option value="">Todas</option>
                    @foreach ( $categorys as $category )
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="filter-item">
                    <input type="text" id="search-input" placeholder="Buscar proyectos...">
                </div>
                <div>
                    <a href="/create_etiqueta" class="btn btn-danger" id="crud-btn">
                        <i class="fas fa-cog"></i> CRUD Categorías
                    </a>
                </div>
                <div>
                    <a href="/create_proyecto" class="btn btn-primary" id="add-btn">
                        <i class="fas fa-plus"></i> Agregar
                    </a>
                </div>
            </div>
        </div>

        <h2 class="section-title">Proyectos</h2>

        <div class="projects-grid" id="projects-grid">
            <!-- Proyecto 1 con imagen real -->
            @foreach ($proyects as $proyect)
                <div class="project-card" 
                    data-category="{{ $proyect->categoria->name ?? '' }}" 
                    data-title="{{ $proyect->title }}">
                    
                    <div class="card-header">
                        <img src="data:image/png;base64,{{ $proyect->thumbnail }}" 
                            alt="{{ $proyect->title }}" 
                            class="card-image">
                        <div class="card-actions">
                            <a href="{{ route('edit_proyectos', $proyect->id) }}" class="action-btn edit-btn">
                                <i class="fas fa-edit"></i>
                            </a>
                            <div class="action-btn delete-btn">
                                <form action="{{ route('proyectos.destroy', $proyect->id) }}" method="POST" onsubmit="return confirm('¿Seguro de eliminar este proyecto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background:none;border:none;cursor:pointer;color:white;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h3 class="project-title">{{ $proyect->title }}</h3>
                        <p class="project-description">{{ $proyect->description }}</p>
                        <div class="project-meta">
                            <span><i class="fas fa-tag"></i> {{ $proyect->categoria->name ?? 'Sin categoría' }}</span>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button 
                            class="footer-btn download-btn"
                            data-url="{{ asset('storage/' . $proyect->route_pdf) }}"
                            data-filename="{{ Str::slug($proyect->title) }}.pdf">
                            <i class="fas fa-download"></i> PDF
                        </button>
                        <a href="{{ $proyect->route_github ?? '#' }}" target="_blank" class="footer-btn github-btn">
                            <i class="fab fa-github"></i> GitHub
                        </a>
                        <a href="{{ $proyect->route_proyect ?? '#' }}" target="_blank" class="footer-btn view-btn">
                            <i class="fas fa-external-link-alt"></i> Visualizar
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</body>
</html>
