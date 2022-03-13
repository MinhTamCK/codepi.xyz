import notyf from "./notyf";

const contactForm = document.forms[0];

if (contactForm) {
  // init formcarry
  formcarry({
    form: "1BO-aim4JQV",
    element: "#my-contact",
    // Success callback, you can show alert messages
    // or redirect the user in this function
    onSuccess: function (response) {
      notyf.success("Your message has been sent.");
      contactForm.reset();
      contactForm.elements["submit"].disabled = false;
    },
    // Error callback, a good place to show errors 🗿
    onError: function (error) {
      notyf.error("Sending failed, try again later.");
      console.log(error);
      contactForm.elements["submit"].disabled = false;
    },
  });

  contactForm.onsubmit = (e) => {
    e.preventDefault();
    e.target.elements["submit"].disabled = true;
  };
}
