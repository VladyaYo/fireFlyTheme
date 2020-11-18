import Swiper from "swiper";
import { Navigation, Pagination } from "swiper";
import SlimSelect from "slim-select";

Swiper.use([Navigation, Pagination]);

const breakpoint = window.matchMedia( '(max-width:767px)' );

document.addEventListener("DOMContentLoaded", function() {
  if (!("remove" in Element.prototype)) {
    Element.prototype.remove = function() {
      if (this.parentNode) {
        this.parentNode.removeChild(this);
      }
    };
  }
  function findVideos() {
    const videos = document.querySelectorAll(".video");

    for (let i = 0; i < videos.length; i++) {
      setupVideo(videos[i]);
    }
  }

  function setupVideo(video) {
    const link = video.querySelector(".video__link");
    const media = video.querySelector(".video__media");
    const button = video.querySelector(".video__button");
    const id = parseMediaURL(link);
    video.addEventListener("click", function() {
      const iframe = createIframe(id);
      link.remove();
      button.remove();
      video.appendChild(iframe);
    });
    link.removeAttribute("href");
    video.classList.add("video--enabled");
  }

  function parseMediaURL(media) {
    const regexp = /https:\/\/youtu\.be\/([a-zA-Z0-9_-]+)/i;
    const url = media.href;
    const match = url.match(regexp);
    return match[1];
  }

  function createIframe(id) {
    const iframe = document.createElement("iframe");
    iframe.setAttribute("allowfullscreen", "");
    iframe.setAttribute("allow", "autoplay");
    iframe.setAttribute("src", generateURL(id));
    iframe.classList.add("video__media");
    return iframe;
  }

  function generateURL(id) {
    const query = "?rel=0&showinfo=0&autoplay=1";
    return "https://www.youtube.com/embed/" + id + query;
  }

  findVideos();

  // SLIDER

  const categoriesSliderNode = document.querySelector(".categories-slider");

  if (categoriesSliderNode) {
    const categoriesSlider = new Swiper(categoriesSliderNode, {
      direction: "horizontal",
      loop: true,
      slidesPerView: 1.3,
      spaceBetween: 30,
      slidesOffsetAfter: 30,
      allowTouchMove: true,
      navigation: {
        nextEl: ".categories .swiper-button-next",
        prevEl: ".categories .swiper-button-prev"
      },
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      },
      breakpoints: {
        576: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 2.5,
        },
        992: {
          slidesPerView: 3,
        }
      }
    });
  }

  const advantagesSliderNode = document.querySelector('.advantages-cards');
  if(advantagesSliderNode){
    let advantagesSlider;
    function toggleAdvantagesSlider () {
      if(breakpoint.matches && !advantagesSlider){
        advantagesSlider = new Swiper(advantagesSliderNode, {
          direction: "horizontal",
          loop: false,
          slidesPerView: 1.3,
          allowTouchMove: true,
          spaceBetween: 30,
          slidesOffsetAfter: 50,
          pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
          },
        });
      } else if(!breakpoint.matches && advantagesSlider){
        advantagesSlider.destroy( true, true );
        advantagesSlider = null;
      }
    }
    toggleAdvantagesSlider();
    window.addEventListener('resize', toggleAdvantagesSlider);
  }

  const infoSliderNode = document.querySelector('.infoBlock-slider');

  if(infoSliderNode){
    let infoSlider;
    function toggleInfoSlider () {
      if(breakpoint.matches && !infoSlider){
        infoSlider = new Swiper(infoSliderNode, {
          direction: "horizontal",
          loop: false,
          slidesPerView: 1.3,
          allowTouchMove: true,
          spaceBetween: 30,
          slidesOffsetAfter: 50,
          pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
          },
        });
      } else if(!breakpoint.matches && infoSlider){
        infoSlider.destroy( true, true );
        infoSlider = null;
      }
    }
    toggleInfoSlider();
    window.addEventListener('resize', toggleInfoSlider);
  }

  const descSliderNode = document.querySelector('.descBlock-slider');

  if(descSliderNode){
    let descSlider;
    function toggleDescSlider () {
      if(breakpoint.matches && !descSlider){
        descSlider = new Swiper(descSliderNode, {
          direction: "horizontal",
          loop: false,
          slidesPerView: 1.5,
          allowTouchMove: true,
          spaceBetween: 16,
          slidesOffsetAfter: 50,
          slidesOffsetBefore: 15,
          pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
          },
          breakpoints: {
            576: {
              slidesPerView: 2.2,
            }
          }
        });
      } else if(!breakpoint.matches && descSlider){
        descSlider.destroy( true, true );
        descSlider = null;
      }
    }
    toggleDescSlider();
    window.addEventListener('resize', toggleDescSlider);
  }

  const progressSliderNode = document.querySelector('.progress-slider');

  if(progressSliderNode){
    let progressSlider;
    function toggleProgressSlider () {
      if(breakpoint.matches && !progressSlider){
        progressSlider = new Swiper(progressSliderNode, {
          direction: "horizontal",
          loop: false,
          slidesPerView: 1.5,
          allowTouchMove: true,
          spaceBetween: 16,
          slidesOffsetAfter: 50,
          slidesOffsetBefore: 15,
          pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
          },
          breakpoints: {
            576: {
              slidesPerView: 2.2,
            }
          }
        });
      } else if(!breakpoint.matches && progressSlider){
        progressSlider.destroy( true, true );
        progressSlider = null;
      }
    }
    toggleProgressSlider();
    window.addEventListener('resize', toggleProgressSlider);
  }

  const clientsSliderNode = document.querySelector('.clients-list');

  if(clientsSliderNode){
    let clientsSlider;
    function toggleClientsSlider () {
      if(breakpoint.matches && !clientsSlider){
        clientsSlider = new Swiper(clientsSliderNode, {
          direction: "horizontal",
          loop: true,
          slidesPerView: "auto",
          allowTouchMove: true,
          spaceBetween: 18,
          slidesOffsetAfter: 50,
        });
      } else if(!breakpoint.matches && clientsSlider){
        clientsSlider.destroy( true, true );
        clientsSlider = null;
      }
    }
    toggleClientsSlider();
    window.addEventListener('resize', toggleClientsSlider);
  }

  const gallerySliderNode = document.querySelector('.gallery-slider');

  if(gallerySliderNode){
    let gallerySlider;
    function toggleGallerySlider () {
      if(breakpoint.matches && !gallerySlider){
        gallerySlider = new Swiper(gallerySliderNode, {
          direction: "horizontal",
          loop: false,
          slidesPerView: 1.5,
          allowTouchMove: true,
          spaceBetween: 16,
          pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
          },
          breakpoints: {
            576: {
              slidesPerView: 2.2,
            }
          }
        });
      } else if(!breakpoint.matches && gallerySlider){
        gallerySlider.destroy( true, true );
        gallerySlider = null;
      }
    }
    toggleGallerySlider();
    window.addEventListener('resize', toggleGallerySlider);
  }

  const teamSliderNode = document.querySelector('.team-slider');

  if(teamSliderNode){
    let teamSlider;
    function toggleTeamSlider () {
      if(breakpoint.matches && !teamSlider){
        teamSlider = new Swiper(teamSliderNode, {
          direction: "horizontal",
          loop: false,
          slidesPerView: 1.5,
          allowTouchMove: true,
          spaceBetween: 16,
          pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
          },
          breakpoints: {
            576: {
              slidesPerView: 2.2,
            }
          }
        });
      } else if(!breakpoint.matches && teamSlider){
        teamSlider.destroy( true, true );
        teamSlider = null;
      }
    }
    toggleTeamSlider();
    window.addEventListener('resize', toggleTeamSlider);
  }

  const futureSliderNode = document.querySelector('.future-slider');

  if(futureSliderNode){
    let futureSlider;
    function toggleFutureSlider () {
      if(breakpoint.matches && !futureSlider){
        futureSlider = new Swiper(futureSliderNode, {
          direction: "horizontal",
          loop: false,
          slidesPerView: 1,
          allowTouchMove: true,
          breakpoints: {
            576: {
              slidesPerView: 2.2,
            }
          }
        });
      } else if(!breakpoint.matches && futureSlider){
        futureSlider.destroy( true, true );
        futureSlider = null;
      }
    }
    toggleFutureSlider();
    window.addEventListener('resize', toggleFutureSlider);
  }


  const workSliderNode = document.querySelector(".work-slider");

  if (workSliderNode) {
    const workSlider = new Swiper(workSliderNode, {
      direction: "horizontal",
      loop: false,
      slidesPerView: 1,
      allowTouchMove: true,
      navigation: {
        nextEl: ".work .swiper-button-next",
        prevEl: ".work .swiper-button-prev"
      },
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true,
        renderBullet: function (index, className) {
          return '<span class="' + className + '">' + (index + 1) + '</span>';
        }
      },
    });
  }




  // const singleProdSliderNode = document.querySelector('.singleProduct .content .slider');
  //
  // if(singleProdSliderNode){
  //   let prodSliderNode;
  //   function toggleProdSlider () {
  //
  //     if(breakpoint.matches && !prodSliderNode){
  //       console.log("kndvc");
  //       prodSliderNode = new Swiper(singleProdSliderNode, {
  //         direction: "horizontal",
  //         loop: true,
  //         slidesPerView: 1,
  //         allowTouchMove: true,
  //         slidesOffsetAfter: 50,
  //         slidesOffsetBefore: 15,
  //         pagination: {
  //           el: '.swiper-pagination',
  //           clickable: true,
  //           renderBullet: function (index, className) {
  //             return '<span class="' + className + '">' + (index + 1) + '</span>';
  //           },
  //         },
  //         breakpoints: {
  //           576: {
  //             slidesPerView: 1,
  //           }
  //         }
  //       });
  //     } else if(!breakpoint.matches && prodSliderNode){
  //       prodSliderNode.destroy( true, true );
  //       prodSliderNode = null;
  //     }
  //   }
  //   toggleProdSlider();
  //   window.addEventListener('resize', toggleProdSlider);
  // }


  // Accordion

  const Accordion = function(options) {
    const element =
        typeof options.element === "string"
          ? document.getElementById(options.element)
          : options.element,
      openTab = options.openTab,
      oneOpen = options.oneOpen || false,
      titleClass = "js-Accordion-title",
      contentClass = "js-Accordion-content";

    render();

    function render() {
      // attach classes to buttons and containers
      [].forEach.call(element.querySelectorAll("button"), function(item) {
        item.classList.add(titleClass);
        item.nextElementSibling.classList.add(contentClass);
      });

      // attach only one click listener
      element.addEventListener("click", onClick);

      // accordion starts with all tabs closed
      closeAll();

      // sets the open tab - if defined
      if (openTab) {
        open(openTab);
        [...element.querySelectorAll("." + contentClass)][
          openTab - 1
        ].style.height = "auto";
      }
    }

    function onClick(e) {
      if (e.target.className.indexOf(titleClass) === -1) {
        return;
      }

      if (oneOpen) {
        closeAll();
      }
      e.target.classList.toggle("active");
      toggle(e.target.nextElementSibling);
    }

    function closeAll() {
      [].forEach.call(element.querySelectorAll("." + contentClass), function(
        item,
        index
      ) {
        item.style.height = 0;
        item.previousElementSibling.classList.remove("active");
      });
    }

    function toggle(el) {
      // getting the height every time in case
      // the content was updated dynamically
      const height = el.scrollHeight;

      if (el.style.height === "0px" || el.style.height === "") {
        el.style.height = height + "px";
      } else {
        el.style.height = 0;
      }
    }

    function getTarget(n) {
      return element.querySelectorAll("." + contentClass)[n - 1];
    }

    function open(n) {
      const target = getTarget(n);

      if (target) {
        if (oneOpen) {
          closeAll();
        }
        target.previousElementSibling.classList.add("active");
        target.style.height = target.scrollHeight + "px";
      }
    }

    function close(n) {
      const target = getTarget(n);

      if (target) {
        target.style.height = 0;
      }
    }

    function destroy() {
      element.removeEventListener("click", onClick);
    }

    return {
      open,
      close,
      destroy
    };
  };

  const accordionNode = document.getElementById("accordion");

  if (accordionNode) {
    new Accordion({
      element: accordionNode,
      // openTab: 1,
      oneOpen: false
    });
  }

  const accordion2Node = document.getElementById("accordion2");

  if (accordion2Node) {
    new Accordion({
      element: accordion2Node,
      // openTab: 1,
      oneOpen: false
    });
  }

  //select

  const select1 = document.getElementById("select1");

  if (select1) {
    new SlimSelect({
      select: select1,
      placeholder: 'Kies uw branche',
      showSearch: false,
    });
  }

  const select2 = document.getElementById("select2");

  if (select2) {
    new SlimSelect({
      select: select2,
      placeholder: 'Aantal lampen binnen uw bedrijf',
      showSearch: false,
    });
  }



  // isotope

  const allProjects = document.querySelector(".allProjects");

  if (allProjects) {
		const grid = allProjects.querySelector('.allProjects-grid');
		const buttonsGroup = allProjects.querySelector('.allProjects-list');
		const buttons = allProjects.querySelectorAll('.allProjects-item');

		const iso = new Isotope( grid, {
			itemSelector: '.project',
			layoutMode: 'fitRows'
		});

		buttonsGroup.addEventListener('click', function (event) {
			const button = event.target.closest('.allProjects-item--enabled');
			if ( !button ) {
				return;
			}
			if(button.dataset.filter === "*"){
        location.hash = "#alle";
      }else{
        location.hash = button.dataset.filter.replace(".", "#");
      }
    });

    window.addEventListener("hashchange", function (event) {
      chooseTab();
    });

    function chooseTab(){
      const hash = location.hash;
      let filterValue = "";
      if(hash === "#alle"){
        filterValue = "*";
      }else{
        filterValue = hash.replace("#", ".");
      }
      if(filterValue){
        buttons.forEach(function(btn){
          if(btn.dataset.filter.indexOf(filterValue) !== -1){
            btn.classList.add('active');
          }else{
            btn.classList.remove('active');
          }
        });
        iso.arrange({ filter: filterValue });
      }
    }

    chooseTab();

  }

  const $blockBtns = $( ".block-btn" );

  if($blockBtns.length){
    $blockBtns.click(function(event){
      const $btn = $(this);
      const $content = $(this).prev();
      const $extra = $content.find('.block-extra');
      if($content.hasClass('open')){
        $content.removeClass('open');
        $extra.slideUp();
        $btn.html('Show more');

      }else{
        $content.addClass('open');
        $extra.show({
          complete: function(){
            $extra.css('display', 'inline');
          }
        });
        $btn.html('Show less');
      }
    })
  };


  // calculator
  const calculatorNode = $('#calculator');

  if(calculatorNode.length){
    const $industryInput = $("input[name='industry']");
    const $industrieTypeInput = $("input[name='industrie_type']");
    const $m2Input = $("input[name='m2']");
    const $lampenInput = $("input[name='lampen']");
    const $priceInput = $("input[name='price']");

    const $moneySavingField = $("#money-saving");
    const $co2SavingField = $("#co2-saving");
    const $treesSavingField = $("#trees-saving");

    const data = {
      "Kantoor" : {
        old_power: 86,
        new_power: 28,
        multiplier: 0.2
      },
      "Winkel" : {
        old_power: 75,
        new_power: 20,
        multiplier: 2
      },
      "TL Armatuur" : {
        old_power: 130,
        new_power: 35,
        multiplier: 1 / 12
      },
      "High-Bay": {
        old_power: 450,
        new_power: 100,
        multiplier: 1 / 60
      }
    };

    const options = {
      type: $industryInput.val(),
      m2: parseInt($m2Input.val()),
      lampen: parseInt($lampenInput.val()),
      hours: 8,
      days: 5,
      price: 0.22,
      _industrie_type: $industrieTypeInput.val(),
    };

    const $extraBtn = calculatorNode.find('.calculator-extraBtn');
    const $extraContent = calculatorNode.find('.calculator-extraContent');
    $extraBtn.click(function() {
      if($extraBtn.hasClass('active')){
        $extraBtn.removeClass('active');
        $extraContent.slideUp();
      }else{
        $extraBtn.addClass('active');
        $extraContent.slideDown();
      }
    });

    const $extraRadios = calculatorNode.find('.calculator-extraRadios');

    function calculate(){
      const {lampen, type, hours, days, price} = options;
      const kwh_old_lamp = lampen * data[type]['old_power'] * hours * days * 52/1000;
      const kwh_new_lamp = lampen * data[type]['new_power'] * hours * days * 52/1000;
      const saving_kwh = kwh_old_lamp - kwh_new_lamp;
      const old_cost = kwh_old_lamp * price;
      const new_cost = kwh_new_lamp * price;
      const money_saving = Math.round(old_cost - new_cost);
      const old_co2 = Math.round(kwh_old_lamp * 0.649);
      const new_co2 = Math.round(kwh_new_lamp * 0.649);
      const saving_co2 = Math.round(old_co2 - new_co2 * 0.0459);
      const saving_trees = Math.round(saving_kwh / 49.88);
      return {
        hours,
        days,
        price,
        kwh_old_lamp,
        kwh_new_lamp,
        saving_kwh,
        old_cost,
        new_cost,
        money_saving,
        old_co2,
        new_co2,
        saving_co2,
        saving_trees
      }
    }

    function renderValues({money_saving, saving_co2, saving_trees}){
      $moneySavingField.text(`€ ${money_saving}`);
      $co2SavingField.text(`${saving_co2}`);
      $treesSavingField.text(`${saving_trees}`);
    }

    function translateToM2(lampen){
      const m2 = Math.ceil(lampen / data[options.type]['multiplier']);
      options.lampen = lampen;
      $m2Input.val(m2);
      options.m2 = m2;
    }

    function translateToLampen(m2){
      const lampen = Math.ceil(m2 * data[options.type]['multiplier']);
      options.m2 = m2;
      $lampenInput.val(lampen);
      options.lampen = lampen;
    }


    $industryInput.change(function(event) {
      const value = $(this).val();
      if(value === "Industrie"){
        $extraRadios.show();
        options.type = options._industrie_type;
      }else{
        $extraRadios.hide();
        options.type = value;
      }
      translateToM2(options.lampen);
      renderValues(calculate());
    });

    $industrieTypeInput.change(function(event) {
      options.type = $(this).val();
      options._industrie_type = $(this).val();
      translateToM2(options.lampen);
      renderValues(calculate());
    });

    $m2Input.keyup(function(event) {
      const value = parseInt($(this).val()) || 0;
      translateToLampen(value);
      renderValues(calculate());
    });

    $lampenInput.keyup(function(event) {
      const value = parseInt($(this).val()) || 0;
      translateToM2(value);
      renderValues(calculate());
    });

    $priceInput.keyup(function(event) {
      options.price = parseFloat($(this).val()) || 0;
      renderValues(calculate());
    });


    //calculators selects

    const selectHours = document.getElementById("select-hours");

    if (selectHours) {
      new SlimSelect({
        select: selectHours,
        showSearch: false,
        onChange: ({value}) => {
          options.hours = parseInt(value);
          renderValues(calculate());
        }
      });
    }

    const selectDays = document.getElementById("select-days");

    if (selectDays) {
      new SlimSelect({
        select: selectDays,
        showSearch: false,
        onChange: ({value}) => {
          options.days = parseInt(value);
          renderValues(calculate());
        }
      });
    }

    $('.wordpress-ajax-form').on('submit', function(e) {
      e.preventDefault();
      $('.emailSent').hide();
      $('.sendEmail').text('Verstuur...');
      $('.sendEmail').prop('disabled', true);
      const {
        hours,
        days,
        price,
        kwh_old_lamp,
        kwh_new_lamp,
        saving_kwh,
        old_cost,
        new_cost,
        money_saving,
        old_co2,
        new_co2,
        saving_co2,
        saving_trees
      } = calculate();

      var $form = $(this);

      jQuery.ajax({
        url:$form.attr('action'),
        type : 'post',
        data : {
          action : jQuery('#custom_action').val(),
          email : jQuery('#semail').val(),
          CURRENT_USAGE_KWH : kwh_old_lamp,

          F : hours,
          G : days,
          H : price,

          NEW_USAGE_KWH : kwh_new_lamp,

          CURRENT_USAGE_EURO : old_cost,
          NEW_USAGE_EURO : new_cost,

          DIFF_USAGE_KWH : saving_kwh,
          DIFF_USAGE_EURO : money_saving,

          DIFF_USAGE_MAINTENANCE_EURO : money_saving * 0.25,
          TOTAL_MONETARY_SAVINGS_PER_YEAR : (money_saving * 0.25) + money_saving
        },
        success : function( response ) {
          $('.emailSent').show();
          $('#semail').val("");
          $('.sendEmail').prop('disabled', false);
          $('.sendEmail').text('Verstuur');
        }
      });
    });
  }

  //filterBar

  const filterBar = document.querySelector('.filterBar');

  if(filterBar){
    const filterBarElements = filterBar.querySelectorAll('.filterBar-element');
    document.addEventListener('click', function (event) {
      const btn = event.target.closest('.filterBar-btn');
      const submenu = event.target.closest('.filterBar-submenu');

      if(submenu){
        return
      }

      filterBarElements.forEach(function (elem) {
        elem.classList.remove('open');
      });

      if(!btn){
        return
      }

      btn.parentElement.classList.add('open');
    })
  }


  /**
   *  Добавить в закладки
   * */

