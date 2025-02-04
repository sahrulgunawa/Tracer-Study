<section class="password-section">
    <header>
        <h2 class="section-title"><i class="fas fa-lock me-2"></i>Update Password</h2>
        <p class="section-description text-muted"><i class="fas fa-shield-alt me-2"></i>Ensure your account is using a long, random password to stay secure.</p>
    </header>

    <div class="profile-card">
        <h2 class="section-header">
            <i class="fas fa-lock me-2"></i>Update Password
        </h2>

        <form method="post" action="/password/update">
            @csrf
            <table class="profile-table">
                <tr>
                    <th><i class="fas fa-key me-2"></i>Current Password</th>
                    <td>
                        <div class="input-group">
                            <input id="current_password" name="current_password" type="password" class="form-control" required>
                            <button type="button" class="btn btn-outline-secondary toggle-password" data-target="current_password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @if ($errors->has('current_password'))
                            <span class="error-message text-danger"><i class="fas fa-exclamation-circle me-1"></i>{{ $errors->first('current_password') }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th><i class="fas fa-lock me-2"></i>New Password</th>
                    <td>
                        <div class="input-group">
                            <input id="password" name="password" type="password" class="form-control" required>
                            <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @if ($errors->has('password'))
                            <span class="error-message text-danger"><i class="fas fa-exclamation-circle me-1"></i>{{ $errors->first('password') }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th><i class="fas fa-check-double me-2"></i>Confirm Password</th>
                    <td>
                        <div class="input-group">
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required>
                            <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password_confirmation">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Password
                        </button>
                        @if (session('status') === 'password-updated')
                            <span class="success-badge ms-2">
                                <i class="fas fa-check-circle me-1"></i>Password updated!
                            </span>
                        @endif
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <script>
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
    </script>
</section>
