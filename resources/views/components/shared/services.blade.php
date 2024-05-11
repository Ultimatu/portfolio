<section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
    <h1 class="title pb-3 mb-5">Services</h1>
    <div class="row g-4">
        @foreach ($services as $service)
            <div class="col-md-6">
                <div class="service-item">
                    <i class="{{ $service->fa_icon }} mx-auto mb-4"></i>
                    <h5 class="mb-2">{{ $service->name }}</h5>
                    <p class="mb-0">{{ $service->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>