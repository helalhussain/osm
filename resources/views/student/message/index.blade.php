@extends('layouts.student.app')
@section('student_content')

            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="app-email card">
                  <div class="row g-0">
                    <!-- Email Sidebar -->
                    <div class="col app-email-sidebar border-end flex-grow-0" id="app-email-sidebar">
                      <div class="btn-compost-wrapper d-grid">
                        <button
                          class="btn btn-primary btn-compose"
                          data-bs-toggle="modal"
                          data-bs-target="#emailComposeSidebar"
                        >
                          Compose
                        </button>
                      </div>
                      <!-- Email Filters -->
                      <div class="email-filters py-2">
                        <!-- Email Filters: Folder -->
                        <ul class="email-filter-folders list-unstyled mb-4">
                          <li class="active d-flex justify-content-between" data-target="inbox">
                            <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center">
                              <i class="ti ti-mail"></i>
                              <span class="align-middle ms-2">Inbox</span>
                            </a>
                            <div class="badge bg-label-primary rounded-pill badge-center">4</div>
                          </li>
                          <li class="d-flex" data-target="sent">
                            <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center">
                              <i class="ti ti-send ti-xs"></i>
                              <span class="align-middle ms-2">Sent</span>
                            </a>
                          </li>

                          <li class="d-flex align-items-center" data-target="trash">
                            <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center">
                              <i class="ti ti-trash"></i>
                              <span class="align-middle ms-2">Trash</span>
                            </a>
                          </li>
                        </ul>
                        <!-- Email Filters: Labels -->

                        <!--/ Email Filters -->
                      </div>
                    </div>
                    <!--/ Email Sidebar -->

                    <!-- Emails List -->
                    <div class="col app-emails-list">
                      <div class="shadow-none border-0">
                        <div class="emails-list-header p-3 py-lg-3 py-2">
                          <!-- Email List: Search -->
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center w-100">
                              <i
                                class="ti ti-menu-2 ti-sm cursor-pointer d-block d-lg-none me-3"
                                data-bs-toggle="sidebar"
                                data-target="#app-email-sidebar"
                                data-overlay
                              ></i>
                              <div class="mb-0 mb-lg-2 w-100">
                                <div class="input-group input-group-merge shadow-none">
                                  <span class="input-group-text border-0 ps-0" id="email-search">
                                    <i class="ti ti-search"></i>
                                  </span>
                                  <input
                                    type="text"
                                    class="form-control email-search-input border-0"
                                    placeholder="Search mail"
                                    aria-label="Search mail"
                                    aria-describedby="email-search"
                                  />
                                </div>
                              </div>
                            </div>
                            <div class="d-flex align-items-center mb-0 mb-md-2">
                              <i
                                class="ti ti-rotate-clockwise rotate-180 scaleX-n1-rtl cursor-pointer email-refresh me-2 mt-1"
                              ></i>
                              <div class="dropdown">
                                <i
                                  class="ti ti-dots-vertical cursor-pointer"
                                  id="emailsActions"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false"
                                >
                                </i>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="emailsActions">
                                  <a class="dropdown-item" href="javascript:void(0)">Mark as read</a>
                                  <a class="dropdown-item" href="javascript:void(0)">Mark as unread</a>
                                  <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                  <a class="dropdown-item" href="javascript:void(0)">Archive</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <hr class="mx-n3 emails-list-header-hr" />
                          <!-- Email List: Actions -->
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">

                             
                              <i class="ti ti-mail-opened email-list-read cursor-pointer me-2"></i>


                            </div>
                            <div
                              class="email-pagination d-sm-flex d-none align-items-center flex-wrap justify-content-between justify-sm-content-end"
                            >
                              <span class="d-sm-block d-none mx-3 text-muted">1-10 of 653</span>
                              <i class="email-prev ti ti-chevron-left scaleX-n1-rtl cursor-pointer text-muted me-2"></i>
                              <i class="email-next ti ti-chevron-right scaleX-n1-rtl cursor-pointer"></i>
                            </div>
                          </div>
                        </div>
                        <hr class="container-m-nx m-0" />
                        <!-- Email List: Items -->
                        <div class="email-list pt-0">
                          <ul class="list-unstyled m-0">

