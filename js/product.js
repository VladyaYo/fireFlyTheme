// let ready = (callback) => {
//     if (document.readyState != "loading") callback();
//     else document.addEventListener("DOMContentLoaded", callback);
// };
//
// ready(() => {
//     const sliderOtherProd = new Swiper('.sliderContainer', {
//         // Optional parameters
//         direction: 'vertical',
//         loop: true,
//         slidesPerView: '3',
//         spaceBetween: 30,
//         autoplay: {
//             delay: 2500,
//             disableOnInteraction: false,
//         },
//         // If we need pagination
//         pagination: {
//             el: '.swiper-pagination',
//             clickable: true,
//         },
//         // Navigation arrows
//         // navigation: {
//         //     nextEl: '.swiper-button-next',
//         //     prevEl: '.swiper-button-prev',
//         // },
//         // And if we need scrollbar
//         // scrollbar: {
//         //     el: '.swiper-scrollbar',
//         // },
//     });
//     const sliderProd = new Swiper('.containerProdSlider', {
//         // Optional parameters
//         direction: 'horizontal',
//         loop: true,
//         slidesPerView: '1',
//         // autoplay: {
//         //     delay: 2500,
//         //     disableOnInteraction: false,
//         // },
//         // pagination: {
//         //     el: '.swiper-pagination',
//         //     clickable: true,
//         // },
//         // Navigation arrows
//         navigation: {
//             nextEl: '.swiper-button-next',
//             prevEl: '.swiper-button-prev',
//         },
//         // And if we need scrollbar
//         // scrollbar: {
//         //     el: '.swiper-scrollbar',
//         // },
//     });
// });