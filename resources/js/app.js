import './bootstrap';

// Función para filtrar proyectos
function filterProjects() {
    const searchTerm = document.getElementById('search-input')?.value.toLowerCase() || '';
    const selectedCategory = document.getElementById('category-select')?.value || '';
    const projects = document.querySelectorAll('.project-card');
    
    projects.forEach(project => {
        const title = project.getAttribute('data-title').toLowerCase();
        const description = project.querySelector('.project-description').textContent.toLowerCase();
        const category = project.getAttribute('data-category');
        
        const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm);
        const matchesCategory = !selectedCategory || category === selectedCategory;
        
        if (matchesSearch && matchesCategory) {
            project.style.display = 'block';
        } else {
            project.style.display = 'none';
        }
    });
}

// Asignar eventos a los botones de acción
function assignActionEvents() {
    // Botones de edición
    const editButtons = document.querySelectorAll('.edit-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const projectTitle = this.closest('.project-card').getAttribute('data-title');
            alert(`Editando proyecto: ${projectTitle}`);
            // Aquí iría la lógica para abrir el formulario de edición
        });
    });

    // Botones de eliminación
    const deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const projectTitle = this.closest('.project-card').getAttribute('data-title');
            if (confirm(`¿Estás seguro de que quieres eliminar el proyecto "${projectTitle}"?`)) {
                // Aquí iría la lógica para eliminar el proyecto
                this.closest('.project-card').style.display = 'none';
                console.log(`Proyecto "${projectTitle}" eliminado`);
            }
        });
    });

    // Botones de descarga
    const downloadButtons = document.querySelectorAll('.download-btn');
    downloadButtons.forEach(button => {
        button.addEventListener('click', function() {
            const projectTitle = this.closest('.project-card').getAttribute('data-title');
            alert(`Descargando documentación del proyecto: ${projectTitle}`);
            // Aquí iría la lógica para descargar el PDF
        });
    });

    // Botones de GitHub
    const githubButtons = document.querySelectorAll('.github-btn');
    githubButtons.forEach(button => {
        button.addEventListener('click', function() {
            const projectTitle = this.closest('.project-card').getAttribute('data-title');
            alert(`Redirigiendo al repositorio de GitHub del proyecto: ${projectTitle}`);
            // Aquí iría la lógica para redirigir a GitHub
        });
    });

    // Botones de visualización
    const viewButtons = document.querySelectorAll('.view-btn');
    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const projectTitle = this.closest('.project-card').getAttribute('data-title');
            alert(`Visualizando proyecto: ${projectTitle}`);
            // Aquí iría la lógica para redirigir al hosting
        });
    });
}

// Inicialización cuando el DOM esté cargado
document.addEventListener('DOMContentLoaded', function() {
    // Asignar eventos a los botones de acción
    assignActionEvents();
    
    // Evento para el buscador
    const searchInput = document.getElementById('search-input');
    if (searchInput) {
        searchInput.addEventListener('input', filterProjects);
    }
    
    // Evento para el selector de categoría
    const categorySelect = document.getElementById('category-select');
    if (categorySelect) {
        categorySelect.addEventListener('change', filterProjects);
    }
    
    // Evento para el botón CRUD
    const crudBtn = document.getElementById('crud-btn');
    if (crudBtn) {
        crudBtn.addEventListener('click', function() {
            alert('Redirigiendo a la página de CRUD de categorías');
            // Aquí iría la lógica para redirigir a la página de CRUD
            // window.location.href = '/crud-categorias';
        });
    }
    
    // Evento para el botón Agregar
    const addBtn = document.getElementById('add-btn');
    if (addBtn) {
        addBtn.addEventListener('click', function() {
            alert('Abriendo formulario para agregar nuevo proyecto');
            // Aquí iría la lógica para abrir el formulario de agregar proyecto
        });
    }
});