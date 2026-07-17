import './bootstrap';

import Alpine from 'alpinejs';
import './components/alpine-init';
import './components/navbar';
import './components/theme-switcher';
import './components/accessibility';
import './components/chatbot';

window.Alpine = Alpine;

Alpine.start();
