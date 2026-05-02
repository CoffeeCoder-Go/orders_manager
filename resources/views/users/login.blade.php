<x-layout>
    @if (session("errors"))
        <div class="alert alert-danger">
            {{  session("errors") }}
        </div>
    @endif

    <form action="{{ route('auth.login') }}" method="post">
        <div class="m-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="m-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button class="btn btn-primary m-3">Login</button>
        <a href="{{  route('users.signup') }}" class="btn btn-danger m-3">Signup</a>
    </form>
</x-layout>