
<x-admin.modal
    enctype="multipart/form-data"
    title="Show Course">

    <div class="cards">
        {{-- <img class="card-img-top img-fluid" src="assets/images/small/img-2.jpg" alt="Card image cap"> --}}
        <div class="card-body">
            <h4 class="card-title font-size-16 mt-0">Class : {{ $course->classroom->title }}</h4>
            <h4 class="card-title font-size-16 mt-0">Section : {{ $course->section->title }}</h4>
            {{-- <p class="card-text"><strong>Description :</strong>{{ $notice->description }}</p> --}}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Subjects :</strong> {{ $course->subjects->pluck('name')->implode(', ') }}</li>
        </ul>

    </div>

</x-admin.modal>
