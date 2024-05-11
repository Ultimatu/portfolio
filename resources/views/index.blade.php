@extends('components.layouts.app')


@section('content')
    <div class="container">
        <div class="row g-5">
            <x-shared.sidebar />
            <div class="col-lg-8">
                <!-- About Start -->
                <x-shared.about-me />
                <!-- About End -->

                <!-- Skills Start -->
                <x-shared.skills />
                <!-- Skills End -->

                <!-- Expericence Start -->
                <x-shared.experience />
                <!-- Expericence End -->

                <!-- Subscribe Start -->
                <x-shared.subscribe />
                <!-- Subscribe End -->

                <!-- Services Start -->
                <x-shared.services />
                <!-- Services End -->

                <!-- Portfolio Start -->
                <x-shared.portfolio />
                <!-- Portfolio End -->

                <!-- Contact Start -->
                <x-shared.contact />
                <!-- Contact End -->

                <!-- Footer Start -->
                <x-shared.footer />
                <!-- Footer End -->
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        // id="downloadCV"
        $(document).ready(function() {
            $('#downloadCV').click(function() {
                // Route::get('want-to-download-cv', [App\Http\Controllers\MainController::class, 'hasDownloadedCv'])->name('api.download.cv');
                $.ajax({
                    url: "{{ route('api.download.cv') }}",
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        let cvUrl = '{{  $aboutMe?->cv }}';
                        // dowload the file 
                        window.location.href = cvUrl;
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
