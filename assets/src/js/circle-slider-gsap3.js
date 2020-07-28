'use strict';
window.$ = window.jQuery = require('jquery');
import {gsap} from 'gsap';
import {CSSPlugin} from 'gsap/CSSPlugin';


export function startCircleSlider() {
  // init variables
  const slideshow = $('.slideshow');
  const navigation = $('.navigation');
  const navigationItem = $('.navigation-item');
  const detailItem = $('.detail-item');
  let rotation;
  const type = '_short';

  // prepare letters
  $('.headline').each(function() {
    $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, '<span class=\'letter\'>$&</span>'));
  });

  // prepare navigation and set navigation items on the right place
  navigationItem.each(function(index, elem) {
    gsap.set(elem, {
      left: navigation.width() / 2 - navigationItem.width() / 2 - 10,
      rotation: 90 + (index * 360 / navigationItem.length),
      transformOrigin: '50% ' + navigation.width() / 2 + 'px',
    });
    gsap.set($(elem).find('.rotate-holder'), {
      // text: String(index * 360 / navigationItem.length),
    });
    gsap.set($(elem).find('.background-holder'), {
      rotation: -90 - (index * 360 / navigationItem.length),
    });
  });

  // set tween values
  function setTweenValues() {
    rotation = Number($(this).find('.rotate-holder').text());
  }

  // do tween
  function doTween(target) {
    const targetIndex = navigationItem.index(target);
    const timeline = gsap.timeline();

    // add/remove class "active" from navigation & detail
    navigationItem.each(function() {
      $(this).removeClass('active');
      if ($(this).index() == $(target).index()) {
        $(this).addClass('active');
      }
    });
    detailItem.each(function() {
      $(this).removeClass('active');
      if ($(this).index() == $(target).index()) {
        $(this).addClass('active');
      }
    });


    timeline
        .to(navigation, {rotation: -rotation + type, duration: 1, ease: 'elastic'})
        .staggerTo(navigationItem.find('.background-holder'), 0.6, {
          // cycle: {
          //   // function that returns a value
          //   rotation: function(index, element) {
          //     return -90 - Number($(element).prev('.rotate-holder').text()) + rotation + type;
          //   },
          // },
          // transformOrigin: '50% 50%',
          // ease: 'sine',

          rotation: gsap.utils.wrap(function(index, element) {
            return -90 - Number($(element).prev('.rotate-holder').text()) + rotation + type;
          }),
        }, 0, '-=0.6')
        .staggerFromTo($('.active').find('.letter'), 0.3, {
          autoAlpha: 0,
          x: -100,
        },
        {
          autoAlpha: 1,
          x: 0,
          ease: 'sine',
        }, 0.025, '-=0.3')
        .staggerFromTo($('.active').find('.letter'), 0.3, {
          autoAlpha: 0,
          x: -100,
        },
        {
          autoAlpha: 1,
          x: 0,
          ease: 'sine',
        }, 0.025, '-=0.3').fromTo($('.active').find('.background'), {
          autoAlpha: 0,
          x: -100,
        },
        {
          autoAlpha: 1,
          x: 0,
          ease: 'sine',
        }, 0.05, '+=0.3');

    // timeline
    //     .to(navigation, 0.6, {
    //       rotation: -rotation + type,
    //       transformOrigin: '50% 50%',
    //       ease: 'sine',
    //     })
    //     .staggerTo(navigationItem.find('.background-holder'), 0.6, {
    //       // cycle: {
    //       //   // function that returns a value
    //       //   rotation: function(index, element) {
    //       //     return -90 - Number($(element).prev('.rotate-holder').text()) + rotation + type;
    //       //   },
    //       // },
    //       // transformOrigin: '50% 50%',
    //       // ease: 'sine',

    //       x: gsap.utils.wrap(function(index, element) {
    //         return -90 - Number($(element).prev('.rotate-holder').text()) + rotation + type;
    //       }),
    //     }, 0, '-=0.6')
    //     .staggerFromTo($('.active').find('.letter'), 0.3, {
    //       autoAlpha: 0,
    //       x: -100,
    //     },
    //     {
    //       autoAlpha: 1,
    //       x: 0,
    //       ease: 'sine',
    //     }, 0.025, '-=0.3')
    //     .fromTo($('.active').find('.background'), 0.9, {
    //       autoAlpha: 0,
    //       x: -100,
    //     },
    //     {
    //       autoAlpha: 1,
    //       x: 0,
    //       ease: 'sine',
    //     }, 0.05, '+=0.3');
  }

  // click/hover on items
  navigationItem.on('mouseenter', setTweenValues);
  navigationItem.on('click', function() {
    doTween($(this));
  });

  // on load show slideshow as well as first "active" navigation/detail item
  gsap.to(slideshow, 1, {autoAlpha: 1});
  gsap.to($('.active').find('.letter'), 0.7, {autoAlpha: 1, x: 0});
  // gsap.to($('.active').find('.background'), 0.7, {autoAlpha: 1, x: 0});


  // fast fix for resize window and refresh view, attention: not use in production, only for demo purposes!
  // (function() {
  //   const width = window.innerWidth;

  //   window.addEventListener('resize', function() {
  //     if (window.innerWidth !== width) {
  //       window.location.reload(true);
  //     }
  //   });
  // })();
};
