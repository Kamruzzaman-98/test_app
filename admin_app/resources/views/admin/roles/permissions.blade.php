@extends('layouts.admin')

@section('content')

    <style>
        .permissions-page {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
        }

        .permissions-header {
            padding: 18px 20px;
            border-bottom: 1px solid #e5e7eb;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .permissions-header h4 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
            color: #212529;
        }

        .permissions-header p {
            margin: 4px 0 0;
            font-size: 13px;
            color: #6c757d;
        }

        .header-actions {
            display: flex;
            gap: 6px;
        }

        .permission-group {
            border-bottom: 1px solid #e5e7eb;
        }

        .permission-group:last-child {
            border-bottom: none;
        }

        .group-header {
            padding: 13px 20px;
            background: #f8f9fa;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .group-name {
            margin: 0;
            font-size: 15px;
            font-weight: 600;
            color: #343a40;
            text-transform: capitalize;
        }

        .group-count {
            color: #6c757d;
            font-size: 12px;
            margin-left: 6px;
        }

        .group-select {
            font-size: 13px;
            color: #495057;
            cursor: pointer;
            user-select: none;
        }

        .group-select input {
            margin-right: 5px;
        }

        .permission-list {
            padding: 16px 20px;

            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px 20px;
        }

        .permission-item {
            margin: 0;
            font-size: 14px;
            color: #495057;

            display: flex;
            align-items: center;

            cursor: pointer;
        }

        .permission-item input {
            width: 16px;
            height: 16px;
            margin-right: 8px;
            cursor: pointer;
        }

        .permission-item:hover {
            color: #212529;
        }

        .permissions-footer {
            padding: 15px 20px;
            border-top: 1px solid #e5e7eb;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .selected-count {
            font-size: 13px;
            color: #6c757d;
        }

        .selected-count strong {
            color: #343a40;
        }

        @media (max-width: 992px) {
            .permission-list {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {

            .permissions-header {
                display: block;
            }

            .header-actions {
                margin-top: 12px;
            }

            .permission-list {
                grid-template-columns: 1fr;
            }

            .permissions-footer {
                display: block;
            }

            .permissions-footer .buttons {
                margin-top: 10px;
            }
        }
    </style>


    <div class="permissions-page">

        <div class="permissions-header">

            <div>
                <h4>Role Permissions</h4>

                <p>
                    Manage permissions for
                    <strong>{{ $role->name }}</strong>
                </p>
            </div>

            <div class="header-actions">

                <button type="button" class="btn btn-sm btn-outline-secondary" id="selectAll">

                    Select All

                </button>

                <button type="button" class="btn btn-sm btn-outline-secondary" id="clearAll">

                    Clear All

                </button>

            </div>

        </div>


        <form method="POST" action="{{ route('roles.permissions.update', $role->id) }}">

            @csrf


            @foreach ($groupedPermissions as $group => $groupPermissions)
                <div class="permission-group">

                    <div class="group-header">

                        <div>

                            <span class="group-name">
                                {{ $group }}
                            </span>

                            <span class="group-count">
                                ({{ $groupPermissions->count() }})
                            </span>

                        </div>


                        <label class="group-select">

                            <input type="checkbox" class="group-select-all" data-group="{{ $group }}">

                            Select All

                        </label>

                    </div>

                    <div class="permission-list">

                        @foreach ($groupPermissions as $permission)
                            <label class="permission-item">

                                <input type="checkbox" class="permission-checkbox group-{{ $group }}"
                                    name="permissions[]" value="{{ $permission->name }}"
                                    {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>

                                {{ $permission->name }}

                            </label>
                        @endforeach

                    </div>

                </div>
            @endforeach


            <div class="permissions-footer">

                <div class="selected-count">

                    Selected:
                    <strong id="selectedCount">0</strong>
                    permissions

                </div>


                <div class="buttons">

                    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary">

                        Cancel

                    </a>

                    <button type="submit" class="btn btn-sm btn-primary">

                        Save Permissions

                    </button>

                </div>

            </div>

        </form>

    </div>


    <script>
        window.successMessage = @json(session('success'));
    </script>


    @push('scripts')
        <script src="{{ asset('js/custom_alert.js') }}"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const selectedCount =
                    document.getElementById('selectedCount');


                function updateCount() {

                    const checked =
                        document.querySelectorAll(
                            '.permission-checkbox:checked'
                        ).length;

                    selectedCount.textContent = checked;

                }



                document
                    .getElementById('selectAll')
                    .addEventListener('click', function() {

                        document
                            .querySelectorAll('.permission-checkbox')
                            .forEach(function(checkbox) {

                                checkbox.checked = true;

                            });


                        document
                            .querySelectorAll('.group-select-all')
                            .forEach(function(checkbox) {

                                checkbox.checked = true;

                            });


                        updateCount();

                    });



                document
                    .getElementById('clearAll')
                    .addEventListener('click', function() {

                        document
                            .querySelectorAll('.permission-checkbox')
                            .forEach(function(checkbox) {

                                checkbox.checked = false;

                            });


                        document
                            .querySelectorAll('.group-select-all')
                            .forEach(function(checkbox) {

                                checkbox.checked = false;

                            });


                        updateCount();

                    });

                document
                    .querySelectorAll('.group-select-all')
                    .forEach(function(groupCheckbox) {

                        groupCheckbox.addEventListener('change', function() {

                            const group =
                                this.dataset.group;

                            document
                                .querySelectorAll(
                                    '.group-' + group
                                )
                                .forEach(function(checkbox) {

                                    checkbox.checked =
                                        groupCheckbox.checked;

                                });

                            updateCount();

                        });

                    });


                document
                    .querySelectorAll('.permission-checkbox')
                    .forEach(function(checkbox) {

                        checkbox.addEventListener('change', function() {

                            const groupClass =
                                Array.from(this.classList)
                                .find(function(className) {

                                    return className.startsWith('group-');

                                });


                            if (!groupClass) {
                                return;
                            }


                            const group =
                                groupClass.replace('group-', '');


                            const permissions =
                                document.querySelectorAll(
                                    '.group-' + group
                                );


                            const checked =
                                document.querySelectorAll(
                                    '.group-' + group + ':checked'
                                );


                            const groupSelect =
                                document.querySelector(
                                    '.group-select-all[data-group="' +
                                    group +
                                    '"]'
                                );


                            if (groupSelect) {

                                groupSelect.checked =
                                    permissions.length > 0 &&
                                    permissions.length ===
                                    checked.length;

                            }


                            updateCount();

                        });

                    });



                document
                    .querySelectorAll('.group-select-all')
                    .forEach(function(groupCheckbox) {

                        const group =
                            groupCheckbox.dataset.group;


                        const permissions =
                            document.querySelectorAll(
                                '.group-' + group
                            );


                        const checked =
                            document.querySelectorAll(
                                '.group-' + group + ':checked'
                            );


                        groupCheckbox.checked =
                            permissions.length > 0 &&
                            permissions.length ===
                            checked.length;

                    });


                updateCount();

            });
        </script>
    @endpush

@endsection