@foreach ($messages as $message)
<li class="email-list-item"
data-starred="true"
data-bs-toggle="sidebar"
data-target="#app-email-view"
>

<div class="d-flex align-items-center">
  {{-- <div class="form-check mb-0">
    <input class="email-list-item-input form-check-input" type="checkbox" id="email-1" />
    <label class="form-check-label" for="email-1"></label>
  </div>
  <i
    class="email-list-item-bookmark ti ti-star ti-xs d-sm-inline-block d-none cursor-pointer ms-2 me-3"
  ></i> --}}
  <img
    src="{{ asset('images/defult/user.png') }}"
    alt="user-avatar"
    class="d-block flex-shrink-0 rounded-circle me-sm-3 me-2"
    height="32"
    width="32"
  />
  <div class="email-list-item-content">
    <span class="h6 email-list-item-username me-2">{{ $message->m_type }}</span>
    <span class="email-list-item-subject d-xl-inline-block d-block">
      {{ $message->message }}</span
    >
  </div>
  <div class="email-list-item-meta ms-auto d-flex align-items-center">
    <span
      class="email-list-item-label badge badge-dot bg-danger d-none d-md-inline-block me-2"
      data-label="private"
    ></span>
    <small class="email-list-item-time text-muted">08:40 AM</small>
    <ul class="list-inline email-list-item-actions text-nowrap">
      <li class="list-inline-item email-read"><i class="ti ti-mail-opened"></i></li>
      <li class="list-inline-item email-delete"><i class="ti ti-trash"></i></li>
      <li class="list-inline-item"><i class="ti ti-archive"></i></li>
    </ul>
  </div>
