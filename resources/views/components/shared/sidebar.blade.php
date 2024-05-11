<div class="col-lg-4 sticky-lg-top vh-100" id="sideBar">
    <div class="d-flex flex-column h-100 text-center overflow-auto shadow">
        <img class="w-100 img-fluid mb-4" src="{{ $aboutMe?->image?? asset('assets/img/profile.jpeg') }}" alt="Image">
        <h1 class="text-primary mt-2">Tonde Souleymane</h1>
        <div class="mb-4" style="height: 22px;">
            <h4 class="typed-text-output d-inline-block text-light"></h4>
            <div class="typed-text d-none">{{ $aboutMe?->positions }}</div> 
        </div>
        <div class="d-flex justify-content-center mt-auto mb-3">
            <a class="btn btn-secondary btn-square mx-1" href="{{ $aboutMe?->twitter }}"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-secondary btn-square mx-1" href="{{ $aboutMe?->facebook }}"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-secondary btn-square mx-1" href="{{ $aboutMe?->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
            <a class="btn btn-secondary btn-square mx-1" href="{{ $aboutMe?->instagram }}"><i class="fab fa-instagram"></i></a>
            <a class="btn btn-secondary btn-square mx-1" href="{{ $aboutMe?->whatsapp }}"><i class="fab fa-whatsapp"></i></a>

        </div>
        <div class="d-flex align-items-end justify-content-between border-top">
            <a href="#sideBar" class="btn w-50 border-end" id="downloadCV">Mon CV</a>
            <a href="#contact" class="btn w-50 btn-scroll">Me Contacter</a>
        </div>
    </div>
</div>