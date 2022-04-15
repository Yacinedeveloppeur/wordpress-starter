// Tiny slider config

let slider = tns({
  container: ".slider",
  nav: false,
  controls: true,
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
      nav: false,
      controls: true,
    },
    1280: {
      items: 2,
      nav: false,
      controls: true,
    },
    1400: {
      items: 3,
      nav: false,
      controls: true,
    },
  },
});
