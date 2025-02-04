@extends(auth()->user()->role === 'admin' ? 'layouts.app' : 'layouts.user')

@section('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .profile-wrapper {
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 2rem 0;
        }

        .profile-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .profile-header {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            padding: 3rem 2rem;
            text-align: center;
            color: white;
            position: relative;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            background: white;
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: #3498db;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .profile-name {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .profile-email {
            opacity: 0.9;
            font-size: 1.1rem;
        }

        .tab-container {
            background: #f8f9fa;
            padding: 1rem 2rem;
            display: flex;
            gap: 1rem;
            border-bottom: 1px solid #eee;
        }

        .tab-button {
            padding: 1rem 2rem;
            border: none;
            background: transparent;
            color: #666;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s;
        }

        .tab-button:hover {
            background: rgba(52,152,219,0.1);
        }

        .tab-button.active {
            background: #3498db;
            color: white;
        }

        .tab-content {
            display: none;
            padding: 2rem;
        }

        .tab-content.active {
            display: block;
            animation: slideIn 0.3s ease;
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.8rem;
            color: #2c3e50;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 2px solid #eee;
            border-radius: 10px;
            transition: all 0.3s;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52,152,219,0.1);
        }

        .input-group {
            display: flex;
            align-items: center;
        }

        .input-group .form-control {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .input-group .btn {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: #e74c3c;
            color: white;
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        .success-message {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: #2ecc71;
            color: white;
            border-radius: 10px;
            margin-left: 1rem;
            animation: fadeIn 0.5s;
        }

        .alert {
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
        }

        .alert-danger {
            background: #fff5f5;
            border: 1px solid #fed7d7;
            color: #c53030;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        /* Modal Styling */
        .modal-content {
            border-radius: 15px;
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            padding: 1.5rem;
        }

        .modal-body {
            padding: 2rem;
        }

        .modal-footer {
            padding: 1.5rem;
            background: #f8f9fa;
        }
    </style>
@endsection

@section('content')
<div class="profile-wrapper">
    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-avatar">
                <i class="fas fa-user"></i>
            </div>
            <h2 class="profile-name">{{ Auth::user()->name }}</h2>
            <p class="profile-email">{{ Auth::user()->email }}</p>
        </div>

        <div class="tab-container">
            <button class="tab-button active" onclick="showTab('profile')">
                <i class="fas fa-user me-2"></i>Profil
            </button>
            <button class="tab-button" onclick="showTab('password')">
                <i class="fas fa-lock me-2"></i>Password
            </button>
            <button class="tab-button" onclick="showTab('danger')">
                <i class="fas fa-exclamation-triangle me-2"></i>Zona Bahaya
            </button>
        </div>

        <!-- Profile Tab -->
        <div id="profile-tab" class="tab-content active">
            <form method="post" action="/profile/update">
                @csrf
                <div class="form-group">
                    <label class="form-label"><i class="fas fa-user me-2"></i>Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label"><i class="fas fa-envelope me-2"></i>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>
                @if (session('status') === 'profile-updated')
                    <span class="success-message"><i class="fas fa-check me-2"></i>Disimpan!</span>
                @endif
            </form>
        </div>

        <!-- Password Tab -->
        <div id="password-tab" class="tab-content">
            <form method="post" action="/password/update">
                @csrf
                <div class="form-group">
                    <label class="form-label"><i class="fas fa-key me-2"></i>Password Saat Ini</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="current_password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label"><i class="fas fa-lock me-2"></i>Password Baru</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="new_password" name="password" required>
                        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="new_password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label"><i class="fas fa-check me-2"></i>Konfirmasi Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password_confirmation">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-key me-2"></i>Perbarui Password
                </button>
                @if (session('status') === 'password-updated')
                    <span class="success-message"><i class="fas fa-check me-2"></i>Diupdate!</span>
                @endif
            </form>
        </div>

        <!-- Danger Zone Tab -->
        <div id="danger-tab" class="tab-content">
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i>
                Peringatan: Tindakan ini tidak dapat dibatalkan. Ini akan menghapus akun Anda secara permanen.
            </div>
            <button type="button" class="btn btn-danger" onclick="showDeleteModal()">
                <i class="fas fa-trash me-2"></i>Hapus Akun
            </button>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title"><i class="fas fa-exclamation-triangle me-2"></i>Hapus Akun</h5>
                        <button type="button" class="btn-close btn-close-white" onclick="hideDeleteModal()"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/profile/delete">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Silakan masukkan password Anda untuk mengonfirmasi:</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary" onclick="hideDeleteModal()">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus Akun</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showTab(tabName) {
        // Hide all tabs
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.remove('active');
        });
        document.querySelectorAll('.tab-button').forEach(button => {
            button.classList.remove('active');
        });

        // Show selected tab
        document.getElementById(tabName + '-tab').classList.add('active');
        event.currentTarget.classList.add('active');
    }

    // Password toggle functionality
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const input = document.getElementById(this.dataset.target);
            const icon = this.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    });

    // Modal functions
    function showDeleteModal() {
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }

    function hideDeleteModal() {
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.hide();
    }
</script>
@endsection
