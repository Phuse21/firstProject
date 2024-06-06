<h2>
    {{ $job->title }}
</h2>
<p>
    Congrats! Your Job has been posted.
</p>

<p>
    <a href="{{ url('/jobs/' . $job->id)}}">View Job</a>
</p>