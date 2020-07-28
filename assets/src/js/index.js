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

  // года http://dataslov.ru/wp-json/wp/v2/word_year
  // год http://dataslov.ru/wp-json/wp/v2/word_year?slug=2020
  // посты за год по id http://dataslov.ru/wp-json/wp/v2/word?word_year=7


  const swiperWrapper = document.querySelector('section.words-slider .swiper-wrapper');

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
            <div class="swiper-slide" data-year-id="${el.id}" data-year="${el.name}" >
              <div class="swiper-slide-content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12 col-md-6 description">

                    </div>
                    <div class="col-12 col-md-6 words-list-wrapper">
                      <h4>Другие слова ${el.name} года:</h4>
                      <ul class="words-list"></ul>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            `;
        });
        swiperWrapper.insertAdjacentHTML('afterbegin', itemsNav);
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
  const timelineSwiper = new Swiper('.words-slider .swiper-container', {
    // Optional parameters
    direction: 'vertical',
    loop: false,
    speed: 300,

    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true,
      renderBullet: function(index, className) {
        const year = document.querySelectorAll('.swiper-slide')[index].getAttribute('data-year');
        return '<span class="' + className + '">' + year + '</span>';
      },
    },

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
    initialSlide: document.querySelectorAll('.swiper-slide').length -1,
    on: {
      init: (swiper) => {
        onSliderInit(swiper);
      },
    },

  });


  timelineSwiper.on('slideChange', function(swiper) {
    onSliderInit(swiper);
  });

  function onSliderInit(swiper) {
    const indexCurrentSlide = swiper.realIndex;
    const currentSlide = swiper.slides[indexCurrentSlide];
    const wordList = currentSlide.querySelector('.words-list');
    // console.log(currentSlide);

    // не пустой уже
    if (!wordList.childNodes.length) {
      getWordsList(currentSlide.dataset.yearId)
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

            wordList.insertAdjacentHTML('afterbegin', items);
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
    }
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
