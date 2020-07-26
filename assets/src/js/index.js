'use strict';
import $ from 'jquery';
import 'popper.js';
import 'bootstrap';
// import './circle-slider';
import {AnalogClock} from 'analog-clock';
import '../scss/style.scss';


window.addEventListener('DOMContentLoaded', ()=>{
  function clockStart() {
    const clockWrapper = document.querySelector('.clock__wrapper');
    const img = clockWrapper.querySelector('img.hand');
    const clock = new AnalogClock();

    console.log(clock.shadowRoot);
    clockWrapper.appendChild(clock)
        .shadowRoot.querySelector('style').after(clockWrapper.querySelector('style')); ;

    function loaded() {
      const sizes = img.getBoundingClientRect();
      const height = sizes.height -
        window.getComputedStyle(img, null).getPropertyValue('padding-top').replace(/\D/gi, '') -
        window.getComputedStyle(img, null).getPropertyValue('padding-bottom').replace(/\D/gi, '');

      console.log(sizes);
      console.log(height);

      clock.style.position = 'absolute';
      clock.style.top = (height * 0.4517) +
        +window.getComputedStyle(img, null).getPropertyValue('padding-top').replace(/\D/gi, '') +
        'px';
      clock.style.height = (height * 0.1815) + 'px';
      clock.style.right = (sizes.width * 0.77) + 'px';
      clock.style.width = clock.style.height;
    }

    if (img.complete) {
      loaded();
    } else {
      img.addEventListener('load', loaded);
      // img.addEventListener('error', function() {});
    }
  }
  clockStart();
});
