<section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
    <h1 class="title pb-3 mb-5">Skills</h1>
    <div class="row">
        @foreach ($skills->chunk(3) as $chunk)
            <div class="col-sm-6">
                @foreach ($chunk as $skill)
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">{{ $skill->name }}</p>
                            <p class="mb-2">{{ $skill->percentage }}%</p>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar"
                                aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</section>
