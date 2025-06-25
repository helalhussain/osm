
<x-admin.modal
    enctype="multipart/form-data"
    title="Show content" size="lg">

    <div class="cards">
        <ul class="list-group list-group-flush">
           
            <li class="list-group-item"><strong>Subject:</strong> {{ $content->subject }}</li>

        </ul>
        {{-- <img class="card-img-top img-fluid" src="assets/images/small/img-2.jpg" alt="Card image cap"> --}}
        <div class="card-body">
            <h4 class="card-title font-size-16 mt-0">{{ $content->title }}</h4>
            <p class="card-text"><strong>Description :</strong>{!! $content->description !!}</p>
        </div>
        @if($content->file != "")
        <div class="row pt-2">
            <div class="col-xl-6 col-6">
                <div class="cards"><hr />
                    <p class="email-attachment-title mb-2">Attachments</p>
                    <div class="cursor-pointer">

                        <a
                            href="{{ uploaded_file($content->file) }}"
                            download
                            class="align-middle ms-1"
                        >
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
