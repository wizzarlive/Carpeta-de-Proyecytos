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



// Botones de descarga
const downloadButtons = document.querySelectorAll('.download-btn');
downloadButtons.forEach(button => {
    button.addEventListener('click', function () {
        const projectTitle = this.closest('.project-card').getAttribute('data-title');
        alert(`Descargando documentación del proyecto: ${projectTitle}`);
        // Aquí iría la lógica para descargar el PDF
    });
});





// Inicialización cuando el DOM esté cargado
document.addEventListener('DOMContentLoaded', function () {
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

});