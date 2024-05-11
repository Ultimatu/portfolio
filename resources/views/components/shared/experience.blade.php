<section class="py-5 wow fadeInUp" data-wow-delay="0.1s">
    <h1 class="title pb-3 mb-5">Expericences Professionnelles</h1>
    <div class="border-start border-2 border-light pt-2 ps-5">
        @foreach ($experiences as $experience)
            <div class="position-relative mb-4">
                <span class="bi bi-arrow-right fs-4 text-light position-absolute"
                    style="top: -5px; left: -50px;"></span>
                <h5 class="mb-1">{{ $experience->title }}</h5>
                <p class="mb-2">{{ $experience->company }} | <small>{{ $experience->start_date }} - {{ $experience->end_date }}</small></p>
                {{-- location --}}
                <p>{{ $experience->location }}</p>
                {{-- description --}}
                <p>{{ $experience->description }}</p>
            </div>
        @endforeach
    </div>
</section>