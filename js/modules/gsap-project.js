export function gsapProjects() {
    //gsap animations
    gsap.registerPlugin(ScrollTrigger);
    gsap.registerPlugin(ScrollToPlugin);

    //project cards for project page are appearing
gsap.from('.projects-project div', {
    opacity: 0,
    y: 30,
    duration: 1,
    delay: 0.5,
    stagger: {
      amount: 1
    },
    scrollTrigger: {
      trigger: '.projects-project div',
      start: "top 80%",
      end: "bottom top",
      toggleActions: "play none none none"
    }
  });
}