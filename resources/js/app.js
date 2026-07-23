/* ============================================================
   ALPINE.JS
   Framework ligero para interactividad (dropdowns, toggles, etc.)
   ============================================================ */
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

/* ============================================================
   LUCIDE ICONS
   Renderiza los íconos <i data-lucide="..."></i> en el DOM
   ============================================================ */
import { createIcons, icons } from 'lucide';
document.addEventListener('DOMContentLoaded', () => createIcons({ icons }));

/* ============================================================
   ESTILOS GLOBALES
   Reset, variables CSS, header, footer (layout public)
   ============================================================ */
import '../css/app.css';
import '../css/admin/admin.css';
import '../css/admin/noticias/index.css';
import '../css/admin/noticias/form.css';

/* ============================================================
   ESTILOS POR PÁGINA
   Un import por cada vista que tenga su propio CSS
   ============================================================ */
import '../css/pages/index.css';         // Home
import '../css/pages/noticia.css';       // Detalle de noticia
import '../css/pages/error-404.css';     // Página 404
import '../css/pages/auth.css';          // Login, registro, recuperar contraseña