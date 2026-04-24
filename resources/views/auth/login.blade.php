<form action="{{ url('/login') }}" method="POST">
    @csrf
    <h2>Login Perpustakaan </h2>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
