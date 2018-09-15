<?php ob_start(); ?>

                            <div class="container-fluid" style="background-image: url('assets/images/big-alaska.jpeg'); background-repeat: no-repeat; background-size: cover; height: 1350px;">
                                <div class=" justify-content-center" style="bottom: -300px; position: relative;">
                                    <div class="container d-flex justify-content-center">
                                        <img src="assets/images/jeanforteroche.jpeg" class="rounded-circle mb-5 img-fluid w-25 h-25" style="width:100%%; box-shadow: 7px 7px 20px;">
                                    </div>
                                    <h1 style="font-family: Lobster; text-align: center; font-size: 4em; color: #fff; text-shadow: 7px 7px 20px #000000;">Oups...Vous êtes sur ma page d'erreur !</h1>
                                    <h1 style="font-family: Lobster; text-align: center; font-size: 3em; color: #fff; text-shadow: 7px 7px 20px #000;" class="mt-3">Message :</h1>
                                    <h1 style="font-family: Lobster; text-align: center; font-size: 2em; color: #fff; text-shadow: 7px 7px 20px #000;" class="mt-4 d-flex justify-content-center">"<?php echo $message; ?>"</h1>
                                    <div class="container d-flex justify-content-center mt-5">
                                        <button type="button" class="btn btn-md btn-warning pl-4 pr-4" style="font-family: Roboto; font-size: 1.5em; text-transform: uppercase;">
                                            <a href="javascript:history.go(-1)" style="text-decoration: none; color: #000; font-family: Roboto; font-size: 1.1em;">Retour</a>
                                        </button>
                                    </div>
                                </div>
                            </div>

<?php $content = ob_get_clean(); ?>

<?php require('templateError.php'); ?>