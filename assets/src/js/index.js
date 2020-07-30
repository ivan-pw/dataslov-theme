'use strict';
window.$ = window.jQuery = require('jquery');
import 'popper.js';
import 'bootstrap';
// import {startCircleSlider} from './circle-slider';
// import {startCircleSlider} from './circle-slider-animejs';
// import anime from 'animejs';
import {AnalogClock} from 'analog-clock';

// core version + navigation, pagination modules:
import Swiper from 'swiper/bundle';

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

      // console.log(sizes);
      // console.log((height * 0.406015) + +window.getComputedStyle(img, null).getPropertyValue('padding-top').replace(/\D/gi, ''));

      clock.style.position = 'absolute';
      clock.style.top = (height * 0.401015) + +window.getComputedStyle(img, null).getPropertyValue('padding-top').replace(/\D/gi, '') + 'px';
      // clock.style.top = (height * 0.4517) +
      //   +window.getComputedStyle(img, null).getPropertyValue('padding-top').replace(/\D/gi, '') + 'px';
      clock.style.height = (height * 0.197368) + 'px';
      // console.log(((height * 0.197368) * 0.385542));
      clock.style.left = ((height * 0.197368) * 0.300542) + +window.getComputedStyle(img, null).getPropertyValue('padding-left').replace(/\D/gi, '') + 'px';
      console.log(clock.style.left);
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

  // года http://dataslov.ru/wp-json/wp/v2/word_year
  // год http://dataslov.ru/wp-json/wp/v2/word_year?slug=2020
  // посты за год по id http://dataslov.ru/wp-json/wp/v2/word?word_year=7


  const circleContainer = document.querySelector('section.words-slider .circle-container');

  fetch('http://dataslov.ru/wp-json/wp/v2/word_year')
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        console.log(data);
        data.sort((a, b)=>{
          return (a.name > b.name) ? 1 : 0;
        });
        let itemsNav = '';

        data.forEach((el) => {
          itemsNav += `
            <li class="circle-slide" data-year-id="${el.id}" data-year="${el.name}" >
              <span>${el.name}</span>
            </li>
            `;
        });
        circleContainer.insertAdjacentHTML('afterbegin', itemsNav);
        return data;
      })
      .then((data) => {
        {
          startSlider();

          /*
          swiperWrapper.querySelectorAll('.swiper-slide').forEach((el)=>{
            el.addEventListener('click', ()=>{
              console.log(el.dataset);
              getWordsList(el.dataset.yearId);
            });
          });

          console.log(swiperWrapper.querySelector(`.swiper-slide[data-year='${new Date().getFullYear()}']`));
          */

        // sliderNav.querySelector(`li[data-year='${new Date().getFullYear()}']`).click();
        }
      });
});


function getWordsList(yearId) {
  return fetch('http://dataslov.ru/wp-json/wp/v2/word?word_year=' + yearId)
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        // console.log(data);
        return data;
        /*
        let items = '';

        data.forEach((el) => {
          items += `
            <li class="navigation-item" data-yead-id="${el.id}" data-year="${el.name}">
              <span class="rotate-holder"></span>
              <span class="background-holder" style="">${el.name}</span>
            </li>
            `;
        });
        sliderNav.insertAdjacentHTML('afterbegin', items);
        return data;
        */
      });
}

function startSlider() {
  const circleContainer = document.querySelector('.circle-container');
  let lastRotate = 0;

  circleContainer.querySelectorAll('li').forEach((el, i, arr)=>{
    el.dataset.rotate = lastRotate;
    el.style.transform = `rotate(${lastRotate}deg) translate(${circleContainer.offsetHeight / 3}px)`; // 200
    el.querySelector('span').style.transform = `rotate(0deg)`;
    el.querySelector('span').dataset.rotate = 0;

    lastRotate += 360 / arr.length;


    el.addEventListener('click', (e)=> {
      circleContainer.dataset.rotate = -el.dataset.rotate;
      circleContainer.style.transform = `rotate(-${el.dataset.rotate}deg)`;

      onSliderInit(el);
      // console.log(e.target.dataset.rotate);

      circleContainer.querySelectorAll('li').forEach((el2, i, arr)=>{


      });
    });
  });

  // like init
  circleContainer.querySelector(`li[data-year="${new Date().getFullYear()}"]`).click();


  function onSliderInit(yearEl) {
    // console.log(yearEl);
    const wordList = document.querySelector('.words-slider .words-list');
    const currentSlide = document.querySelector('.words-slider .words-container');
    // console.log(currentSlide);

    // не пустой уже
    // if (!wordList.childNodes.length) {
    getWordsList(yearEl.dataset.yearId)
        .then((data)=>{
          console.log(data);
          let items = '';

          data.forEach((el)=>{
            items += `
              <li 
                data-word='${el.title.rendered}'
                data-link='${el.link}'
                data-desc='${el.acf.kratkoe_opisanie}'
              >${el.title.rendered}</li>
            `;
          });

          // wordList.insertAdjacentHTML('afterbegin', items);
          wordList.innerHTML = `<h4>Другие слова ${yearEl.dataset.year} года: </h4>` + items;
          changeWordInSlider(currentSlide, wordList.querySelector('li'));
        })
        .then(()=>{
          wordList.querySelectorAll('li').forEach((el)=>{
            el.addEventListener('click', (e)=>{
              console.log(el);
              changeWordInSlider(currentSlide, el);
            });
          });
        });
    // }
  }
}

function changeWordInSlider(slide, wordEl) {
  console.log(wordEl.dataset);
  slide.querySelector('.description')
      .innerHTML = `
        <h3>«${wordEl.dataset.word}»</h3>
        <p>${wordEl.dataset.desc}</p>
        <a href="${wordEl.dataset.link}" class="btn btn-white">Подробнее</a>
      `;
}
