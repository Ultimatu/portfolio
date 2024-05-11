<section class="py-5 wow fadeInUp" data-wow-delay="0.1s" id="contact">
    <h1 class="title pb-3 mb-5">Contactez-moi</h1>
    <p class="mb-4">Contactez-moi pour toute information.</p>
    <form action="{{ route('contact') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control border-0 bg-secondary" id="name"
                        placeholder="Votre Nom" name="name" required value="{{ old('name') }}">
                    <label for="name">Votre Nom</label>
                </div>
                @error('name')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="email" class="form-control border-0 bg-secondary" id="email"
                        placeholder="Your Email" name="email" required value="{{ old('email') }}">
                    <label for="email">Your Email</label>
                </div>
                @error('email')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <input type="text" class="form-control border-0 bg-secondary" id="subject"
                        placeholder="Sujet" name="subject" required value="{{ old('subject') }}">
                    <label for="subject">Sujet</label>
                </div>
                @error('subject')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control border-0 bg-secondary" placeholder="Leave a message here" id="message"
                        style="height: 200px" name="message">{{ old('message') }}</textarea>
                    <label for="message">Message</label>
                </div>
                @error('message')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100 py-3" type="submit">Envoyer</button>
            </div>
        </div>
    </form>
</section>