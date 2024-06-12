function getBotResponse(input) {
    // Simple responses
    if (input == "hello") {
        return "Hello there! What can I do for you?";
    } else if (input == "hi") {
        return "Hi there! What can I do for you?";
    } else if (input == "commands") {
        return "Keywords/Commands: <br/><br/> <strong>Products</strong> - it will show our Products. <br/> <strong>about</strong> - it will show the 'about us'. <br/> <strong>contact</strong>- it will show 'contact info'. <br/> <strong>commands</strong> - it will show 'keyword'. <br/> <strong>how to order</strong> - it will show the instruction. <br/> <strong>location</strong> - it will show our address.";
    } else if (input == "Products") {
        return "Here's our product: <br /><br /> MALE TANKTOPS - Rs. 450.00 <br /> MUSCLETECH SUPPLEMENT - Rs. 900.00 <br /> WOMEN T-SHIRT - Rs. 450.00 <br /> ADJUSTABLE DUMBELLS - Rs. 750.00 <br /> GYMBAG - Rs. 300.00 <br /> WHEY PROTEIN - Rs. 1055.00 <br /> PREWORKOUT - Rs. 835.00 <br /> RESISTANCE BANDS - Rs. 585.00 <br /> KETTLEBELLS - Rs. 680.00 <br /> BOYS SET - Rs. 950.00 <br /> WOMEN SET - Rs. 635.00 <br /> BCCA SUPPLEMENT - Rs. 955.00";
    } else if (input == "about") {
        return "Hi there! <br /><br /> <strong>Ethora</strong> is a fashion outlet situated in Vidyavihar";
    } else if (input == "contact") {
        return "Here's our contact information: <br /><br /> <strong>Email:</strong> Ethora@gmail.com <br /> <strong>Phone Number:</strong> 9769319089 <br /> <strong>Messenger:</strong> @Ethora  <br /> <strong>Address:</strong> KJSCE, Vidyavihar ";
    } else if (input == "how to order") {
        return "Hi There! <br /><br /> To order, you can go to our <strong>Product</strong> section and click the <strong'Add to Cart'></strong> button of your choice. <br /><br /> I hope you understand. Thank you so much!";
    } else if (input == "location") {
        return "Here's our address: <strong>KJSCE, Vidyavihar</strong>";

    /*
    } else if (input == "hi") {
        return "Hi there! What can I do for you?";
    } else if (input == "hi") {
        return "Hi there! What can I do for you?";
    } else if (input == "hi") {
        return "Hi there! What can I do for you?";
    } else if (input == "hi") {
        return "Hi there! What can I do for you?";
    } else if (input == "hi") {
        return "Hi there! What can I do for you?";
    } else if (input == "hi") {
        return "Hi there! What can I do for you?";
    } else if (input == "hi") {
        return "Hi there! What can I do for you?";
    */
   
    } else {
        return "Try asking something else!";
    }
}
