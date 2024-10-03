<!-- resources/views/header.blade.php -->
<header class="dashboard-header">
    <h1>Welcome to the Dashboard</h1>
    <div class="user-info">
        <span>Browsing as- {{ Auth::user()->name }}</span>
    </div>
</header>
