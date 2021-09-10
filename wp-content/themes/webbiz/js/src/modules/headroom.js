import Headroom from 'headroom.js';

let header = document.getElementById('masthead-floating');
let headroom = new Headroom(header, { offset: 150 });
headroom.init();