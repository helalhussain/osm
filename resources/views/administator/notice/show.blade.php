
<x-admin.modal
    enctype="multipart/form-data"
    title="Show notice">

    <div class="cards">
        {{-- <img class="card-img-top img-fluid" src="assets/images/small/img-2.jpg" alt="Card image cap"> --}}
        <div class="card-body">
            <h4 class="card-title font-size-16 mt-0">{{ $notice->title }}</h4>
            <p class="card-text"><strong>Description :</strong>{{ $notice->description }}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Class:</strong> {{ $notice->classroom->title }}</li>

        </ul>
    </div>

</x-admin.modal>
