
<x-admin.modal
    enctype="multipart/form-data"
    title="Show content">

    <div class="cards">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Class:</strong> {{ $content->classroom->title }}</li>

        </ul>
        {{-- <img class="card-img-top img-fluid" src="assets/images/small/img-2.jpg" alt="Card image cap"> --}}
        <div class="card-body">
            <h4 class="card-title font-size-16 mt-0">{{ $content->title }}</h4>
            <p class="card-text"><strong>Description :</strong>{{ $content->description }}</p>
        </div>
        @if($content->file != "")
        <div class="row ">
            <div class="col-xl-6 col-6">
                <div class="cards">
                    <p class="email-attachment-title mb-2">File</p>
                    <div class="cursor-pointer">
                        <i class="ti ti-file"></i>
                        <a
                            href="{{ uploaded_file($content->file) }}"
                            download
                            class="align-middle ms-1"
                        >
                            {{ $content->file }}
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
