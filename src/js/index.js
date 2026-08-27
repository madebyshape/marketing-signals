import Alpine from 'alpinejs';
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
Alpine.start();
