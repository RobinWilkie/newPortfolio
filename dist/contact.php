<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="google-site-verification" content="V4r9lw7q54hpLRxTy--9fsRuENylCD7bvbteV_5Xqc0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Robin Wilkie web design and development in Glasgow Scotland">
    <meta name="author" content="Robin Wilkie">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <title>Contact Robin Wilkie - Web Development</title>
</head>

<body>
    <header>
        <a href="index.html"><img src="./img/logo-home.png" alt="logo for Robin Wilkie" class="logoHome"></a>
        <div class="menu-btn">
            <div class="btn-line"></div>
            <div class="btn-line"></div>
            <div class="btn-line"></div>
        </div>

        <nav class="menu">
            <div class="menu-branding">
                <div class="rwLogo"></div>
            </div>
            <ul class="menu-nav">
                <li class="nav-item">
                    <a href="index.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="about.html" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="work.html" class="nav-link">Work</a>
                </li>
                <li class="nav-item current">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="https://www.robinwilkie.co.uk/blog/" target="_blank" class="nav-link">Blog</a>
                </li>
            </ul>
        </nav>
    </header>

    <main id="contact">
        <h1 class="lg-heading text-secondary">CONTACT</h1>
        <h2 class="sm-heading">Robin Wilkie</h2>

        <div class="contactContainer">
            <div class="contact-form">
                <form id="contactForm" role="form" method="post" action="">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="eg: John Smith" required>
                    <label>Email</label>
                    <input type="email" name="email" placeholder="eg: example@something.com" required>
                    <label>Message</label>
                    <textarea name="message" rows="6" cols="30" placeholder="Enter message here..." required></textarea>
                    <button class="hvr-ripple-out" type="submit" value="submit">Submit</button>
                    <?php 
    
                    if ($_SERVER['REQUEST_METHOD'] === 'POST'){ 
                
                    if (!isset($_POST['name']) || !isset($_POST['message']) || !isset($_POST['email'])){ 
                
                        $errors .= 'Please complete all the required fields.'; 
                     } 
                
                    if ($_POST['name'] != "") { 
                        $_POST['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING); 
                        if ($_POST['name'] == "") { 
                            $errors .= 'Name is not valid.<br/>'; 
                        }
                    }
                 
                    if ($_POST['message'] != "") { 
                        $_POST['message'] = filter_var($_POST['message'], FILTER_SANITIZE_STRING); 
                        if ($_POST['message'] == "") { 
                            $errors .= 'Message is not valid.<br/>'; 
                        }
                    }
                 
                    if ($_POST['email'] != "") { 
                        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
                            $errors .= 'Email is not valid.<br/>'; 
                        }
                    }
                 
                    if(!$errors) { 
                        $to = 'admin@robinwilkie.co.uk'; 
                        $from = 'admin@robinwilkie.co.uk'; 
                        $subject = 'Contact Form Completed'; 
                        $content = "
                        First Name: " . $_POST['name'] . "
                        Message: " . $_POST['message'] . "
                        Email: " . $_POST['email']; 
                
                        if(mail($to, $subject, $content, 'From:' . $from)){
                            echo '<p class="alert alert-success">Thank you for contacting me, your message has been sent.</p>'; 
                        } else { 
                           echo '<p class="alert alert-danger">There was a problem sending your message</p>'; 
                        } 
                    } else { 
                        echo '<p class="alert alert-danger">' . $errors . '</p>'; 
                    }
                }
                ?>
                </form>
            </div>
            <div class="contactLogo">
                <i class="far fa-paper-plane fa-10x"></i>
            </div>
        </div>

    </main>

    <footer class="main-footer">
        &copy; Robin Wilkie - 2018
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>