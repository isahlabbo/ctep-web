<div class="modal fade" id="newQuestion" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newQuestion" style="color: var(--ctep-dark-blue);">Register New Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('centre.exam.session.question.register', [$examSession->id])}}">
                        @csrf
                        <div class="mb-3">
                            <label for="question" class="form-label">Question</label>
                            <textarea rows="3" cols="" class="form-control" id="question" name="question" placeholder="Enter question" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="option_a" class="form-label">Option A</label>
                            <input type="text" class="form-control" id="option_a" name="option_a" placeholder="Enter option A" required>
                        </div>
                        <div class="mb-3">
                            <label for="option_b" class="form-label">Option B</label>
                            <input type="text" class="form-control" id="option_b" name="option_b" placeholder="Enter option B" required>
                        </div>
                        <div class="mb-3">
                            <label for="option_c" class="form-label">Option C</label>
                            <input type="text" class="form-control" id="option_c" name="option_c" placeholder="Enter option C" required>
                        </div>
                        <div class="mb-3">
                            <label for="option_d" class="form-label">Option D</label>
                            <input type="text" class="form-control" id="option_d" name="option_d" placeholder="Enter option D" required>    
                        </div>
                        <div class="mb-3">
                            <label for="answer" class="form-label">Answer</label>
                            <select class="form-select" id="answer" name="answer" required>
                                <option value="">Select Correct Answer</option>
                                <option value="A">Option A</option>
                                <option value="B">Option B</option>
                                <option value="C">Option C</option>
                                <option value="D">Option D</option>
                            </select>       
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>