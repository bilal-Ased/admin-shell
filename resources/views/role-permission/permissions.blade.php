<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title mb-0">Role & Permission Management</h4>
                    <div>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoleModal">Add
                            Role</button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPermissionModal">Add
                            Permission</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Permission</th>
                                    @foreach ($roles as $role)
                                    <th class="text-center">{{ $role->name }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    @foreach ($roles as $role)
                                    <td class="text-center">
                                        <input type="checkbox" class="role-permission-checkbox"
                                            data-role-id="{{ $role->id }}" data-permission-id="{{ $permission->id }}" {{
                                            $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Role Modal -->
    <div class="modal fade" id="addRoleModal" tabindex="-1">
        <div class="modal-dialog">
            <form id="roleForm" method="POST" action="{{ route('role.store') }}">
                @csrf
                <!-- Add CSRF Token -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Role</h5>
                    </div>
                    <div class="modal-body">
                        <label for="roleName">Role Name</label>
                        <input type="text" class="form-control" id="roleName" name="name" required>
                        <label for="roleName">Title</label>
                        <input type="text" class="form-control" id="roleTitle" name="title" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Add Permission Modal -->
    <div class="modal fade" id="addPermissionModal" tabindex="-1">
        <div class="modal-dialog">
            <form id="permissionForm" method="POST" action="{{ route('role.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Permission</h5>
                    </div>
                    <div class="modal-body">
                        <label for="permissionName">Permission Name</label>
                        <input type="text" class="form-control" id="permissionName" name="name" required>
                    </div>
                    <div class="modal-body">
                        <label for="permissionTitle">Permission Title</label>
                        <input type="text" class="form-control" id="permissionTitle" name="title" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>