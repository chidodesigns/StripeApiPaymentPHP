<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
    <title>Pay Page</title>
</head>

<body>
    <header class="blog-header py-3 mb-3">
        <div class="container">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="link-secondary" href="/">
                        <img class="logo" src="images/devlogo.png" />
                    </a>
                </div>
                <a class="col-4 text-center" href="/">
                    <h1 class="display-3 get-docs">GET DOCS</h1>
                </a>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
                </div>
            </div>
        </div>
    </header>
    <main class="container">
        <div class="row my-4 container">

            <div class="col-md-5 col-lg-4 order-md-last recently_looked py-5" style="height: 50vh;">
                <p class="lead mb-3">
                    Recently Looked At:
                </p>
                <div>

                </div>
            </div>
            <div class="col-md-7 col-lg-8 form-container py-2">
                <form id="payment-form">
                    <div class="my-3">
                        <div class="form-check">
                            <input class="form-check-input" name="how_to_kill_php_tasks" type="checkbox" value="how to kill php tasks" id="how_to_kill_php_tasks">
                            <label class="form-check-label" for="how_to_kill_php_tasks">
                                How to kill your PHP tasks
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="javascript for enthusiast" id="javascript_for_enthusiast" name="javascript_for_enthusiast">
                            <label class="form-check-label" for="javascript_for_enthusiast">
                                Javascript for the enthusiast
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="css tips" name="css_tips" id="css_tips">
                            <label class="form-check-label" for="css_tips">
                                CSS Tips for the best effects (* knowledge of HTML assumed *)
                            </label>
                        </div>
                    </div>
                    <hr />
                    <div>
                        <label for="firstname" class="form-label">Firstname</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="" required>
                        <div class="invalid-feedback">
                            Firstname is required
                        </div>
                    </div>
                    <div>
                        <label for="lastname" class="form-label">Lastname</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="" required>
                        <div class="invalid-feedback">
                            Lastname is required
                        </div>
                    </div>
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="" required>
                        <div class="invalid-feedback">
                            Email is required
                        </div>
                    </div>

                    <hr />
                    <div class="row gy-3">

                        <div id="payment-element">

                        </diV>
                    </div>

                    <button id="submit">
                        <div class="spinner hidden" id="spinner"></div>
                        <span id="button-text">Pay now</span>
                    </button>
                </form>
            </div>
            <div id="payment-message" class="hidden col-md-12">
                <h1>Thank You <span id="firstname-output"></span> <span id="lastname-output"></span></h1>
                <p class="lead">Payment successful. Your order for:</p>
                <div id="customer-selection">

                </div>
                <p>...is being processed</p>
            </div>
        </div>

    </main>
    <footer class="footer mt-auto py-3 text-center">
        <p class="mb-1">&copy; 2017–2021 GETDOCS</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="js/charge.js"></script>
</body>

</html>