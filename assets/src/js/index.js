'use strict';
window.$ = window.jQuery = require('jquery');
import 'popper.js';
import 'bootstrap';
import lightbox from 'lightbox2';
// import {startCircleSlider} from './circle-slider';
// import {startCircleSlider} from './circle-slider-animejs';
// import anime from 'animejs';
import {AnalogClock} from 'analog-clock';

// core version + navigation, pagination modules:
import Swiper from 'swiper/bundle';

import '../scss/style.scss';

const domain = window.location.protocol + '//' + window.location.hostname;

$(function() {
  lightbox.option({
    'showImageNumberLabel': false,
  });
});


window.addEventListener('DOMContentLoaded', ()=>{
  if (document.querySelector('.clock__wrapper')) {
    clockStart();
  }

  // года http://dataslov.ru/wp-json/wp/v2/word_year
  // год http://dataslov.ru/wp-json/wp/v2/word_year?slug=2020
  // посты за год по id http://dataslov.ru/wp-json/wp/v2/word?word_year=7


  const circleContainer = document.querySelector('section.words-slider .circle-container');

  if (circleContainer) {
    fetch(domain + '/wp-json/wp/v2/word_year')
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
  }

  if (document.querySelector('article .filter')) {
    filtersInit();
    document.querySelector(`article .filter .filter__year .filter__item[data-term-name="${new Date().getFullYear()}"]`).click();
  }

  if (document.querySelector('article .library-filter')) {
    libraryFiltersInit();
    document.querySelector(`article .library-filter .library-filter__year .library-filter__item[data-term-name="${new Date().getFullYear()}"]`).click();
  }

  document.addEventListener('click', (e)=>{
    if (e.target.classList.contains('btn-share')) {
      shareButtonsInit(e.target);
    }
  });
});

function shareButtonsInit(el) {
  const social = [
    {id: 'vk', className: 'btn-vk', icon: 'fa fa-vk', name: 'VK'},
    {id: 'fb', className: 'btn-facebook', icon: 'fa fa-facebook-square', name: 'Facebook'},
    {id: 'tw', className: 'btn-twitter', icon: 'fa fa-twitter', name: 'Twitter'},
    {id: 'tg', className: 'btn-telegram', icon: 'fa fa-telegram', name: 'Telegram'},
    {id: 'wa', className: 'btn-whatsapp', icon: 'fa fa-whatsapp', name: 'WhatsApp'},
    {id: 'ok', className: 'btn-ok', icon: 'fa fa-odnoklassniki', name: 'Odnoklassniki'},
    // {id: 'mail', className: 'btn-mail', icon: 'fas fa-at', name: 'EMail'},
    // {id: 'btn-print', className: 'print', icon: 'fas fa-print', name: 'Print'},
    // {id: 'tu', className: 'btn-tumblr', icon: 'fab fa-tumblr', name: 'Tumblr'},
    // {id: 'hn', className: 'btn-hn', icon: 'fab fa-hacker-news', name: 'Hacker News'},
    // {id: 'xi', className: 'btn-xing', icon: 'fab fa-xing', name: 'Xing'},
    // {id: 'pk', className: 'btn-pocket', icon: 'fab fa-get-pocket', name: 'Pocket'},
    // {id: 're', className: 'btn-reddit', icon: 'fab fa-reddit', name: 'Reddit'},
    // {id: 'ev', className: 'btn-evernote', icon: 'far fa-sticky-note', name: 'Evernote'},
    // {id: 'in', className: 'btn-linkedin', icon: 'fab fa-linkedin', name: 'LinkedIn'},
    // {id: 'pi', className: 'btn-pinterest', icon: 'fab fa-pinterest', name: 'Pinterest'},
    // {id: 'sk', className: 'btn-skype', icon: 'fab fa-skype', name: 'Skype'},
  ];

  const link = el.dataset.link;
  const title = el.dataset.title;
  const desc = el.dataset.desc;
  const shareBtnContainer = el.parentElement;
  let markup = '';

  for (let i = 0; i < social.length; i++) {
    const s = social[i];
    markup += '<a class="' + s.className + '" data-id="' + s.id + '">' +
          '<i class="' + s.icon + '"></i></a>';
  }
  shareBtnContainer.innerHTML = `<div class='share-btn' data-url='${link}' data-title='${title}' data-desc='${desc}'>${markup}</div>`;

  window.ShareButtons.update();
}

