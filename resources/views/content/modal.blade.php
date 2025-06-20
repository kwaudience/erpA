<div class="modal fade compose-mail" id="compose-modal" tabindex="-1" aria-labelledby="compose-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header overflow-hidden bg-primary p-2">
                <h5 class="modal-title text-white" id="compose-modalLabel">New Message</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="overflow-hidden">

                    <div class="mb-2">
                        <input type="email" class="form-control" id="toEmail" placeholder="To: ">
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control" id="subject" placeholder="Subject ">
                    </div>

                    <div class="my-2">
                        <div id="snow-editor2" style="height: 200px;"></div>
                    </div>

                    <div class="d-flex float-end">
                        <div class="dropdown me-1">
                                <a href="javascript:void(0);" class="dropdown-toggle arrow-none btn btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded fs-18"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-up">
                                    <a href="javascript:void(0);" class="dropdown-item">Default to full screen</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item">Label</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Palin text mode</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item">Smart Compose Feedback</a>
                                </div>
                        </div>
                        <a href="javascript: void(0);" class="btn btn-light compose-close"><i class="bx bxs-trash fs-18"></i></a>
                    </div>
                    <div>
                        <a href="javascript: void(0);" class="btn btn-primary">Send</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
