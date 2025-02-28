export function gsapAbout() {
    //gsap animations
    gsap.registerPlugin(ScrollTrigger);
    gsap.registerPlugin(ScrollToPlugin);

    //about me page scrolling
gsap.from('.info-about', {
    opacity: 0,
    x: -100, 
    duration: 1,
    stagger: {
      amount: 0.5 
    },
    scrollTrigger: {
      trigger: '.info-about',
      start: "top 30%",
      end: "bottom top",
      toggleActions: "play none none reverse", 
      markers: false
    }
  });
  
  gsap.from('.info-picture', {
    opacity: 0,
    x: 100, 
    duration: 1,
    stagger: {
      amount: 0.5 
    },
    scrollTrigger: {
      trigger: '.info-picture',
      start: "top 30%",
      end: "bottom top",
      toggleActions: "play none none reverse",
      markers: false
    }
  });
  
  gsap.from('.info-socials', {
    opacity: 0,
    x: 100, 
    duration: 1,
    stagger: {
      amount: 0.5
    },
    scrollTrigger: {
      trigger: '.info-socials',
      start: "top 80%",
      end: "bottom top",
      toggleActions: "play none none reverse",
      markers: false
    }
  });
  
  gsap.from('.info-education', {
    opacity: 0,
    x: -100, 
    duration: 1,
    stagger: {
      amount: 0.5
    },
    scrollTrigger: {
      trigger: '.info-education',
      start: "top 80%",
      end: "bottom top",
      toggleActions: "play none none reverse",
      markers: false
    }
  });
  
  gsap.from('.info-location', {
    opacity: 0,
    x: 100,
    duration: 1,
    stagger: {
      amount: 0.5
    },
    scrollTrigger: {
      trigger: '.info-location',
      start: "top 80%",
      end: "bottom top",
      toggleActions: "play none none reverse",
      markers: false
    }
  });
  
  gsap.from('.info-why-frontend', {
    opacity: 0,
    y: 100, 
    duration: 1,
    scrollTrigger: {
      trigger: '.info-why-frontend',
      start: "top 80%",
      end: "bottom top",
      toggleActions: "play none none reverse",
      markers: false
    }
  });
  
  
  gsap.from('.info-skills', {
    opacity: 0,
    y: 100, 
    duration: 1,
    scrollTrigger: {
      trigger: '.info-skills',
      start: "top 80%",
      end: "bottom top",
      toggleActions: "play none none reverse",
      markers: false
    }
  });
}