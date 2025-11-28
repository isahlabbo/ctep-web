<div class="modal fade" id="edit_{{$student->id}}" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_{{$student->id}}" style="color: var(--ctep-dark-blue);">Edit Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('exam.session.student.update', [$student->id])}}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" value="{{$student->name}}" name="name" placeholder="Enter option A" required>
                        </div>
                        <div class="mb-3">
                            <label for="passcode" class="form-label">Pass Code</label>
                            <input type="text" class="form-control" id="passcode" value="{{$student->passcode}}" name="passcode" placeholder="Enter option B" required>
                        </div>
                               
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>