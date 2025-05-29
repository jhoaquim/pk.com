import './bootstrap';
import jQuery from 'jquery';
window.$ = jQuery;

//import teste from './teste';
//teste();

//import estados from './estados'
//estados();

// Initialization for ES Users - npm install tw-elements
import {
    Modal,
    Ripple,
    initTWE,
} from "tw-elements";
initTWE({ Modal, Ripple });

import 'laravel-datatables-vite';
