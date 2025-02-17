@extends ('layouts.default')
@section('content')
    <div style="text-align:center;margin:40px">
        <h2>HÔPITAUX, DÉPARTEMENTS, BESOIN DE MATÉRIEL ?</h2>
        <h3>Ce formulaire est à votre disposition pour nous adresser tous vos besoins.</h3>
    </div>
    <div class="wpo-donations-details" style="margin-left:10%;margin-right:10%">
        <h2>......................</h2>
        <div class="row">

            <form action="#">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                    <input type="text" class="form-control" name="name" id="fname" placeholder="Nom et Prenom">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                    <input type="email" class="form-control" name="mail" id="name" placeholder="Adresse e-mail">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                    <input type="text" class="form-control" name="etablissement" id="fname"
                        placeholder="Votre établissement">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                    <input type="text" class="form-control" name="service" id="name"
                        placeholder="Service pour lequel vous travaillez">
                </div>

                <div class="clearfix col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                    <input type="email" class="form-control" name="besoin" id="email"
                        placeholder="De quoi avez-vous besoin ?">
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-12 form-group">
                    <input type="text" class="form-control" name="quantité" id="Adress" placeholder="Quantité">
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-12 form-group">
                    <input type="date" class="form-control" name="date" id="Adress" placeholder="Pour quel date ?">
                </div>

                <div class="col-lg-12 col-12 form-group">
                    <textarea class="form-control" name="note" id="note" placeholder="Message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-left:80%">Envoyer</button>
            </form>

        </div>
    </div>






    <div class="wpo-ne-footer">
        <!-- start wpo-news-letter-section -->
        <section class="wpo-news-letter-section">
            <div class="container">
                <div class="row">
                    <div class="col col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="wpo-newsletter">
                            <h3>Follow us For ferther information</h3>
                            <div class="wpo-newsletter-form">
                                <form>
                                    <div>
                                        <input type="text" placeholder="Enter Your Email" class="form-control">
                                        <button type="submit">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end wpo-news-letter-section -->

@endsection