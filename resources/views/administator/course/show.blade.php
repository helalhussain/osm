
<x-admin.modal
    enctype="multipart/form-data"
    title="Show Course">

    <div class="cards">
        {{-- <img class="card-img-top img-fluid" src="assets/images/small/img-2.jpg" alt="Card image cap"> --}}
        <div class="card-body">
            <h4 class="card-title font-size-16 mt-0"><strong>Class :</strong> {{ $course->classroom->title }}</h4>
            <h4 class="card-title font-size-16 mt-0"><strong>Section :</strong> {{ $course->section->title }}</h4>
           {{-- <h4 class="card-title font-size-16 mt-0"><strong>Fee : $</strong>

            {{ $course->subjects->sum('fee') }}
        </h4>
            <h4 class="card-title font-size-16 mt-0"><strong>Discount :</strong>
                {{ $course->subjects->sum('discount') }}%
                </h4> --}}
            {{-- <p class="card-text"><strong>Description :</strong>{{ $notice->description }}</p> --}}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Subjects :</strong> {{ $course->subjects->pluck('name')->implode(', ') }}</li>
        </ul>

    </div>

</x-admin.modal>