function libraryFiltersInit() {
  const filter = document.querySelector('article .library-filter');
  let typeId = [];
  let yearId = 0;
  const filterType = filter.querySelector('.library-filter__type');
  const filterYear = filter.querySelector('.library-filter__year');

  filterType.addEventListener('click', (e)=> {
    if (e.target.classList.contains('active')) {
      e.target.classList.remove('active');
      typeId = typeId.filter((el)=> el !== e.target.dataset.termId);
      getArticlesByTerms(typeId, yearId);
    } else if (e.target.classList.contains('library-filter__type__item')) {
      typeId.push(e.target.dataset.termId);
      // console.log(typeId);
      // filterType.querySelectorAll('.library-filter__type__item').forEach((el)=>{
      //   el.classList.remove('active');
      // });
      e.target.classList.add('active');

      getArticlesByTerms(typeId, yearId);
    }
  });
  filterYear.addEventListener('click', (e)=> {
    if (e.target.classList.contains('active')) {
      e.target.classList.remove('active');
      yearId = 0;
      getArticlesByTerms(typeId, yearId);
    } else if (e.target.classList.contains('library-filter__item')) {
      yearId = e.target.dataset.termId;
      // console.log(yearId);

      filterYear.querySelectorAll('.library-filter__item').forEach((el)=>{
        el.classList.remove('active');
      });
      e.target.classList.add('active');

      getArticlesByTerms(typeId, yearId);
    }
  });

  function getArticlesByTerms(letterId, yearId) {
    let url = domain + '/wp-json/wp/v2/article?';
    url += (typeId > 0) ? `article_type=${typeId}&`: '';
    url += (yearId > 0) ? `word_year=${yearId}`: '';

    console.log(url);

    fetch(url)
        .then((response) => {
          return response.json();
        })
        .then((data) => {
          console.log(data);

          const wrapper = document.querySelector('.articles-list');
          wrapper.innerHTML = '';


          data.forEach((item)=>{
            let caption = '';
            if (item.acf.full_description) {
              caption = item.acf.full_description['0'].znachenie['0'].chast_rechi;
            }

            let authors = '';
            if (item.acf.avtory) {
              authors = `<div class="authors"><i>Авторы:</i><br />${item.acf.avtory}</div>`;
            }

            let publish = '';
            if (item.acf.nazvanie_izdaniya) {
              publish = `<div class="publish"><i>Название издания:</i><br />${item.acf.nazvanie_izdaniya}</div>`;
            }

            let city = '';
            if (item.acf.gorod) {
              city = `<div class="city"><i>Город:</i><br />${item.acf.gorod}</div>`;
            }

            let year = '';
            if (item.acf.god) {
              year = `<div class="year"><i>Год:</i><br />${item.acf.god}</div>`;
            }

            let pages = '';
            if (item.acf.straniczy) {
              pages = `<div class="pages"><i>Страницы:</i><br />${item.acf.straniczy}</div>`;
            }

            let link = '';
            if (item.acf.ssylka_na_publikacziyu) {
              link = `<div class="link"><i>Ссылка на публикацию::</i><br /><a href="${item.acf.ssylka_na_publikacziyu}" target="_blank">${item.acf.ssylka_na_publikacziyu}</a></div>`;
            }

            let linkedWords = '';
            if (item.acf.svyazannye_slova.length) {
              linkedWords = `<div class="linked-words"><i>Связанные слова: </i><br />`;
              item.acf.svyazannye_slova.forEach((w, i) => {
                linkedWords += `${((i > 0) ? ', ': '')} <a href="${w.guid}">${w.post_title}</a>`;
              });
              linkedWords += `</div>`;
            }

            const articleType = document
                .querySelector(`.library-filter__type__item[data-term-id="${item.article_type}"]`)
                .dataset.termName;

            // console.log(item);

            wrapper.insertAdjacentHTML('beforeend', `
            <div class="articles-list__item row">
              <div class="col-12 col-md-7">
                <div class="article-type">${articleType}</div> 
                <div class="share"><a class="btn btn-share" data-link="${item.link}"  data-title="${item.title.rendered}" data-desc="${item.acf.annotacziya}">Поделиться </a><span></span></div>
                ${authors}
                <div class="articles__name">
                  <i>Название:</i>
                  <h4>«${item.title.rendered}»</h4>
                </div>
                <div class="row">
                  <div class="col"> 
                    ${city}
                  </div>
                  <div class="col">
                    ${year}
                  </div>
                  <div class="col">
                    ${pages}
                  </div>
                </div>
                ${link}
              </div>
              <div class="col-12 col-md-5">
                <div class="annotation">
                  <h6>Аннотация</h6>
                  ${item.acf.annotacziya}
                </div>
                ${linkedWords}
              </div>
            </div>
            `);


            // <div class="articles row">
            //   <h3 class="articles__name text-uppercase col-auto">
            //     ${item.title.rendered}
            //   </h3>
            //   <div class="articles__caption col">
            //     ${caption}
            //   </div>
            //   <div class="articles__description col-12">
            //     ${item.acf.kratkoe_opisanie}
            //   </div>
            //   <div class="col-12">
            //     <a class="btn btn-blue" href="${item.link}">Подробнее</a>
            //   </div>
            // </div>
          });

          return data;
        });
  }
}

