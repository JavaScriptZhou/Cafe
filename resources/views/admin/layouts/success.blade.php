@if (session('success'))
    <div class="alert alert-success">
        <ul>
            <li>{{session('success') }}</li>
        </ul>
    </div>
@endif
