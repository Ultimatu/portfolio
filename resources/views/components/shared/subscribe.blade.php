<section class="wow fadeInUp" data-wow-delay="0.1s">
    <div class="bg-secondary text-center p-5">
        <h1 class="text-white font-weight-bold">Souscrire à la newsletter</h1>
        <p class="text-white">Souscrivez à notre newsletter pour recevoir mes dernières nouvelles et mises à jour
            directement dans votre boîte de réception.</p>
        <div class="position-relative w-100">
            <form action="{{ route('newsletter.subscribe') }}" method="POST">
                @csrf
                <input class="form-control bg-dark border-0 w-100 py-3 ps-4 pe-5" type="text"
                    placeholder="Entrez votre adresse email" name="email" required value="{{ old('email') }}">
                <button type="button"
                    class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Souscrire</button>
            </form>
        </div>
    </div>
</section>
