import './bootstrap';
import Alpine from 'alpinejs';
import Swiper from 'swiper/bundle';
import focus from '@alpinejs/focus'
import collapse from '@alpinejs/collapse'

// import styles bundle
import 'swiper/css/bundle';

window.Alpine = Alpine;
window.Swiper = Swiper;

Alpine.plugin(collapse)
Alpine.plugin(focus)
Alpine.start();
