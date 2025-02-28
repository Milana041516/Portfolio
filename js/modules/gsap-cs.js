export function gsapCaseStudy() {
    //gsap animations
    gsap.registerPlugin(ScrollTrigger);
    gsap.registerPlugin(ScrollToPlugin);

    //case-study text appearing
gsap.from('.text-info-cs', {
    opacity: 0,
    y: 100, 
    duration: 1,
    scrollTrigger: {
      trigger: '.text-info-cs',
      start: "top 65%",
      end: "bottom top",
      toggleActions: "play none none reverse",
      markers: false
    }
  });
}