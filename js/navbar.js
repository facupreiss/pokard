// Obtener todos los enlaces de navegación
const navLinks = document.querySelectorAll('.nav-link');

// Obtener todas las secciones
const sections = document.querySelectorAll('section');

// Función para agregar la clase active al enlace correspondiente
const addActiveClass = (id) => {
  navLinks.forEach((link) => {
    if (link.getAttribute('href') === `#${id}`) {
      link.classList.add('active');
    } else {
      link.classList.remove('active');
    }
  });
};

// Variable para almacenar la sección más cercana al borde superior de la pantalla
let closestSection;

// Detectar el evento de desplazamiento
window.addEventListener('scroll', () => {
  // Recorrer todas las secciones
  sections.forEach((section) => {
    // Obtener la posición de la sección en relación con la parte superior de la página
    const sectionTop = section.offsetTop;
    const sectionHeight = section.offsetHeight;

    // Verificar si el usuario se encuentra sobre la sección
    if (window.scrollY >= sectionTop - sectionHeight / 3) {
      // Actualizar la sección más cercana al borde superior de la pantalla
      closestSection = section;
    }
  });

  // Agregar la clase active al enlace correspondiente a la sección más cercana al borde superior de la pantalla
  if (closestSection) {
    addActiveClass(closestSection.getAttribute('id'));
  }
});
