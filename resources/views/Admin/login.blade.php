<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8" />
    <title>تسجيل دخول لوحة التحكم</title>
</head>
<body>
    <h1>تسجيل دخول لوحة التحكم</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div>
            <label>البريد الإلكتروني:</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus />
        </div>
        <div>
            <label>كلمة المرور:</label>
            <input type="password" name="password" required />
        </div>
        <button type="submit">تسجيل الدخول</button>
    </form>
</body>
</html>
