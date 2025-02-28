export function gsapCards() {
    //gsap animations
    gsap.registerPlugin(ScrollTrigger);
    gsap.registerPlugin(ScrollToPlugin);

    //project-cards are appearing
gsap.fromTo('.card-gsap', {
    opacity: 0,
    scale: .1,
  }, {
    opacity: 1,
    scale: 1,
    duration: 1,
    delay: .3,
    stagger: {
      amount: 1
    },
    scrollTrigger: {
      trigger: '.card-gsap', 
      start: "top 80%", 
      end: "top 30%", 
      toggleActions: "play none none reverse", 
      markers: false
    }
  });
}