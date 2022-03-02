
     // This is your test publishable API key.
      const stripe = Stripe("pk_test_apAOqypWTR5FH6nq7TfvVNjC");

      // The items the customer wants to buy
      const items = [{ id: "xl-tshirt" }];
   
      //    Get Inputs Items From Form

    
      let elements;
      
    initialize();
    checkStatus();

      document
        .querySelector("#payment-form")
        .addEventListener("submit", handleSubmit);

      // Fetches a payment intent and captures the client secret
      async function initialize() {
        const { clientSecret } = await fetch("/charge.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ items}),
        }).then((r) => r.json());
      
        elements = stripe.elements({ clientSecret });
      
        const paymentElement = elements.create("payment");
        paymentElement.mount("#payment-element");
      }
      
      async function handleSubmit(e) {
    
        handleClientDetails();

        e.preventDefault();

        setLoading(true);
      
        const { error } = await stripe.confirmPayment({
          elements,
          confirmParams: {
            // Make sure to change this to your payment completion page
            return_url: "http://localhost:8080/index.php",
          },
        });
      
        // This point will only be reached if there is an immediate error when
        // confirming the payment. Otherwise, your customer will be redirected to
        // your `return_url`. For some payment methods like iDEAL, your customer will
        // be redirected to an intermediate site first to authorize the payment, then
        // redirected to the `return_url`.
        if (error.type === "card_error" || error.type === "validation_error") {
          showMessage(error.message);
        } else {
          showMessage("An unexpected error occured.");
        }
      
        setLoading(false);
      }
      
      // Fetches the payment intent status after payment submission
      async function checkStatus() {
        const clientSecret = new URLSearchParams(window.location.search).get(
          "payment_intent_client_secret"
        );
        
        if (!clientSecret) {
          return;
        }
      
        const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);
      
        switch (paymentIntent.status) {
          case "succeeded":
            showMessage("Payment succeeded!");
            break;
          case "processing":
            showMessage("Your payment is processing.");
            break;
          case "requires_payment_method":
            showMessage("Your payment was not successful, please try again.");
            break;
          default:
            showMessage("Something went wrong.");
            break;
        }
      }

      // ------- Handle Client Form Details -------
      function handleClientDetails () {
        let checkedValue = []
        const inputCheckboxElements = document.getElementsByClassName('form-check-input');
        const inputFirstname = document.getElementById('firstname').value
        const inputLastname = document.getElementById('lastname').value
        const inputEmail = document.getElementById('email').value

        for(let i=0; inputCheckboxElements[i]; ++i){
            if(inputCheckboxElements[i].checked){
                checkedValue.push(inputCheckboxElements[i].value);
            }
        }

        //  Acts As DB
        localStorage.setItem("firstname", inputFirstname);
        localStorage.setItem("lastname", inputLastname);
        localStorage.setItem("email", inputEmail);
        localStorage.setItem('description', checkedValue)

        
      }
      
      // ------- UI helpers -------
      
      function showMessage(messageText) {
        const messageContainer = document.querySelector("#payment-message");
        const recentlyLookEl = document.querySelector(".recently_looked")
        const formContainer = document.querySelector(".form-container")

        const firstname = document.querySelector('#firstname-output')
        const lastname = document.querySelector('#lastname-output')
        const customerSelectionEl = document.querySelector('#customer-selection')
        

        messageContainer.classList.remove("hidden");
        recentlyLookEl.classList.add("hidden")
        formContainer.classList.add("hidden")

        firstname.textContent = localStorage.getItem('firstname')
        lastname.textContent - localStorage.getItem('lastname')
        customerSelections = localStorage.getItem('description')
        // inputArray = customerSelections.split(",")
        customerSelectionEl.textContent = customerSelections
    
        setTimeout(function () {
          messageContainer.classList.add("hidden");
          recentlyLookEl.classList.remove("hidden")
          formContainer.classList.remove("hidden")
          messageText.textContent = "";
        }, 10000);
      }
      
      // Show a spinner on payment submission
      function setLoading(isLoading) {
        if (isLoading) {
          // Disable the button and show a spinner
          document.querySelector("#submit").disabled = true;
          document.querySelector("#spinner").classList.remove("hidden");
          document.querySelector("#button-text").classList.add("hidden");
        } else {
          document.querySelector("#submit").disabled = false;
          document.querySelector("#spinner").classList.add("hidden");
          document.querySelector("#button-text").classList.remove("hidden");
        }
      }