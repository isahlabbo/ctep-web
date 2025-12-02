@extends('layouts.app')

@section('title','Compile Exam: '.$exam->title)
@section('content')
<div class="container">
  <p class="text" style="text-align: justify">Compiling this exam will extract all configured questions and generate a standalone software package for the <b><em>{{ $exam->title }}</b></em> CBT Examination. 
    Before proceeding, ensure that every part of the exam setup is fully completed including instructions, subjects, timing, questions, and marking options.
     Compiling with incomplete settings may result in missing content, incorrect configurations, 
     or a faulty exam application.  </p>
  <p class="text" style="text-align: justify">Once you click the "Compile & Build Executables" button below, the system will begin processing the exam. 
    This may take several minutes depending on the size and complexity of the exam. You can monitor the build status in the section below.
     Upon successful completion, download links for the exam executables will be provided for deployment on exam centres or schools. </p>
<p>Here is the Details of the Exam Sessions</p>
@if(count($exam->examSessions) == 0)
    <p class="alert alert-danger"><em>No exam sessions have been configured for this exam yet. Please set up at least one session before compiling.</em> <a class="btn btn-primary" href="{{route('exam.session.index',[$exam->id])}}">Please, Click to Create Session for your Examination</a></p> 
@else
@foreach($exam->examSessions as $session)
    <ul>
        <li>Session Title: <b>{{ $session->title }}</b></li>
        <li>Candidates: <b>{{ count($session->students) }}</b></li>
        <li>Questions: <b>{{ count($session->questions) }}</b></li>
        <li>Start Time: <b>{{ $session->start }}</b></li>
        <li>End Time: <b>{{ $session->end }}</b></li>
        <li>Duration (minutes): <b>{{ $session->duration() }}</b></li>
    </ul>
@endforeach
<button id="compileBtn" class="btn btn-primary">Compile & Build Executables</button>
@endif
  <div id="statusBox" style="margin-top:20px; display:none;">
    <p>Status: <span id="statusText">queued</span></p>
    <div id="artifactsList"></div>
  </div>
</div>

<script>
document.getElementById('compileBtn').addEventListener('click', async function() {
  const btn = this;
  btn.disabled = true;
  btn.innerText = 'Preparing...';

  try {
    const resp = await fetch("{{ route('exam.build.start', [$exam->id]) }}", {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Accept': 'application/json'
      }
    });
    const data = await resp.json();
    if (!data.ok) throw new Error(data.message || 'Failed to start build');

    const build = data.build;
    document.getElementById('statusBox').style.display = 'block';
    pollStatus(build.build_id);
    btn.innerText = 'Build started...';
  } catch (e) {
    alert('Error: ' + e.message);
    btn.disabled = false;
    btn.innerText = 'Compile & Build Executables';
  }
});

let pollInterval = null;
function pollStatus(buildId) {
  document.getElementById('statusText').innerText = 'queued';
  pollInterval = setInterval(async () => {
    try {
      const res = await fetch("{{ url('/builds') }}/" + buildId + "/status", {
        headers: { 'Accept': 'application/json' }
      });
      const j = await res.json();
      if (!j.ok) throw new Error('status failed');
      const b = j.build;
      document.getElementById('statusText').innerText = b.status;
      if (b.status === 'success' && b.artifacts && b.artifacts.length) {
        clearInterval(pollInterval);
        // show download links
        const list = document.getElementById('artifactsList');
        list.innerHTML = '<h5>Artifacts</h5><ul>';
        for (const f of b.artifacts) {
          const url = "{{ url('/builds') }}/" + b.build_id + "/download/" + encodeURIComponent(f);
          list.innerHTML += `<li><a href="${url}">${f}</a></li>`;
        }
        list.innerHTML += '</ul>';
      } else if (b.status === 'failed') {
        clearInterval(pollInterval);
        alert('Build failed: ' + (b.log || 'Check server logs'));
      }
    } catch (e) {
      console.error(e);
    }
  }, 5000); // poll every 5s
}
</script>
@endsection
