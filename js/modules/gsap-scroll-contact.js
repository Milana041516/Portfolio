export function gsapContactScroll() {
    //gsap animations
    gsap.registerPlugin(ScrollTrigger);
    gsap.registerPlugin(ScrollToPlugin);

    //scroll to link 
const contactLinks = document.querySelectorAll(".contact-scroll a");

function scrollLink(e) {    
        e.preventDefault(); 
        console.log(e.currentTarget.hash);
        let selectedLink = e.currentTarget.hash;
        gsap.to(window, {duration: 1, scrollTo:{y:`${selectedLink}`, offsetY:100 }});
}

contactLinks.forEach((link) => {
    link.addEventListener("click", scrollLink);
});
}