<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Proyectos - Medder</title>
    @vite(['resources/css/create_proyectos.css'])

</head>
<body>
    <div class="crud-container">
        <!-- Header -->
        <div class="crud-header">
            <h1 class="crud-title">Gestión de Proyectos</h1>
            <button class="back-btn" onclick="window.history.back()">
                <i class="fas fa-arrow-left"></i> Volver
            </button>
        </div>

        <!-- Actions Bar -->
        <div class="crud-actions">
            <div class="search-box">
                <input type="text" id="search-input" placeholder="Buscar proyectos...">
                <i class="fas fa-search"></i>
            </div>
            <button class="btn btn-primary" id="add-project-btn">
                <i class="fas fa-plus"></i> Nuevo Proyecto
            </button>
        </div>

        <!-- Projects Table -->
        <div class="table-container">
            <table class="projects-table">
                <thead>
                    <tr>
                        <th class="thumbnail-cell">Miniatura</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Ruta Proyecto</th>
                        <th>GitHub</th>
                        <th>PDF</th>
                        <th>Categoría</th>
                        <th class="actions-cell">Acciones</th>
                    </tr>
                </thead>
                <tbody id="projects-table-body">
                    <!-- Proyecto de Ejemplo -->
                    <tr>
                        <td class="thumbnail-cell">
                            <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                 alt="Miniatura" class="thumbnail-preview">
                        </td>
                        <td>Sistema de Gestión</td>
                        <td>Sistema completo para gestión empresarial con panel administrativo</td>
                        <td>/proyectos/sistema-gestion</td>
                        <td>github.com/medder/sistema-gestion</td>
                        <td>/docs/sistema-gestion.pdf</td>
                        <td><span class="category-tag practica">Práctica</span></td>
                        <td class="actions-cell">
                            <div class="action-buttons">
                                <button class="table-btn edit-btn" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="table-btn delete-btn" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <button class="table-btn view-btn" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para agregar/editar proyecto -->
    <div id="project-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Nuevo Proyecto</h2>
                <button class="close-btn">&times;</button>
            </div>
            <div class="modal-body">
                <form id="project-form">
                    <div class="form-group">
                        <label for="project-title">Título *</label>
                        <input type="text" id="project-title" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="project-description">Descripción *</label>
                        <textarea id="project-description" class="form-control" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="project-thumbnail">Miniatura</label>
                        <div class="file-upload">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Haz clic para subir una imagen</p>
                            <input type="file" id="thumbnail-input" class="file-input" accept="image/*">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="project-route">Ruta del Proyecto</label>
                        <input type="text" id="project-route" class="form-control" placeholder="Ej: /proyectos/mi-proyecto">
                    </div>
                    
                    <div class="form-group">
                        <label for="project-github">URL de GitHub</label>
                        <input type="url" id="project-github" class="form-control" placeholder="Ej: https://github.com/usuario/proyecto">
                    </div>
                    
                    <div class="form-group">
                        <label for="project-pdf">Ruta del PDF</label>
                        <input type="text" id="project-pdf" class="form-control" placeholder="Ej: /docs/mi-proyecto.pdf">
                    </div>
                    
                    <div class="form-group">
                        <label for="project-category">Categoría *</label>
                        <select id="project-category" class="form-control" required>
                            <option value="">Seleccionar categoría</option>
                            <option value="practica">Práctica</option>
                            <option value="actividad">Actividad</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-cancel">Cancelar</button>
                <button class="btn btn-save">Guardar Proyecto</button>
            </div>
        </div>
    </div>

    <script src="crud-proyectos.js"></script>
</body>
</html>