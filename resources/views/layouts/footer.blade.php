<footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }} <a href="#">{{ config('app.name') }}</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>
```

## 5. Dashboard Controller (app/Http/Controllers/DashboardController.php)

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'total_users' => User::count(),
            'new_users_today' => User::whereDate('created_at', today())->count(),
            'active_users' => User::whereNotNull('email_verified_at')->count(),
            'recent_users' => User::latest()->take(5)->get(),
        ];

        return view('dashboard', $data);
    }
}