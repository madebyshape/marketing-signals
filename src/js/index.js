import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import Lenis from 'lenis';
import Swiper from 'swiper/bundle';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// Components

// Helpers
import gsapHorizontalLoop from './helpers/gsapHorizontalLoop.js';

// Global
window.Alpine = Alpine;
window.Swiper = Swiper;
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;
window.gsapHorizontalLoop = gsapHorizontalLoop;

// Inits
gsap.registerPlugin(ScrollTrigger);
Alpine.plugin(collapse);
Alpine.start();

const lenis = new Lenis({
    autoRaf: true,
    duration: 0.5,
    anchors: true,
    prevent: (node) => node.classList?.contains('js-modal')
});

lenis.on('scroll', () => {
    ScrollTrigger.update();
});
