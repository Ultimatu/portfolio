<section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
    <h1 class="title pb-3 mb-5">Projets Réalisés</h1>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 text-center mb-2">
                    <ul class="list-inline mb-4" id="portfolio-flters">
                        <li class="btn btn-secondary active" data-filter="*"><i
                                class="fa fa-star me-2"></i>Tous</li>
                        <li class="btn btn-secondary" data-filter=".back-office"><i
                                class="fa fa-laptop-code me-2"></i>Back Office</li>
                        <li class="btn btn-secondary" data-filter=".full_website"><i
                                class="fa fa-mobile-alt me-2"></i>Site Complet</li>
                        {{-- mobile --}}
                        <li class="btn btn-secondary" data-filter=".mobile"><i
                                class="fa fa-mobile-alt me-2"></i>Mobile</li>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                @foreach ($projects as $project)
                    <div class="col-md-6 mb-4 portfolio-item  {{ $project->type }}">
                        <div class="position-relative overflow-hidden mb-2">
                            <img class="img-fluid w-100" src="{{ $project->image1 }}" alt="portfolio-1">
                            <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                <a href="{{ $project->image2 }}" data-lightbox="portfolio">
                                    <i class="bi bi-plus text-light"></i>
                                </a>
                                {{-- image3 to 5 --}}
                                <a href="{{ $project->image3 }}" data-lightbox="portfolio"></a>
                                <a href="{{ $project->image4 }}" data-lightbox="portfolio"></a>
                                <a href="{{ $project->image5 }}" data-lightbox="portfolio"></a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>