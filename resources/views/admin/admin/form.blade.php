<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($admin) ? 'Update Admin' : 'Add New Admin'"
    :action="isset($admin) ? route('admin.admin.update', $admin->id) : route('admin.admin.store')"
    :button="isset($admin) ? 'Update' : 'Submit'"
>
    @isset($admin)
        @method('PUT')
    @endisset

    <x-admin.form-group label="name" placeholder="Enter name" :value="$admin->name ?? ''" />
    <x-admin.form-group label="email" placeholder="Enter email" :value="$admin->email ?? '' " />
     @empty($admin)
    <x-admin.form-group type="password" label="password" placeholder="Enter password" :value="$admin->passowrd ?? ''" />
    <x-admin.form-group type="password" label="password_confirmation" placeholder="Enter confirm password"/>
    @endempty
    {{-- <div class="">
        <label for="userpassword">Password</label>
        <div class="input-group">
            <input type="password" class="form-control login_password @error('password') is-invalid @enderror" name="password" id="userpassword" placeholder="Enter password">
            <a class="input-group-text logineye" id="validationTooltipUsernamePrepend">
                <i class="fas fa-eye fa-eye-slash eyesee"></i>
            </a>
        </div>
        @error('password')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="">
        <label for="password_confirmation">Confirm password</label>
        <div class="input-group">
            <input type="password" class="form-control login_password @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Enter confirm password">
            <a class="input-group-text logineye" id="validationTooltipUsernamePrepend">
                <i class="fas fa-eye fa-eye-slash eyesee"></i>
            </a>
        </div>
        @error('password_confirmation')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div> --}}



</x-admin.modal>