function filtersInit() {
  const filter = document.querySelector('article .filter');
  let letterId = 0;
  let yearId = 0;
  const filterLetter = filter.querySelector('.filter__letter');
  const filterYear = filter.querySelector('.filter__year');

  filterLetter.addEventListener('click', (e)=> {
    if (e.target.classList.contains('active')) {
      e.target.classList.remove('active');
      letterId = 0;
      getWordsByTerms(letterId, yearId);
    } else if (e.target.classList.contains('filter__item')) {
      letterId = e.target.dataset.termId;
      // console.log(letterId);
      filterLetter.querySelectorAll('.filter__item').forEach((el)=>{
        el.classList.remove('active');
      });
      e.target.classList.add('active');

      getWordsByTerms(letterId, yearId);
    }
  });
  filterYear.addEventListener('click', (e)=> {
    if (e.target.classList.contains('active')) {
      e.target.classList.remove('active');
      yearId = 0;
      getWordsByTerms(letterId, yearId);
    } else if (e.target.classList.contains('filter__item')) {
      yearId = e.target.dataset.termId;
      // console.log(yearId);

      filterYear.querySelectorAll('.filter__item').forEach((el)=>{
        el.classList.remove('active');
      });
      e.target.classList.add('active');

      getWordsByTerms(letterId, yearId);
    }
  });

  function getWordsByTerms(letterId, yearId) {
    let url = domain + '/wp-json/wp/v2/word?';
    url += (letterId > 0) ? `word_letter=${letterId}&`: '';
    url += (yearId > 0) ? `word_year=${yearId}`: '';

    console.log(url);

    fetch(url)
        .then((response) => {
          return response.json();
        })
        .then((data) => {
          console.log(data);

          const wrapper = document.querySelector('.slovnik-list');
          wrapper.innerHTML = '';


          data.forEach((item)=>{
            let caption = '';
            if (item.acf.full_description) {
              caption = item.acf.full_description['0'].znachenie['0'].chast_rechi;
            }

            wrapper.insertAdjacentHTML('beforeend', `
            <div class="word row">
              <h3 class="word__name text-uppercase col-auto">
                ${item.title.rendered}
              </h3>
              <div class="word__caption col">
                ${caption}
              </div> 
              
              <div class="share"><a class="btn btn-share" data-link="${item.link}"  data-title="${item.title.rendered}" data-desc="${item.acf.kratkoe_opisanie}">Поделиться </a><span></span></div>
              <a class="btn btn-comments ml-md-3" href="${item.link}#comments">Предложить изменения</a>

              <div class="word__description col-12">
                ${item.acf.kratkoe_opisanie}
              </div>
              <div class="col-12">
                <a class="btn btn-blue" href="${item.link}">Подробнее</a>
              </div>
            </div>
            `);
          });

          return data;
        });
  }
}

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
      window.getComputedStyle(img, null).getPropertyValue('padding-top').split(/(\.|px)/gi)[0] -
      window.getComputedStyle(img, null).getPropertyValue('padding-bottom').split(/(\.|px)/gi)[0];

    // console.log(sizes);
    // console.log((height * 0.406015) + +window.getComputedStyle(img, null).getPropertyValue('padding-top').replace(/\D/gi, ''));

    clock.style.position = 'absolute';
    clock.style.top = (height * 0.395015) + +window.getComputedStyle(img, null).getPropertyValue('padding-top').split(/(\.|px)/gi)[0] + 'px';
    // clock.style.top = (height * 0.4517) +
    //   +window.getComputedStyle(img, null).getPropertyValue('padding-top').replace(/\D/gi, '') + 'px';
    clock.style.height = (height * 0.197368) + 'px';
    // console.log(height);
    // console.log(height * 0.197368);
    // console.log(((height * 0.197368) * 0.385542));
    // console.log(window.getComputedStyle(img, null).getPropertyValue('padding-left'));
    clock.style.left = ((height * 0.197368) * 0.292542) + +window.getComputedStyle(img, null).getPropertyValue('padding-left').split(/(\.|px)/gi)[0] + 'px';
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

function getWordsList(yearId) {
  return fetch(domain + '/wp-json/wp/v2/word?word_year=' + yearId)
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
