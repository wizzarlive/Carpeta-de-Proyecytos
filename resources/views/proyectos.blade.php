<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repositorio de Proyectos</title>
    
    <!-- Enlaces por defecto de Laravel -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
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
                        <option value="">Todas las categorías</option>
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
            <!-- Proyecto 1 con imagen real -->
            <div class="project-card" data-category="practica" data-title="Sistema de Gestión">
                <div class="card-header">
                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Sistema de Gestión" class="card-image">
                    <div class="card-actions">
                        <div class="action-btn edit-btn">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="action-btn delete-btn">
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="project-title">Sistema de Gestión</h3>
                    <p class="project-description">Sistema completo para la gestión de recursos empresariales con panel administrativo y dashboard interactivo.</p>
                    <div class="project-meta">
                        <span><i class="fas fa-tag"></i> Práctica</span>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="footer-btn download-btn">
                        <i class="fas fa-download"></i> Descargar
                    </button>
                    <button class="footer-btn github-btn">
                        <i class="fab fa-github"></i> GitHub
                    </button>
                    <button class="footer-btn view-btn">
                        <i class="fas fa-external-link-alt"></i> Visualizar
                    </button>
                </div>
            </div>

        </div>
    </div>
</body>
</html>