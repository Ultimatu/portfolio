<section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
    <h1 class="title pb-3 mb-5">A propos de moi</h1>
    <p>{{ $aboutMe?->description }}
    </p>
    <div class="row mb-4">
        <div class="col-sm-6 py-1">
            <span class="fw-medium text-primary">Nom Complet:</span> Tonde Souleymane
        </div>
        <div class="col-sm-6 py-1">
            <span class="fw-medium text-primary">Date de naissance:</span> {{ $aboutMe?->birthday }}
        </div>
        <div class="col-sm-6 py-1">
            <span class="fw-medium text-primary">Diplôme:</span> {{ $aboutMe?->degree }}
        </div>
        <div class="col-sm-6 py-1">
            <span class="fw-medium text-primary">Experience:</span> {{ $aboutMe?->experience }}
        </div>
        <div class="col-sm-6 py-1">
            <span class="fw-medium text-primary">Téléphone:</span> {{ $aboutMe?->phone }}
        </div>
        <div class="col-sm-6 py-1">
            <span class="fw-medium text-primary">Email:</span> {{ $aboutMe?->email }}
        </div>
        <div class="col-sm-6 py-1">
            <span class="fw-medium text-primary">Addresse:</span> {{ $aboutMe?->address }}
        </div>
        <div class="col-sm-6 py-1">
            <span class="fw-medium text-primary">Freelance:</span> {{ $aboutMe?->freelance_status ? 'Disponible' : 'Non disponible' }}
        </div>
    </div>
    <div class="row g-4">
        <div class="col-md-4 col-lg-6 col-xl-4">
            <div class="d-flex bg-secondary p-4">
                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $aboutMe?->experience}}</h1>
                <div class="ps-3">
                    <p class="mb-0">Années d'</p>
                    <h5 class="mb-0">Experience</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-6 col-xl-4">
            <div class="d-flex bg-secondary p-4">
                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $achievment?->happy_clients }}</h1>
                <div class="ps-3">
                    <p class="mb-0">Clients</p>
                    <h5 class="mb-0">Satisfaits</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-6 col-xl-4">
            <div class="d-flex bg-secondary p-4">
                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $achievment?->projects_completed }}</h1>
                <div class="ps-3">
                    <p class="mb-0">Projets</p>
                    <h5 class="mb-0">Livré</h5>
                </div>
            </div>
        </div>
    </div>
</section>