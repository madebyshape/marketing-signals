import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import Lenis from 'lenis';
import Swiper from 'swiper/bundle';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { DrawSVGPlugin } from 'gsap/DrawSVGPlugin';

// Components

// Helpers
import gsapHorizontalLoop from './helpers/gsapHorizontalLoop.js';
import gsapVerticalLoop from './helpers/gsapVerticalLoop.js';

// Global
window.Alpine = Alpine;
window.Swiper = Swiper;
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;
window.DrawSVGPlugin = DrawSVGPlugin;
window.gsapHorizontalLoop = gsapHorizontalLoop;
window.gsapVerticalLoop = gsapVerticalLoop;

// Inits
gsap.registerPlugin(ScrollTrigger, DrawSVGPlugin);
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
