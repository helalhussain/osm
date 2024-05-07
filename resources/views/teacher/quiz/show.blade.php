
<x-admin.modal
    enctype="multipart/form-data"
    title="Show quiz">

    <div class="cards">
        {{-- <img class="card-img-top img-fluid" src="assets/images/small/img-2.jpg" alt="Card image cap"> --}}
        <div class="card-body">
            <h4><strong>Class:</strong> {{ $quiz->classroom->title }}</h4>

            <h4 class="card-title font-size-16 mt-0">{{ $quiz->title }}</h4>
            <p class="card-text"><strong>Description :</strong>{{ $quiz->description }}</p>
        </div>
        {{-- @if($quiz->file != "")
        <div class="row ">
            <div class="col-xl-6 col-6">
                <div class="cards">
                    <p class="email-attachment-title mb-2">File</p>
                    <div class="cursor-pointer">
                        <i class="ti ti-file"></i>
                        <a
                            href="{{ uploaded_file($quiz->file) }}"
                            download
                            class="align-middle ms-1"
                        >
                            {{ $quiz->file }}
                        </a>
                    </div>

                    </span>
                    <div class="py-2 text-center"></div>
                </div>
                </div>
            </div>
        </div>
    @endif --}}

    </div>

</x-admin.modal>
