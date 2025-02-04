<div class="profile-card">
    <h2 class="section-header bg-danger">
        <i class="fas fa-trash-alt me-2"></i>Delete Account
    </h2>

    <table class="profile-table">
        <tr>
            <th><i class="fas fa-exclamation-triangle me-2"></i>Warning</th>
            <td>
                <p class="text-danger mb-3">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
                <button type="button" class="btn btn-danger rounded-pill" onclick="showDeleteModal()">
                    <i class="fas fa-user-times me-2"></i>Delete Account
                </button>
            </td>
        </tr>
    </table>

    <div id="deleteModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header bg-danger text-white">
                    <h2 class="modal-title"><i class="fas fa-exclamation-triangle me-2"></i>Delete Account Confirmation</h2>
                    <button type="button" class="btn-close btn-close-white" onclick="hideDeleteModal()"></button>
                </div>
                
                <div class="modal-body">
                    <p class="modal-description"><i class="fas fa-lock me-2"></i>Please enter your password to confirm deletion.</p>

                    <form method="post" action="/profile/delete" class="delete-form">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="delete_password" class="form-label"><i class="fas fa-key me-2"></i>Password</label>
                            <div class="input-group">
                                <input id="delete_password" name="password" type="password" class="form-control rounded-3" required>
                                <button type="button" class="btn btn-outline-secondary toggle-password rounded-3" data-target="delete_password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @if ($errors->has('password'))
                                <span class="error-message text-danger mt-2"><i class="fas fa-exclamation-circle me-1"></i>{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="modal-actions text-end">
                            <button type="button" class="btn btn-secondary me-2 rounded-pill" onclick="hideDeleteModal()">
                                <i class="fas fa-times me-2"></i>Cancel
                            </button>
                            <button type="submit" class="btn btn-danger rounded-pill">
                                <i class="fas fa-trash-alt me-2"></i>Delete Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showDeleteModal() {
            const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        }

        function hideDeleteModal() {
            const modal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
            modal.hide();
        }
    </script>
</div>