//  Сначала мы определяем элемент, в котором действие «Добавить в закладку» будет срабатывать
  var triggerBookmark = $(".js-bookmark"); // Это должен быть тег `a`

  triggerBookmark.click(function() {

    if (window.sidebar && window.sidebar.addPanel) { // Firefox <23

      window.sidebar.addPanel(document.title,window.location.href,'');

    } else if(window.external && ('AddFavorite' in window.external)) { // Internet Explorer

      window.external.AddFavorite(location.href,document.title);

    } else if(window.opera && window.print || window.sidebar && ! (window.sidebar instanceof Node)) { // Opera <15 и Firefox >23
      /**
       *  Для Firefox <23 и Opera <15 нет необходимости добавлять JS в закладки
       * Единственное, что нужно, это `title` and a `rel="sidebar"`
       */
      triggerBookmark.attr('rel', 'sidebar').attr('title', document.title);
      return true;

    } else { // Для других браузеров (в основном WebKit) мы используем простое оповещение, чтобы информировать пользователей о том, что они могут добавлять в закладки с помощью ctrl + D / cmd + D

      alert('U kunt deze pagina bookmarken door op te klikken ' + (navigator.userAgent.toLowerCase().indexOf('mac') != - 1 ? 'Command/Cmd' : 'CTRL') + ' + D op toetsenbord.');

    }
    // Если у вас есть что-то в `href` вашего триггера
    return false;
  });

  // menu

  const header = document.querySelector('.header');
  const overlay = document.querySelector('.overlay');
  const burger = header.querySelector('.burger');

  function toggleMenu(){
    overlay.classList.toggle('open');
    header.classList.toggle('open');
  }

  function closeMenu(){
    overlay.classList.remove('open');
    header.classList.remove('open');
  }

  burger.addEventListener('click', function(){
    toggleMenu();
  });

  overlay.addEventListener('click', function(){
    closeMenu();
  });

  //mob sub menu

  const $withChild = $('.menu-item-has-children > a');

  if($withChild.length){
    $withChild.click(function (event) {
      event.preventDefault();
      if($(this).parent().hasClass('open')){
        $(this).parent().removeClass('open');
        $(this).next().slideUp(200);
      } else{
        $(this).parent().addClass('open');
        $(this).next().slideDown(200);
      }
    })
  }

  const progressCards = $('.progress-cards');

  if(progressCards.length){
    const offsetTop = progressCards.offset().top - 600;
    $(window).scroll(function() {
      const scroll = $(window).scrollTop();
      if (scroll >= offsetTop && !progressCards.hasClass('active')) {
        progressCards.addClass('active');
      }
    });
  }

  const projectsBlock = $('.projects');

  if(projectsBlock.length){
    const offsetTop = projectsBlock.offset().top - 300;
    // console.log(offsetTop);
    // function makeNewPosition(){
    //   var h = $('.box').height() - 50;
    //   var w = $('.box').width() - 50;
    //
    //   var nh = Math.floor(Math.random() * h);
    //   var nw = Math.floor(Math.random() * w);
    //
    //   return [nh,nw];
    // }
    $(window).scroll(function() {
      const scroll = $(window).scrollTop();
      if (scroll >= offsetTop && !projectsBlock.hasClass('active')) {
        projectsBlock.addClass('active');
      }
    });
  }
});

let ready = (callback) => {
  if (document.readyState != "loading") callback();
  else document.addEventListener("DOMContentLoaded", callback);
};

ready(() => {
  const sliderOtherProd = new Swiper('.sliderContainer', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: '1',
    // spaceBetween: 30,
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + '</span>';
      },
    },
    // Navigation arrows
    // navigation: {
    //     nextEl: '.swiper-button-next',
    //     prevEl: '.swiper-button-prev',
    // },
    // And if we need scrollbar
    // scrollbar: {
    //     el: '.swiper-scrollbar',
    // },
  });
  const sliderProd = new Swiper('.containerProdSlider', {
    // Optional parameters
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    breakpoints: {
      768: {
        slidesPerView: 1,
      },
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
  });
});

