
<x-admin.modal
    enctype="multipart/form-data"
    title="Show notice">

    <div class="cards">
        {{-- <img class="card-img-top img-fluid" src="assets/images/small/img-2.jpg" alt="Card image cap"> --}}
        <div class="card-body">
            <h4 class="card-title font-size-16 mt-0">{{ $notice->title }}</h4>
            <h6 class="card-title font-size-16 mt-0"> <strong>Class:</strong>{{ $notice->classroom->title }}</h6>
            <p class="card-text"><strong>Description :</strong>{{ $notice->description }}</p>
        </div>

        @if($notice->file != "")
        <div class="row ">
            <div class="col-xl-6 col-6">
                <div class="cards">
                    <p class="email-attachment-title mb-2">File</p>
                    <div class="cursor-pointer">
                        <i class="ti ti-file"></i>
                        <a
                            href="{{ uploaded_file($notice->file) }}"
                            download
                            class="align-middle ms-1"
                        >
                            {{ $notice->file }}
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
