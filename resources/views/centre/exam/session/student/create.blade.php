<div class="modal fade" id="newStudent" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newStudent" style="color: var(--ctep-dark-blue);">Register New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('centre.exam.session.student.register', [$examSession->id])}}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Student Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="passcode" class="form-label">Passcode</label>
                            <input type="text" class="form-control" id="passcode" name="passcode" placeholder="Enter Student Pass Code">
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>