</div>
</li>
@endforeach



                          </ul>
                        </div>
                      </div>
                      <div class="app-overlay"></div>
                    </div>
                    <!-- /Emails List -->

                    <!-- Email View -->
                    {{-- <div class="col app-email-view flex-grow-0 bg-body" id="app-email-view">
                      <div class="card shadow-none border-0 rounded-0 app-email-view-header p-3 py-md-3 py-2">
                        <!-- Email View : Title  bar-->
                        <div class="d-flex justify-content-between align-items-center py-2">
                          <div class="d-flex align-items-center overflow-hidden">
                            <i
                              class="ti ti-chevron-left ti-sm cursor-pointer me-2"
                              data-bs-toggle="sidebar"
                              data-target="#app-email-view"
                            ></i>
                            <h6 class="text-truncate mb-0 me-2">Focused impactful open issues</h6>
                            <span class="badge bg-label-danger rounded-pill">Private</span>
                          </div>
                          <!-- Email View : Action  bar-->
                          <div class="d-flex">
                            <i class="ti ti-printer mt-1 cursor-pointer d-sm-block d-none"></i>
                            <div class="dropdown ms-3">
                              <i
                                class="ti ti-dots-vertical cursor-pointer"
                                id="dropdownMoreOptions"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                              </i>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMoreOptions">
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-mail ti-xs me-1"></i>
                                  <span class="align-middle">Mark as unread</span>
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-mail-opened ti-xs me-1"></i>
                                  <span class="align-middle">Mark as unread</span>
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-star ti-xs me-1"></i>
                                  <span class="align-middle">Add star</span>
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-calendar ti-xs me-1"></i>
                                  <span class="align-middle">Create Event</span>
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-volume-off ti-xs me-1"></i>
                                  <span class="align-middle">Mute</span>
                                </a>
                                <a class="dropdown-item d-sm-none d-block" href="javascript:void(0)">
                                  <i class="ti ti-printer ti-xs me-1"></i>
                                  <span class="align-middle">Print</span>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr class="app-email-view-hr mx-n3 mb-2" />
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="d-flex align-items-center">
                            <i
                              class="ti ti-trash cursor-pointer me-3"
                              data-bs-toggle="sidebar"
                              data-target="#app-email-view"
                            ></i>
                            <i class="ti ti-mail-opened cursor-pointer me-3"></i>
                            <div class="dropdown me-3">
                              <i
                                class="ti ti-folder cursor-pointer"
                                id="dropdownMenuFolder"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                              </i>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuFolder">
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-info-circle ti-xs me-1"></i>
                                  <span class="align-middle">Spam</span>
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-pencil ti-xs me-1"></i>
                                  <span class="align-middle">Draft</span>
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-trash ti-xs me-1"></i>
                                  <span class="align-middle">Trash</span>
                                </a>
                              </div>
                            </div>
                            <div class="dropdown me-3">
                              <i
                                class="ti ti-tag cursor-pointer"
                                id="dropdownLabel"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                              </i>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLabel">
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="badge badge-dot bg-success me-1"></i>
                                  <span class="align-middle">Workshop</span>
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="badge badge-dot bg-primary me-1"></i>
                                  <span class="align-middle">Company</span>
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="badge badge-dot bg-info me-1"></i>
                                  <span class="align-middle">Important</span>
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="d-flex align-items-center flex-wrap justify-content-end">
                            <span class="d-sm-block d-none mx-3 text-muted">1-10 of 653</span>
                            <i class="ti ti-chevron-left scaleX-n1-rtl cursor-pointer text-muted me-2"></i>
                            <i class="ti ti-chevron-right scaleX-n1-rtl cursor-pointer"></i>
                          </div>
                        </div>
                      </div>
                      <hr class="m-0" />
                      <!-- Email View : Content-->
                      <div class="app-email-view-content py-4">
                        <p class="email-earlier-msgs text-center text-muted cursor-pointer mb-5">1 Earlier Message</p>
                        <!-- Email View : Previous mails-->
                        <div class="card email-card-prev mx-sm-4 mx-3">
                          <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                            <div class="d-flex align-items-center mb-sm-0 mb-3">
                              <img
                                src="../../assets/img/avatars/2.png"
                                alt="user-avatar"
                                class="flex-shrink-0 rounded-circle me-3"
                                height="40"
                                width="40"
                              />
                              <div class="flex-grow-1 ms-1">
                                <h6 class="m-0">Ross Geller</h6>
                                <small class="text-muted">rossGeller@email.com</small>
                              </div>
                            </div>
                            <div class="d-flex align-items-center">
                              <p class="mb-0 me-3 text-muted">June 20th 2020, 08:30 AM</p>
                              <i class="ti ti-paperclip cursor-pointer me-2"></i>
                              <i class="email-list-item-bookmark ti ti-star ti-xs cursor-pointer me-2"></i>
                              <div class="dropdown me-3">
                                <i
                                  class="ti ti-dots-vertical cursor-pointer"
                                  id="dropdownEmail"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false"
                                >
                                </i>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownEmail">
                                  <a class="dropdown-item scroll-to-reply" href="javascript:void(0)">
                                    <i class="ti ti-corner-up-left me-1"></i>
                                    <span class="align-middle">Reply</span>
                                  </a>
                                  <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti ti-corner-up-right me-1"></i>
                                    <span class="align-middle">Forward</span>
                                  </a>
                                  <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti ti-alert-octagon me-1"></i>
                                    <span class="align-middle">Report</span>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-body">
                            <p class="fw-bold">Greetings!</p>
                            <p>
                              It is a long established fact that a reader will be distracted by the readable content of a
                              page when looking at its layout.The point of using Lorem Ipsum is that it has a more-or-less
                              normal distribution of letters, as opposed to using 'Content here, content here',making it
                              look like readable English.
                            </p>
                            <p>
                              There are many variations of passages of Lorem Ipsum available, but the majority have
                              suffered alteration in some form, by injected humour, or randomised words which don't look
                              even slightly believable.
                            </p>
                            <p class="mb-0">Sincerely yours,</p>
                            <p class="fw-bold mb-0">Envato Design Team</p>
                            <hr />
                            <p class="email-attachment-title mb-2">Attachments</p>
                            <div class="cursor-pointer">
                              <i class="ti ti-file"></i>
                              <span class="align-middle ms-1">report.xlsx</span>
                            </div>
                          </div>
                        </div>
                        <!-- Email View : Last mail-->
                        <div class="card email-card-last mx-sm-4 mx-3 mt-4">
                          <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                            <div class="d-flex align-items-center mb-sm-0 mb-3">
                              <img
                                src="../../assets/img/avatars/1.png"
                                alt="user-avatar"
                                class="flex-shrink-0 rounded-circle me-3"
                                height="40"
                                width="40"
                              />
                              <div class="flex-grow-1 ms-1">
                                <h6 class="m-0">Chandler Bing</h6>
                                <small class="text-muted">iAmAhoot@email.com</small>
                              </div>
                            </div>
                            <div class="d-flex align-items-center">
                              <p class="mb-0 me-3 text-muted">June 20th 2020, 08:10 AM</p>
                              <i class="ti ti-paperclip cursor-pointer me-2"></i>
                              <i class="email-list-item-bookmark ti ti-star ti-xs cursor-pointer me-2"></i>
                              <div class="dropdown me-3">
                                <i
                                  class="ti ti-dots-vertical cursor-pointer"
                                  id="dropdownEmail"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false"
                                ></i>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownEmail">
                                  <a class="dropdown-item scroll-to-reply" href="javascript:void(0)">
                                    <i class="ti ti-corner-up-left me-1"></i>
                                    <span class="align-middle">Reply</span>
                                  </a>
                                  <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti ti-corner-up-right me-1"></i>
                                    <span class="align-middle">Forward</span>
                                  </a>
                                  <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti ti-alert-octagon me-1"></i>
                                    <span class="align-middle">Report</span>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-body">
                            <p class="fw-bold">Greetings!</p>
                            <p>
                              It is a long established fact that a reader will be distracted by the readable content of a
                              page when looking at its layout.The point of using Lorem Ipsum is that it has a more-or-less
                              normal distribution of letters, as opposed to using 'Content here, content here',making it
                              look like readable English.
                            </p>
                            <p>
                              There are many variations of passages of Lorem Ipsum available, but the majority have
                              suffered alteration in some form, by injected humour, or randomised words which don't look
                              even slightly believable.
                            </p>
                            <p class="mb-0">Sincerely yours,</p>
                            <p class="fw-bold mb-0">Envato Design Team</p>
                            <hr />
                            <p class="email-attachment-title mb-2">Attachments</p>
                            <div class="cursor-pointer">
                              <i class="ti ti-file"></i>
                              <span class="align-middle ms-1">report.xlsx</span>
                            </div>
                          </div>
                        </div>
                        <!-- Email View : Reply mail-->
                        <div class="email-reply card mt-4 mx-sm-4 mx-3">
                          <h6 class="card-header border-0">Reply to Ross Geller</h6>
                          <div class="card-body pt-0 px-3">
                            <div class="d-flex justify-content-start">
                              <div class="email-reply-toolbar border-0 w-100 ps-0">
                                <span class="ql-formats me-0">
                                  <button class="ql-bold"></button>
                                  <button class="ql-italic"></button>
                                  <button class="ql-underline"></button>
                                  <button class="ql-list" value="ordered"></button>
                                  <button class="ql-list" value="bullet"></button>
                                  <button class="ql-link"></button>
                                  <button class="ql-image"></button>
                                </span>
                              </div>
                            </div>
                            <div class="email-reply-editor"></div>
                            <div class="d-flex justify-content-end align-items-center">
                              <div class="me-3">
                                <label class="cursor-pointer" for="attach-file-1"
                                  ><i class="ti ti-paperclip me-2"></i
                                  ><span class="align-middle">Attachments</span></label
                                >
                                <input type="file" name="file-input" class="d-none" id="attach-file-1" />
                              </div>
                              <button class="btn btn-primary">
                                <i class="ti ti-send ti-xs me-1"></i>
                                <span class="align-middle">Send</span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> --}}
                    <!-- Email View -->
                  </div>

                  <!-- Compose Email -->
                  <div
                    class="app-email-compose modal"
                    id="emailComposeSidebar"
                    tabindex="-1"
                    aria-labelledby="emailComposeSidebarLabel"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog m-0 me-md-4 mb-4 modal-lg">
                      <div class="modal-content p-0">
                        <div class="modal-header py-3 bg-body">
                          <h5 class="modal-title fs-5">Compose Mail</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body flex-grow-1 pb-sm-0 p-4 py-2">


                          <form action="{{ route('message.store') }}" class="email-compose-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="email-compose-to d-flex justify-content-between align-items-center">
                              <label class="form-label mb-0" for="emailContacts">To:</label>
                              <div class="select2-primary border-0 shadow-none flex-grow-1 mx-2">

                                <input
                                type="text" name="user_type" value="Administator"
                                class="form-control border-0 shadow-none flex-grow-1 mx-2"
                                id="email-subject"
                                placeholder="" readonly
                              />
                                {{-- <select
                                  class="select2 select-email-contacts form-select"
                                  id="emailContacts"
                                  name="emailContacts"
                                  multiple
                                >
                                  <option data-avatar="1.png" value="Jane Foster">Jane Foster</option>
                                  <option data-avatar="3.png" value="Donna Frank">Donna Frank</option>
                                </select> --}}

                              </div>
                              {{-- <div class="email-compose-toggle-wrapper">
                                <a class="email-compose-toggle-cc" href="javascript:void(0);">Cc |</a>
                                <a class="email-compose-toggle-bcc" href="javascript:void(0);">Bcc</a>
                              </div> --}}
                            </div>

                            {{-- <div class="email-compose-cc d-none">
                              <hr class="container-m-nx my-2" />
                              <div class="d-flex align-items-center">
                                <label for="email-cc" class="form-label mb-0">Cc: </label>
                                <input
                                  type="text"
                                  class="form-control border-0 shadow-none flex-grow-1 mx-2"
                                  id="email-cc"
                                  placeholder="someone@email.com"
                                />
                              </div>
                            </div> --}}
                            {{-- <div class="email-compose-bcc d-none">
                              <hr class="container-m-nx my-2" />
                              <div class="d-flex align-items-center">
                                <label for="email-bcc" class="form-label mb-0">Bcc: </label>
                                <input
                                  type="text"
                                  class="form-control border-0 shadow-none flex-grow-1 mx-2"
                                  id="email-bcc"
                                  placeholder="someone@email.com"
                                />
                              </div>
                            </div> --}}
                            <hr class="container-m-nx my-2" />
                            <div class="email-compose-subject d-flex align-items-center mb-2">
                              <label for="email-subject" class="form-label mb-0">Subject:</label>
                              <input
                                type="text" name="email-subject"
                                class="form-control border-0 shadow-none flex-grow-1 mx-2"
                                id="email-subject"
                                placeholder="Subject"
                              />
                            </div>
                            <textarea name="message" class="form-control" id="message" >

                            </textarea>
                            {{-- <div class="email-compose-message container-m-nx">
                              <div class="d-flex justify-content-end">
                                <div class="email-editor-toolbar border-bottom-0 w-100">
                                  <span class="ql-formats me-0">
                                    <button class="ql-bold"></button>
                                    <button class="ql-italic"></button>
                                    <button class="ql-underline"></button>
                                    <button class="ql-list" value="ordered"></button>
                                    <button class="ql-list" value="bullet"></button>
                                    <button class="ql-link"></button>
                                    <button class="ql-image"></button>
                                  </span>
                                </div>
                              </div>
                              <div class="email-editor"></div>
                            </div> --}}
                            <hr class="container-m-nx mt-0 mb-2" />
                            <div
                              class="email-compose-actions d-flex justify-content-between align-items-center mt-3 mb-3"
                            >
                              <div class="d-flex align-items-center">
                                <div class="btn-group">
                                  <button type="submit" class="btn btn-primary">
                                   Send
                                  </button>
                                </div>
                                {{-- <label for="attach-file"><i class="ti ti-paperclip cursor-pointer ms-2"></i></label>
                                <input type="file" name="file-input" class="d-none" id="attach-file" /> --}}
                              </div>
                              <div class="d-flex align-items-center">

                                <button type="reset" class="btn" data-bs-dismiss="modal" aria-label="Close">
                                  <i class="ti ti-trash"></i>
                                </button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Compose Email -->
                </div>
              </div>
              <!--/ Content -->
@endsection
