// Tiny slider config

let slider = tns({
  container: ".slider",
  controls: false,
  nav: true,
  items: 3,
  slideBy: "page",
  controlsPosition: "bottom",
  navPosition: "bottom",
  autoplay: true,
  autoplayTimeout: 3000,
  autoplayButtonOutput: false,
  controlsContainer: false,
  swipeAngle: false,
  speed: 700,
  responsive: {
    0: {
      items: 1,
      nav: false,
      controls: true,
    },
    768: {
      items: 1,
      controls: true,
      nav: false,
    },
    1280: {
      items: 2,
      controls: false,
      nav: true,
    },
    1400: {
      items: 3,
      nav: true,
      controls: false,
    },
  },
});
