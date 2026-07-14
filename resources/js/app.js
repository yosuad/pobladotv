import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import { createIcons, icons } from 'lucide';
document.addEventListener('DOMContentLoaded', () => createIcons({ icons }));

import '../css/app.css';
import '../css/pages/index.css';