/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
// Función para filtrar proyectos
function filterProjects() {
    const searchTerm = (document.getElementById('search-input')?.value || '').trim().toLowerCase();
    const selectedCategory = document.getElementById('category-select')?.value || '';
    const projects = document.querySelectorAll('.project-card');

    projects.forEach(project => {
        const title = (project.getAttribute('data-title') || '').toLowerCase();
        const description = (project.querySelector('.project-description')?.textContent || '').toLowerCase();
        const category = project.getAttribute('data-category') || '';

        // si searchTerm está vacío => todos los proyectos cumplen
        const matchesSearch = !searchTerm || title.includes(searchTerm);
        // si selectedCategory está vacío => todas las categorías cumplen
        const matchesCategory = !selectedCategory || category === selectedCategory;

        if (matchesSearch && matchesCategory) {
            project.style.display = ''; // respeta su display original (flex/grid/etc)
        } else {
            project.style.display = 'none';
        }
    });
}

const downloadButtons = document.querySelectorAll('.download-btn');

downloadButtons.forEach(button => {
    button.addEventListener('click', function () {
        const url = this.getAttribute("data-url");
        const filename = this.getAttribute("data-filename");

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Error al descargar el archivo");
                }
                return response.blob();
            })
            .then(blob => {
                const link = document.createElement("a");
                link.href = URL.createObjectURL(blob);
                link.download = filename;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            })
            .catch(error => {
                console.error("Error:", error);
                alert("No se pudo descargar el archivo.");
            });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    // Asignar eventos a los botones de acción
    // assignActionEvents();

    // Evento para el buscador
    document.getElementById('search-input')?.addEventListener('input', filterProjects);
    document.getElementById('category-select')?.addEventListener('change', filterProjects);

});