
<x-admin.modal
    enctype="multipart/form-data"
    title="Show certificate">

    <div class="cards">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Student:</strong> {{ $certificate->user->email }}</li>

        </ul>
        {{-- <img class="card-img-top img-fluid" src="assets/images/small/img-2.jpg" alt="Card image cap"> --}}
        <div class="card-body">
            <h4 class="card-title font-size-16 mt-0">{{ $certificate->title }}</h4>
            <p class="card-text"><strong>Description :</strong>{{ $certificate->description }}</p>
        </div>
        @if($certificate->file != "")
        <div class="row ">
            <div class="col-xl-6 col-6">
                <div class="cards">
                    <p class="email-attachment-title mb-2">File</p>
                    <div class="cursor-pointer">
                        {{-- <i class="ti ti-file"></i> --}}
                        <a
                            href="{{ uploaded_file($certificate->file) }}"
                            download
                            class="align-middle ms-1">
                            {{-- {{ $notice->file }} --}}
                            <p class="btn btn-light border border-secondary border-1 rounded-pill" >Download <i class="mdi mdi-download ms-2"></i></p>
                        </a>
                    </div>
                    {{-- <img class="card-img-top img-fluid" src="{{ uploaded_file($notice->image) }}" alt="Card image cap"> --}}
                    </span>
                    <div class="py-2 text-center"></div>
                </div>
                </div>
            </div>
        </div>
    @endif
    </div>

</x-admin.modal>
