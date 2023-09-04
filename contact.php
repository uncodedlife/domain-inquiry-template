<?php

// Check if the email field from the form has been set
if (isset($_POST['email'])) {

    // Destination email configuration: Adjust as necessary
    $email_to = "eternal.elysium.echoes@gmail.com";
    $email_subject = "My offer for koenvaessen.nl";

    // Gather form data
    $name = $_POST['name']; // required field
    $email_from = $_POST['email']; // required field
    $telephone = $_POST['phone']; // optional field
    $price = $_POST['price']; // optional field
    $comments = $_POST['comments']; // required field

    // Build the email message
    $email_message = "Form details below.\n\n";

    // Helper function to clean input data to prevent email header injection
    function clean_string($string) {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    // Add cleaned data to email content
    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email_from) . "\n";
    $email_message .= "Telephone: " . clean_string($telephone) . "\n";
    $email_message .= "Price(€): " . clean_string($price) . "\n";
    $email_message .= "Comments: " . clean_string($comments) . "\n";

    // Construct email headers
    $headers = 'From: ' . $email_from . "\r\n" .
        'Reply-To: ' . $email_from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Send the email
    @mail($email_to, $email_subject, $email_message, $headers);

?>

<!-- Begin HTML Structure -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic metadata -->
    <meta charset="utf-8">
    <title>Sales Inquery || KoenVaessen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link to external stylesheets and fonts: Adjust paths or versions if necessary -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:300,700" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    
    <!-- Local Stylesheet: Adjust path if necessary -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <section class="bg-alt hero p-0">
        <div class="container-fluid">
            <div class="row">

                <!-- Thank you message after form submission -->
                <div class="bg-faded col-sm-6 text-center col-fixed">
                    <div class="vMiddle">
                        <h1 class="pt-4 h2">
                            <span>Thank you for your offer, I will contact as soon as possible. Cheers !!!</span>
                        </h1>
                        <div class="row d-md-flex text-center justify-content-center text-primary action-icons">
                            <div class="col-sm-4">
                                <p><em class="ion-ios-chatbubble-outline icon-md"></em></p>
                                <p class="lead"><a href="mailto:eternal.elysiym.echoes@gmail.com">Elysiym Echoes</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile details: Adjust text/content as necessary -->
                <div class="col-sm-6 offset-sm-6 px-0">
                    <section class="bg-alt">
                        <div class="row height-100">
                            <div class="col-sm-8 offset-sm-2 mt-2">
                                <h1 class="pt-4 h2"><span class="text-green">Elysium Echoes</span></h1>
                                <span class="text-muted">Amsterdam, Netherlands</span>
                                <p><span>Web Strategist, Full Stack Developer & UX/ UI Designer</span></p>
                                <br/>
                                <a target="_blank" rel="nofollow" href="https://">[Insert Link Text Here]</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php } ?>