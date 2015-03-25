<!-- Footer -->
<footer class="bs-footer" role="contentinfo">
    <div class="container">
        Designed and built by <a href="http://www.haii.or.th" target="_blank">HAII</a>
        <ul class="footer-links">
            <li><a href="{{ URL::to('myadmin') }}">Dashboard</a></li>
            <li class="muted">&middot;</li>
            <li>Laravel 4.2</li>
            <li class="muted">&middot;</li>
            <li>Environment : {{ app('env') }}</li>
        </ul>
    </div>
</footer>
<!-- // Footer -->
