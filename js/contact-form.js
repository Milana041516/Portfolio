export const contactForm = () => {
const form = document.querySelector(".contact-form");
const feedback = document.querySelector("#feedback");
// const submitBtn = document.querySelector("#submit-action");

function regForm(event) {
    event.preventDefault();
    const url = "sendmail.php";
    const thisForm = event.currentTarget;
    const formdata = 
    "fname=" +thisForm.elements.fname.value+
    "&lname=" +thisForm.elements.lname.value+
    "&email=" +thisForm.elements.email.value+
    "&message=" +thisForm.elements.message.value;

    console.log(formdata);

    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: formdata
    })
    .then(response => response.json())
    .then(response => {
        console.log(response);
        feedback.innerHTML = "";
        if(response.errors) {
            response.errors.forEach(error => {
                const errorElement = document.createElement("p");
                errorElement.textContent = error;
                feedback.appendChild(errorElement);
            });
        } else {
            form.reset();
            const messageElement = document.createElement("p");
            messageElement.textContent = response.message;
            feedback.appendChild(messageElement);
        }
        feedback.scrollIntoView({behavior: 'smooth', block: 'end'});
    })
    .catch(error=> {
        console.log(error);
        feedback.innerHTML = "";
        feedback.innerHTML = `<p>Sorry there seems to be an issue. Either you're using an older browser or javascript is disabled.</p>`;
    })
}
form.addEventListener("submit", regForm);

};