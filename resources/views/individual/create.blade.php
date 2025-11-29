
<form method="POST" action="{{ route('individual.register',[Auth::user()->profile_id]) }}">
    @csrf

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary">
            <h4 class="mb-0" style="color: white;">Please Complete Your Registration</h4>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="purpose" class="form-label fw-bold">Purpose <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('purpose') is-invalid @enderror" id="purpose" name="purpose" value="{{ old('name') }}" required autocomplete="Centre-name" autofocus>
                    @error('purpose')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="state" class="form-label fw-bold">State <span class="text-danger">*</span></label>
                    <select class="form-select @error('state') is-invalid @enderror" id="state" name="state" required>
                        <option value="">Select State</option>
                        @foreach(\App\Models\State::all() as $state)
                        <option value="{{$state->id}}" {{ old('state') == $state->id ? 'selected' : '' }}>{{$state->name}}</option>
                        @endforeach
                    </select>
                    @error('state')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="lga" class="form-label fw-bold">LGA  <span class="text-danger">*</span></label>
                    <select class="form-select @error('lga') is-invalid @enderror" id="lga" name="lga" required>
                        <option value="">Select LGA</option>
                    </select>
                    @error('lga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="address" class="form-label">Physical Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" autocomplete="street-address">
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="established_date" class="form-label">Mode</label>
                    <select class="form-control" id="mode" name="mode" >
                        <option value="Online" {{ old('mode') == 'Online' ? 'selected' : '' }}>Online</option>
                        <option value="Offline" {{ old('mode') == 'Offline' ? 'selected' : '' }}>Offline</option>
                    </select>     
                    
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-4 mb-3">
                    <label for="capacity" class="form-label fw-bold">Number of Computers <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('capacity') is-invalid @enderror" id="capacity" name="capacity" value="{{ old('capacity') }}" required min="1" autocomplete="off">
                    @error('capacity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="office_space" class="form-label">Do you have Office Space Available? </label><br>
                    Yes: <input type="radio"  id="office_space" name="office_space" value="Yes">
                    No: <input type="radio"  id="office_space" name="office_space" value="No">
                    @error('LAN_availability')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="capacity" class="form-label">Do you have Local Area Network (LAN) Connecting Specify Computers? </label>
                    Yes: <input type="radio"  id="capacity" name="LAN_availability" value="Yes">
                    No: <input type="radio"  id="capacity" name="LAN_availability" value="No">
                    @error('LAN_availability')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                    
            </div>
        </div>
    </div>
    
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0" style="color: white;">Contact Information</h4>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-4 mb-3">
                    <label for="contact_email" class="form-label">Contact Email</label>
                    <input type="email" class="form-control @error('contact_email') is-invalid @enderror" id="contact_email" name="contact_email" value="{{ old('contact_email') }}" autocomplete="email">
                    @error('contact_email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="contact_phone" class="form-label">Contact Phone</label>
                    <input type="tel" class="form-control @error('contact_phone') is-invalid @enderror" id="contact_phone" name="contact_phone" value="{{ old('contact_phone') }}" autocomplete="tel">
                    @error('contact_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary btn-lg">Register</button>
    </div>
</form>