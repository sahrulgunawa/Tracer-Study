<section class="profile-section">
    <header>
        <h2 class="section-title"><i class="fas fa-user-circle me-2"></i>Profile Information</h2>
        <p class="section-description text-muted"><i class="fas fa-info-circle me-2"></i>Update your account's profile information and email address.</p>
    </header>

    <div class="profile-card">
        <h2 class="section-header">
            <i class="fas fa-user-circle me-2"></i>Profile Information
        </h2>

        <form method="post" action="/profile/update">
            @csrf
            <table class="profile-table">
                <tr>
                    <th><i class="fas fa-user me-2"></i>Name</th>
                    <td>
                        <input id="name" name="name" type="text" class="form-control" value="{{ $user->name }}" required>
                        @if ($errors->has('name'))
                            <span class="error-message text-danger"><i class="fas fa-exclamation-circle me-1"></i>{{ $errors->first('name') }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th><i class="fas fa-envelope me-2"></i>Email</th>
                    <td>
                        <input id="email" name="email" type="email" class="form-control" value="{{ $user->email }}" required>
                        @if ($errors->has('email'))
                            <span class="error-message text-danger"><i class="fas fa-exclamation-circle me-1"></i>{{ $errors->first('email') }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Save Changes
                        </button>
                        @if (session('status') === 'profile-updated')
                            <span class="success-badge ms-2">
                                <i class="fas fa-check-circle me-1"></i>Saved successfully!
                            </span>
                        @endif
                    </td>
                </tr>
            </table>
        </form>
    </div>
</section>
