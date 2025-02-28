export function gsapHome() {
    //gsap animations
    gsap.registerPlugin(ScrollTrigger);
    gsap.registerPlugin(ScrollToPlugin);

    //content appearing from left to centre and right to center
gsap.fromTo('.content-gsap-left', {
    x: "-50vw",  
  }, {
    x: "0",  
    delay: .5,
    duration: 1,
    scrollTrigger: {
      trigger: '.content-gsap-left',
      start: "top 80%",  
      end: "top 30%",  
      toggleActions: "play none none reverse",
      markers: false
    }
  });
  
  gsap.fromTo('.content-gsap-right', {
    x: "50vw",  
  }, {
    x: "0",  
    delay: .5,
    duration: 1,
    scrollTrigger: {
      trigger: '.content-gsap-right',
      start: "top 80%",  
      end: "top 30%",  
      toggleActions: "play none none reverse",
      markers: false
    }
  });
}