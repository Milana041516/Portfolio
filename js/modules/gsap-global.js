export function gsapGlobal() {
    //gsap animations
    gsap.registerPlugin(ScrollTrigger);
    gsap.registerPlugin(ScrollToPlugin);

    //links appearing
gsap.from('.logo-tablet', {
    opacity: 0,
    delay: 0.5,
    x:20,
    duration: 1
  });
  
  const navMenu = document.querySelector('.nav-menu');
  
  
  gsap.from(navMenu.children ,{
    opacity: 0,
    x: 0,
    duration: 1,
    delay: 1,
    stagger: {
      amount: 1
    }
  });
  
  gsap.from('.contact-tablet', {
    opacity: 0,
    delay: 1.5,
    x:20,
    duration: 1
  });
  
  //text, heading appearing
  gsap.utils.toArray('.heading').forEach((title, index) => {
    gsap.fromTo(title, {
      opacity: 0,
      x: 100,  
    }, {
      opacity: 1,
      x: 0,   
      duration: 1.5, 
      scrollTrigger: {
        trigger: title,
        start: "top 80%", 
        end: "bottom top",
        toggleActions: "play none none none"
      }
    });
  });
}