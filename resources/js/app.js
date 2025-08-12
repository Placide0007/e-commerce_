import './bootstrap';

import Waves from 'node-waves';
import 'node-waves/dist/waves.css';

import Chart from 'chart.js/auto';
window.Chart = Chart;



import 'bootstrap/dist/js/bootstrap.min.js';
import 'bootstrap-icons/font/bootstrap-icons.css';

import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
window.toastr = toastr;

import AOS from 'aos';
import 'aos/dist/aos.css';



import 'typeface-inter';
import 'typeface-montserrat';
import 'typeface-poppins';
import 'animate.css';




document.addEventListener('DOMContentLoaded', () => {
    Waves.init();
    Waves.attach('button', ['waves-light']);

    AOS.init({
        duration:400,
        once: true,
    });
});

