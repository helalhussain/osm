<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($administator) ? 'Update Administator' : 'Add New Administator'"
    :action="isset($administator) ? route('admin.administator.update', $administator->id) : route('admin.administator.store')"
    :button="isset($administator) ? 'Update' : 'Submit'"
>
    @isset($administator)
        @method('PUT')
    @endisset

    <x-admin.form-group label="name" placeholder="Enter name" :value="$administator->name ?? ''" />
    <x-admin.form-group label="email" placeholder="Enter email" :value="$administator->email ?? '' " />
     @empty($administator)
    <x-admin.form-group type="password" label="password" placeholder="Enter password" :value="$administator->passowrd ?? ''" />
    <x-admin.form-group type="password" label="password_confirmation" placeholder="Enter confirm password"/>
    @endempty


</x-admin.modal>
